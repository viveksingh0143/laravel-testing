$( document ).ready(function() {
	/* Add event listener for opening and closing details */
    $('table.dataTable tbody').on('click', 'td.view-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        if ( row.child.isShown() ) {
            row.child.hide();
            $(this).find('i').switchClass('fa-minus-circle', 'fa-plus-circle');
            tr.removeClass('shown');
        }
        else {
        	row.child( format(row.data()) ).show();
            $(this).find('i').switchClass('fa-plus-circle', 'fa-minus-circle');
            tr.addClass('shown');
            /*row.addClass( "table-tr-detail" );*/
        }
    });
    $('table.dataTable tbody').on('click', 'td.trash-control', function () {
    	if (confirm("Are you sure to delete?")) {
	    	var tr = $(this).closest('tr');
	        var row = table.row( tr );
	        var data = row.data();
	        $.ajax({
	            url: basePath + "/delete",
	            type: "get",
	            data: {'id':data.id},
	            beforeSend: function(xhr) {
	                xhr.setRequestHeader("Accept", "application/json");
	                xhr.setRequestHeader("Content-Type", "application/json");
	            },
	            success: function(smartphone) {
	            	row.remove().draw();
	            }
	        });
    	}
    });
    /*ajax-form-submit*/
	$('form.ajax-form-submit').submit(function(event) {
		event.preventDefault();
		var $form = $(this),
		url = $form.attr( "action" );
		$.ajax({
		    url: url,
		    data: getFormJsonData($form),
		    type: "POST",
		    dataType: 'json',
            contentType: "application/json; charset=utf-8",
		    beforeSend: function(xhr) {
		        xhr.setRequestHeader("Accept", "application/json");
		        xhr.setRequestHeader("Content-Type", "application/json");
		    },
		    success: function(data) {
		    	$(".errors").empty();
		    	$form.trigger("reset");
		    	resetDataTable();
		    	$('#form-model').modal('toggle');
		    },
		    error: function (request, status, error) {
		    	var error = JSON.parse(request.responseText);
		    	$(".errors").empty().append(error.message);
		    }
		});
	});
});
function getFormJsonData($form) {
	var jsonData = {};
	var formData = $form.serializeArray();
	$.each(formData, function() {
		if (jsonData[this.name]) {
			if (!jsonData[this.name].push) {
				jsonData[this.name] = [jsonData[this.name]];
			}
			jsonData[this.name].push(this.value || '');
		} else {
			jsonData[this.name] = this.value || '';
		}
	});
	return JSON.stringify(jsonData);
}
function resetDataTable() {
	table.destroy();
	table = setDataTable();
}
function populate(frm, data) {
    $.each(data, function(key, value){
	    var $ctrl = $('[name='+key+']', frm);
	    if($ctrl.attr("type") != undefined) {
		    switch($ctrl.attr("type"))  
		    {  
		        case "text" :
		        case "hidden":  
		        $ctrl.val(value);   
		        break;   
		        case "radio" : case "checkbox":
		        $ctrl.each(function(){
		        	if($.isArray(value)) {
		        		var $this = $(this);
		        		$.each(value, function(key, value) {
		        			if($this.attr('value') == value) {  $this.attr("checked",value);}
		        		});
		        	}
		        	else {
		        		if($(this).attr('value') == value) {  $(this).attr("checked",value); }
		        	}
		        });   
		        break;  
		        default:
		        $ctrl.val(value); 
		    }
	    }
	    else {
	    	$ctrl.val(value);
	    }
    });  
}
function formReset($form) {
	$form.trigger("reset");
	/*$form.find(":input").not(":button, :submit, :reset, :hidden").removeAttr("checked");*/
	$form.find("[name='id']").remove();
}
