<?php
session_start();
require_once("util/fonctions.inc.php");
require_once("util/class.pdoLafleur.inc.php");
include("vues/v_entete.php") ;
include("vues/v_bandeau.php") ;

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

$pdo = PdoLafleur::getPdoLafleur();	 
switch($uc)
{
	case 'accueil':
		{include("vues/v_accueil.php");break;}
	case 'reserv' :
		{include("controleurs/c_reservation.php");break;}
///// ajout du controle/////
	 case 'connec':
	 {
	 	include("controleurs/c_connection.php");break;
	 }
/////fin d' ajout du controle/////
}
include("vues/v_pied.php") ;
?>

