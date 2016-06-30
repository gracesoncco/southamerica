/*function delete_single_by_lang(id) {
	frmcito = document.getElementById('frm');
	if (!confirm_msg()) return false;
	frmcito.action.value = 'remove_locale';
	frmcito.id.value = id;
	frmcito.submit();
	return true;
}

function delete_element() {
	frmcito = document.getElementById('frm');
	if (!confirm_msg()) return false;
	frmcito.action.value = 'remove';
	frmcito.submit();
	return true;
}

function delete_single(id) {
	frmcito = document.getElementById('frm');
	if (!confirm_msg()) return false;
	frmcito.action.value = 'remove';
	frmcito.id.value = id;
	frmcito.submit();
	return true;
}*/
/*function addEvent( obj, type, fn )
{
	if (obj.addEventListener)
		obj.addEventListener( type, fn, false );
	else if (obj.attachEvent)
	{
		obj["e"+type+fn] = fn;
		obj[type+fn] = function() { obj["e"+type+fn]( window.event ); }
		obj.attachEvent( "on"+type, obj[type+fn] );
	}
}

function addLoadEvent(func) {
	if ( typeof wpOnload != 'function' ) {
		wpOnload = func;
	} else {
		var oldonload = wpOnload;
		wpOnload = function() {
  			oldonload();
  			func();
		}
	}
}*/
//function addEvent(_c,_d,fn){if(_c.addEventListener){_c.addEventListener(_d,fn,false);}else{if(_c.attachEvent){_c["e"+_d+fn]=fn;_c[_d+fn]=function(){_c["e"+_d+fn](window.event);};_c.attachEvent("on"+_d,_c[_d+fn]);}}};function addLoadEvent(_f){var _10=window.onload;if(typeof window.onload!="function"){window.onload=_f;}else{window.onload=function(){if(_10){_10();}_f();};}}

function instanceOf(object, constructorFunction) {
	if (!constructorFunction || object == null) 
		return false;
		
  	while (object != null) {
    	if (object == constructorFunction.prototype)
     		return true;
    	object = object.__proto__;
  	}
  	return false;
}
function submit_form(formid) {
	try {
		var form = $(formid || 'frm');
		
		form.submit();
	} catch (e) { alert(e) }
}
function save_item(formid) {
	var result = true;
	try {
		if (instanceOf(window["v"], validator)) {
			result = window["v"].exec();
		}
		
		if (result)
			submit_form(formid);
		
	} catch (e) { alert(e) }
	return true;
}

function delete_item(formid) {
	if (confirm_msg()) {
		input = document.createElement('INPUT');
		input.type = 'hidden';
		input.name = 'remove';
		
		$(formid || 'frm').appendChild(input);
		submit_form(formid);
	}
}

function confirm_msg(msg) {
	if (!msg) msg = 'Está seguro de eliminar este elemento?';
	return confirm(msg);
}

function map(m) {
	window.open('view-map.php?pic=' + m , 'map', 'width=200, height=200, top=10, left=10, scrollbars=no');
	return false;
}