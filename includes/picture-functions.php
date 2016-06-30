<?php

function get_picture($picid) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->picture WHERE picid = '$picid'");
}

function save_picture ($picid, $picture_values) {
	global $bcdb, $msg;	
	
	$upload_ok = upload_picture($picture_values['name']);
	
	if (!empty($msg))
		return false;
	
	if ($upload_ok) {
		$picture_values['picname'] = $upload_ok[0];
	}
	
	if ( !empty($picture_values['picname']) && 
		($pic = $bcdb->get_var("SELECT picname FROM $bcdb->picture WHERE picid = '$picid'")) ) {
		@unlink(PICS_DIR . "thumb_$pic");
		@unlink(PICS_DIR . "normal_$pic");
	}
	
	$picture_values['picid'] = $picid;
	
	if ( ($query = insert_update_query( $bcdb->picture, $picture_values )) !== false &&
		$bcdb->query($query)) {
		
		$msg = __('Los datos han sido guardados satisfactoriamente');
		return !empty($picid) ? $picid : $bcdb->insert_id;
	}
	$msg = sprintf(__('Hubo un problema al intentar guardar una nueva %s'), __('Imagen'));
	return false;
}

function remove_picture($picid, $pics_dir = PICS_DIR) {
	global $bcdb;
	$pic = $bcdb->get_var("SELECT picname FROM $bcdb->picture WHERE picid = '$picid'");
	if ($pic) {
		@unlink(PICS_DIR . "thumb_$pic");
		@unlink(PICS_DIR . "normal_$pic");
	}
	return $bcdb->query("DELETE FROM $bcdb->picture WHERE picid = $picid");
}

function get_pictures($type = false, $pics_ids = false) {
	global $bcdb, $bcrs, $pager;
		
	$where = '';
	if ($pics_ids !== false) {		
		$where .= " picid IN (" . (empty($pics_ids) ? '0' : $pics_ids) . ")";
	}
	
	if ( ! empty($type) )
		$where .= " AND pfor = '$type'";

	if ( !empty($where) )
		$where = 'WHERE ' . preg_replace('/^ AND/', '', $where);

	$sql = "SELECT * FROM $bcdb->picture $where";
	return ($pager) ? $bcrs->get_results($sql) : $bcdb->get_results($sql);
}

function get_picture_name($picid) {
	global $bcdb;
	return $bcdb->get_var("SELECT name 
						FROM $bcdb->picture
						WHERE picid = '$picid'");
}

function get_valid_picname($upload_dir, $filename, $prefix = null) {
	$file = preg_replace('|/+|', '/', $upload_dir . '/' . $prefix . $filename);

	if ( !file_exists($file) ) {
		return $prefix . $filename;
	}
	else {
		return get_valid_picname($upload_dir, $filename, 1 + (int)$prefix);
	}
}

function upload_picture($name, $thumb = true, $upload_dir = PICS_DIR) {
	global $msg;
	
	if ( ! is_writable($upload_dir) )
	{
		$msg = sprintf(__('No se puede guardar el archivo en \'%s\' por falta de permisos'), $upload_dir);
		return false;
	}
	
	if (isset ($_FILES)) {		
		$msg = '<ul>';		
		$archivos = array();
		$imagemimetypes = array("image/jpeg", "image/pjpeg", "image/gif", "image/png");
		foreach ($_FILES as $file) {
			if ($file["error"] == UPLOAD_ERR_OK) {
				$type = $file['type'];
				if(in_array($type, $imagemimetypes)) {
					$tmp_name = $file["tmp_name"];
					$name = get_valid_picname($upload_dir, sanitize_title_with_dashes($name)) . 
						get_picture_extension($type);

					//$name = substr(md5(time().$name), 0, 10) . get_picture_extension($type);
					$normalname = 'normal_' . $name;
					if($thumb) create_thumb($tmp_name, $name, $type);
					if (move_uploaded_file($tmp_name, $upload_dir . $normalname)) {
						$archivos[] = $name;
						break;
					}
				} else  {
					$msg .= '<li>' . sprintf(__('Tipo de archivo no permitido: %s'), $file['name']) . '</li>';
					continue;					
				}
			}elseif (!empty($file['name'])) {
				$msg .= '<li>' . sprintf(__('Error al subir: %s'), $file['name']) . '</li>';
				continue;			
			}
		}
		$msg .= '</ul>';
		if ($msg != '<ul></ul>') // Fix me
			return false;
		else 
			$msg = null;
		return count($archivos) > 0 ? $archivos : false;
	}
	return false;
}

function create_thumb ($image, $name, $type, $upload_dir = PICS_DIR) {
	$namethumb = $upload_dir . "thumb_$name";
	$height = 125;
	switch($type) {
		case 'image/jpeg':
	    case 'image/pjpeg':
			$img = imagecreatefromjpeg($image);
			break;
		case 'image/gif':
			$img = imagecreatefromgif($image);
			break;
		case 'image/png':
			$img = imagecreatefrompng($image);
			break;
		default:
			die('No es una imagen!!');
	}
	$datos = getimagesize($image);
	$ratio = ($datos[1]/$height);
	$ancho = round($datos[0]/$ratio);
	$thumb = imagecreatetruecolor($ancho, $height);
	#imagecopyresized($thumb, $img, 0, 0, 0, 0, $ancho, $height, $datos[0], $datos[1]);
	imagecopyresampled($thumb, $img, 0, 0, 0, 0, $ancho, $height, $datos[0], $datos[1]);
	switch($type) {
		case 'image/jpeg':
	    case 'image/pjpeg':
			imagejpeg($thumb, $namethumb, 95);
			break;
		case 'image/gif':
			imagegif($thumb, $namethumb, 95);
			break;
		case 'image/png':
			imagepng($thumb, $namethumb, 95);
			break;
		default:
			die('No es una imagen!!');
	}	
}

function get_picture_extension ($mime) {
	switch($mime) {
	    case 'image/jpeg':
	    case 'image/pjpeg':
	      return '.jpg';break;
	    case 'image/gif':
	      return '.gif';break;
	    case 'image/png':
	      return '.png';break;
	     default:
	     	die('No es una imagen!!');
	  }
}
?>