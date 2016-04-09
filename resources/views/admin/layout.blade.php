<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <meta name="description" content="Painel administrativo KNT">
    <meta name="author" content="Victor Gazotti & Igor Veras">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assetsadmin/css/bootstrap/bootstrap.css" /> 

    <!-- Calendar Styling  -->
    <link rel="stylesheet" href="assetsadmin/css/plugins/calendar/calendar.css" />

    <!-- Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>

    <!-- Base Styling  -->
    <link rel="stylesheet" href="assetsadmin/css/app/app.v1.css" />

</head>
<body data-ng-app>

    <aside class="left-panel">
        <div class="user text-center">
            <img src="assetsadmin/images/avtar/user.png" class="img-circle" alt="..." width="200" height="50">
        </div>

        <nav class="navigation">
            <ul class="list-unstyled">
                <li class="active"><a href="#"><i class="fa fa-bookmark-o"></i><span class="nav-label">PENDENTES</span></a></li>
                <li class="has-submenu"><a href="#"><i class="glyphicon glyphicon-ok"></i> <span class="nav-label">APROVADOS</span></a></li>
                <li class="has-submenu"><a href="#"><i class="glyphicon glyphicon-ban-circle"></i> <span class="nav-label">REPROVADOS</span></a></li>
                <li class="has-submenu"><a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">GERAR TOKEN</span></a></li>
                <li class="has-submenu"><a href="#"><i class="glyphicon glyphicon-pencil"></i> <span class="nav-label">EDITAR OU REMOVER</span></a></li>
                <li class="has-submenu"><a href="#"><i class="glyphicon glyphicon-off"></i> <span class="nav-label">SAIR</span></a></li>
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
            
            <form role="search" class="navbar-left app-search pull-left hidden-xs">
              <input type="text" placeholder="Enter keywords..." class="form-control form-control-circle">
            </form>
            
            <nav class=" navbar-default hidden-xs" role="navigation">
                <ul class="nav navbar-nav">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <span class="caret"></span></a>
                  <ul role="menu" class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
            
            <ul class="nav-toolbar">
                <li class="dropdown"><a href="#" data-toggle="dropdown"><i class="fa fa-comments-o"></i> <span class="badge bg-warning">7</span></a>
                    <div class="dropdown-menu md arrow pull-right panel panel-default arrow-top-right messages-dropdown">
                        <div class="panel-heading">
                        Messages
                        </div>
                        
                        <div class="list-group">
                            
                            <a href="#" class="list-group-item">
                            <div class="media">
                              <div class="user-status busy pull-left">
                              <img class="media-object img-circle pull-left" src="assets/images/avtar/user2.png" alt="user#1" width="40">
                              </div>
                              <div class="media-body">
                                <h5 class="media-heading">Lorem ipsum dolor sit consect....</h5>
                                <small class="text-muted">23 Sec ago</small>
                              </div>
                            </div>
                            </a>
                            <a href="#" class="list-group-item">
                            <div class="media">
                              <div class="user-status offline pull-left">
                              <img class="media-object img-circle pull-left" src="assets/images/avtar/user3.png" alt="user#1" width="40">
                              </div>
                              <div class="media-body">
                                <h5 class="media-heading">Nunc elementum, enim vitae</h5>
                                <small class="text-muted">23 Sec ago</small>
                              </div>
                            </div>
                            </a>
                            <a href="#" class="list-group-item">
                            <div class="media">
                              <div class="user-status invisibled pull-left">
                              <img class="media-object img-circle pull-left" src="assets/images/avtar/user4.png" alt="user#1" width="40">
                              </div>
                              <div class="media-body">
                                <h5 class="media-heading">Praesent lacinia, arcu eget</h5>
                                <small class="text-muted">23 Sec ago</small>
                              </div>
                            </div>
                            </a>
                            <a href="#" class="list-group-item">
                            <div class="media">
                              <div class="user-status online pull-left">
                              <img class="media-object img-circle pull-left" src="assets/images/avtar/user5.png" alt="user#1" width="40">
                              </div>
                              <div class="media-body">
                                <h5 class="media-heading">In mollis blandit tempor.</h5>
                                <small class="text-muted">23 Sec ago</small>
                              </div>
                            </div>
                            </a>
                            
                            <a href="#" class="btn btn-info btn-flat btn-block">View All Messages</a>

                        </div>
                        
                    </div>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown"><i class="fa fa-bell-o"></i><span class="badge">3</span></a>
                    <div class="dropdown-menu arrow pull-right md panel panel-default arrow-top-right notifications">
                        <div class="panel-heading">
                        Notification
                        </div>
                        
                        <div class="list-group">
                            
                            <a href="#" class="list-group-item">
                            <p>Installing App v1.2.1<small class="pull-right text-muted">45% Done</small></p>
                            <div class="progress progress-xs no-margn progress-striped active">
                              <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                <span class="sr-only">45% Complete</span>
                              </div>
                            </div>
                            </a>
                            
                            <a href="#" class="list-group-item">
                            Fusce dapibus molestie tincidunt. Quisque facilisis libero eget justo iaculis
                            </a>
                            
                            <a href="#" class="list-group-item">
                            <p>Server Status</p>
                            <div class="progress progress-xs no-margn">
                              <div class="progress-bar progress-bar-success" style="width: 35%">
                                <span class="sr-only">35% Complete (success)</span>
                              </div>
                              <div class="progress-bar progress-bar-warning" style="width: 20%">
                                <span class="sr-only">20% Complete (warning)</span>
                              </div>
                              <div class="progress-bar progress-bar-danger" style="width: 10%">
                                <span class="sr-only">10% Complete (danger)</span>
                              </div>
                            </div>
                            </a>
                            
                            
                            
                            <a href="#" class="list-group-item">
                            <div class="media">
                              <span class="label label-danger media-object img-circle pull-left">Danger</span>
                              <div class="media-body">
                                <h5 class="media-heading">Lorem ipsum dolor sit consect..</h5>
                              </div>
                            </div>
                            </a>
                            
                            
                            <a href="#" class="list-group-item">
                            <p>Server Status</p>
                            <div class="progress progress-xs no-margn">
                              <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-info">
                                <span class="sr-only">60% Complete (warning)</span>
                              </div>
                            </div>
                            </a>
                            

                        </div>
                        
                    </div>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu lg pull-right arrow panel panel-default arrow-top-right">
                        <div class="panel-heading">
                            More Apps
                        </div>
                        <div class="panel-body text-center">
                            <div class="row">
                                <div class="col-xs-6 col-sm-4"><a href="#" class="text-green"><span class="h2"><i class="fa fa-envelope-o"></i></span><p class="text-gray no-margn">Messages</p></a></div>
                                <div class="col-xs-6 col-sm-4"><a href="#" class="text-purple"><span class="h2"><i class="fa fa-calendar-o"></i></span><p class="text-gray no-margn">Events</p></a></div>
                                
                                <div class="col-xs-12 visible-xs-block"><hr></div>
                                
                                <div class="col-xs-6 col-sm-4"><a href="#" class="text-red"><span class="h2"><i class="fa fa-comments-o"></i></span><p class="text-gray no-margn">Chatting</p></a></div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12  hidden-xs"><hr></div>
                            
                                <div class="col-xs-6 col-sm-4"><a href="#" class="text-yellow"><span class="h2"><i class="fa fa-folder-open-o"></i></span><p class="text-gray">Folders</p></a></div>
                                
                                <div class="col-xs-12 visible-xs-block"><hr></div>
                                
                                <div class="col-xs-6 col-sm-4"><a href="#" class="text-primary"><span class="h2"><i class="fa fa-flag-o"></i></span><p class="text-gray">Task</p></a></div>
                                <div class="col-xs-6 col-sm-4"><a href="#" class="text-info"><span class="h2"><i class="fa fa-star-o"></i></span><p class="text-gray">Favorites</p></a></div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
        <!-- / CONTENT AREA -->
        @yield('content')
        
        <footer class="container-fluid footer">
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>        
    
    </section>
    <!-- Content Block Ends Here (right box)-->

    <!-- JQuery v1.9.1 -->
    <script src="assetsadmin/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="assetsadmin/js/plugins/underscore/underscore-min.js"></script>
    <!-- Bootstrap -->
    <script src="assetsadmin/js/bootstrap/bootstrap.min.js"></script>

    <!-- Globalize -->
    <script src="assetsadmin/js/globalize/globalize.min.js"></script>

    <!-- NanoScroll -->
    <script src="assetsadmin/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>

    <!-- Chart JS -->
    <script src="assetsadmin/js/plugins/DevExpressChartJS/dx.chartjs.js"></script>
    <script src="assetsadmin/js/plugins/DevExpressChartJS/world.js"></script>
    <!-- For Demo Charts -->
    <script src="assetsadmin/js/plugins/DevExpressChartJS/demo-charts.js"></script>
    <script src="assetsadmin/js/plugins/DevExpressChartJS/demo-vectorMap.js"></script>

    <!-- Sparkline JS -->
    <script src="assetsadmin/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- For Demo Sparkline -->
    <script src="assetsadmin/js/plugins/sparkline/jquery.sparkline.demo.js"></script>

    <!-- Angular JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.14/angular.min.js"></script>
    <!-- ToDo List Plugin -->
    <script src="assetsadmin/js/angular/todo.js"></script>

    <!-- Calendar JS -->
    <script src="assetsadmin/js/plugins/calendar/calendar.js"></script>
    <!-- Calendar Conf -->
    <script src="assetsadmin/js/plugins/calendar/calendar-conf.js"></script>

    <!-- Custom JQuery -->
    <script src="assetsadmin/js/app/custom.js" type="text/javascript"></script>

</body>
</html>