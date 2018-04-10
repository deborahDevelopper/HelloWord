<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <link rel = "stylesheet" href="../css/bootstrap.min.css" rel="stylesheet" media="screen" type = "text/css"/>
    <link rel = "stylesheet" href = "../style/style.css" type = "text/css"/>
    <link rel = "stylesheet" href = "../font-awesome/css/font-awesome.min.css" type = "text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!--  <script type="text/javascript" src="../code/code.js"> </script>-->
    <script src="../js/bootstrap.min.js"></script>
    <title>Inserer un nouveau membre</title>
  </head>
  <body>
    <?php
      $equipesMembre = array();
        session_start(); // incio de uso de sesiones.
        $idMembre=$_SESSION['idMembre']; //obtencion del idMembre authentifiee
      //  session_destroy();
      require_once('../DAO/getConnexion.php');
      if (!$get_connexion){ ?>
          <div class="alert alert-danger">
            <strong>¡Attention!</strong> On na pas etablit une connetion.
          </div>
        <?php } else {
          $requete = mysqli_query($connect, "SELECT * FROM `membreadhesion` WHERE `membreadhesion`.`idMembre` = '$idMembre';") or die ("Erreur de requete!");
        while($resultat = mysqli_fetch_row($requete))
          {
            array_push ( $equipesMembre , $resultat[1] );
          }
      }
        mysqli_close($connect);
       ?>
    <div class="container" style="margin-top: 100px">
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <h3>Nouveau Membre</h3>
      </br></br>
        <div class="panel-body">
          <form action = "../metodesPHP/methodsPHP.php" method="post">
            <div class="form-group">
              <select class="form-control" name ="idEquipe" id="listEquipespourAjouter">
                <option selected="true" disabled="disabled">Select l`équipe</option>
                <?php foreach ($equipesMembre as $value) { ?>
                  <option name = "idEquipe"> <?php echo $value ?> </option>
              <?php  } ?>
            </select><!-- select -->
          </div><!-- form group select-->
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="enter Email...">
            </div><!-- div form-group -->
            <div class="form-group"><input name="name" type="hidden" value="ajouterMembre" /></div>
            <div class="form-group">
              <input type="submit" name="" class="btn btn-succes btn-lg btn-block" value="Inserter" style="background-color:#40d915">
            </div><!-- div form-group -->
          </form><!-- form -->
        <div class="col-md-4">  <a  href="authentification.php">Quitter</a> </div>
          <a  href="monCompte.php">retourner</a>  </div>
        </div><!-- div panel-body -->
        <div class="user"><i class="fa fa-user fa-3x"></i></div><!-- div user -->
        <div  class ="label"><?php echo $_SESSION['idMembre'] ;?></div>
        <div class="label2"></div>
      </div><!-- div panel -->
    </div><!-- div col-md-4 -->
  </div><!-- div row -->
</div>
  </body>
</html>
