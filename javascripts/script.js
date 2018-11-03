$(function() {

    $("#select_id").change(function() {
    	$('.content_row').remove();
        if($("#select_id").val() != 'Select Categories') {
            $.get("select.php", {select_id: $("#select_id").val()} )
                .done(function( data ) {
                $("tr.select_row").after(data);
            });
        }
    });

});