<?php
Load( [ "Context", "TemplateView" ] );
$Skin = new Context();
$user = wp_get_current_user();
$args = [
    'meta_key' => 'opcoesMensagem_from',
    'meta_value' => array( 'Todos', $user->ID ),
    'post_type' => 'message',
    'posts_per_page' => 5
];

$Template = get_template_directory() . "/app/View/message/ItemListNavMsg";
$ItemListNavMsg = new TemplateView();
$ItemListNavMsg->Load( $Template );

$loop = new WP_Query( $args );
while ( $loop->have_posts() ) :
    $loop->the_post();
    $Datas = [
        "link" => get_post( get_the_ID(), ARRAY_A )[ 'post_name' ],
        "name_from" => get_the_author(),
        "title" => get_the_title(),
        "cover" => get_avatar( get_the_author_meta( 'ID' ), 160 ),
        "date_send" => get_the_time( 'd/M/Y - H:m' )
    ];
    $ItemListNavMsg->Show( $Datas );
endwhile;
