<?php
Load( ["TemplateView" ] );

$Temp_table = new TemplateView();
$Temp_itenTable = clone ( $Temp_table );

$Template = get_template_directory() . "/app/View/elements/table";
$Temp_table->Load( $Template );

$Template = get_template_directory() . "/app/View/iten/course_list_iten";
$Temp_itenTable->Load( $Template );

$args_table = [
    "width" => "col-md-12",
    "title" => "Meus cursos",
    "head" => "<th>#</th><th>Nome do Curso</th><th>Categoria</th><th>Alunos</th><th>Preço</th><th>Publicado</th><th>Ações</th>",
    "iten" => $Temp_itenTable->getShow( [
        "course_thumb" => "http://placehold.it/30x30",
        "course_name" => "Nome do Curso",
        "course_excerpt" => "Ruby é uma linguagem de programação Orientada a Objetos e que esta em constante crescimento no mercado.",
        "course_category" => "Programação",
        "course_students" => "30",
        "course_price" => "100.00",
        "[class]course_post" => "icon-check-circle text-green"
    ] )
];

$Temp_table->Show( $args_table );
