<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php require ("menu.php");
$viewMenu="localisation";
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $metaTitle; ?> | Localisation</title>
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
					<div class="map">
					   	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44021.85980449018!2d0.563016000265139!3d46.40179365537609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fdcc583dda2389%3A0xf480eef293361dff!2sVerri%C3%A8res!5e0!3m2!1sfr!2sfr!4v1446652229003" width="1024" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>	
					
					
					<div class="col span_1_of_about">
							<h3>Dimanche 5 juin 2016 </h3>
							<div class="about-img">
								<img src="images/spitfire.jpg" alt="">
							</div>
							<div class="about-desc">
								<p><span style="color:grey">Entr&eacute;e libre de 9h &agrave; 18h le Dimanche 5 juin 2016.<br />
Restauration sur place</span></p>
					  </div>
							<div class="clear"></div>
				  </div>
					<div class="col span_1_of_about1">
						<h3>Adresse</h3>
						
						<ul class="comments-custom unstyled">			
					      <li class="comments-custom_li">
								<div class="icon"></div>
								<div class="right-text">	
									<h4 class="comments-custom_h">Stade de la garenne <br>

86410 <br>

Verrières</h4>
										
								</div>
								<div class="clear"></div>
						  </li>
												</ul>
				</div>
					<div class="clear"></div>
				
							
				<div class="section group">
				  <div class="clear"></div> 			
			  </div>
			</div>
		</div>
	</div>
	</div>
<div class="footer"><?php require("footer.php"); ?></div>
</body>
</html>

    	
    	
            