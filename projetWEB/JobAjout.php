<html>

<menu>
<link href="css/PublicationAjoutEvent.css" rel="stylesheet">
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
	
<h1>Ajout d'une offre d'emploi</h1>

<form method="post" action="JobAjout.php">
<h3>Nom du poste: </h3>
<input type="text" name="Nom" id=Nom />
<h3>Type de contrat: </h3>
<input type="text" name="TypeContrat" id=TypeContrat />
<h3>Nom de l'entreprise: </h3>
<input type="text" name="Entreprise" id=Entreprise />
<h3>Description du poste: </h3>
<input type="text" name="Description" id=Description />
<input type="Submit" value="Soumettre la saisie">
</form>


<?php
$Nom = isset($_POST['Nom'])?$_POST["Nom"]:"";
$TypeContrat=isset($_POST['TypeContrat'])?$_POST['TypeContrat']:"";
$Description= isset($_POST['Description'])?$_POST['Description']:"";
$Entreprise = isset($_POST['Entreprise'])?$_POST['Entreprise']:"";
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
		if($TypeContrat!=""){
			if ($Description!=""){
				if ($Entreprise!=""){
					$sq="INSERT INTO table_job(Nom_job, Entreprise, Descriptif, type_de_contrat) VALUES('$Nom','$Entreprise','$Description','$TypeContrat');";
					$resultate=mysqli_query($connectique,$sq);
					echo"Demande d'emploi ajoutee";
					$Destination="location.href='Emplois.php'";
					echo"<input type='Button' value='Publier' Onclick=".$Destination.">";
				}else{echo"Pas de nom d'entreprise.";}
			}else{echo'Pas de description.';}
		}else{echo'Pas de type de contrat.';}
	}else{echo'Pas de nom.';}
}

?>

</html>