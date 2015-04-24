<?php
class Context
{

    private $ContextDesign;
    private $ContextName;
    private $UserType;


    function __construct( $UserType = null )
    {
        $this->UserType = $UserType;
        if ( $this->UserType != null ) :
            $this->setContextTheme();
        endif;
    }


    public function getContextSession()
    {
        return $_SESSION[ "Contexto" ];
    }


    private function setContextSession()
    {
        $_SESSION[ "Contexto" ][ "Skin" ] = $this->ContextDesign;
        $_SESSION[ "Contexto" ][ "Name" ] = $this->ContextName;
    }


    public function destroyContextSession()
    {
        unset( $_SESSION[ "Contexto" ] );
    }


    public function setContextTheme( $Context = null )
    {
        switch ( $this->UserType ):
            case "curriculomais" :
                $this->ContextDesign = "skin-green";
                $this->ContextName = "PCNP Currículo+";
                break;

            case "tecnologia" :
                $this->ContextDesign = "skin-blue";
                $this->ContextName = "PCNP de Tecnologia";
                break;

            case "atividade" :
                $this->ContextDesign = "skin-yellow";
                $this->ContextName = "PCNP Autor de Atividades";
                break;

            default :
                $this->ContextDesign = "skin-black";
                $this->ContextName = "Administrador";
                break;
        endswitch;
        $this->setContextSession();
    }
    
}