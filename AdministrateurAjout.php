<html>
<menu>
<link href="css/AdministrateurAjout.css" rel="stylesheet">
<div id="menu">
  <ul id="onglets">
    <li><a href="Accueil.php"> Accueil </a></li>
	<li><a href="Vous.php"> Vous </a></li>
    <li><a href="Reseau.php"> Reseau </a></li>
    <li><a href="Notif.php"> Notif </a></li>
    <li><a href="Emplois.php"> Emplois </a></li>
	<li class="active"><a href="Administrateur.php"> Gestion des utilisateurs </a></li>
    <li><a href="Connexion.php"> Deconnexion </a></li>
  </ul>
</div>
</menu>
<h1>Ajouter un utilisateur</h1>
	<form method="post" action="AdministrateurAjout.php">
		<h3>Nom</h3>
		<input type="text" name="nom" id=name />
		<h3>Prenom</h3>
		<input type="text" name="prenom" id=prenom />
		<h3>Mail</h3>
		<input type="text" name="mail" id=mail />
		<input type="submit" value="Valider la saisie" >
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
	echo "Utilisateurs actuellement inscrits:<br> ";
	while($data=mysqli_fetch_assoc($res)){
		echo "Utilisateur ".$compteur." : <br>".$data['Nom']."<br>".$data['Prenom']."<br>".$data['Mail']."<br><br>";	
		$compteur=$compteur+1;			
		}
		if ($Nom!=""){
				if($Prenom!=""){	
					if($Mail!=""){
						$sq="INSERT INTO table_utilisateurs(Nom,Prenom,Mail,Photo) VALUES('$Nom','$Prenom','$Mail','NULL')";
						$resultate=mysqli_query($connectique,$sq);
						echo'Utilisateur ajoute';
						$Destination="location.href='AdministrateurAjout.php'";
						echo "<input type='Button' value='Valider l'ajout' Onclick=".$Destination.">";
					}else{echo'Pas de mail.';}
				}else{echo 'Pas de prenom';}
			}else{echo'Pas de nom';}
	}
?>
</html>
