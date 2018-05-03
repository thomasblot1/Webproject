<?php
echo'<h1>Mon réseau</h1>';
echo"<h4>Pour l'instant, tous les utilisateurs sont amis.</h4>";
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
	$sq="SELECT * FROM table_utilisateurs";
	$resultate=mysqli_query($connectique,$sq);$compteur=1;
while($tab=mysqli_fetch_assoc($resultate)){	
			
			echo'
			<fieldset style= "width:400px;padding:20px;margin:0;">
			
		<legend>Ami '.$compteur.' : </legend>'.
		'Nom:'.$tab['Nom'].'
		</br>Prénom:'.$tab['Prenom'].
		"</br>Mail :".$tab['Mail'].'</br>'.
		'Avatar:<img src="'.$tab['Photo'].'" alt="photo" height="200" width="200">
		</fieldset>';$compteur=$compteur+1;
		
	}	
}
?>
</html>
