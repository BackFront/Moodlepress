<?php
class Message
{

    private $userID;

    const metaFrom = 'opcoesMensagem_from';
    const UserMeta = 'userMessage_count';


    function __construct( $userID = null )
    {
        if ( $userID ):
            $this->userID = $userID;
        else:
            $this->userID = wp_get_current_user()->ID;
        endif;
    }


    /**
     * Retorna quantas mensagens sao desse usuario
     */
    public function getPostsMenssagesCount()
    {
        $args = array(
            'meta_key' => self::metaFrom,
            'meta_value' => $this->userID,
            'post_type' => 'message'
        );
        $Message = new WP_Query( $args );
        return$Message->post_count;
    }


    /**
     * Checa quantas mensagens não lidas o uruario tem
     */
    public function checkNewMessages()
    {
        $postCount = (int)$this->getPostsMenssagesCount();
        $userCount = (int)$this->getUserMessageCount()[0];
        return $postCount - $userCount;
    }


    /**
     * Atualiza a quantidade de Mensagens no MetaUser
     */
    public function updateUserMessageCount()
    {
        $Count = $this->getPostsMenssagesCount();
        update_user_meta( $this->userID, self::UserMeta, $Count );
    }


    //PRIVATE METHODS


    /**
     * Recupera a quantidade de mensagens ja lidas pelo usuario
     */
    private function getUserMessageCount()
    {
        return get_user_meta( $this->userID, self::UserMeta );
    }


}