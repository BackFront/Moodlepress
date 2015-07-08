<?php
Load( ["TemplateView" ] );
/* * ********************************
 * siteSettings
 * ******************************** */
//Options Values
define( 'siteSetting_schemeColor', (get_option( 'siteSetting_schemeColor' ))? : 'skin-blue'  );
define( 'siteSetting_title', get_option( 'siteSetting_title' ) );
define( 'siteSetting_subtitle', get_option( 'siteSetting_subtitle' ) );
define( 'siteSetting_footerLeft', get_option( 'siteSetting_footerLeft' ) );
define( 'siteSetting_footerRight', get_option( 'siteSetting_footerRight' ) );

//HTML
function wps_theme_func()
{
    //ATUALIZA OS VALORES
    if ( isset( $_POST ) ) {
        (isset( $_POST[ 'siteSetting_schemeColor' ] )) ? update_option( 'siteSetting_schemeColor', $_POST[ 'siteSetting_schemeColor' ] ) : null;
        (isset( $_POST[ 'siteSetting_title' ] )) ? update_option( 'siteSetting_title', $_POST[ 'siteSetting_title' ] ) : null;
        (isset( $_POST[ 'siteSetting_subtitle' ] )) ? update_option( 'siteSetting_subtitle', $_POST[ 'siteSetting_subtitle' ] ) : null;
        (isset( $_POST[ 'siteSetting_footerLeft' ] )) ? update_option( 'siteSetting_footerLeft', $_POST[ 'siteSetting_footerLeft' ] ) : null;
        (isset( $_POST[ 'siteSetting_footerRight' ] )) ? update_option( 'siteSetting_footerRight', $_POST[ 'siteSetting_footerRight' ] ) : null;
    }

    $siteSetting_schemeColor = get_option( 'siteSetting_schemeColor' );
    $siteSetting_title = get_option( 'siteSetting_title' );
    $siteSetting_subtitle = get_option( 'siteSetting_subtitle' );
    $siteSetting_footerLeft = get_option( 'siteSetting_footerLeft' );
    $siteSetting_footerRight = get_option( 'siteSetting_footerRight' );

    $Template = get_template_directory() . "/app/View/admin/siteSettings";
    $siteSettings = new TemplateView();
    $siteSettings->Load( $Template );

    $values = [
        "siteSetting_schemeColor" => $siteSetting_schemeColor,
        "siteSetting_title" => $siteSetting_title,
        "siteSetting_subtitle" => $siteSetting_subtitle,
        "siteSetting_footerLeft" => $siteSetting_footerLeft,
        "siteSetting_footerRight" => $siteSetting_footerRight
    ];

    $siteSettings->Show( $values );
}


function site_settings()
{
    #Ex:/ add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page( 'Configurações do Site', 'Definições', 'manage_options', 'site_settigs', 'wps_theme_func', $iconeMenu = null, 100 );
}


add_action( 'admin_menu', 'site_settings' );
