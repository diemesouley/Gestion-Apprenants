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
    <h1 class="btn btn-primary btn-lg">Le nombre d'apprenants par promos!!!</h1>
   
        <?php
                        $fichierProm=fopen("fichierProm.txt","r");
                        echo "<table class='table' border='2'>";
                        echo "<tr> <th>CodProm</th><th>NomPro</th><th>Mois</th><th>Année</th><th>Nombre Apprenant</th></tr>";
                        
                        while (!feof($fichierProm)) {
                            $j=0;
                            $text =fgets($fichierProm);
                            $ligne=explode(':',$text);
                            $fichierTrait=fopen("fichierTrait.txt", "r");
                           
                            $c=file("fichierTrait.txt");
                            while (!feof($fichierTrait)) {
                                $col =fgets($fichierTrait);
                                    $tab=explode(':',$col);
                                    if ($tab[7]==$ligne[0]) {
                                        $j++;
                                    }
                            
                            }
                            echo"<td>$ligne[0]</td> <td>$ligne[1]</td><td>$ligne[2]</td><td>$ligne[3]</td><td>$j</td></tr>";
                            fclose($c);
                        }
                        echo "</table>";   
                        fclose($fichierProm);
        
        ?>   
</body>
</html>


<!--while (!feof($tab)){
                        $text=fgets($tab);
                        $col=explode(":", $text);
                        $fichierApp=fopen("fichierTrait.txt", "r");
                        $j=0;
                        $montab=file("fichierTrait.txt");
                        while(!feof($montab)){
                            for($i=0; $i<count($montab); $i++){

                        $code[$i]=strtok($montab[$i],":");
                        if($code[$i]==$col[7]){
                            $j++;
                            
                        } 
                    } break;
                } echo"<td>$col[0]</td> <td>$col[1]</td><td>$col[2]</td><td>$col[3]</td><td>$j</td></tr>";
                fclose($fichierApp);
                }
                echo "</table>";   
                fclose($tab);
*/
            -->