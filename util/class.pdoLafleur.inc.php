<?php
/** 
 * Classe d'accès aux données. 
 * Utilise les services de la classe PDO
 * pour l'application lafleur
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Patrice Grand
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoLafleur
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=pharma';   		
      	private static $user='root' ;    		
      	private static $mdp='root' ;	
		private static $monPdo;
		private static $monPdoLafleur = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoLafleur::$monPdo = new PDO(PdoLafleur::$serveur.';'.PdoLafleur::$bdd, PdoLafleur::$user, PdoLafleur::$mdp); 
			PdoLafleur::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoLafleur::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdolafleur = PdoLafleur::getPdoLafleur();
 * @return l'unique objet de la classe PdoLafleur
 */
	public  static function getPdoLafleur()
	{
		if(PdoLafleur::$monPdoLafleur == null)
		{
			PdoLafleur::$monPdoLafleur= new PdoLafleur();
		}
		return PdoLafleur::$monPdoLafleur;  
	}


	//creation de compte client
	public function createClient($login,$pwd,$nom,$adr,$cp)
	{
		$insert=("insert into userpharma (login,mdp,nom,adresse,code_postal) values ('$login','$pwd','$nom','$adr',$cp) ");
		$res=PdoLafleur::$monPdo->exec($insert);
		var_dump($insert);
		return $res;
	}

	/// login du client
	public function checkClient($login,$pwd)
	{

		$req="select id,count(*) as nbr from userpharma where login='".$login."' and mdp='".$pwd."'";
		$res = PdoLafleur::$monPdo->query($req);
		$logged=$res->fetch();
		
		if($logged['nbr']==1)
		{
			$LoginConfirmation=true;
			$_SESSION['id']=$logged['id'];
			$_SESSION['logged']=true;
		}else
		{
			$LoginConfirmation=false;
		}
		return $LoginConfirmation;

	}
	public function createDemande($date,$debut,$fin,$remarque,$prod)
	{
		@$date = date("Y-m-d", strtotime($date));

		$id=$_SESSION['id'];

		$insert=("insert into demande (date,debut,fin,remarque,idPharma,idProd) values ('$date','$debut','$fin','$remarque',$id,$prod) ");
		$res=PdoLafleur::$monPdo->exec($insert);
		var_dump($insert);

		return $res;
	}
	public function getDemande()
	{
		$id=$_SESSION['id'];

		$req="select * from demande where idPharma=$id ";
		var_dump($req);
		$res=PdoLafleur::$monPdo->query($req);

		return $res;
		
	}
	public function delDemande($id)
	{
		$req="delete from demande where id=$id";
		$res=PdoLafleur::$monPdo->exec($req);

		return $res;
	}
	public function getProduit()
	{
		$req="select * from produit";
		$res=PdoLafleur::$monPdo->query($req);

		return $res;
	}
	public function getDemandeByID($id)
	{
		$req="select * from demande where id=$id ";
		$res=PdoLafleur::$monPdo->query($req);

		return $res;
	}
	public function accepterDemande($id)
	{
		$upd="update demande set status='client ok' where id=$id";
		$res=$res=PdoLafleur::$monPdo->exec($upd);
		return $res;
	}
	public function refuserDemande($id)
	{
		$upd="update demande set status='client pas ok' where id=$id";
		$res=$res=PdoLafleur::$monPdo->exec($upd);
		return $res;
	}
}
?>