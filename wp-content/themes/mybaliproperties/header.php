<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/logo.ico">

    <base href="<?php echo get_bloginfo('template_url')?>/"></base>

    <title>My Bali Properties <?php wp_title(); ?></title>
    <meta name="description" content="<?php if ( is_single() ) {
        $post_id = get_queried_object_id();
        $post_obj = get_post( $post_id );
        $content = $post_obj->post_content;

        echo strip_tags($content);

    } else {
        bloginfo('description');
    }
    ?>" />

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>

<body>
<?php
$contact_phone = get_field('contact_phone', get_the_ID());
$contact_mail = get_field('contact_mail', get_the_ID());
$facebook_url = get_field('facebook_url', 'option');
$twitter_url = get_field('twitter_url', 'option');
?>
<!-- Header Top -->
<div class="container">
    <div class="row headertop">
        <div class="col-md-4 col-sm-12">
            <a class="logo"><img src="images/logo.png" width="170" height="118"></a>
        </div>
        <div class="col-md-8 col-sm-12 sharing">
            <ul>

                <li class="icon-bg">
                    <div><a href="<?=$facebook_url?>" target="_blank"><i class="fa fa-facebook"></i></a></div>
                    <div><a href="<?=$twitter_url?>" target="_blank"><i class="fa fa-twitter"></i></a></div>
                </li>
                <li>
                    <div><img src="images/icon-envelop.png"> <?=$contact_mail?></div>
                    <div><i class="fa fa-phone"></i> <?=$contact_phone?></div>
                </li>

            </ul>
        </div>
    </div>
</div>

