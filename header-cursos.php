<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?php bloginfo('charset') ?>">
        <title><?php wp_title('|', true, 'right') ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo bloginfo('template_url') ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            body {
                padding-top: 50px;
            }
        </style>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><b>Open</b> Code</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Cursos</a></li>
                        <li><a href="#about">Categorias</a></li>
                        <li><a href="#contact">Contato</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <style>
            .agroup-bg {
                width: 100%;
                height: 500px;
                position: relative;
                color: #fff;
                text-align: center;
            }
            .grid {
                padding-top: 130px;
                top:0;
                right:0;
                bottom:0;
                left:0;
                position: absolute;
                z-index: 1;
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAYAAAAGCAYAAADgzO9IAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpDQjA3NDQ3MkZGN0NFMDExQTBCNTk3RDhBMkUyQjYwQyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoyREEwODIwRTdEMDAxMUUwQjcyRkVBRDI4Q0NBRkM3OCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoyREEwODIwRDdEMDAxMUUwQjcyRkVBRDI4Q0NBRkM3OCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDQzA3NDQ3MkZGN0NFMDExQTBCNTk3RDhBMkUyQjYwQyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDQjA3NDQ3MkZGN0NFMDExQTBCNTk3RDhBMkUyQjYwQyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PqjM714AAAAkSURBVHjaYmZgYPgPxF+A+BgyzQgkihlwgP9QSRSaijoAAgwAWp0Pc4LOdEAAAAAASUVORK5CYII=) repeat;
            }
            #video_container {
                bottom: 0;
                left: 0;
                position: absolute;
                top: 0;
                width: 100%;
                background: url(polina.jpg) no-repeat;
                min-height: 500px;
                z-index: -10;
            }
            #bgvid {
                min-width: 100%;
            }
        </style>
        <div class="agroup-bg">
            <div class="grid">

                <h1><b>Open</b> Code</h1>
                <h3>"A arte de programar consiste em organizar e dominar a complexidade."</h3>
                <p style="margin-top:70px;">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Aprender</a>
                    -ou -
                    <a class="btn btn-primary btn-lg" href="#" role="button">Ensinar</a>
                </p>

            </div>
            <div id="video_container" style="overflow:hidden; background-size:cover;">
                <video autoplay loop id="bgvid">
                    <source src="<?php echo bloginfo('template_url') ?>/assets/video/bg.webm" type="video/webm">
                    <source src="<?php echo bloginfo('template_url') ?>/assets/video/bg.mp4" type="video/mp4">
                </video>
            </div>
        </div>



        <div class="container">