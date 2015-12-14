<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- Header Carousel -->
        <?php
        $property_ID = get_the_ID();
        $views_array = get_field('views', get_the_ID());
        $location_text = get_field('location_text', get_the_ID());
        $location_google_map = get_field('location_google_map', get_the_ID());
        $location_image_map = get_field('location_image_map', get_the_ID());
        $prices = get_field('prices', get_the_ID());
        $location_google_map = get_field('location_google_map', get_the_ID());
        ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php
get_header();
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
            //$thumbnail = $objpicture['sizes']['large'];
            $thumbnail = $objpicture['url'];
            $thumbnail = get_template_directory_uri() . '/timthumb.php?src=' . urlencode($thumbnail) . '&h=620&w=1204&zc=1'; //&h=150&w=150&zc=1

            //print_r($objpicture);
            ?>
            <div class="item<?=$i==1?' active':''?>">
                <div class="fill">
                    <img src="<?=$thumbnail ?>"/>
                </div>
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
                <h1><?=get_the_title()?></h1>
                    <p class="location">
                        LOCATION: <?=$location_text?>
                    </p>
                    <p class="price">
                        <?=$prices?>
                    </p>
            </div>

            <hr>
            <div class="info-detail">
                <?php the_content(); ?>
            </div>

            <div class="info-views">
                <div class="col-lg-12">
                    <h2 >Views</h2>
                </div>
                <?php
                $i = 0;
                foreach($views_array as $view)
                {
                    $i++;
                    $objpicture = $view['picture'];
                    $thumbnail = $objpicture['sizes']['medium'];
                    $large = $objpicture['url'];
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <a href="<?=$large?>" rel="fancybox-thumb" class="fancybox"><img src="<?=$thumbnail?>"></a>
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>


            </div>

            <div class="info-location">
                <h2>Location</h2>
                <p>
                    <?php
                    if( !empty($location_google_map) ):
                    ?>
                <div class="acf-map">
                    <div class="marker" data-lat="<?php echo $location_google_map['lat']; ?>" data-lng="<?php echo $location_google_map['lng']; ?>"></div>
                </div>
                <?php endif; ?>
                </p>

                <p>
                    <?php
                    if( !empty($location_image_map) ):
                        $thumb = $location_image_map['sizes']['large'];
                    ?>
                        <img class="img-responsive img-hover" src="<?=$thumb?>" alt="">
            <?php endif; ?>

                </p>
            </div>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php get_sidebar();?>

    </div>
    <!-- /.row -->

    <style type="text/css">

        .acf-map {
            width: 100%;
            height: 400px;
            border: #ccc solid 1px;
            margin: 20px 0;
        }

    </style>


<?php
    get_footer();
?>