<?php
/**
 * Template Name: Painel
 */
if ( !isset( $_SESSION ) ) :
    session_start();
    ob_start();
endif;

get_header();



#var_dump($user);
//LOGOUT
if ( isset($_GET[ 'action' ]) && $_GET[ 'action' ] == 'logout' ) :
    wp_logout();
    $Skin = new Context();
    $Skin->destroyContextSession();
    wp_redirect( 'login' );
    die;
endif;


if ( !is_user_logged_in() ) :
    wp_redirect( 'login' );
    die;
endif;

inc("app/Inc/FrontController.inc.php");

get_footer();
