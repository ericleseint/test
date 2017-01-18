<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php require ("menu2.php");
$viewMenu="accueil";
 ?>
<!DOCTYPE HTML>
<html xmlns:og="http://ogp.me/ns#">
<head>
<title><?php echo $metaTitle; ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--slider-->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56d4862d90088518"></script>

<meta property= "og:title" content= "Bourse auto moto - 5 juin 2016 - Verrières (86410)"/>
<meta property= "og:type" content= "article"/>
<meta property= "og:url" content= "http://www.bourseautoverrieres.fr/"/>
<meta property= "og:image" content= "http://www.bourseautoverrieres.fr/images/flyerhead.png"/>
<meta property= "og:description" content= "A l’occasion du passage de nombreux véhicules d’exception le dimanche 5 juin dans notre village, nous proposons de mettre en relation vendeurs, acheteurs et passionnés de vieilles mécaniques, de jouets miniatures, de tout objet en relation avec des véhicules d’époque."/>
<meta property= "og:site_name" content= "www.bourseautoverrieres.fr"/>
</head>

<body>
<div class="header">	
  <div class="wrap"> 
	<div class="header-top">
		 <div class="logo"><h4 style="font-family:bebas_neueregular; font-size: 3em; color:#FFFFFF"><?php echo $generalTitle; ?></h4></div>
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
     <div class="content-middle">
			<div class="wrap">
				<div class="section group example">
							<div class="col_1_of_2">
						<p class="title1">5 juin 2016 </p>
					    <p class="title2">Stade de la garenne</p>
						<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>
					 	</div>
					<div class="clear"></div> 
			    </div>
		    </div>
		</div> <!------ Slider ------------>
		  <div class="slider">
	      	<div class="slider-wrapper theme-default">
	            <div id="slider" class="nivoSlider">
	            
	            <?php foreach ($slider as $k=>$v) { ?>
	                <img src="images/<?php  echo $v; ?>" alt="" />
	              <?php  } ?>
	                
					
	                
	            </div>
	        </div>
   		</div>
		<!------End Slider ------------>
<div class="main">
		<div class="content-top">
			<div class="wrap">
				<div class="section group">
				<div class="col_1_of_3 span_1_of_3">
					<div class="thumb-pad2">
	                    <div class="thumbnail">
	                        <h4>Qui sommes nous ? </h4>
	                        <figure><img src="images/alpine.jpg" alt=""><em class="sp1"></em></figure>
	                        <div class="caption">
	                            <p>L&rsquo;APE de Verri&egrave;res est une association &agrave; but non lucratif  dont le principal objectif est de financer les projets de l&rsquo;&eacute;cole publique et  la&iuml;que de Verri&egrave;res.</p>
	                            <p>&nbsp;</p>
	                        </div>
	                    </div>
                	</div>
				</div>
				<div class="col_1_of_3 span_1_of_3">
					<div class="thumb-pad2">
	                    <div class="thumbnail">
	                        <h4>Que proposons nous ? </h4>
	                        <figure><img src="images/roue.jpg" alt=""><em class="sp1"></em></figure>
	                        <div class="caption">
	                            <p>A l&rsquo;occasion du passage de nombreux v&eacute;hicules d&rsquo;exception le  dimanche 5 juin dans notre village, nous proposons de mettre en relation  vendeurs, acheteurs et passionn&eacute;s de vieilles m&eacute;caniques, de jouets miniatures,  de tout objet en relation avec des v&eacute;hicules d&rsquo;&eacute;poque.</p>
	                            
	                        </div>
	                    </div>
	                </div>
				</div>
				<div class="col_1_of_3 span_1_of_3">
					<div class="thumb-pad2">
	                    <div class="thumbnail">
	                        <h4>Contactez Nous </h4>
	                        <figure><img src="images/72467-Renault-Clio-Williams-8.jpg" alt=""><em class="sp1"></em></figure>
	                        <div class="caption">
	                            <p>Pour de plus amples informations, n'hésitez pas à nous contacter par mail ou par téléphone.</p>
	                           
	                        </div>
	                    </div>
                    </div>
				</div>
				<div class="clear"></div> 
				<div class="content-bottom">
			<div class="wrap">
				<p class="title3">Marché artisanal et gourmand semi-nocturne dans le bourg </p>
				<div class="section group">
				<div class="lsidebar span_1_of_bottom">
					<div class="thumb-pad4">
	                    <div class="thumbnail">
	                     	<figure><img src="images/bolt.png" alt=""/><em class="sp1"></em></figure>
	                    </div>
                    </div>
				</div>
				<div class="cont span_2_of_bottom">
				      <p>Le samedi soir la municipalité de verrières organise un marché artisanal et gourmand semi-nocturne dans le bourg. Profitez-en !</p>
				      <p>Vous pouvez également consulter l'ensemble des manifestions proposées à Verrières en consultant cette page. </p>
				      <a href="http://www.verrieres-vienne.fr/images/pdf/2016%20-%20Calendrier%20des%20F%C3%AAtes.pdf" class="btn2">Calendrier des manifestations</a>				</div>	
				<div class="clear"></div> 			
		       </div>
			</div>
		</div>
			</div>
			</div>
		</div>
</div>
	<div class="footer"><?php require("footer.php"); ?></div>
</body>
</html>

    	
    	
            