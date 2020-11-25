var form_original_data;

$(document).ready(function(){

    	window_width = $(window).width();

    	form_original_data = $("#profile-form").length != 0 ? $("#profile-form").serialize() : "";
	$('#newTestimony').modal({
		backdrop:'static',
		keyboard:false
	});
});

function submitForm(btn){
	var formid = $(btn).attr('form-id');
	var message = $(btn).attr('form-action');
	vex.dialog.confirm({
	    message: 'Are you sure you want to '+message+'?',
	    callback: function (value) {
		if (value) {
			if($("#"+formid).length != 0 && ($("#"+formid).serialize() == form_original_data)){
				vex.dialog.alert('No changes made on the form, nothing to save');
				return;
			}
		    	$('#'+formid).submit();
		}
	    }
	});
}

function submitUserForm(btn){
	var id = $(btn).attr('id');
	$("#user-form input[name='user']").val(id);
	$("#user-form input[name='role']").val($('#role_'+id).val());
	$("#user-form input[name='balance']").val($('#balance_'+id).val());

	vex.dialog.confirm({
	    message: 'Are you sure you want to save user information?',
	    callback: function (value) {
		if (value) {
		    	$('#user-form').submit();
		}
	    }
	});
}

function showLessThan(btn){
	var min_w = $(btn).attr('data');
	vex.dialog.alert("Your cleared balance is not up to the minimum withdrawable balance of N"+ min_w);
	return;
}

function submitTestimonyForm(btn){
	var id = $(btn).attr('id');
	$("#testimony-form input[name='testimony']").val(id);
	$("#testimony-form input[name='enabled']").val($('#enabled_'+id).val());

	vex.dialog.confirm({
	    message: 'Are you sure you want to save testimony?',
	    callback: function (value) {
		if (value) {
		    	$('#testimony-form').submit();
		}
	    }
	});
}

function filterTable(){
	setParam('type', $('#_type').val());
}

function searchTable(){
	setParam('search', $('#search').val());
}

function setParam(name, value) {
    var l = window.location;

    /* build params */
    var params = {};
    var x = /(?:\??)([^=&?]+)=?([^&?]*)/g;
    var s = l.search;
    for(var r = x.exec(s); r; r = x.exec(s))
    {
        r[1] = decodeURIComponent(r[1]);
        if (!r[2]) r[2] = '%%';
        params[r[1]] = r[2];
    }

    /* set param */
    params[name] = encodeURIComponent(value);

    /* build search */
    var search = [];
    for(var i in params)
    {
        var p = encodeURIComponent(i);
        var v = params[i];
        if (v != '%%') p += '=' + v;
        search.push(p);
    }
    search = search.join('&');

    /* execute search */
    l.search = search;
}
