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
            Load( ["Context" ] );
            $Skin = new Context( $user->roles[ 0 ] );
            wp_redirect( home_url() );
            exit;
        } else {
            $msga = [
                "type" => "danger",
                "head" => "Erro",
                "body" => "Login e/ou senha incorreto"
            ];
            Load( ["Alert" ] );
            $msg = new Alert;

            $msg->PHPErro( $msga );
        }
    }
}
?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b><?=siteSetting_title?></b> <?=siteSetting_subtitle?></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Faça o login para iniciar uma sessão</p>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Login" name="log"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Senha" name="pwd"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">    
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Lembrar
                        </label>
                    </div>                        
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" value="logar">Logar</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="#">Esqueci minha senha</a><br>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<script src="<?php echo bloginfo( 'template_url' ) ?>/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<script src="<?php echo bloginfo( 'template_url' ) ?>/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo bloginfo( 'template_url' ) ?>/assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<?php
get_footer( "login" );
