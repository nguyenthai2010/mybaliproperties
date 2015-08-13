<?php
get_header();
?>
    <!-- Header Carousel -->

    <header id="myCarousel" class="carousel slide container">

        <!-- Wrapper for slides -->

        <div class="carousel-inner">
            <?php
            $i = 0;
            $args_slider = array(
                'post_type' 	 => 'sliders',
                'order'			 => 'asc'
            );
            $querySlider = get_posts($args_slider);


            foreach ($querySlider as $slider) {
                $i++;
                $url = wp_get_attachment_image_src(get_post_thumbnail_id($slider->ID), 'large');
                ?>
                <div class="item<?=$i==1?' active':''?>">
                    <div class="fill" style="background-image:url('<?= $url[0] ?>');"></div>
                    <div class="carousel-caption">
                        <h2></h2>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <div >
                <h1>Villa Kemuning</h2>
                    <p class="location">
                        LOCATION: JALAN DOUBLE SIX, LEGAIN BEACH, BALI.
                    </p>
                    <p class="price">
                        now selling at US $440,000.
                    </p>
            </div>

            <hr>
            <div class="info-detail"></div>

            <div class="info-views">
                <div class="col-lg-12">
                    <h2 class="panel-body">Services Panels</h2>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/pic/p1.png">
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/pic/p1.png">
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/pic/p1.png">
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/pic/p1.png">
                        </div>
                    </div>
                </div>

            </div>

            <div class="info-location">
                <h2>Location</h2>
                <p>
                    <img class="img-responsive img-hover" src="images/pic/p5.png" alt="">
                </p>

                <p>
                    <img class="img-responsive img-hover" src="images/pic/p6.png" alt="">
                </p>
            </div>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php get_sidebar();?>
    </div>
    <!-- /.row -->


<?php
    get_footer();
?>