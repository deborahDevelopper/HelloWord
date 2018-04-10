<!Doctype HTML>
<Head>
<meta charset = "utf-8"/>
<link rel = "stylesheet" href="../css/bootstrap.min.css" rel="stylesheet" media="screen" type = "text/css"/>
<link rel = "stylesheet" href = "../style/style.css" type = "text/css"/>
<link rel = "stylesheet" href = "../font-awesome/css/font-awesome.min.css" type = "text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../code/script.js"></script>
<title> Authentification/Gestion d`équipe </title>
</head>
<body>
<div class="container" style="margin-top: 100px">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <h3>Authentifier</h3>
      </br></br>
        <div class="panel-body">
          <form action = "connexion.php" method="post">
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="enter Email...">
            </div><!-- div form-group -->
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="enter Password...">
            </div><!-- div form-group -->
            <div class="form-group">
               <input  type="nom" name="nom" class="form-control" placeholder="enter Nom...">
            </div><!-- div form-group -->
            <div class="form-group">
              <input  type="prenom" name="prenom" class="form-control" placeholder="enter Prenom...">
            </div><!-- div form-group -->
            <div class="form-group">
              <input type="submit" name="btnconnecter" class="btn btn-succes btn-lg btn-block" value="Connecter" style="background-color:#40d915">
            </div><!-- div form-group -->
            <div class="form-group">
              <input type="submit" name="btnregistrer" class="btn btn-succes btn-lg btn-block" value="Registrer" style="background-color:#40d915">
            </div><!-- div form-group -->
          </form><!-- form -->
        </div><!-- div panel-body -->
        <div class="lock"><i class="fa fa-lock fa-3x"></i>
        </div><!-- div lock -->
      </div><!-- div panel -->
    </div><!-- div col-md-4 -->
  </div><!-- div row -->
</div> <!-- div container -->
</body>
</html>
