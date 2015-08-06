<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="<?php echo get_bloginfo('template_url')?>/"></base>

    <title>Mybaliproperties.com</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>

<body>
<!-- Header Top -->
<div class="container">
    <div class="row headertop">
        <div class="col-md-4 col-sm-4">
            <a href="#" class="logo"><img src="images/logo.png" width="179" height="119"></a>
        </div>
        <div class="col-md-8 col-sm-8 sharing">
            <ul>

                <li class="icon-bg"><i class="fa fa-facebook"></i></li>
                <li class="icon-bg"><i class="fa fa-twitter"></i></li>
                <li><i class="fa fa-envelope-o"></i> info@mybaliproperties.com</li>
                <li><i class="fa fa-phone"></i> +62 361 761 883</li>




            </ul>
        </div>
    </div>
</div>

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