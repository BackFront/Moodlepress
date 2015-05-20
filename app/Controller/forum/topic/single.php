<?php
Load( [ "TemplateView", "Forum" ] );

$TemplateView = new TemplateView();
$CForum = new Forum( wp_get_current_user()->ID );
$TemplateLoop = clone $TemplateView;

$Template = get_template_directory() . "/app/View/forum/topic/Single";
$TemplateView->Load( $Template );

$Template = get_template_directory() . "/app/View/forum/topic/ItemListLoopSingle";
$TemplateLoop->Load( $Template );

$slug = filter_input( INPUT_GET, 'uid', FILTER_DEFAULT );
$Forum = get_page_by_path( $slug, OBJECT, 'forum' );


$commentsLoop = get_comments( [
    'post_id' => get_page_by_path( $slug )
        ] );



$id = get_page_by_path( $slug );


// The Query
$the_query = new WP_Query( "post_type=forum&p={$id}" );

// The Loop
if ( $the_query->have_posts() ) {
    global $withcomments;
    $withcomments = 1;
    comments_template( '/comments.php', TRUE );
    $CForum->setPostID( get_the_ID() );
    $CForum->updateUserOptionsForum();
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();


$ArrayLoop = [ ];
foreach ( $commentsLoop as $Comment ):
    if ( !$Comment->comment_parent > 0 ) :

        $response = null;

        $Datas = [
            "person_name" => $Comment->comment_author,
            "comment" => $Comment->comment_content,
            "date" => $Comment->comment_date,
            "response" => $response
        ];
        $Item = $TemplateLoop->getShow( $Datas );
        array_push( $ArrayLoop, $Item );
    endif;
endforeach;

$ArrayLoop = implode( '', $ArrayLoop );

$Datas = [
    "topic_name" => $Forum->post_title,
    "topic_description" => $Forum->post_content,
    "autor" => get_the_author_meta( "display_name", $Forum->post_author ),
    "loop" => $ArrayLoop
];

//$TemplateView->show( $Datas );
