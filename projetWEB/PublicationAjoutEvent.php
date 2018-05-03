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
	
<h1>Ajout d'un événement</h1>
<fieldset>
<form>
<h3>Nom de l'événement</h3>
<input type="text" name="Nom">
<h3>Date de l'événement</h3>
<input type="date" name="Date">
<h3>Description</h3>
<textarea name="Description"></textarea>
//Ajout la possibilité d'ajouter une icone + aperçu
</form>
<input type="Button" value="Publier" Onclick="location.href='Accueil.php'" >
</fieldset>
</html>
