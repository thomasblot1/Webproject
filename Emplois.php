<html>
<menu>
<link href="css/Emplois.css" rel="stylesheet">
<div id="menu">
  <ul id="onglets">
    <li><a href="Accueil.php"> Accueil </a></li>
	<li><a href="Vous.php"> Vous </a></li>
    <li><a href="Reseau.php"> Reseau </a></li>
    <li><a href="Notif.php"> Notif </a></li>
    <li class="active"><a href="Emplois.php"> Emplois </a></li>
    <li><a href="AdministrateurTest.php"> Gestion des utilisateurs </a></li>
    <li><a href="Connexion.php"> Deconnexion </a></li>
  </ul>
</div>
</menu>

<body>
<?php
echo'<h1>Emplois</h1>';
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
	$sq="SELECT * FROM table_job";
	$resultate=mysqli_query($connectique,$sq);$compteur=1;
while($tab=mysqli_fetch_assoc($resultate)){	
			
			echo'
			<fieldset style= "width:400px;padding:20px;margin:0;">
			
		<legend>Job '.$compteur.' : </legend>'.
		'Nom:'.$tab['Nom_job'].'
		</br>Type de contact:'.$tab['type_de_contrat'].
		"</br>Proposé par l'entreprise :".$tab['Entreprise'].'</br>'.
		'Description:'.$tab['Descriptif'].'  
		</fieldset>';$compteur=$compteur+1;
		
	}	
}
?>
</body>
</html>



