<html>
<menu>
<link href="css/AdministrateurSuppression.css" rel="stylesheet">
<div id="menu">
  <ul id="onglets">
    <li><a href="Accueil.php"> Accueil </a></li>
	<li><a href="Vous.php"> Vous </a></li>
    <li><a href="Reseau.php"> Reseau </a></li>
    <li><a href="Notif.php"> Notif </a></li>
    <li><a href="Emplois.php"> Emplois </a></li>
	<li class="active"> <a href="Administrateur.php"> Gestion des utilisateurs </a></li>
    <li><a href="Connexion.php"> Deconnexion </a></li>
  </ul>
</div>
</menu>
<h1>Supprimer un utilisateur</h1>
	<form method="post" action="AdministrateurSuppression.php">
		<h3>Nom</h3>
		<input type="text" name="nom" id=nom />
		<h3>Prenom</h3>
		<input type="text" name="prenom" id=prenom />
		<h3>Mail</h3>
		<input type="text" name="mail" id=mail />
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
$Prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
$Mail=isset($_POST['mail'])?$_POST['mail']:"";
$compteur=1;

if(!$connectique){
echo"pb de connection";}
else{
	//on construit la requête
	$sql="SELECT * FROM table_utilisateurs;";
	//on envoie la requête et récupère la table résultat
	$res=mysqli_query($connectique,$sql);
	//on traite le résultat
	//ex:boucle pr parcourir chaque ligne
	echo "Utilisateurs actuellement inscrits: ";
	while($data=mysqli_fetch_assoc($res)){
		echo "Utilisateur ".$compteur." : <br>".$data['Nom']."<br>".$data['Prenom']."<br>".$data['Mail']."<br><br>";
		if(($data['Nom']==$Nom)&&($data['Prenom']==$Prenom)&&($data['Mail']==$Mail)){
			if ($Nom!=""){
				if($Prenom!=""){	
					if($Mail!=""){
						//Supprime la ligne
						$sql1="DELETE FROM table_utilisateurs WHERE ((table_utilisateurs.Nom='$Nom')AND(table_utilisateurs.Prenom='$Prenom')AND(table_utilisateurs.Mail='$Mail'));";
						$res1=mysqli_query($connectique,$sql1);
						echo "Utilisaeur supprimé.";
						$destination="location.href='AdministrateurSuppression.php'";
						echo "<input type='button' value='Valider la suppression' Onclick=".$destination.">";
					}else{echo'Pas de mail.';}
				}else{echo 'Pas de prenom';}
			}else{echo'Pas de nom';}
		}
		$compteur=$compteur+1;
	}
}
?>
</html>
