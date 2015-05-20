<?php
Load( ["TemplateView", "Message" ] );
$TemplateView = new TemplateView();
$Mensagem = new Message();

$Template = get_template_directory() . "/app/View/message/single";
$TemplateView->Load( $Template );

$Message = get_page_by_path( filter_input( INPUT_GET, 'msid', FILTER_DEFAULT ), OBJECT, 'message' );
$From = get_user_by( 'id', $Message->post_author );

$TemplateView->Show( [
    "subject" => $Message->post_title,
    "from" => $From->data->display_name,
    "content" => $Message->post_content,
    "date" => $Message->post_date
] );
$Mensagem->updateUserMessageCount( wp_get_current_user()->ID );

