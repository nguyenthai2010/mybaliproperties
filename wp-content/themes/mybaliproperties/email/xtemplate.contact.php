<?php
    //session_start();
    //echo session_id();
    add_action("wp_ajax_contact_request", "contact_form");
    add_action("wp_ajax_nopriv_contact_request", "contact_form");
    function 	contact_form(){
        $name = $_REQUEST['cname'];
        $surname = $_REQUEST['csurname'];

        $email = $_REQUEST['cemail'];
        $phone = $_REQUEST['cphone'];
        $message = $_REQUEST['cmessage'];
        $ckaccept = $_REQUEST['ckaccept'];
        $valueaccept = $ckaccept == 1 ? 'Yes':'No';


        include_once	'xtemplate.class.php';
        $header   	= 'Content-type: text/html; charset=utf-8\r\n';				
        $title 		= 'User Contact';
        $contact_email = get_option('admin_email');
        $contact_name = get_bloginfo('name');
		//echo $contact_email;
        $date = date('d-m-Y');
        $parseTemplate	=	new XTemplate('xtemplate.contact.html');
        $parseTemplate->assign('name',$name);
        $parseTemplate->assign('surname',$surname);
        $parseTemplate->assign('date',$date);             
        $parseTemplate->assign('email',$email);	
        $parseTemplate->assign('phone',$phone); 
		$parseTemplate->assign('message',$message);
        $parseTemplate->assign('valueaccept',$valueaccept);
		
        $parseTemplate->parse('main');	

        global $wpdb;   
        if(!empty($email)){
            $results = $wpdb->insert('wp_user_request',
                array(
                  'c_username'          => $name,
                    'c_lastname'          => $surname,
                  'c_email'        => $email,
                  'c_phone'       => $phone,
                  'c_receive'       => $ckaccept,
                  'c_message'          => $message
                ),
                array(
                  '%s',
                    '%s',
                  '%s',
                  '%s',
                  '%s',
                  '%s'
                ) 
            );
            if($results){
                wp_mail($contact_email, $title, $parseTemplate->text('main'), $title);
                echo "1";
                die();
            }else{
                echo "0";
                die();
            }
        }else{
            echo "-1";
        }
    }
