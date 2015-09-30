<?php
$action = $_REQUEST['action'];
if( (isset($_SESSION['logged'])) && ($_SESSION['logged']==true) )
{
switch($action)
{
	case 'creer':
	{
		$lesProduits=$pdo->getProduit()->fetchAll();
		if(!isset($_POST['co']))
		{	
			include('vues/v_creerReservation.php');
			break;
		}else
		{
			if($pdo->createDemande($_POST['date'],$_POST['debut'],$_POST['fin'],$_POST['remarque'],$_POST['produit']) == false)
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
	
	case 'delDemande':
	{
		if(isset($_POST['delete']))
		{
			if($pdo->delDemande($_POST['id']) == false)
				{
					$message = "La suppression a échoué";
					include ("vues/v_message.php");
					include('vues/v_allReservation.php');
				}else{
					$message = "La suppression a réussit";
					include ("vues/v_message.php");
				}

		}
		$lesDemandes=$pdo->getDemande()->fetchAll();
		include('vues/v_allReservation.php');
		break;
	}

	default:
	{
		$lesDemandes=$pdo->getDemande()->fetchAll();
		include('vues/v_allReservation.php');
		break;
	}

}
}else{
	header('Location: index.php?uc=connec&action=login');
}
?>