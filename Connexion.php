<html>
	<head>
		<title>Connexion</title>
		<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
		<link href="projet.css" rel="stylesheet">
		
		<form name="Connexion" method="post" action="Connexion.php">
		<img src="fond.jpg" alt="fond+logo"></div>
	</head>
    <body>
        <form method="post" action="Connexion.php">
			<fieldset>
			</br>
			</br>
			<label>Prenom:</label>
			<input type="text" name="Prenom" id=Prenom/>
			</br>
			<label>Nom :</label>
			<input type="text" name="Nom" id=Nom />
			</br>
			<label>Mail :</label>
			<input type="text" name="Mail" id=Mail />
			</br>
			<input type="submit" name="Soumettre" id=Connexion value="CONNEXION"/>
			</fieldset>
        </form>
    </body>
</html>


<?php
$reset="UPDATE session SET Connecte='0'"


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
	mysqli_query($connectique,$reset);
	if($Mail!=""){
		if($Prenom!=""){
			if($Nom!=""){
				//on construit la requete
				$sql="SELECT Nom,Prenom,Mail FROM table_utilisateurs";
				$res=mysqli_query($connectique,$sql);
				
				while($data=mysqli_fetch_assoc($res)){
					if(($data['Nom']==$Nom) and ($data['Prenom']==$Prenom) and ($data['Mail']==$Mail)){
						$ajout="UPDATE session set Connecte ='1' WHERE Nom='".$Nom."'";
						mysqli_query($connectique,$ajout);
						header("Location:Accueil.php");
					}
					else{
						$sqladmin="SELECT Nom,Prenom,Mail FROM table_admin";
						$res1=mysqli_query($connectique,$sqladmin);
						while($data1=mysqli_fetch_assoc($res1)){
							if(($data1['Nom']==$Nom) and ($data1['Prenom']==$Prenom) and ($data1['Mail']==$Mail)){
								header("Location:Accueil.php");
							}
						}
					}
				}
				echo"Problèmes";
			}
			else{
				echo"erreur nom";}
		}
		else{
			echo"erreur prenom";}
	}
	else{
	}	
}





?>
