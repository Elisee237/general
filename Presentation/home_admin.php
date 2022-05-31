
<!DOCTYPE html>
<html lang="en">0

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion personnel</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Gestion du personnel </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  Administrateur <b class="caret"></b></a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="home_admin.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></i> Acceuil </a>
                    </li>
                    <li>
                        <a href=""><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Liste des Employes </a>
                    </li>
                    <li>
                        <a href=""><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Ajouter un employe </a>
                    </li>
                    <li>
                        <a href=""><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Mutations </a>
                    </li>
                     <li>
                        <a href=""><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Sanctions </a>
                    </li>
                    <li>
                        <a href=""><span class="glyphicon glyphicon-record" aria-hidden="true"></span> Avancements </a>
                    </li>
                    <li>
                        <a href=""><span class="fa fa-user" aria-hidden="true"></span> Gestion des Utilisateurs </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <u><h2 style="float: right;"><?php echo date('d/m/y  h:i:s');?></h2></u>
                        <h1 class="page-header">
                            BIENVENUE SUR LA PAGE 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-home"></i> ACCEUIL
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div id="order"></div>         
               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
