<?php
Load( [ "TemplateView", "Message", "Context" ] );
$Message = new Message();
$TemplateView = new TemplateView();
$Context = new Context();
$TemplateLoop = clone $TemplateView;

$Template = get_template_directory() . "/app/View/message/mensagem";
$TemplateView->Load( $Template );

$Template = get_template_directory() . "/app/View/message/ItemListLoopMsg";
$TemplateLoop->Load( $Template );

$ArrayLoop = [ ];
$args = array(
    'meta_key' => 'opcoesMensagem_from',
    'meta_value' => [ 'all', wp_get_current_user()->ID ],
    'post_type' => 'message',
    'posts_per_page' => 50
);

$Loop = new WP_Query( $args );
while ( $Loop->have_posts() ) :
    $Loop->the_post();

    switch ( get_post_meta( get_the_ID(), 'opcoesMensagem_prioridade', true ) ):
        case 'Média' :
            $Priority = "icon-warning2 text-yellow";
            break;
        case 'Alta' :
            $Priority = "icon-exclamation-circle text-red";
            break;
        default :
            $Priority = "";
            break;
    endswitch;

    $Datas = [
        "to" => $i,
        "excerpt" => get_the_excerpt(),
        "title" => get_the_title(),
        "link" => get_post( get_the_ID(), ARRAY_A )[ 'post_name' ],
        "priority" => $Priority,
        "date" => get_the_time( 'd F Y' )
    ];
    $Item = $TemplateLoop->getShow( $Datas );
    array_push( $ArrayLoop, $Item );

endwhile;
wp_reset_query();

$ArrayLoop = implode( '', $ArrayLoop );

$Datas = [ "loop_msg" => $ArrayLoop ];
$TemplateView->show( $Datas );
$Message->updateUserMessageCount( wp_get_current_user()->ID );
