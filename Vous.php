<html>
<header>
	<menu>
	<link href="css/Vous.css" rel="stylesheet">
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
</header>
<?php
echo'<h1>Profil</h1>';
$serveur="localhost";
$log="root";
$mdp="";
$bdd="reseausocial";
$connectique=mysqli_connect($serveur,$log,$mdp);
$con=mysqli_select_db($connectique,$bdd);
if(!$connectique)
	echo"pb de connection";
else{
	$sqlco="SELECT Mail FROM session WHERE Connecte='1'";
	$resultatco=mysqli_query($connectique,$sqlco);
	$tabco=mysqli_fetch_assoc($resultatco);

	$sq="SELECT * FROM table_utilisateurs WHERE Mail='".$tabco['Mail']."'";
	$resultate=mysqli_query($connectique,$sq);
while($tab=mysqli_fetch_assoc($resultate)){	
			
			echo'
			<body style= "background:'.$tab[Photo_de_fond].'">
			</br><img src="'.$tab['Photo'].'"alt="photo" height="500" width="500">'.
		'Nom:'.$tab['Nom'].
		'</br>Prenom:'.$tab['Prenom'].
		"</br>Mail:".$tab['Mail'].'</br>'
		;  

		
	}	
}
?>
/**Recuperation de l'avatar*/
<h1>Profil</h1>
	
<h3>Nom: </h3>
	
<h3>Prenom: </h3>
	
<h3>Mail: </h3>
	
<h3>CV: </h3>
	
/**Ajout de l'image de fond en prive*/

<h1>Ajout d'une publication</h1>
<input type="button" value="Multimedia" Onclick="location.href='PublicationAjoutImageVideo.php'">
<input type="button" value="Evenement" Onclick="location.href='PublicationAjoutEvent.php'">

<h1>Suppression d'une publication</h1>
<input type="button" value="Supprimer" Onclick="location.href='PublicationSuppression.php'">
</body>

</html>
