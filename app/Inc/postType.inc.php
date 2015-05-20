<?php
//Mensagens
add_action( 'init', 'mensagens' );

function mensagens()
{
    $args_atuacao_post = array(
        'labels' => array(
            'name' => 'Mensagens', 'post type general name',
            'singular_name' => 'Mensagem',
            'add_new' => 'Criar nova mensagem',
            'add_new_item' => 'Criar nova',
            'edit_item' => __( 'Editar' ),
            'new_item' => __( 'Nova' ),
            'all_items' => __( 'Ver todas' ),
            'view_item' => __( 'Visualizar Mensagem' ),
            'search_items' => __( 'Procurar Mensagem' ),
            'not_found' => __( 'Nenhuma Mensagem encontrada' ),
            'not_found_in_trash' => __( 'Nenhuma Mensagem encontrada na lixeira' ),
            'parent_item_colon' => '',
            'menu_name' => 'Mensagens'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'taxonomies' => array( 'wo_plataforma' ),
        'supports' => array( 'title', 'editor', 'author' )
    );
    register_post_type( 'message', $args_atuacao_post );
    flush_rewrite_rules();
}


//Fórum
add_action( 'init', 'forum' );


function forum()
{
    $args_forum = array(
        'labels' => array(
            'name' => 'Fórum',
            'singular_name' => 'Fórum',
            'add_new' => 'Criar novo tópico',
            'add_new_item' => 'Adicionar tópico',
            'edit_item' => __( 'Editar' ),
            'new_item' => __( 'Novo' ),
            'all_items' => __( 'Ver todos' ),
            'view_item' => __( 'Visualizar tópico' ),
            'search_items' => __( 'Procurar tópicos' ),
            'not_found' => __( 'Nenhum tópico encontrado' ),
            'not_found_in_trash' => __( 'Nenhum tópico encontrado na lixeira' ),
            'parent_item_colon' => '',
            'menu_name' => 'Fórum'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'author','comments' ),
    );
    register_post_type( 'forum', $args_forum );
    flush_rewrite_rules();
}

//Agenda
add_action( 'init', 'agenda' );


function agenda()
{
    $args_forum = array(
        'labels' => array(
            'name' => 'Agenda',
            'singular_name' => 'Agenda',
            'add_new' => 'Criar novo evento',
            'add_new_item' => 'Adicionar evento',
            'edit_item' => __( 'Editar' ),
            'new_item' => __( 'Novo' ),
            'all_items' => __( 'Ver evento' ),
            'view_item' => __( 'Visualizar evento' ),
            'search_items' => __( 'Procurar evento' ),
            'not_found' => __( 'Nenhum evento encontrado' ),
            'not_found_in_trash' => __( 'Nenhum evento encontrado na lixeira' ),
            'parent_item_colon' => '',
            'menu_name' => 'Agenda'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array( 'title', 'editor' ),
    );
    register_post_type( 'agenda', $args_forum );
    flush_rewrite_rules();
}


//Monitoramento de Acesso
add_action( 'init', 'monitoramento_acesso' );

function monitoramento_acesso()
{
    $args_atuacao_post = array(
        'labels' => array(
            'name' => 'Monitoramento de Acesso', 'post type general name',
            'singular_name' => 'Monitoramento de Acesso',
            'add_new' => 'Adicionar Item Monitoramento',
            'add_new_item' => 'Criar novo',
            'edit_item' => __( 'Editar' ),
            'new_item' => __( 'Nova' ),
            'all_items' => __( 'Ver todos' ),
            'view_item' => __( 'Visualizar Item' ),
            'search_items' => __( 'Procurar Item' ),
            'not_found' => __( 'Nenhuma Item encontrado' ),
            'not_found_in_trash' => __( 'Nenhuma Item encontrado na lixeira' ),
            'parent_item_colon' => '',
            'menu_name' => 'Monitoramento Acesso'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'taxonomies' => array( 'wo_plataforma' ),
        'supports' => array( 'title', 'editor', 'author' )
    );
    register_post_type( 'monitoramento_acesso', $args_atuacao_post );
    flush_rewrite_rules();
}