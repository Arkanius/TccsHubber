<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <meta name="description" content="Painel administrativo KNT">
    <meta name="author" content="Victor Gazotti & Igor Veras">

    <link rel="stylesheet" href="{{url('/')}}/assetsadmin/css/bootstrap/bootstrap.css" /> 
    <link rel="stylesheet" href="{{url('/')}}/assetsadmin/css/plugins/calendar/calendar.css" />
    <link rel="stylesheet" href="{{url('/')}}/assetsadmin/css/app/app.v1.css" />
    <link rel="stylesheet" href="{{url('/')}}/assetsadmin/css/project/main.css" />
    <link rel="stylesheet" href="{{url('/')}}/assetsadmin/css/project/layout.css" />
    <link rel="stylesheet" href="{{url('/')}}/assetsadmin/css/jquery.dataTables.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
</head>

<body data-ng-app>
    <aside class="left-panel">
        <div class="user text-center">
            <h4 class="user-name">{{Auth::user()->name}}</h4>
        </div>

        <nav class="navigation">
            <ul class="list-unstyled">
                <li class="has-submenu"><a href="/admin"><i class="fa fa-bookmark-o"></i><span class="nav-label">PENDENTES</span></a></li>
                <li class="has-submenu"><a href="/aprovados"><i class="glyphicon glyphicon-ok"></i> <span class="nav-label">APROVADOS</span></a></li>
                <li class="has-submenu"><a href="/reprovados"><i class="glyphicon glyphicon-ban-circle"></i> <span class="nav-label">REPROVADOS</span></a></li>
                <li class="has-submenu"><a href="/convidar"><i class="fa fa-file-text-o"></i> <span class="nav-label">GERAR TOKEN</span></a></li>
                <li class="has-submenu"><a href="#"><i class="glyphicon glyphicon-pencil"></i> <span class="nav-label">EDITAR OU REMOVER</span></a></li>
                @if (Auth::user()->role == 1) 
                <li class="has-submenu"><a href="/gerenciar-usuarios"><i class="glyphicon glyphicon-user"></i> <span class="nav-label">GERENCIAR USUARIOS</span></a></li>
                <li class="has-submenu"><a href="/gerenciar-cursos"><i class="glyphicon glyphicon-folder-open"></i> <span class="nav-label">GERENCIAR CURSOS</span></a></li>
                @endif
                <li class="has-submenu"><a href="/logout"><i class="glyphicon glyphicon-off"></i> <span class="nav-label">SAIR</span></a></li>
            </ul>
        </nav>

    </aside>
    <!-- Aside Ends-->
    
    <section class="content">

    <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <nav class=" navbar-default hidden-xs" role="navigation"></nav>
            
            <ul class="nav-toolbar">
                <li class="dropdown"><a href="#" data-toggle="dropdown"><i class="fa fa-comments-o"></i> <span class="badge bg-warning">7</span></a>
                    <div class="dropdown-menu md arrow pull-right panel panel-default arrow-top-right messages-dropdown">
                        <div class="panel-heading">Pendências</div>
                        
                        <div class="list-group">                            
                        <a href="#" class="list-group-item">
                            <div class="media">
                                <div class="user-status busy pull-left">
                                    <img class="media-object img-circle pull-left" src="assets/images/avtar/user2.png" alt="user#1" width="40">
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">Trabalho adicionado</h5>
                                    <small class="text-muted">10 minutos atrás</small>
                                </div>
                            </div>
                        </a>                            
                        </div>
                        
                    </div>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu lg pull-right arrow panel panel-default arrow-top-right">
                        <div class="panel-heading">
                            Opções
                        </div>
                        <div class="panel-body text-center">
                            <div class="row">
                                <div class="col-xs-6 col-sm-4"><a href="/editar/{{Auth::user()->id}}" class="text-green"><span class="h2"><i class="fa fa-envelope-o"></i></span><p class="text-gray no-margn">Editar</p></a></div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </header>

    <!-- JQuery v1.9.1 -->
    <script src="{{url('/')}}/assetsadmin/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>

    
    @if(Session::has('message'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
      {{ Session::get('message') }}
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close" onclick="$('.alert').hide()">×</a>
    </div>
    @endif
    

    <!-- / CONTENT AREA -->
    @yield('content')
        
    <footer class="container-fluid footer">
        <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
    </footer>        
    
    </section>

    <script src="{{url('/')}}/assetsadmin/js/plugins/underscore/underscore-min.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/bootstrap/bootstrap.min.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/globalize/globalize.min.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/plugins/DevExpressChartJS/dx.chartjs.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/plugins/DevExpressChartJS/world.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/plugins/DevExpressChartJS/demo-charts.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/plugins/DevExpressChartJS/demo-vectorMap.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/plugins/sparkline/jquery.sparkline.demo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.14/angular.min.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/angular/todo.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/plugins/calendar/calendar.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/plugins/calendar/calendar-conf.js"></script>
    <script src="{{url('/')}}/assetsadmin/js/app/custom.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assetsadmin/js/bootstrap/bootstrap-switch.min" type="text/javascript"></script>
    <script src="{{url('/')}}/assetsadmin/js/jquery-1.12.3.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assetsadmin/js/jquery.dataTables.min.js" type="text/javascript"></script>


</body>
</html>
