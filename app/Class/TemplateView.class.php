<?php

class TemplateView {

    private $Datas;
    private $Keys;
    private $Values;
    private $Template;

    public function Load($Template, $BaseTemplates = false) {
        if (!$BaseTemplates) :
            $Template = str_replace('\\', DIRECTORY_SEPARATOR, $Template);
        else:
            $Template = get_template_directory() . '/app/View/' . $Template;
            $Template = str_replace('\\', DIRECTORY_SEPARATOR, $Template);
        endif;
        $this->Template = (string) $Template;
        $this->Template = file_get_contents($this->Template . '.tpl.html');
        return $this->Template;
    }

    public function Show(array $Datas = null) {
        $this->setKeys($Datas);
        $this->setValues();
        $this->showView();
    }

    public function getShow(array $Datas) {
        $this->setKeys($Datas);
        $this->setValues();
        $this->getShowView();
    }

    public function Request($File = null, array $Datas = null) {
        if ($File):
            extract($Datas);
            require ("{$File}.tpl.php");
        else:
            require ("{$this->Template}.tpl.php");
        endif;
    }

    private function setKeys($Datas) {
        $this->Datas = $Datas;
        $this->Keys = explode('&', ('#' . implode('#&#', array_keys($this->Datas)) . '#'));
    }

    private function setValues() {
        $this->Values = array_values($this->Datas);
    }

    private function showView() {
        echo str_replace($this->Keys, $this->Values, $this->Template);
    }

    private function getShowView() {
        return str_replace($this->Keys, $this->Values, $this->Template);
    }

}
