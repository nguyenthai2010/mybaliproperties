$(document).ready(function(){
    var error_message = false;
	jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "");
	 jQuery("#contactform").validate({
        rules: {
            'cname': {
                required: true
            },
            'cemail':{
            	required: true,
            	email: true,
            },
            'ckaccept': {
                required: true
            }
        },
        errorPlacement: function(error, element){},
        highlight: function(element) {
            
            if($(element).is(':checkbox'))
            {
                var name = $(element).attr('name');
                $('input[name='+name+']').parent().addClass('error');
                error_message = true;
            }
            else
            {
            	$(element).addClass('error');
                error_message = true;
            }
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass); // remove error class from elements/add valid class
            var name = $(element).attr('name');
            $('input[name='+name+']').parent().removeClass('error');
            error_message = false;
        },
        submitHandler: function(form) {
            var boxes = $('#acceptCK:checkbox');
            if(boxes.length > 0) {
                if( $('#acceptCK:checkbox:checked').length < 1) {
                    alert('Please select at least one checkbox');
                    boxes[0].focus();
                    return false;
                }
            }
            $('.ajax-loader').show();
            //form.submit();
        },
	});
    $('.iCheck input').on('ifChecked', function(event){
      $(this).parent().removeClass('error');
    });
    $('.iCheck input').on('ifUnchecked', function(event){
      error_message = true;
    });
    $("#contactform").on('submit',(function(e){
        $form = $(this);
        if(!$('.icheckbox').hasClass('error')){
            $.ajax({
                type : "post",
                url : $('.ajaxurl').val(),
                //data : {action: "user_contact_form", u_name : $u_name, u_firstname : $u_firstname, u_email : $u_email, u_phone : $u_phone, u_gender : $u_gender, u_birthday : $u_birthday, u_postalcode : $u_postalcode, u_country : $u_country, p_files : $p_files},
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(response) {
                    console.log(response);
                    if(response == 1){
                        $('.alert-success').show();
                        $('.ajax-loader').hide();
                        $("#contactform")[0].reset();
                        $('.icheckbox').removeClass('checked');
                        setTimeout(function(){
                            $('.alert-success').hide();
                        },2000);
                    }else{
                        
                    }
                    
                }            
            });
        }
    }));
    
});