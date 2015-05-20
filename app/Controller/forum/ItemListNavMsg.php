<?php
/*
 * Controller: forum#ItemListNavMsg
 * interacts: forum#ItemListNavMsg
 * @note Este Controller é responsável por listar os ultimos topicos
 * criados, no menu superior (onde fica o icone dos baloezinhos)
 * 
 */
$user = wp_get_current_user();
Load( [ "Context", "TemplateView", "Forum" ] );
$Skin = new Context();
$ItemListNavMsg = new TemplateView();
$Forum = new Forum( $user->ID );

$user = wp_get_current_user();
$args = [
//    'meta_key' => 'opcoesForum_view',
//    'meta_value' => array( 'Todos', $Skin->getContextSession()[ "Name" ] ),
    'post_type' => 'forum',
    'posts_per_page' => 5
];

$Template = get_template_directory() . "/app/View/forum/ItemListNavMsg";
$ItemListNavMsg->Load( $Template );

$loop = new WP_Query( $args );
while ( $loop->have_posts() ) :
    $loop->the_post();
    $Forum->setPostID( get_the_ID() );
    $Datas = [
        "link" => get_permalink(),
        "topic_name" => get_the_title(),
        "notifications" => $Forum->checkUpdates()
    ];
    $ItemListNavMsg->Show( $Datas );
endwhile;