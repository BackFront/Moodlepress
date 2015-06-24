<!DOCTYPE html>
<?php

$user = wp_get_current_user();
Load( ["Context", "Dashboard", "Message", "Forum", "TemplateView" ] );
$Skin = new Context();
$CFG = new Dashboard();
$Message = new Message();
$Forum = new Forum( $user->ID );
$MainNav = new TemplateView();

$userName = $user->display_name;

#var_dump($Message->updateUserMessageCount());
#var_dump($Skin->getContextSession());
#var_dump( $CFG);

?>
<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ) ?>">

        <title><?php wp_title( '|', true, 'right' ) ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/skins/skin-black.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/skins/skin-green.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/skins/skin-purple.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/skins/skin-red.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/dist/css/skins/skin-yellow.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo bloginfo( 'template_url' ) ?>/assets/icomoon.css" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body <?php body_class( [siteSetting_schemeColor, "fixed" ] ); ?>>
        <div class="wrapper">
            <header class="main-header">

                <!-- Logo -->
                <a href="?exe=home" class="logo"><b><?= siteSetting_title ?></b> <?= siteSetting_subtitle ?></a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success"><?php echo$Message->checkNewMessages() ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">Você tem <?php echo sprintf( _n( '1 nova mensagem', '%s novas mensagens', $Message->checkNewMessages() ), $Message->checkNewMessages() ); ?></li>
                                    <li>
                                        <!-- inner menu: contains the messages -->
                                        <ul class="menu">
                                            <?php inc( "/app/Controller/message/ItemListNavMsg.php" ) ?>                    
                                        </ul><!-- /.menu -->
                                    </li>
                                    <li class="footer"><a href="?exe=mensagens">Ver Todas</a></li>
                                </ul>
                            </li><!-- /.messages-menu -->

                            <!-- Notifications Menu -->
                            <li class="dropdown notifications-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-comments-o"></i>
                                    <span class="label label-info"><?php echo$Forum->checkUpdates() ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">Você tem <?php echo sprintf( _n( '1 nova discussão', '%s novas discussões', $Forum->checkUpdates() ), $Forum->checkUpdates() ); ?> nos Fóruns</li>
                                    <li>
                                        <!-- Inner Menu: contains the notifications -->
                                        <ul class="menu">
                                            <?php inc( "/app/Controller/forum/ItemListNavMsg.php" ) ?>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="?exe=forum">Ver Todas</a></li>
                                </ul>
                            </li>
                            <!-- Tasks Menu -->
                            <li class="dropdown tasks-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-default">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">Últimas Atualizações</li>
                                    <li>
                                        <!-- Inner menu: contains the tasks -->
                                        <ul class="menu">
                                            <li><!-- Task item -->
                                                <a href="#"><h3>#Titulo da Atualização#</h3></a>
                                                <a href="#"><h3>#Atualização 2#</h3></a>
                                            </li><!-- end task item -->                      
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">Ver Todas</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account Menu -->

                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo get_avatar( $user->ID, 160 ); ?>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?php echo$userName ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <?php echo get_avatar( $user->ID, 160 ); ?>
                                        <p>
                                            <?php echo$userName ?>
                                            <small>Perfíl atual: <?php echo$Skin->getContextSession()[ "Name" ] ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <i class="icon-apps"> </i>
                                            <a href="cursos">Cursos</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Matriculados</a>
                                        </div>
                                        <div class="col-xs-4 ">
                                            <a href="#">Finalizados</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat icon-exit" id="btn-edit-profile"> Editar Perfíl</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="?action=logout" class="btn btn-default btn-flat" id="btn-sair"> Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php echo get_avatar( $user->ID, 160 ) ?>

                        </div>
                        <div class="pull-left info">
                            <p><?php echo$userName ?></p>
                            <!-- Status -->
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- search form (Optional) -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Procurar..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <?php

                    $Template = get_template_directory() . "/app/View/nav/sidebarMenu";
                    $MainNav->Load( $Template );

                    if( current_user_can( 'show_nav_100' ) ) :
                        $Template = get_template_directory() . "/app/View/nav/sidebarMenu_100";
                        $MainNavOther->Load( $Template );
                        $Nav_100 = $MainNavOther->getShow( ["a" => null ] );
                    else:
                        $Nav_100 = null;
                    endif;

                    $Datas = [
                        "message_count" => $Message->checkNewMessages(),
                        "nav_100" => $Nav_100
                    ];

                    $MainNav->show( $Datas );

                    ?>
                    <!-- Sidebar Menu -->

                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo$CFG->Title() ?>
                        <small><?php echo$CFG->OptionalDescription() ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <?php $CFG->Breadcrumb() ?>
                    </ol>
                </section>
                <div class="menssages-area">
                    <?php

                    $msga = [
                        "type" => "default",
                        "head" => "Foram adicionadas novas resoluções",
                        "body" => "A nova resolução do <i>Acessa Escola</i> foi adicionada em Resoluções. <a href=\"#\">Clique para acessar</a>"
                    ];
                    Load( ["Alert" ] );
                    $msg = new Alert;

                    #$msg->PHPErro( $msga ); 

                    ?>
                </div>
                <section class="content">
                    <div class="container-fluid">
