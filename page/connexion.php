<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href="../css/bootstrap.min.css" rel="stylesheet" media="screen" type = "text/css"/>
    <title></title>
  </head>
  <body>
  <?php
require_once('../DAO/getConnexion.php');
//include('../DAO/membresDAO.php');




if($get_connexion){
   if(!empty($_POST["email"])){
      $idMembre = $_POST["email"];
    if(!empty($_POST["password"])){
        $passwd = $_POST["password"];
      if( !empty($_POST["btnconnecter"])){
        $requete = mysqli_query($connect, "SELECT * FROM `membres` WHERE `membres`.`idMembre` = '$idMembre' and `membres`.`password` = '$passwd';") or die ("Erreur de requete!");
         if (mysqli_fetch_row($requete)){
            session_start();
             $_SESSION['idMembre']=$idMembre;
            // mysqli_close($connect);
            header("Location:monCompte.php?idMembre = $idMembre");
            exit;
             }
          else { ?>
             <div class="alert alert-danger">
             <strong>¡Attention!</strong> Votre id ou mote de passe ne sont pas correct!.
             </div>
 <?php       }
          }
          else{
            if(!empty($_POST["nom"]) && !empty($_POST["prenom"])){
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
          //  $membre = new membresDAO();
            require_once('../DAO/membresDAO.php');
            $insert = membresDAO::inserterMembre($connect, $idMembre, $passwd, $nom, $prenom);
            if($insert == true){
              session_start();
               $_SESSION['idMembre']=$idMembre;
              header("Location:monCompte.php?idMembre=".$idMembre);
              exit;
            }
            else{
              ?>
              <div class="alert alert-danger">
                    <strong>¡Attention!</strong> Une membre avec cet id existe déjà dans le systéme.
                </div>
                <?php
            }
          }
          else{
            ?>
            <div class="alert alert-danger">
                  <strong>¡Attention!</strong> Il faut bien remplir le nom et le prenom.
              </div>
              <?php  }
          }
        }
        else{
        ?>
        <div class="alert alert-danger">
          <strong>¡Attention!</strong> Il faut bien remplir le password.
        </div>
        <?php }
     }
     else{
     ?>
     <div class="alert alert-danger">
           <strong>¡Attention!</strong> Il faut bien remplir le email.
       </div>
       <?php
     }
    mysqli_close($connect);
  }
?>

  </body>
</html>
