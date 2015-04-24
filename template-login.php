<?php
/**
 * Template Name: Login
 */
get_header( "login" );
if ( is_user_logged_in() ) {
    wp_redirect( home_url() );
} elseif ( $_POST[ 'log' ] || $_POST[ 'pwd' ] ) {
    if ( !$_POST[ 'log' ] || !$_POST[ 'pwd' ] )
        echo $message = 'Login ou senha está(ão) em branco';
    else {
        $user = wp_authenticate( $_POST[ 'log' ], $_POST[ 'pwd' ] );
        if ( $user->ID > 0 ) {
            wp_set_auth_cookie( $user->ID );
            if ( !session_id() ) :
                session_start();
            endif;
            Load( ["Context"] );
            $Skin = new Context( $user->roles[ 0 ] );
            wp_redirect( home_url() );
            exit;
        } else {
            echo $message = 'Login ou senha incorreto';
        }
    }
}
?>
<form class="login-box" method="post" action="">
    <a class="navbar-brand col-lg-12" style="color:#fff;text-align: center; margin-bottom: 10px" href="<?php echo get_home_url(); ?>">ESCRITÓRIO VIRTUAL CETEC <br />
        <small style="font-size: 9px; letter-spacing: .1px;">CENTRO DE ESTUDOS E TECNOLOGIAS EDUCACIONAIS</small>
        <br />
    </a>

    <div class="form-group">
        <label for="exampleInputEmail1">Login</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="log" placeholder="Entre com seu login">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Entre com sua senha">
    </div>
    <button type="submit" class="btn btn-default" value="logar">Entrar</button>
</form>




<?php
get_footer( "login" );
