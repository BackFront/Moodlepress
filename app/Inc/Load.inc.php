<?php
function Load(Array $Class) {
    foreach ($Class as $Class):
        $Class = str_replace('\\', DIRECTORY_SEPARATOR, $Class);
        $dirName = get_template_directory() . '/app/Class';
        if (file_exists("{$dirName}/{$Class}.class.php")):
            require_once("{$dirName}/{$Class}.class.php");
        elseif (file_exists("{$dirName}/{$Class}.php")):
            require_once("{$dirName}/{$Class}.php");
        else:
            die("Erro ao incluir {$dirName}/{$Class}.class.php<hr />");
        endif;
    endforeach;
}