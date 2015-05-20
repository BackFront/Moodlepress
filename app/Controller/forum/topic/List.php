<?php
Load( ["TemplateView" ] );

$TemplateView = new TemplateView();
$TemplateLoop = clone $TemplateView;

$Template = get_template_directory() . "/app/View/forum/topic/List";
$TemplateView->Load( $Template );

$Template = get_template_directory() . "/app/View/forum/topic/ItemListLoopTopic";
$TemplateLoop->Load( $Template );

$Term = filter_input( INPUT_GET, 'uid', FILTER_DEFAULT );

$args = [
    'post_type' => 'forum',
    'tax_query' => [
        [
            'taxonomy' => 'forum',
            'field' => 'slug',
            'terms' => $Term,
        ],
    ],
];

$Query = new WP_Query( $args );

$ArrayLoop = [ ];
while ( $Query->have_posts() ) :
    $Query->the_post();

    $Datas = [
        "avatar" => get_avatar( get_the_author_email(), '60' ),
        "title" => get_the_title(),
        "link" => get_post( get_the_ID(), ARRAY_A )[ 'post_name' ],
        "description" => get_the_excerpt(),
        "by" => get_the_author_meta('display_name')
    ];

    $Item = $TemplateLoop->getShow( $Datas );
    array_push( $ArrayLoop, $Item );
endwhile;

$ArrayLoop = implode( '', $ArrayLoop );

$Datas = [
    "loop" => $ArrayLoop,
    "term" => get_term_by( 'slug', $Term, 'forum')->name
];
$TemplateView->show( $Datas );
