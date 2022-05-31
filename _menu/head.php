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
             <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../connexion/deconnexion.php"><i class="fa fa-fw fa-power-off"></i> Deconnexion </a>
                        </li>
                        
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
               require_once("../_menu/menu.php");
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <u><h2 style="float: right;"><?php echo date('d/m/y  h:i:s');?></h2></u>
                        <h1 class="page-header">
                            <?php echo $var;  ?>
                        </h1>
                    </div>
                    </div>
                <!-- /.row -->
                <div ><center><iframe name="plan" width= 100% height= 800px></iframe></center></div>         
               
            </div>

        </div>

    </div>