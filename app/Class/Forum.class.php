<?php
class Comments
{

    private $userID;
    private $postID;
    private $postCount;

    const UserMeta = 'forum_option_update';


    function __construct( $userID, $postID = null )
    {
        $this->userID = $userID;
        $this->postID = $postID;
    }


    /**
     * Retorna os comentarios de um post
     * 
     * @param Int $PostID : Id do post que sera feita a contagem
     * @return array
     */
    public function getCommentsPost( $PostID )
    {

        $args = array(
            'post_ID' => ($PostID != '') ? $PostID : null,
            'post_id' => ($PostID != '') ? $PostID : null,
            'post_type' => 'forum'
        );
        return get_comments( $args );
    }


    /**
     * Captura a quantidade de comentarios em um post
     * 
     * @param Int $PostID : Id do post que sera feita a contagem
     * @return string
     */
    public function getCommentCount( $PostID = null )
    {
        $ID = (!empty( $this->postID ) ) ? $this->postID : $PostID;

        $Comments = $this->getCommentsPost( $ID );
        $Counts = $Comments[ 0 ]->comment_count;
        $this->postCount = $Counts;
        return $Counts;
    }


    /**
     * Recupera o Json no banco de dados
     * 
     * @return array
     */
    public function getUserOptionsForum()
    {
        return get_user_meta( $this->userID, self::UserMeta );
    }


    /**
     * Atualiza os valores do meta user
     * 
     * @param type $postID : ID do post
     * @param type $commentCount : Quantidades de comentarios no $postID
     */
    public function updateUserOptionsForum( $commentCount = null )
    {
        $this->getCommentCount();

        $Count = (!empty( $commentCount ) ) ? $commentCount : $this->postCount;

        $arrayUpdate = $this->changeValueInArray( $Count );
        $Array = json_encode( $arrayUpdate );
        update_user_meta( $this->userID, self::UserMeta, $Array );
    }


    public function checkUpdates()
    {
        $postCount = $this->getCommentCount();
        $userCount = $this->getUserCommentCount();
        
        return $postCount - $userCount;
    }


    /** PRIVATE FUNCTIONS */


    /**
     * Adiciona ou altera o valor do Json salvo no banco de dados
     * 
     * @param type $postID : ID do post que sera alterado
     * @param type $commentCount : Quantidades de comentarios
     * @return array
     */
    private function changeValueInArray( $commentCount )
    {
        $theArray = $this->getUserOptionsForum();
        $decodeJson = json_decode( $theArray[ 0 ], true );
        $decodeJson[ $this->postID ] = $commentCount;
        return$decodeJson;
    }


    private function getUserCommentCount()
    {
        $Array = $this->getUserOptionsForum();
        $Array = json_decode( $Array[ 0 ], true );
        return$Array[ $this->postID ];
    }


}