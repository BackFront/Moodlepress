<?php
class Alert
{


    public static function PHPErro( $errParam, $errFile = null, $errDie = false )
    {
        Load( [ "TemplateView" ] );
        $Template = $errParam[ "type" ];
        $Template = get_template_directory() . "/app/View/mensage/{$Template}";

        $TPL = new TemplateView;
        $TPL->Load( "{$Template}" );

        $Datas = [
            "msg_head" => $errParam[ "head" ],
            "msg_body" => $errParam[ "body" ]
        ];
        
        $TPL->Show($Datas);

        if ( $errDie ):
            die;
        endif;
    }


    public function PHPDebug( $obj, $die = null )
    {
        echo $html = '<div class="box-erro" style="padding:15px;width:100%;height:200px;position:fixed;top:0;color:#fff;left:0;background:rgba( 0, 0, 0, .4 );overflow:auto;">';
        echo '<pre>';
        print_r( $obj );
        echo '</pre>';
        echo '<i onclick="$( this ).parent(\'.box-erro\').hide( 300, function() {$(this).remove();});" style="position: fixed;top:50px;right:50px;cursor:pointer;">Close</i>';
        echo $html = '</div>';
        ($die == true) ? die() : null;
    }


}