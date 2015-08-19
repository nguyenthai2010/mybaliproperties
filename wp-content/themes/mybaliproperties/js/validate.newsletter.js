$(document).ready(function(){

	 jQuery("#subForm").validate({
        rules: {

            'cm-tidix-tidix':{
            	required: true,
            	email: true
            }
        },
        errorPlacement: function(error, element){},
        submitHandler: function(form) {
            form.submit();
        }

     });


});