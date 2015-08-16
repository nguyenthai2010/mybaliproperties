$(document).ready(function(){
    var error_message = false;
    var running = false;

	 jQuery("#contactform").validate({
        rules: {
            'cname': {
                required: true
            },
            'cemail':{
            	required: true,
            	email: true
            }
        },
        submitHandler: function(form) {
            if(running) return false;

            running = true;
            $('.ajax-loader').show();

            $form = $(form);
            $.ajax({
                type : "post",
                url : $('.ajaxurl').val(),
                //data : {action: "user_contact_form", u_name : $u_name, u_firstname : $u_firstname, u_email : $u_email, u_phone : $u_phone, u_gender : $u_gender, u_birthday : $u_birthday, u_postalcode : $u_postalcode, u_country : $u_country, p_files : $p_files},
                data: new FormData(form),
                contentType: false,
                cache: false,
                processData:false,
                success: function(response) {
                    running = false;

                    var msg = 'Message sent successful!';
                    console.log(response);
                    if(response == 1){

                    }else{
                        msg = 'Error!';
                    }

                    $('.alert-success').html(msg);

                    $('.alert-success').show();
                    $('.ajax-loader').hide();
                    $("#contactform")[0].reset();
                    $('.icheckbox').removeClass('checked');
                    setTimeout(function(){
                        $('.alert-success').hide();
                    },2000);
                }
            });

            return false;
        }

     });

    
});