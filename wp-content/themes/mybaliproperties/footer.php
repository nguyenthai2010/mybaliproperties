<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>
                <a class="phone" href="tel:+62361761883">+62 361 761 883</a> | <a href="mailto:info@mybaliproperties.com">info@mybaliproperties.com</a><br>
                Copyright &copy; 2015 All rights reserved
            </p>
        </div>
    </div>
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>
<script src="js/icheck.js"></script>
<script src="js/class.single.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/validate.contact.js"></script>
<script src="js/validate.newsletter.js"></script>
<script src="js/jquery.fancybox.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
    $(document).ready(function(){
        clsProperties.init();
        $('.acf-map').each(function(){
            clsProperties.render_map( $(this) );
        });

    });
</script>
<?php wp_footer(); ?>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1482140678768202',
            xfbml      : true,
            version    : 'v2.4'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-54298693-4', 'auto');
    ga('send', 'pageview');

</script>
</body>

</html>
