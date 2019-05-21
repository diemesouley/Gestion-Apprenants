<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>
<nav>
      <div class="contener-menu"> 
            <ul>
            <li><a href="GestionApprennant.php" id="propos">Apprenant</a></li>
            <li><a href="GestionPromo.php">Promo</a>
                
              </li>
              <li><a href="traitement.php">Inscription</a>
                
              </li>
              <li><a href="modifApprenant.php">Modif-App</a>

              </li>
              <li><a href="modifPromo.php">Modif-Pro</a>

              </li>
               <li><a href="exclureApp.php">Exclure</a>

              </li>
              <li><a href="listerApp.php">lister</a>

              </li>
              <li><a href="affichNombrProm.php">Nombre Apprenant</a>

              </li>
              <li class="deconect"><a href="deconnect.php">Deconnexion</a></li>
            </ul> 
      </div>
      </nav>
    <!--FORMULAIRE CRÉATION APPRENANT-->
<h1>Veuillez Enregistrer vos promos</h1>
    <form id="form1" action="" method="POST" enctype=>  
			<fieldset><legend>Formulaire d'enregistrement de Promos:</legend>
				<ol>
                    <li><label for="name">Code : </label>
						<input type="text" name="code" id="name" placeholder="Code" required="true" />	

					<li><label for="name">Nom : </label>
                        <input type="text" name="nom" id="name" placeholder="Nom Promo" required="true" />		
                        
                    <li><label for="name">Mois : </label>
                    <select name="mois" selected="<?php print($mois["mois"]); ?>"><option value="Janvier">Janvier</option><option value="Février">Février</option><option value="Mars">Mars</option><option value="Avril">Avril</option>
                    <option value="Mai">Mai</option><option value="Juin">Juin</option><option value="Juillet">Juillet</option>
                    <option value="Aout">Aout</option><option value="Septembre">Septembre</option><option value="Octobre">Octobre</option>
                    <option value="Novembre">Novembre</option><option value="Déçembre">Déçembre</option></select>
                        
                    <li><label for="tel">Année : </label>
						<input type="date" id="name"  placeholder="Année" name="année" id="name" />
					    </li>    
				
                        <input type="submit" name="envoyer" id="envoyer" value="Ajouter" />
                    </ol>    
                </fieldset>
		    </form>
    <?php
    if (isset($_POST['envoyer'])) {
     $code=$_POST['code'];
     $nom=$_POST['nom'];
     $mois=$_POST['mois'];
     $année=$_POST['année'];
     $fichierProm=fopen("fichierProm.txt", "a");
     fwrite($fichierProm, ":\n".$code.":".$nom.":".$mois.":".$année);
     fclose($fichierProm);
    
    }

    $fichierApp=fopen("fichierProm.txt","r+");
    echo "<table class='table' border='2'>";
    echo "<tr><th>CodeProm</th><th>NomProm</th><th>Mois</th><th>Date</th></tr>";
    while (!feof($fichierApp)) {
       $text =fgets($fichierApp);
       $ligne=explode(':',$text);
        echo "<tr><td>$ligne[0]</td><td>$ligne[1]</td><td>$ligne[2]</td><td>$ligne[3]</td></tr>";
   }
    

      echo "</table>";
      
fclose($fichierApp);
?>
    
</body>
</html>