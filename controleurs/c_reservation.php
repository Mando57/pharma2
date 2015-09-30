<?php
$action = $_REQUEST['action'];
if( (isset($_SESSION['logged'])) && ($_SESSION['logged']==true) )
{
switch($action)
{
	case 'creer':
	{
		if(!isset($_POST['co']))
		{	
			include('vues/v_creerReservation.php');
			break;
		}else
		{
			if($pdo->createDemande($_POST['date'],$_POST['debut'],$_POST['fin'],$_POST['remarque']) == false)
				{
					$message = "La creation a échoué";
					include ("vues/v_message.php");
					include('vues/v_creerReservation.php');
				}else{
					$message = "La creation a réussit";
					include ("vues/v_message.php");
				}break;
		}
	}
	
	default:
	{
		/*include('vues/v_allReservation.php');
		break;*/
	}

}
}else{
	header('Location: index.php?uc=connec&action=login');
}
?>