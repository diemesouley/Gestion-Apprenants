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
    <h1>Liste des Apprenents</h1>

    <div class='formAff'>
         <form id="form1" action="" method="POST" enctype=>  
			<fieldset><legend>FORMULAIRE D'INSCRIPTION</legend>
				<ol>
                    <li><label for="name">Code Appr: </label>
						<input type="text" name="codeA" id="name" placeholder="Code Apprenant" required="true" />	

					<li><label for="name">Code Promo: </label>
                        <input type="text" name="codeP" id="name" placeholder="Code Pomo" required="true" />		
                    </li>
                        <input type="submit" name="envoyer" id="envoyer" value="Inscrire" />
                    </ol>    
                </fieldset>
		    </form>
    </div>
        <?php
        $variant="";
        if (isset($_POST['envoyer'])) {
            $codeA=$_POST['codeA'];
            $codeP=$_POST['codeP'];
            $fichierApp=fopen("fichierApp.txt", "r");
            $verif1=false;
            $verif2=false;
            while (!feof($fichierApp)) {


                $fichierProm=fopen("fichierProm.txt", "r");

                while (!feof($fichierProm)) {
                    $ligne=fgets($fichierApp);
                    $colA=explode(":", $ligne);
                    if ($codeA==$colA[0]) {
                        $verif1=true;
                        $Cod=$colA[0].":".$colA[1].":".$colA[2].":".$colA[3].":".$colA[4].":"
                        .$colA[5].":".$colA[6];
                     }

                    $text=fgets($fichierProm);
                    $colP=explode(":", $text);
                    if ($codeP==$colP[0]) {
                        $verif2=true;
                        $Pad=$colP[0].":".$colP[1].":".$colP[2].":".$colP[3].":";
                     }
                      
                }
                
                fclose($fichierProm);
               
            }
           
            fclose($fichierApp);
            if ($verif1==false && $verif2==false) {
               echo "les code n'existe pas";
            }else{
            $fichierTrait=fopen("fichierTrait.txt", "a");
            fwrite($fichierTrait, "\n".$Cod.":".$Pad);
            fclose($fichierTrait);
            }

          
        }
        ?>
    
    <div class='tabInscris'>
        <?php
          $fichierTrait=fopen("fichierTrait.txt","r+");
          echo "<table class='table' border='2'>";
          echo "<tr><th>CodEtu</th><th>NOM</th><th>Prénom</th><th>Date</th><th>Telephone</th><th>Email</th><th>Statut</th>
          <th>CodProm</th><th>Nom Promo</th><th>Mois</th><th>Année</th></tr>";
          while (!feof($fichierTrait)) {
             $text =fgets($fichierTrait);
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
              echo"<td>$ligne[7]</td> <td>$ligne[8]</td><td>$ligne[9]</td><td>$ligne[10]</td></tr>";
         }
            echo "</table>";
            
  fclose($fichierTrait);

        ?>
    </div>
</body>
</html>