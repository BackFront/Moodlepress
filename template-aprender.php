<?php
/**
 * Template Name: Aprender
 */
get_header( "site" );
?>
<div class="agroup-bg">
    <div class="grid">

        <h1><b>Open</b> Code</h1>
        <h3>"A sabedoria está em aprender."</h3>
        <p style="margin-top:70px;">
            <a class="btn btn-primary btn-lg" href="#" role="button">Aprender</a>
            -ou -
            <a class="btn btn-primary btn-lg" href="#" role="button">Ensinar</a>
        </p>

    </div>
    <div id="video_container" style="overflow:hidden; background-size:cover;">
        <video autoplay loop id="bgvid">
            <source src="<?php echo bloginfo( 'template_url' ) ?>/assets/video/bg.webm" type="video/webm">
            <source src="<?php echo bloginfo( 'template_url' ) ?>/assets/video/bg.mp4" type="video/mp4">
        </video>
    </div>
</div>



<div class="container">
    <br />
    <br />
    <br />
    <div class="col-lg-6">
        <div class="center-block" style="background-color: #777;border-radius: 50%;width:140px;height:140px;padding-top: 15px">
            <img class="center-block" src="<?php echo get_template_directory_uri() ?>/assets/imagens/aprender_white.png" alt="Generic placeholder image" height="100" width="100">
        </div>
        <h2 class="text-center">Aprender</h2>
        <p class="text-center">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        <p class="text-center"><a class="btn btn-default" href="#" role="button">View details »</a></p>
    </div>
    <div class="col-lg-6">
        <div class="center-block" style="background-color: #777;border-radius: 50%;width:140px;height:140px;padding-top: 15px">
            <img class="center-block" src="<?php echo get_template_directory_uri() ?>/assets/imagens/ensinar_white.png" alt="Generic placeholder image" height="100" width="100">
        </div>
        <h2 class="text-center">Ensinar</h2>
        <p class="text-center">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        <p class="text-center"><a class="btn btn-default" href="#" role="button">View details »</a></p>
    </div>

    <?php
    get_footer( "cursos" );
    