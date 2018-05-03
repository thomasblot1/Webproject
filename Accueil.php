<html>

<menu>
<link href="css/Reseau.css" rel="stylesheet">
<div id="menu">
  <ul id="onglets">
    <li class="active"><a href="Accueil.php"> Accueil </a></li>
	<li><a href="Vous.php"> Vous </a></li>
    <li><a href="Reseau.php"> Reseau </a></li>
    <li><a href="Notif.php"> Notif </a></li>
    <li><a href="Emplois.php"> Emplois </a></li>
    <li><a href="Connexion.php"> Deconnexion </a></li>
  </ul>
</div>
</menu>

<?php
echo'<h1>Accueil</h1>';
$serveur="localhost";
$log="root";
$compteur=1;
$mdp="";
$bdd="reseausocial";
$connectique=mysqli_connect($serveur,$log,$mdp);
$con=mysqli_select_db($connectique,$bdd);
if(!$connectique)
	echo"pb de connection";
else{
	$sq="SELECT * FROM publication ORDER BY Date DESC";
	$resultate=mysqli_query($connectique,$sq);$compteur=1;
while($tab=mysqli_fetch_assoc($resultate)){	
			
			echo'<fieldset>
			
		<legend>Event'.$compteur.'</legend>'.$tab['Date'].'
		</br><img src="'.$tab['chemin'].'" alt="photo" height="500" width="500">
		<h4>Description</h4>'.$tab['Contenu_texte'].'</br>'.'</br>'.'
		<input type="button" value="Like">
		<input type="button" value="Share"></br>
		'.$tab['nb_like'].'
		</fieldset>';$compteur=$compteur+1;
		
	}	
}

?>

</html>
