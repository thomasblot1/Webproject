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

<form method="post" action="PublicationSuppression.php">
	<h3>Veuillez entrer le nom de la publication à supprimer.</h3>
	<input type="text" name="nom" id=nom />
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

if(!$connectique){
echo"pb de connection";}
else{
	//on construit la requête
	$sql="SELECT Contenu_texte FROM publication;";
	//on envoie la requête et récupère la table résultat
	$res=mysqli_query($connectique,$sql);
	//on traite le résultat
	//ex:boucle pr parcourir chaque ligne
	echo "Evenements: ";
	while($data=mysqli_fetch_assoc($res)){
		echo $data['Contenu_texte'].'<br>';
		if($data['Contenu_texte']==$Nom){
			if ($Nom!=""){
				//Supprime la ligne
				$sql1="DELETE FROM publication WHERE publication.Contenu_texte='$Nom';";
				$res1=mysqli_query($connectique,$sql1);
				echo "Evénement supprimé.";
				$destination="location.href='PublicationSuppression.php'";
				echo "<input type='button' value='Verifiez' Onclick=".$destination.">";
				}else{echo'Pas de nom correspondant.';}
			}
		}
	
	}
?>
</html>
