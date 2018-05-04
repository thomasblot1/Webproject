<html>
<menu>
<link href="css/PublicationAjoutImageVideo.css" rel="stylesheet">
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
<h1>Ajout d'une image ou d'une vidéo</h1>
<fieldset>
<form>
<h3>Titre de l'image (/vidéo) </h3>
<input type="text" name="Nom" id=Description />
<h3>Date de la prise de l'image (/vidéo) </h3>
<input type="date" name="Date" id=Date />
<h3>Description</h3>
<input type="text" name="Description" id=Description />
<h3>Photo à publier (sous forme du chemin de l'image jpg)</h3>
<h5>Ex: PhotoPubli/sarah_bragass.jpg</h5>
<input type="text" name="Photo" id=Photo />
<input type="Submit" value="Soumettre la saisie">
</form>

<?php
$Nom = isset($_POST['Nom'])?$_POST["Nom"]:"";
$Date=isset($_POST['Date'])?$_POST['Date']:"";
$Description = isset($_POST['Description'])?$_POST['Description']:"";
$Photo = isset($_POST['Photo'])?$_POST["Photo"]:"";
$serveur="localhost";
$log="root";
$mdp="";
$bdd="reseausocial";
$connectique=mysqli_connect($serveur,$log,$mdp);
$con=mysqli_select_db($connectique,$bdd);

if(!$connectique){
echo"pb de connection";}
else{
	if ($Nom!=""){
		if($Date!=""){
			if ($Description!=""){
				if ($Photo!=""){
					$sq="INSERT INTO publication(Contenu_texte, Date, chemin, Description, nb_like) VALUES('$Nom','$Date','$Photo','$Description',0)";
					$resultate=mysqli_query($connectique,$sq);
					echo'Evenement ajoute';
					$Destination="location.href='Accueil.php'";
					echo"<input type='Button' value='Publier' Onclick=".$Destination.">";
				}else{echo'Pas de photo.';}
			}else{echo'Pas de description.';}
		}else{echo'Pas de date.';}
	}else{echo'Pas de nom.';}
}

?>

</html>
