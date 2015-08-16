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
</body>

</html>
