$(document).ready(function(){
        show();
	$(document).on('submit', '#saveForm', function(event){
		event.preventDefault();
		$form = $(this);
		var data = $form.serializeArray();
        data.reverse();
		var check_empty = 0;
        $.each(data, function(key, feilds){
        	if ($.trim(feilds.value) =='') {
        		$('#input-'+feilds.name).removeClass('green_color');
        		$('#label-'+feilds.name).removeClass('green_label');
                $('#input-'+feilds.name).addClass('red_color');
                $('#label-'+feilds.name).addClass('red_label');
        		$('#input-'+feilds.name).focus();
        		check_empty++;
        	}
        });

        if (check_empty>0) {
        	console.log('validation failed');
        }
        else{
        	$.ajax({
        		url: $form.attr('action'),
        		method: $form.attr('method'),
        		data: $form.serialize(),
        		success: function(response){
        			console.log(response);
                                $("#saveForm")[0].reset();
                                show();
        		}
        	});
        }
	});



        $(document).on('submit', '#updateForm', function(event){
                event.preventDefault();
                $form = $(this);
                var data = $form.serializeArray();
                data.reverse();
                var check_empty = 0;
        $.each(data, function(key, feilds){
                if ($.trim(feilds.value) =='') {
                        $('#input-'+feilds.name).removeClass('green_color');
                        $('#label-'+feilds.name).removeClass('green_label');
                        $('#input-'+feilds.name).addClass('red_color');
                        $('#label-'+feilds.name).addClass('red_label');
                        $('#input-'+feilds.name).focus();
                        check_empty++;
                }
        });

        if (check_empty>0) {
                console.log('validation failed');
        }
        else{
                $.ajax({
                        url: $form.attr('action'),
                        method: $form.attr('method'),
                        data: $form.serialize(),
                        success: function(response){
                                console.log(response);
                                // $("#saveForm")[0].reset();
                                show();
                        }
                });
        }
        });
});

// Show All Records
function show(){
        $.ajax({
                url: 'Controller.php',
                method: 'post',
                dataType: 'json',
                data: {showAlldata:1},
                success:function(response){
                        $('#dataTable').html(response);
                }

        });
}




// Edit show records
$(document).ready(function(){
        $('#cancel').hide();
        $(document).on('click', '#edit', function(event){
                event.preventDefault();
                $anchor = $(event.target);
                var id = $anchor.attr('data-id');
                $.ajax({
                        url: 'Controller.php',
                        method: 'post',
                        dataType: 'json',
                        data:{editData:1, user_id:id},
                        success:function(response){
                                $.each(response, function(key,value){
                                        $('#input-'+key).val(value);
                                });
                                $("form#saveForm").prop('id','updateForm');
                                $("input#create").prop('name','update');
                                $("input#create").prop('id','update');
                                $('.btn-name').val('Update');
                                $('.heading').html('Update Form');
                                $('#cancel').show();
                        }
                });
        });

        $(document).on('click', '#cancel', function(event){
                event.preventDefault();
                                $("form#updateForm").prop('id','saveForm');
                                $("#saveForm")[0].reset();
                                $("input#update").prop('name','update');
                                $("input#update").prop('id','update');
                                $('.btn-name').val('Create');
                                $('.heading').html('Create Form');
                                $('#cancel').hide();
        });
});



$(document).ready(function(){
         $(document).on('click', '#delete', function(event){
                event.preventDefault();
                $anchor = $(event.target);
                var id = $anchor.attr('data-id');
                $.ajax({
                        url: 'Controller.php',
                        method: 'post',
                        dataType: 'json',
                        data:{deleteData:1, user_id:id},
                        success:function(response){
                        show();
                               console.log(response)
                        }
                });
        });
});



$(document).ready(function(){
    $(document).on('keydown', 'input:text', function(){
        $form = $(this);
         var data = $form.serializeArray();
                 $.each(data, function(key, feilds){
                        $('#label-'+feilds.name).removeClass('red_label');
                        $('#input-'+feilds.name).addClass('green_color');
                        $('#label-'+feilds.name).addClass('green_label');
        });
    });
});