<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href="../css/bootstrap.min.css" rel="stylesheet" media="screen" type = "text/css"/>
    <link rel = "stylesheet" href = "../style/style.css" type = "text/css"/>
    <link rel = "stylesheet" href = "../font-awesome/css/font-awesome.min.css" type = "text/css"/>
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script  type="text/javascript" src="../code/script.js"></script>
    <script  src="../js/bootstrap.min.js"></script>
    <title>User Compte</title>
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
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <h3>Gestion d`Équipe</h3>
          </br></br>
            <div class="panel-body">
              <p id = "labelEquipes">Equipes(select one):</p>
              <form action = "">
                <div class="form-group col-xs-4">
                  <select class="form-control" id="listEquipes" onchange="load_tablas();">
                    <option selected="true" disabled="disabled">Select votre équipe</option>
                    <?php foreach ($equipesMembre as $value) { ?>
                      <option name = "idEquipe"> <?php echo $value ?> </option>
                  <?php  } ?>
                </select><!-- select -->
              </div><!-- form group select-->
              <div class="form-group col-xs-4">
              <a href="#gestion">  <input id="boton" type="button" name="" class="btn btn-succes btn-block" value="Gestioner" style="background-color:#40d915" ></a>
			 <!--<input id="boton" type="button" name="" class="btn btn-succes btn-block" value="Gestioner" style="background-color:#40d915" onclick = "permission()">-->
              </div>
            </form><!-- form equipes-->
          </br></br></br></br></br></br></br></br>
          <div id="tableMembres" class="col-md-10"></div>

            </div><!-- div panel-body -->
            <div class="user"><i class="fa fa-user fa-3x"></i></div><!-- div user -->
            <div id="label" class ="label"><?php echo $idMembre ;?></div>
            <div class="label2"></div>
          </div><!-- div panel -->
        </div><!-- div col-md-10 -->
      </div><!-- div row -->
    </div> <!-- div container -->
    <div id="gestion" class="container" style="margin-top: 100px">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <h3>Vos Options</h3>
          <div class="panel-body">
            <div id="iconsGestion" >
              <ul class="nav navbar-nav navbar-left">
                <li><div class="icon"><i title="Inserer un nouveau membre"class="fa fa-user fa-5x"></i></div></li>
                <li><div class="icon"><i title="Supprimmer membre" class="fa fa-trash fa-5x"></i></div></li>
                <li><div class="icon"><i title="Modifier membre" class="fa fa-pencil-square fa-5x"></i></div></li>
                <li><div class="icon"><i title="Créer nouveau équipe" class="fa fa-plus-square fa-5x"></i></div></li>
                <li><div class="icon"><i title="Envoyer un message" class="fa fa-envelope fa-5x"></i></div></li>
              </ul>
                 <ul class="nav navbar-nav navbar-left">
                   <li id="iconInserer" style="visibility :hidden"><a class="menu" href="nouveauMembre.php"><p class = "textMenu">Insérer Membre</p></a></li>
                   <li id="iconSupprimer" style="visibility :hidden"><a class="menu" href="suprimerMembre.php"><p class = "textMenu">Supprimer Membre</p></a></li>
                   <li id="iconModifier" style="visibility :hidden"><a class="menu"  id="modifier" href="modifierMembre.php"><p class = "textMenu">Modifier Membre</p></a></li>
                   <li><a  class="menu" href="creerEquipe.php"><p class = "textMenu">Créer Équipe</p></a></li>
                   <li ><a class="menu" href="solicitud.php"><p class = "textMenu">Envoyer Solicitud</p></a></li>
                 </ul>
               </div><!-- div icons -->
            </br></br></br></br></br></br></br></br></br></br>
            <div><hr></div>
            <div>
              <blockquote class="blockquote-reverse">
              <p>"Site Web conçu pour gérer efficacement et automatiquement des équipes de football,
                de basketball, de volleyball, etc. De manière simple, dynamique et colorée, le client peux contrôler les membres,
                les managers et les événements dont l`équipe est affiliée, Bonne chance et GAGNEZ!" <p>
              <footer>Collége de Rosemont </footer>
            </blockquote>
            </div><!-- div blockquote -->
          <div>  <hr> </div>
            <ul class="nav navbar-nav navbar-left">
              <li ><a  href="http://www.crosemont.qc.ca/accueil" target = "_blank" ><p class = "textMenu">À propos</p></a></li>
              <li ><a  href="http://www.crosemont.qc.ca/formation-aux-adultes" target = "_blank" ><p class = "textMenu">Notre Équipe</p></a></li>
              <li><a    href="http://www.crosemont.qc.ca/accueil/nous-joindre" target = "_blank" ><p class = "textMenu">Contactez nous</p></a></li>
              <li><a  href="authentification.php"><p class = "textMenu">Quitter</p></a></li>
            </ul>
          </div><!-- div panel-body -->
        <!--  <div>
            <hr>
            <ul class="nav navbar-nav navbar-left">
              <li ><a  href="#"><p class = "textMenu">À propos</p></a></li>
              <li ><a  href="#"><p class = "textMenu">Notre Équipe</p></a></li>
              <li><a    href="#"><p class = "textMenu">Contactez nous</p></a></li>
              <li><a  href="#"><p class = "textMenu">Quitter</p></a></li>
            </ul>

          </div>-->
        </div><!-- div panel -->
      </div><!-- div col-md-10 -->
    </div><!-- div row -->
  </div> <!-- div container -->
  </body>
</html>
