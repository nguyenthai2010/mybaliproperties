
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
        		<?php echo do_shortcode( '[contact-form-7 id="24" title="Contact form 1"]' ); ?>
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