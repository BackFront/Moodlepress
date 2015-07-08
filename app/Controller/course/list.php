<?php
Load( ["TemplateView" ] );

$Temp_table = new TemplateView();

$Template = get_template_directory() . "/app/View/elements/table";
$Temp_table->Load( $Template );

$args_table = [
    "width" => "col-md-12",
    "title" => "Meus cursos"
];

$Temp_table->Show( $args_table );
