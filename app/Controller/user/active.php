<?php
Load( ["Alert" ] );

$Alert = new Alert();

$currentUser = wp_get_current_user();

$addUserMeta = add_user_meta( $currentUser->ID, "mp_user_can", [ "user_level" => 80 ], true );

if ( $addUserMeta ):
    $errParam = [
        "type" => "success",
        "head" => "Sucesso!",
        "body" => "Seu perfil foi alterado com sucesso. Você já pode criar seus próprios cursos"
    ];
    $Alert->PHPErro( $errParam );
else:
    $errParam = [
        "type" => "danger",
        "head" => "Erro - #u185",
        "body" => "Não foi possível ativar o perfíl de cursista. Tente novamente mais tarde"
    ];
    $Alert->PHPErro( $errParam );
endif;
    