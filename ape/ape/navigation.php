        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">APE Verri&egrave;res</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                  
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                          <!-- /input-group -->
</li>
                        <li>
                            <a <?php if($active == "addliste") { ?>class="active"<?php } ?> href="addListe.php"><i class="fa fa-dashboard fa-fw"></i> Ajouter une liste</a>                        </li>
						 <li>
                            <a <?php if($active == "alterliste") { ?>class="active"<?php } ?> href="alterListe.php"><i class="fa fa-dashboard fa-fw"></i> Modifier une liste</a>                        </li>
						<li>
                            <a <?php if($active == "saisirventes") { ?>class="active"<?php } ?> href="saisirVentes.php"><i class="fa fa-dashboard fa-fw"></i> Saisir les ventes</a>                        </li>
                        <li>
                          <!-- /.nav-second-level -->
</li>
                  </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>