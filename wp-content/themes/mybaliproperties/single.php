<?php
get_header();
?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
<!-- Header Carousel -->
        <?php
        $specifications = get_field('specifications', get_the_ID());
        $views_array = get_field('views', get_the_ID());
        $location_text = get_field('location_text', get_the_ID());
        $location_google_map = get_field('location_google_map', get_the_ID());
        $location_image_map = get_field('location_image_map', get_the_ID());
        $prices = get_field('prices', get_the_ID());
        $location_google_map = get_field('location_google_map', get_the_ID());


        ?>

<header id="myCarousel" class="carousel slide container">

    <!-- Wrapper for slides -->

    <div class="carousel-inner">
        <?php
        $i = 0;
        foreach($views_array as $view)
        {
            $i++;
            $objpicture = $view['picture'];
            $thumbnail = $objpicture['sizes']['large'];
            //print_r($objpicture);
            ?>
            <div class="item<?=$i==1?' active':''?>">
                <div class="fill" style="background-image:url('<?=$thumbnail ?>');"></div>
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
                        <?=$prices?>
                    </p>
            </div>

            <hr>
            <div class="info-detail"></div>

            <div class="info-views">
                <div class="col-lg-12">
                    <h2 >Views</h2>
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
        <div class="col-md-4">
            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->
    <?php endwhile; ?>
<?php endif; ?>

<?php
    get_footer();
?>