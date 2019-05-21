<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Accueil</title>
</head>
<body>
<div id="container">
        <form action="" method="POST">
        <h1>Connexion</h1>
      
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="Login" required>
     
         <input type="password" placeholder="Entrer le mot de passe" name="Password" required>
        <input type="submit" id='submit' value='CONNEXION' name="CONNEXION" >              
        </form>
        <?php 
        if(isset($_POST['CONNEXION'])){
            $log=$_POST['Login'];
            $pass=$_POST['Password'];
            
                    if($log=="Souleymane" && $pass=="DIEME") {
                        
                        header("location:GestionApprennant.php");
                }elseif($log!="Souleymane" || $pass!="DIEME") {
                    echo 'Erreur, Login ou mot de pass incorrect !!!</span>';
                    header("location:connection.php");
                }
                   
                    
                
            } 
        ?>
        </div>                  
</body>
</html>