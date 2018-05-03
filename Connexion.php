<html>
	<head>
		<title>Connexion</title>
		<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
		<form name="Connexion" method="post" action="projet.php">
		<img src="fond.jpg" alt="fond+logo"></div>
		
	</head>
    <body>
        
        <form method="post" action="Connexion.php">
			<fieldset>
  


			<section class="container">
				<input type="checkbox" id="admin" name="Administrateur" value="Administrateur" >
				<label for="Administrateur">Administrateur</label>
				<input type="checkbox" id="utilisateur" name="Utilisateur" value="Utilisateur">
				<label for="Utilisateur">Utilisateur</label></div>
			</section>
			<section class="container">
				<section class="row">
					<div class="col-lg-6">Prenom:<input type="text" name="Prenom"/></div>
					<div class="col-lg-6">Nom:<input type="text" name="Nom"/></div>
					<div class="col-lg-6">Mail:<input type="text" name="Mail"/></div>
					<input type="submit" name="Soumettre" value="CONNEXION"/>
				</section>
			</section>
			</fieldset>
        </form>
    </body>
</html>


<?php

print_r($_POST);


$Mail = isset($_POST['Mail'])?$_POST['Mail']:"";
$Nom = isset($_POST['Nom'])?$_POST["Nom"]:"";
$Prenom=isset($_POST['Prenom'])?$_POST['Prenom']:"";
$serveur="localhost";
$log="root";
$mdp="";
$bdd="reseausocial";
$connectique=mysqli_connect($serveur,$log,$mdp);
$con=mysqli_select_db($connectique,$bdd);
if(!$connectique)
	echo"pb de connection";
else{
	echo"ca marche";
	if($Mail!=""){
		if($Prenom!=""){
			if($Nom!=""){
				//on construit la requete
				$sql="SELECT Nom,Prenom,Mail FROM table_utilisateurs";
				$res=mysqli_query($connectique,$sql);
				
				while($data=mysqli_fetch_assoc($res)){
					if(($data['Nom']==$Nom) and ($data['Prenom']==$Prenom) and ($data['Mail']==$Mail)){
						header("Location:Accueil.php");
					}
					else{
						echo"ca marche pas";
					}
				}
			}
			else{
				echo"erreur nom";}
		}
		else{
			echo"erreur prenom";}
	}
	else{
		echo"erreur mail";
	}	
}





?>
