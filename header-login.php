<!DOCTYPE html>
<?php
$user = wp_get_current_user();
$userName = $user->display_name;
?>
<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ) ?>">


        <title><?php wp_title( '|', true, 'right' ) ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/skins/skin-black.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/skins/skin-green.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/skins/skin-yellow.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/style.css" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="background: #eee;">