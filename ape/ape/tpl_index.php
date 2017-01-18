<?php $active=""; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>APE de Verrières - <?php  echo $title; ?> </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

<?php require("navigation.php"); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php  echo $title; ?> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $nbPers; ?></div>
                                    <div>Dépositaires</div>
                                </div>
                            </div>
                        </div>
                        <a href="alterListe.php">
                            <div class="panel-footer">
                                <span class="pull-left">Voir</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $nbListe; ?></div>
                                    <div>Listes</div>
                                </div>
                            </div>
                        </div>
                        <a href="alterListe.php">
                            <div class="panel-footer">
                                <span class="pull-left">Voir</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo round($PRIX*key($pourcentage)/100); ?> €</div>
                                    <div>Potentiel</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                                <span class="pull-left"><?php echo ($OBJETS); ?> objet(s) /  <?php echo round($PRIX, 0); ?> €</span>
                                
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $BENEFICE_APE; ?></div>
                                    <div>Réalisé</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                                <span class="pull-left">Avec les listes à 2 € : <?php echo ($BENEFICE_APE+2*$ListeA2euros); ?> €</span>
                                <span class="pull-left">Objets vendus : <?php echo ($OBJETSVENDUS); ?> objet(s)</span>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
				<?php if ($listeVendeurInfo) { ?>
				<?php foreach ($listeVendeurInfo as $k=>$v) { ?>
				<div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo utf8_encode($v); ?>
                        </div>
                        <div class="panel-body">
						<?php 
						$TOTAL_NET_VENDEUR=0;
						$DeductionListe=0;
						foreach ($listeVendeur[$k] as $kliste=>$vliste) { 
						$TOTAL_NET_VENDEUR=$TOTAL_NET_VENDEUR+$vliste;
						if ($LISTE_PAYANTE[$kliste] == 1) $DeductionListe=$DeductionListe+2;
						?>
                            <p>
							<?php if ($LISTE_PAYANTE[$kliste] == 1) { ?> <strong> <?php } else { ?><font color=red><?php } ?>
							<?php echo $kliste; ?> 
							<?php if ($LISTE_PAYANTE[$kliste] == 1) { ?> </strong> <?php } else { ?></font><?php } ?>
							: <?php echo $vliste; ?> € </p>
							
							<?php } ?>
                        </div>
                        <div class="panel-footer">Net vendeur (liste déduite)
                            <?php echo ($TOTAL_NET_VENDEUR-$DeductionListe); ?> €
                        </div>
                  </div>
				<?php }} ?><!-- /.panel -->
                    <!-- /.panel -->
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Listes </div>
                        <!-- /.panel-heading -->
                      <div class="panel-body">
                          <div class="list-group">
							<?php if ($netvente) { ?>
							<?php foreach ($netvente['TOTAL'] as $k=>$v) { ?>
                                <a href="saisirVentes.php?listeName=<?php echo $k; ?>" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> <?php echo $k; ?>
                                    <span class="pull-right text-muted small"><em><?php echo $v['NETVENDEUR']; ?> €</em>                                    </span>                                </a>
								<?php }} ?>
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <!-- /.panel -->
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
   

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
