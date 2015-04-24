<?php
$getexe = filter_input( INPUT_GET, 'exe', FILTER_DEFAULT );
$getexe = str_replace( '\\', DIRECTORY_SEPARATOR, $getexe );
$_ = DIRECTORY_SEPARATOR;
//QUERY STRING
if ( !empty( $getexe ) ):
    $includepatch = get_template_directory() . "${_}app${_}Controller${_}" . strip_tags( trim( $getexe ) . '.php' );
else:
    $includepatch = get_template_directory() . "${_}app${_}Controller${_}dashboard.php";
endif;

if ( file_exists( $includepatch ) ):
    require_once($includepatch);
else:
    echo "<b>Erro ao incluir controller:</b> #{$getexe} | {$includepatch}";
    echo "<hr />";
endif;