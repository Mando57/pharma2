<?php
$action = $_REQUEST['action'];

switch($action)
{
	case 'login':
	{
		if( (isset($_POST['login'])) && (isset($_POST['pwd'])) ) 
		{
			if(isset($_POST['creer']))
			{

				if($pdo->createClient($_POST['login'],$_POST['pwd']) == false)
				{
					$message = "La creation a échoué";
					include ("vues/v_message.php");
				}else{
					$message = "La creation a réussit";
					include ("vues/v_message.php");
				}break;

			}else{
				if($pdo->checkClient($_POST['login'],$_POST['pwd']) == false)
				{
					$message = "La Connection a échoué";
					include ("vues/v_message.php");
				}else{
					$message = "La Connection a réussit";
					include ("vues/v_message.php");
				}break;

			}
		}
		if(!isset($_SESSION['logged']))
		{
			include('vues/v_login.php');
		}
		



		break;	
	}
	case 'create':
	{
		if(!isset($_POST['co']))
			{
				include('vues/v_creation.php');
			}else
			{
				if($pdo->createClient($_POST['login'],$_POST['pwd'],$_POST['nom'],$_POST['adr'],$_POST['cp']) == false)
				{
					$message = "La creation a échoué";
					include ("vues/v_message.php");
				}else{
					$message = "La creation a réussit";
					include ("vues/v_message.php");
				}break;
			}
		break;
	}

}
?>