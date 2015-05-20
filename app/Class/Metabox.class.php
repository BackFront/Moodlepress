<?php
class Metabox
{


    private $Slug;
    private $LabelTitle;
    private $PostTypeScreen;
    private $Context;
    private $Priority;
    private $Fields;
    private $FieldsHtml;


    /**
     * 
     * @param string       $Slug Slug da metabox
     * @param string       $LabelTitle Titulo do Label que ira aparecer na tela de edicao do post
     * @param string|array $PostTypeScreen Qual post_type recebera o metabox examples include 'post','page','dashboard','link','attachment','custom_post_type' where custom_post_type is the custom post type slug). <i>Default: post</i>
     * @param string       $Context (optional) The part of the page where the edit screen section should be shown ('normal', 'advanced', or 'side'). <i>Default: advanced</i>
     * @param string       $Priority (optional) The priority within the context where the boxes should show ('high', 'core', 'default' or 'low'). <i>Default: default</i>
     */
    function __construct( $Slug, $LabelTitle, $PostTypeScreen = "post", $Context = "advanced", $Priority = "default" )
    {
        $this->Slug = $Slug;
        $this->LabelTitle = $LabelTitle;
        $this->PostTypeScreen = $PostTypeScreen;
        $this->Context = $Context;
        $this->Priority = $Priority;

    }


    /**
     * 
     * @param array $Fields
     * 
     * 
     * <b>Exemplo de utilização: </b>
     * $Metabox->setFields(array(
     *      array(
     *          'name' => "Campo de Upload",
     *          'id' => "campo_upload", 
     *          'type' => "file", 
     *          'labelDescription' => "cole a URL do arquivo ou selecione diretamente do computador"
     *      ),
     *      array(
     *          'title' => "Campo de Texto",
     *          'id' => "campo_texto", 
     *          'type' => "text", 
     *          'labelDescription' => "Escreva algo sobre esse post"
     *      )
     * ));
     */
    public function setFields( array $Fields )
    {
        $this->Fields = $Fields;
        $this->exec();

    }


    public function mountFields()
    {

        foreach( $this->Fields as $Fields ):

            $html = "<tr>";
            $html .= "<td><b>{$Fields[ 'title' ]}</b>: {$this->getFieldType( $Fields[ 'id' ], $Fields[ 'type' ] )} <br />";
            $html .= "<td><small><i>{$Fields[ 'description' ]}</i></small></td>";
            $html .= "<hr />";
            $html .= "</tr>";
            echo $html;
        endforeach;

    }


    private function getFieldType( $Id, $Type )
    {
        switch( $Type ) {
            case 'text':
                $Input = $this->fieldText( $Id );
                break;

            case 'upload':
                $Input = $this->fieldUpload( $Id );
                break;

            default:
                $Input = $this->fieldText( $Id );
                break;
        }
        return $Input;

    }


    private function fieldText( $Id )
    {
        return "<input type=\"text\" name=\"{$Id}\" stye=\"width: 100% !important\"  />";

    }


    private function fieldUpload( $Id )
    {
        return "<input type=\"text\" name=\"{$Id}\" stye=\"width: 90% !important\"  /><input type=\"button\" id=\"submiteAttachment\" value=\"Selecionar Arquivo\" />";

    }


    public function add()
    {
        add_meta_box( $this->Slug, $this->LabelTitle, array( $this, 'mountFields' ), $this->PostTypeScreen, $this->Context, $this->Priority );

    }


    public function save()
    {
        // Verify if this is an auto save routine.
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
            return $post_id;
        }
        // Check permissions.
        if( isset( $_POST[ 'post_type' ] ) && in_array( $_POST[ 'post_type' ], $this->get_post_type() ) ){
            if( !current_user_can( 'edit_page', $post_id ) ){
                return $post_id;
            }
        } elseif( !current_user_can( 'edit_post', $post_id ) ){
            return $post_id;
        }
        foreach( $this->Fields as $field ) {

            $name = $field[ 'id' ];


            $value = isset( $_POST[ $name ] ) ? $_POST[ $name ] : null;

            if( !in_array( $field[ 'type' ], array( 'separator', 'title' ) ) ){
                $old = get_post_meta( $post_id, $name, true );
                $new = apply_filters( 'odin_save_metabox_' . $this->id, $value, $name );
                if( $new && $new != $old ){
                    update_post_meta( $post_id, $name, $new );
                } elseif( '' == $new && $old ){
                    delete_post_meta( $post_id, $name, $old );
                }
            }
        }

    }


    private function exec()
    {
        // Add Metabox.
        add_action( 'add_meta_boxes', array( $this, 'add' ) );
        // Save Metaboxs.
        add_action( 'save_post', array( $this, 'save' ) );

    }


}
