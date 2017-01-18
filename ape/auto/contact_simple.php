<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--><?php require ("menu.php");
$viewMenu="contact";
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $metaTitle; ?> | Contact</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
     <div class="main">
		<div class="content-top">
			<div class="wrap">
				<div class="about">
				  <div class="section group">	
					<div class="col1 span_1_of_contact">
						<div class="company_address">
		      				
						    <div class="clear"></div> 	
						</div>
					</div>				
					<div class="col1 span_2_of_contact">
					  <div class="contact-form">
					  	<h3>Nous contacter </h3>
						   
						    	<div>
							    	<span>
							    	<label>T&eacute;l&eacute;phone : </label>
							    	</span>
							    	<span style=" font-weight:bold "><?php echo $telephone;  ?></span>
							    </div>
							    <div>
							    	<span><label>E-Mail : </label></span>
							    	<span style=" font-weight:bold;font-color:#FF9900"><a href="mailto:<?php echo $mail;  ?>" style="color:#FF9900"><?php echo $mail;  ?></a></span>
							    </div>
							    
							  
						</div>
	  				</div>	
  				<div class="clear"></div> 			
			  </div>
			</div>
		</div>
	</div>
	</div>
	<div class="footer">
	
		<?php require("footer.php"); ?>
</div>
</body>
</html>

    	
    	
            