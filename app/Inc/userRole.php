<?php

//Perfil cursista
add_action( 'admin_init', 'add_role_cursista' );
function add_role_tecnico()
{
    add_role( 'mp_cursista', 'Cursista', array(
        'activate_plugins' => false,
        'delete_others_posts' => false,
        'delete_posts' => false,
        'delete_private_posts' => false,
        'delete_published_posts' => false,
        'edit_dashboard' => false,
        'edit_files' => false,
        'edit_others_posts' => false,
        'edit_posts' => false,
        'edit_private_posts' => false,
        'edit_published_posts' => false,
        'moderate_comments' => false,
        'publish_posts' => false,
        'read_private_pages' => false,
        'read_private_posts' => false,
        'read' => false
    ) );
}

//Perfil tutor
add_action( 'admin_init', 'add_role_tutor' );
function add_role_tutor()
{
    add_role( 'mp_tutor', 'Tutor', array(
        'activate_plugins' => false,
        'delete_others_posts' => false,
        'delete_posts' => false,
        'delete_private_posts' => false,
        'delete_published_posts' => false,
        'edit_dashboard' => false,
        'edit_files' => false,
        'edit_others_posts' => false,
        'edit_posts' => false,
        'edit_private_posts' => false,
        'edit_published_posts' => false,
        'moderate_comments' => false,
        'publish_posts' => false,
        'read_private_pages' => false,
        'read_private_posts' => false,
        'read' => false
    ) );
}

//Perfil aluno
add_action( 'admin_init', 'add_role_aluno' );
function add_role_aluno()
{
    add_role( 'mp_aluno', 'Aluno', array(
        'activate_plugins' => false,
        'delete_others_posts' => false,
        'delete_posts' => false,
        'delete_private_posts' => false,
        'delete_published_posts' => false,
        'edit_dashboard' => false,
        'edit_files' => false,
        'edit_others_posts' => false,
        'edit_posts' => false,
        'edit_private_posts' => false,
        'edit_published_posts' => false,
        'moderate_comments' => false,
        'publish_posts' => false,
        'read_private_pages' => false,
        'read_private_posts' => false,
        'read' => false
    ) );
}