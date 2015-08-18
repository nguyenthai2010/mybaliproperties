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
            $("#subForm")[0].reset();
            form.submit();
        }

     });

    
});