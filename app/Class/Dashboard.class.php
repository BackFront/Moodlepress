<?php

class Dashboard
{


    private $Controller;
    private $PageInfo;


    function __construct()
    {
        $Controller = filter_input( INPUT_GET, 'exe', FILTER_DEFAULT );
        $this->Controller = $Controller;
        $Controller = str_replace( '/', '-', $Controller );

        if( $Controller ):
            $pageID = get_page_by_path( $Controller );
            if( true ){
                $Page = get_page( $pageID, OBJECT );
                $this->PageInfo = $Page;
            } else {
                $this->PageInfo = "";
            }
        else:
            $this->PageInfo->post_title = "Dashboard";
            $this->PageInfo->post_content = "";
        endif;

    }


    public function Title()
    {
        return $this->PageInfo->post_title;

    }


    public function OptionalDescription()
    {
        return ( $this->PageInfo->post_content )? : null;

    }


    public function Breadcrumb()
    {
        $Pages = $this->Controller;
        $Pages = explode( "/", $Pages );
        $i = 0;
        foreach( $Pages as $Page ):
            $P = ucfirst( strtolower( $Page ) );
            if( $i != count( $Pages ) ):
                echo "<li>{$P}</li>";
            else:
                echo "<li class=\"active\">{$P}</li>";
            endif;
        endforeach;

    }


}
