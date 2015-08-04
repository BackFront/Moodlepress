
<?php
global $user;

var_dump( $user );



Load( ["TemplateView" ] );

$Temp_edit = new TemplateView();

$Template = get_template_directory() . "/app/View/course/edit";
$Temp_edit->Load( $Template );

$args_edit = [
    "patch_assets" => get_template_directory_uri() . "/assets",
    "[class]course_name" => "form-control",
    "[value]course_name" => "",
    "[class]course_excerpt" => "form-control tinymce",
    "[value]course_excerpt" => "",
    "[class]course_cover" => "form-control",
    "[value]course_cover" => "",
    "[class]course_passcode" => "form-control",
    "[value]course_passcode" => "BEW0R78TGB5"
];
$Temp_edit->Show( $args_edit );
