<?php
$dbh = new PDO('mysql:host=localhost;dbname=ape', 'root', '', array( PDO::ATTR_PERSISTENT => false));

$pourcentage[25]="25 %";
$pourcentage[20]="20 %";
$pourcentage[10]="10 %";
$pourcentage[0]="0 %";
$nbDefaultItems=20;

$title="Bourse APE";