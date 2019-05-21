<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>
<title>Accueil</title>
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

    <form id="form1" action="" method="POST" enctype=>  
			<fieldset><legend>Formulaire d'enregistrement d'Apprenants</legend>
				<ol>
                    <li><label for="name">Code : </label>
						<input type="text" name="code" id="name" placeholder="Code" required="true" />	

					<li><label for="name">Nom : </label>
                        <input type="text" name="nom" id="name" placeholder="Nom Apprenant" required="true" />		
                        
                    <li><label for="name">Prénom : </label>
                        <input type="text" name="prénom" id="name" placeholder="Prénom Apprenant" required="true" />
                        
                    <li><label for="name">Date : </label>
                        <input type="date" name="date" id="name" placeholder="Date" required="true" />	
                        
                    <li><label for="tel">Téléphone : </label>
						<input type="tel" id="name"  placeholder="telephone" name="tel" id="tel" />
					    </li>    

                    <li><label for="email">E-mail : </label>
						<input type="email" name="email" id="email" placeholder="exemple@domaine.com" required="true" />
					    </li>     

				<p>
                <label for="statut">Statut :</label>
	          	<select size="1" name="Statut" id="status">
					<optgroup>
						<option value="Présent">Présent</option>
                        <option value="Abandont">Abandont</option>
                        <option value="Exclut">Exclut</option>
					</optgroup>
				</select>
				</p>
				
                        <input type="submit" name="envoyer" id="envoyer" value="Ajouter" />
                    </ol>    
                </fieldset>
		    </form>
    <?php
    if (isset($_POST['envoyer'])) {
     $code=$_POST['code'];
     $nom=$_POST['nom'];
     $prénom=$_POST['prénom'];
     $date=$_POST['date'];
     $tel=$_POST['tel'];
     $email=$_POST['email'];
     $Statut=$_POST['Statut'];
     $fichierApp=fopen("fichierApp.txt", "a");
     fwrite($fichierApp, ":\n".$code.":".$nom.":".$prénom.":".$date.":".$tel.":".$email.":".$Statut);
     fclose($fichierApp);
    
    }

    $fichierApp=fopen("fichierApp.txt","r+");
    echo "<table class='table' border='2'>";
    echo "<tr><th>CODE</th><th>NOM</th><th>Prénom</th><th>Date</th><th>Telephone</th><th>Email</th><th>Statut</th></tr>";
    while (!feof($fichierApp)) {
       $text =fgets($fichierApp);
       $ligne=explode(':',$text);

        echo "<tr><td>$ligne[0]</td><td>$ligne[1]</td><td>$ligne[2]</td>
        <td>$ligne[3]</td><td>$ligne[4]</td><td>$ligne[5]</td>
        <td><a href='' target='blank'> <input type='button'";
        if($ligne[6]=='Présent'){
           echo "class='btn btn-success btn-lg active' value= $ligne[6]> </a></td>";
        }elseif($ligne[6]=='Abandont'){
          echo "class='btn btn-warning btn-lg active' value= $ligne[6]> </a></td>";
       }elseif($ligne[6]=='Exclut'){
          echo "class='btn btn-danger btn-lg active' value= $ligne[6]> </a></td>";
    }
    
    }
      echo "</table>";
      
fclose($fichierApp);
    ?>
</body>
</html>