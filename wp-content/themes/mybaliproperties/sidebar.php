
<?php
$specifications = get_field('specifications', get_the_ID());
$download_files = get_field('download_files', get_the_ID());
$contact_phone = get_field('contact_phone', get_the_ID());
$contact_mail = get_field('contact_mail', get_the_ID());
?>
<div class="col-md-4 sidebar">
    <!-- Side Widget Well -->
    <div class="well villaWell margin-bot-0">
        <?=$specifications?>
        <div class="btn-sidebar">
            <?php
            $i = 0;
            foreach($download_files as $download)
            {
                $i++;
                $download_name = $download['download_name'];
                $download_file = $download['download_file'];
                //print_r($objpicture);
                ?>
                <a href="<?=$download_file?>" target="_blank" class="btn btn-success" role="button"><?=$download_name?></a>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="well formWell margin-bot-0">    
        <div class="contactForm">
            <h3>Are you interested in this property?</h3>
            <p class="contactLink">
                <a href="tel:<?=$contact_phone?>" class="btn btn-phone btn-success" role="button"><span><?=$contact_phone?></span></a>
                <a href="mailto:<?=$contact_mail?>" class="btn btn-email btn-success" role="button"><span><?=$contact_mail?></span></a>
            </p>
            <h3>or send us your enquiery</h3>
            <div class="enquieryForm">
                <form id="contactform" name="" action="" method="post" class="wpcf7-form">
                    <p>
                        <span class="wpcf7-form-control-wrap your-name">
                            <input type="text" name="cname" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name*">
                        </span> 
                    </p>
                    <p>
                        <span class="wpcf7-form-control-wrap your-email">
                            <input type="email" name="cemail" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email*">
                        </span> 
                    </p>
                    <p>
                        <span class="wpcf7-form-control-wrap your-phone">
                            <input type="text" name="cphone" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Phone">
                        </span> 
                    </p>
                    <p>
                        <span class="wpcf7-form-control-wrap your-message">
                            <textarea name="cmessage" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Your question"></textarea>
                        </span> 
                    </p>
                    <div class="acceptCk iCheck">
                        <input id="acceptCK" type="checkbox" name="ckaccept" value="1" class="wpcf7-form-control wpcf7-acceptance iCheck" id="ckAccept">
                        <label for="acceptCK"><span></span>I want to receive news from MyBaliProperties</label>
                    </div>
                    <p>
                        <input type="submit" value="SEND US YOUR QUESTIONS" class="wpcf7-form-control wpcf7-submit">
                        <img class="ajax-loader" src="<?php echo content_url();?>/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="dislay: none;">
                    </p>
                    <div class="alert alert-success" style="display: none;" role="alert">Message sent successful!</div>
                    <input name="action" type="hidden" class="action" value="contact_request"/>
                    <input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
                </form>
            </div>
        </div>
    </div>
    <div class="well subscribeWell">
        <div class="subscribeForm">
            <h3>Leave your details and receive news
and investment opportunities</h3>
            <form action="http://kiokarma.createsend.com/t/i/s/tidix/" method="post" id="subForm">
                <p>
                    <input id="fieldName" name="cm-name" type="text" placeholder="First Name" />
                </p>
                <p>
                    <input id="fieldjdiddd" name="cm-f-jdiddd" type="text" placeholder="Surname"/>
                </p>
                <p>
                    <input id="fieldEmail" name="cm-tidix-tidix" type="email" required placeholder="Email"/>
                </p>
                <p>
                    <button type="submit" class="btn btn-success">SUBSCRIBE TO OUR NEWSLETTER</button>
                </p>
            </form>
        </div>
    </div>
</div>