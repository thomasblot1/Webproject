<html>
<menu>
<link href="css/PublicationSuppression.css" rel="stylesheet">
<div id="menu">
  <ul id="onglets">
    <li><a href="Accueil.php"> Accueil </a></li>
	<li class="active"><a href="Vous.php"> Vous </a></li>
    <li><a href="Reseau.php"> Reseau </a></li>
    <li><a href="Notif.php"> Notif </a></li>
    <li><a href="Emplois.php"> Emplois </a></li>
    <li><a href="AdministrateurTest.php"> Gestion des utilisateurs </a></li>
    <li><a href="Connexion.php"> Deconnexion </a></li>
  </ul>
</div>
</menu>

<form method="post" action="JobSuppression.php">
	<h3>Veuillez entrer le nom du poste de la demande a supprimer: </h3>
	<input type="text" name="nom" id=nom />
	<h3>Entrez maintenant le numero lie a la demande:</h3>
	<input type="number" min="1" name="number" id=number />
	<input type="submit" value="Valider la saisie">
</form>

<?php
$serveur="localhost";
$log="root";
$mdp="";
$bdd="reseausocial";
$connectique=mysqli_connect($serveur,$log,$mdp);
$con=mysqli_select_db($connectique,$bdd);
$Nom=isset($_POST['nom'])?$_POST['nom']:"";
$ID=isset($_POST['number'])?$_POST['number']:"";

if(!$connectique){
echo"pb de connection";}
else{
	//on construit la requête
	$sql="SELECT * FROM table_job;";
	//on envoie la requête et récupère la table résultat
	$res=mysqli_query($connectique,$sql);
	//on traite le résultat
	//ex:boucle pr parcourir chaque ligne
	echo "Emplois proposés: <br> ";
	while($data=mysqli_fetch_assoc($res)){
		echo "Emploi ".$data['ID_job'].": <br>"."Nom du poste associé: ".$data['Nom_job']."<br>";
		if(($data['ID_job']==$ID)&&($data['Nom_job']==$Nom)){
			if ($Nom!=""){
				//Supprime la ligne
				$sql1="DELETE FROM table_job WHERE ((table_job.Nom_job='$Nom')AND(table_job.ID_job='$ID'));";
				$res1=mysqli_query($connectique,$sql1);
				echo "Poste supprimé.";
				$destination="location.href='Emplois.php'";
				echo "<input type='button' value='Confirmer la suppression.' Onclick=".$destination.">";
				}else{echo'Nom vide';}
			}
		}
	}
?>
</html>
