<?php
Load( ["TemplateView" ] );
$TemplateView = new TemplateView();
$TemplateLoop = clone $TemplateView;
$Template = get_template_directory() . "/app/View/forum/forum";
$TemplateView->Load( $Template );
$Template = get_template_directory() . "/app/View/forum/ItemListLoopForum";
$TemplateLoop->Load( $Template );

$Foruns = get_terms( "forum" );
$ArrayLoop = [];
foreach($Foruns as $Foruns):
    $Datas = [
        "title" => $Foruns->name,
        "link" => $Foruns->slug,
        "topics" => $Foruns->count
    ];
    
    $Item = $TemplateLoop->getShow( $Datas );
    array_push( $ArrayLoop, $Item );
endforeach;

$ArrayLoop = implode( '', $ArrayLoop );

$Datas = [ "loop_msg" => $ArrayLoop ];
$TemplateView->show( $Datas );
