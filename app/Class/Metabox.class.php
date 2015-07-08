<?php
class Metabox
{

    private $Slug;
    private $LabelTitle;
    private $PostTypeScreen;
    private $Context;
    private $Priority;
    private $Fields;
    private $CurrentValue;
    private $fieldsNotification = null;


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
     *          'default' => "http://myfilesupload.net/archive/129740", //Valor padrao para o campo
     *          'type' => "file",
     *          'labelDescription' => "cole a URL do arquivo ou selecione diretamente do computador"
     *      ),
     *      array(
     *          'title' => "Campo de Texto",
     *          'id' => "campo_texto",
     *          'type' => "text",
     *          'labelDescription' => "Escreva algo sobre esse post",
     *          'attributes'  => array(
     *              'placeholder' => 'Some text here!',
     *              'size' => '80'
     *          )
     *      ),
     *      array(
     *          'title' => "Select",
     *          'id' => "campo_select",
     *          'type' => "select",
     *          'labelDescription' => "Selecione uma opção",
     *          'options'  => array(
     *              'id' => 'Nome',
     *              'outra_opcao' => 'Outra Opção'
     *          )
     *      )
     * ));
     */
    public function setFields( array $Fields )
    {
        $this->Fields = $Fields;
        $this->exec();
    }


    /**
     * $Fields = Array('title','body','type');
     * 
     * <i>type:</i> danger, success, default, info
     */
    public function setFieldsNotification( $Fields )
    {
        $this->fieldsNotification = $Fields;
    }


    public function mountFields()
    {
        foreach ( $this->Fields as $Field ):

            $CurrentValue = get_post_meta( get_the_ID(), $Field[ 'id' ], true );
            if ( !$CurrentValue ) {
                $CurrentValue = isset( $Field[ 'default' ] ) ? $Field[ 'default' ] : '';
            }
            $this->CurrentValue = $CurrentValue;

            $Options = isset( $Field[ 'options' ] ) ? $Field[ 'options' ] : null;
            $Attributes = isset( $Field[ 'attributes' ] ) ? $Field[ 'attributes' ] : null;
            $Description = isset( $Field[ 'description' ] ) ? $Field[ 'description' ] : null;
            $Type = $Field[ 'type' ];
            $Id = $Field[ 'id' ];

            $html = "<tr>";
            $html .= "<td><b>{$Field[ 'title' ]}</b>:<br />{$this->getFieldType( $Id, $Type, $Attributes, $Options )} <br />";
            $html .= "<td><small><i>{$Description}</i></small></td>";
            $html .= "<hr />";
            $html .= "</tr>";
            echo $html;
        endforeach;
    }


    private function getFieldType( $Id, $Type, $Attrs = null, $Options = null )
    {
        switch ( $Type ) {
            case 'text':
                $Input = $this->fieldText( $Id, $Attrs );
                break;

            case 'upload':
                $Input = $this->fieldUpload( $Id, $Attrs );
                break;

            case 'select':
                $Input = $this->fieldSelect( $Id, $Attrs, $Options );
                break;

            default:
                $Input = $this->fieldText( $Id, $Attrs );
                break;
        }
        return $Input;
    }


    private function build_field_attributes( $attrs )
    {
        $attributes = '';
        if ( !empty( $attrs ) ) {
            foreach ( $attrs as $key => $attr ) {
                $attributes .= ' ' . $key . '="' . $attr . '"';
            }
        }
        return $attributes;
    }


    private function fieldText( $Id, $Attrs )
    {
        return "<input type=\"text\" name=\"{$Id}\" value=\"{$this->CurrentValue}\" stye=\"width: 100% !important\" {$this->build_field_attributes( $Attrs )}  />";
    }


    private function fieldUpload( $Id, $Attrs )
    {
        $this->loadscripts();
        return "<div class=\"root input-text-group\"><input type=\"text\" id=\"Attachment\" name=\"{$Id}\" value=\"{$this->CurrentValue}\" size=\"80%\" {$this->build_field_attributes( $Attrs )} />"
                . "<input type=\"button\" id=\"submiteAttachmentBtn\" value=\"Selecionar Arquivo\" class=\"root button _2col\" /></div>";
    }


    private function fieldSelect( $Id, $Attrs, $Options )
    {
        // If multiple add a array in the option.
        $multiple = (!empty( $Attrs )) ? ( in_array( 'multiple', $Attrs )) ? '[]' : '' : false;

        $html = sprintf( '<select id="%1$s" name="%1$s%2$s"%3$s>', $Id, $multiple, $this->build_field_attributes( $Attrs ) );
        foreach ( $Options as $key => $label ) {
            $selected = $this->is_selected( $this->CurrentValue, $key );
            $html .= sprintf( '<option value="%s"%s>%s</option>', $key, $selected, $label );
        }
        $html .= '</select>';
        return $html;
    }


    /**
     * Current value is selected.
     *
     * @param  array/string $current Field current value.
     * @param  string       $key     Actual option value.
     *
     * @return boolean               $current is selected or not.
     */
    private function is_selected( $current, $key )
    {
        $selected = false;
        if ( is_array( $current ) ) {
            for ( $i = 0; $i < count( $current ); $i++ ) {
                if ( selected( $current[ $i ], $key, false ) ) {
                    $selected = selected( $current[ $i ], $key, false );
                    break 1;
                }
            }
        } else {
            $selected = selected( $current, $key, false );
        }
        return $selected;
    }


    public function add()
    {
        add_meta_box( $this->Slug, $this->LabelTitle, array( $this, 'mountFields' ), $this->PostTypeScreen, $this->Context, $this->Priority );
    }


    public function save( $post_id )
    {
        // Verify if this is an auto save routine.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
        // Check permissions.

        if ( isset( $_POST[ 'post_type' ] ) && (is_array( $this->PostTypeScreen ) ) ? in_array( $_POST[ 'post_type' ], $this->PostTypeScreen ) : $this->PostTypeScreen ) {
            if ( !current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }

        foreach ( $this->Fields as $field ) {
            $name = $field[ 'id' ];
            $value = isset( $_POST[ $name ] ) ? $_POST[ $name ] : null;

            if ( !in_array( $field[ 'type' ], array( 'separator', 'title' ) ) ) {
                $old = get_post_meta( $post_id, $name, true );
                $new = apply_filters( 'meta_' . $this->Slug, $value, $name );

                if ( $new && $new != $old ) {
                    update_post_meta( $post_id, $name, $new );
                } elseif ( '' == $new && $old ) {
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


    private function loadscripts()
    {
        wp_enqueue_style( 'thickbox' );
        wp_enqueue_script( 'thickbox' );
        wp_enqueue_media();
        wp_enqueue_script( 'media-upload' );

        echo '<script type="text/javascript">
        jQuery(document).ready(function() {

            var formfield;
            var header_clicked = false;

            jQuery("#submiteAttachmentBtn").click(function() {

                formfield = jQuery("#Attachment").attr("name");
                tb_show("", "media-upload.php?TB_iframe=true");
                header_clicked = true;

                return false;
            });

            // Guarda o uploader original
            window.original_send_to_editor = window.send_to_editor;

            // Sobrescreve a função nativa e preenche o campo com a URL
            window.send_to_editor = function(html) {
                if (header_clicked) {
                    fileurl = jQuery(html).attr("href");
                    jQuery("#Attachment").val(fileurl);
                    header_clicked = false;
                    tb_remove();
                }
                else
                {
                    window.original_send_to_editor(html);
                }
            };
        });
    </script>';
    }


}