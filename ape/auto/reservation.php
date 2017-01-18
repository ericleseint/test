<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--><?php require ("menu.php");
$viewMenu="reservation";
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $metaTitle; ?> | Réservation</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="header">	
  <div class="wrap"> 
	<div class="header-top">
		 <div class="logo">
			 <h4 style="font-family:bebas_neueregular; font-size: 3em; color:#FFFFFF"><?php echo $generalTitle; ?></h4>
		 </div>
		 <div class="menu">
			<div id="cssmenu">
				<ul>
				    <?php foreach ($menu as $k=>$v) { ?>
				
				 <li <?php if ($viewMenu == $k) { ?>class="active" <?php } ?>><a href="<?php echo $v["url"]; ?>"><span><?php echo $v["title"]; ?></span></a></li>
				<?php } ?>
				</ul>
            </div>
	  </div>	
		  <div class="clear"></div> 
    </div>
  </div>	
</div>
     <div class="main">
		<div class="content-top">
			<div class="wrap">
				<div class="about">
				<div class="col span_1_of_about">
							<h3>Réservation d'emplacement pour le dimanche 5 juin 2016 </h3>
							<div class="about-img">
								<img src="images/alpha.jpg" alt="">
							</div>
							<div class="about-desc">
								<p>Le mètre linaire est à 3€. <br>
								  Pour réserver, veuillez t&eacute;l&eacute;charger l'un des fichiers suivants&nbsp;: <a href="bourseautomotoverrieres2016.pdf" style="color:#FF9900">bourseautomotoverrieres2016.pdf</a> ou <a href="bourseautomotoverrieres2016.docx" style="color:#FF9900">bourseautomotoverrieres2016.docx</a> et le  retourner dûment compl&eacute;t&eacute; &agrave; l&rsquo;adresse suivante&nbsp;:<br />
APE DE VERRIERES, Place de la mairie, 
86410 Verri&egrave;res</p>
				  </div>
							<div class="clear"></div>
				  </div>
					<div class="section group">	
								
					<div class="col1 span_2_of_contact">
					 
	  				</div>	
  				<div class="clear"></div> 			
			  </div>
			</div>
		</div>
	</div>
	</div>
	<div class="footer">
		<?php require("footer.php"); ?></div>
</body>
</html>

    	
    	
            