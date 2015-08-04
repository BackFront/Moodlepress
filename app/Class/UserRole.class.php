<?php
class UserRole
{

    private $CurrentUser;
    private $DisplayName;
    private $Role;
    private $Capability;


    public function __construct()
    {
        $this->CurrentUser = wp_get_current_user();

        //Default Capability
        $this->Capability = array(
            "manage_network" => false,
            "manage_sites" => false,
            "manage_network_users" => false,
            "manage_network_plugins" => false,
            "manage_network_themes" => false,
            "manage_network_options" => false,
            "activate_plugins" => false,
            "create_users" => false,
            "delete_plugins" => false,
            "delete_themes" => false,
            "delete_users" => false,
            "edit_files" => false,
            "edit_plugins" => false,
            "edit_theme_options" => false,
            "edit_themes" => false,
            "edit_users" => false,
            "export" => false,
            "import" => false,
            "install_plugins" => false,
            "install_themes" => false,
            "list_users" => false,
            "manage_options" => false,
            "promote_users" => false,
            "remove_users" => false,
            "switch_themes" => false,
            "update_core" => false,
            "update_plugins" => false,
            "update_themes" => false,
            "edit_dashboard" => false,
            "moderate_comments" => false,
            "manage_categories" => false,
            "manage_links" => false,
            "edit_others_posts" => false,
            "edit_pages" => false,
            "edit_others_pages" => false,
            "edit_published_pages" => false,
            "publish_pages" => false,
            "delete_pages" => false,
            "delete_others_pages" => false,
            "delete_published_pages" => false,
            "delete_others_posts" => false,
            "delete_private_posts" => false,
            "edit_private_posts" => false,
            "read_private_posts" => false,
            "delete_private_pages" => false,
            "edit_private_pages" => false,
            "read_private_pages" => false,
            "unfiltered_html" => false,
            "edit_published_posts" => false,
            "upload_files" => false,
            "publish_posts" => false,
            "delete_published_posts" => false,
            "edit_posts" => false,
            "delete_posts" => false,
            "read" => false,
            "manage_network" => false,
            "manage_sites" => false,
        );
    }


    public function addCapability( Array $Capability )
    {

        foreach ( $Capability as $key ) :
            get_role( $this->Role )->add_cap( $key );
        endforeach;
    }


    public function remCapability( Array $Capability )
    {

        foreach ( $Capability as $key ) :
            get_role( $this->Role )->remove_cap( $key );
        endforeach;
    }


    public function addRole( $Role, $DisplayName )
    {
        $this->Role = $Role;
        $this->DisplayName = $DisplayName;
        $this->exeAddRole();
    }


    public function remRole( $Role = null )
    {
        if ( null == $Role ):
            remove_role( $this->Role );
        else:
            remove_role( $Role );
        endif;
    }


    private function exeAddRole()
    {
        add_role( $this->Role, $this->DisplayName, $this->Capability );
    }


}