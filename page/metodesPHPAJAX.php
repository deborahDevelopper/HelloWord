<?php
require_once('../DAO/getConnexion.php');
// get the q parameter from URL
$idEquipe= $_REQUEST["q"];
$name = $_REQUEST["name"];
session_start(); // incio de uso de sesiones.
$idMembre=$_SESSION['idMembre'];
if (!$get_connexion){ ?>
   <div class="alert alert-danger">
     <strong>¡Attention!</strong> On na pas etablit une connetion.
   </div>
 <?php } else {
switch ($name) {
  case "loadTabla": ?>
    <h3>Table de Membres</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
    <?php
   $requete = mysqli_query($connect, "SELECT * FROM `membreadhesion` WHERE `membreadhesion`.`idEquipe` = '$idEquipe';") or die ("Erreur de requete!");
 while($resultat = mysqli_fetch_row($requete))
   {
     $requete1 = mysqli_query($connect, "SELECT * FROM `membres` WHERE `membres`.`idMembre` = '$resultat[0]';") or die ("Erreur de requete!");
     if($resultat1 =  mysqli_fetch_row($requete1)){
   ?>
        <tr>
           <td><?php echo $resultat1[2] ?></td>
           <td><?php echo$resultat1[3] ?></td>
           <td><?php echo$resultat1[0] ?></td>
         </tr>
       <?php }
   }
  break;
  case "loadSelectMembre": ?>
      <select class="form-control" name= "membreSupprimer" id="listMembresParEquipes">
          <option selected="true" disabled="disabled">Select le membre</option>
    <?php
    $requete = mysqli_query($connect, "SELECT * FROM `membreadhesion` WHERE `membreadhesion`.`idEquipe` = '$idEquipe';") or die ("Erreur de requete!");
    while($resultat = mysqli_fetch_row($requete))
    {   ?>
    <option name="membreSupprimer"><?php echo $resultat[0]; ?></option>
  <?php
  }
     break;
case "supprimerMembreAJAX" : 
    $membreSup = $_REQUEST["membreSup"];
    $reponse = "";
    require_once('../DAO/membresDAO.php');
    $delete = membresDAO::supprimerMembreAdhere($connect, $membreSup, $idEquipe);
   if($delete == true){
        $reponse = "true";
      }
   else {
       $reponse = "false";
     }
     echo $reponse;
    break;
  case "remplirVarSessionEquipe"  :
    $_SESSION['idEquipePourAjouter']=$idEquipe;
    break;
case "siCreateur":
      $reponseCrea = "";
      require_once('../DAO/equipeDAO.php');
      $createur = equipeDAO::isCreateur($connect, $idMembre, $idEquipe);
      if($createur == true){
          $reponseCrea = "true";
        }
      else {
         $reponseCrea = "false";
       }
     echo $reponseCrea;
      break;
   }
  mysqli_close($connect);
}
 ?>
