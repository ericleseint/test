<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>APE de Verrières - Bourse aux jouets</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

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
                    <h1 class="page-header">Liste (<?php echo $_GET['listeName']; ?>) </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="get" action="saisirVentes.php">
                                        <div class="form-group">
										
										<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Prix</th>
                                            <th>Vendu</th>
                                            <th>% APE</th>
											<th>Perdu</th>
											<th>Net Vendeur</th>
											<th>Bénéfice APE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultat as $k=>$v) { ?>
										<tr>
                                            <td><?php echo $v['CLE_ITEM']; ?> </td>
                                            <td><?php echo $v['PRIX']; ?> € </td>
                                            <td><input type="checkbox" name="vendu[<?php echo $v['CLE_ITEM']; ?>]" value="1" <?php if ($v['VENDU'] == 1) { ?>checked="checked" <?php } ?>></td>
                                            <td><select class="form-control" name="pourcentage[<?php echo $v['CLE_ITEM']; ?>]">
                                                <?php foreach ($pourcentage as $kp=>$vp) { ?>
												<option value="<?php echo $kp; ?>" <?php if ($kp == $v['POURCENTAGE']) { ?> selected="selected" <?php } ?>><?php echo $vp; ?></option>
												<?php } ?>
                                                
                                            </select></td>
											<td><input type="checkbox" name="perdu[<?php echo $v['CLE_ITEM']; ?>]" value="1" <?php if ($v['PERDU'] == 1) { ?>checked="checked" <?php } ?>></td>
											
											<td><?php  echo $v['NETVENDEUR']; ?>&nbsp;€</td>
											
											<td><?php echo $v['BENEFICE_APE'];  ?>&nbsp;€</td>
                                        </tr>
										
										<?php } ?>
										<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td><strong>Total</strong></td>
										<td><?php if (isset($netvente['TOTAL'][$_GET['listeName']]['NETVENDEUR'])) { echo $netvente['TOTAL'][$_GET['listeName']]['NETVENDEUR']; } else { echo "0"; }  ?>&nbsp;€</td>
										<td><?php if (isset($netvente['TOTAL'][$_GET['listeName']]['BENEFICE_APE'])) { echo $netvente['TOTAL'][$_GET['listeName']]['BENEFICE_APE']; } else { echo "0"; }  ?>&nbsp;€</td>
										</tr>
                                        
                                    </tbody>
                                </table>
                            </div>
							
                                            
                                        </div>
										
										<div class="form-group">
                                            <label>Liste Payante</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="listePayante" id="optionsRadios1" value="1" <?php if ($LISTE_PAYANTE != 0) { ?> checked="checked" <?php } ?>>oui
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="listePayante" id="optionsRadios2" value="0" <?php if ($LISTE_PAYANTE == 0) { ?> checked="checked" <?php } ?>>non
                                                </label>
                                            </div>

                                        </div>
										
                                        <button type="submit" class="btn btn-default">Enregistrer les ventes </button>
                                        <input type="hidden" name="listeName" value="<?php echo $_GET['listeName']; ?>"/>
										<input type="hidden" name="validateForm" value="1"/>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h1>&nbsp;</h1>
                              </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
