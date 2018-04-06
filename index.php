<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
	 <title>LaResto-information sur la restaurant,Déjeuner,Petit déjeuner,Diner</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="keywords" content="LaResto, restaurant ,dinner,déjeuner,petit déjeuner,burger,poulet frite"> 
    <meta name="description" content="LaResto est un restaurant de luxe ayant beaucoup de choix au dinêr,petit déjeuner et le déjeuner tels que les hamburger,poulet frite,..."> 
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
   

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->

  <body>
  <?php
	require('connexionmysql.php');
	require('model.php');
		$connexion=Mysql_connection();
	$findMenus=find_table("concatenation", "  where idcategorie=1", $connexion);
	$findDejeuner=find_table("concatenation", "  where idcategorie=2", $connexion);
	$findDiner=find_table("concatenation", "  where idcategorie=3", $connexion);
	$find3products=find_table("concatenation", " limit 3", $connexion);
?>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">LaResto</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Acceuil</a></li>
                <li><a class="lien" href="about.php">A propos</a></li>
                <li><a class="lien" href="contact.php">Contact</a></li>
                
				<li  class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Aliments<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#pd">Petit déjeuner</a></li>
                    <li><a href="#dj">Déjeuner</a></li>
                    <li><a href="#dinner">Dinêr</a></li>
                    <li class="divider"></li>
                  </ul>
                </li>
				
				
				
              
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="mainCarousel">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
         <img src="assets/images/laResto.jpg" alt="laResto"/>
			
			
			  <div class="container">
				<div class="carousel-caption">
				  <a class="btn btn-lg btn-default" href="#" role="button" style="font-size:2em">Commander maintenant &raquo;</a>
				</div>
			  </div>
			</div>
		  </div>
		</div><!-- /.carousel -->
	</div>

	<div class="mainTitle">
	<div class="container">
	<h1>LaResto information sur notre restaurant</h1>
	<p>
	Notre <strong>restaurant</strong> accepte les commandes  en lignes et la livraison gratuit
	</p>
	</div>
	</div>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

   
	<div class="introSection">
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="cntr">Nous cherchons à ameliorer notre restaurant et à donner les meilleurs pour nos client tels que <br> le petit déjeuner,déjeuner et le dinner ,nos partenaire est <a  class="amazon" href="https://amazon.fr">Amazon</a></h4>
			
			</div>
		</div>
		</div>
	</div>
	
		
	 <div class="container marketing" id="pd">
    <h2 class="itemsTitle">Petit déjeuner</h2>
	<center><h5>Le <strong>petit déjeuner</strong> contient beaucoup de choix tels que les burger,crudités de salades,... vous pouvez aussi effectuer de la commande en ligne</h5></center>
	<!--<div id="myCarousel1" class="carousel slide" data-ride="carousel">-->
	
	<div >
      <!-- Indicators -->
      <div class="carousel-inner">
        <div class="item active">
         <div class="row">
		 <?php foreach($findMenus AS $p){ ?>
			<div class="col-lg-4">
				
				  <a  href="<?php  echo splitter($p->categorie)?>-<?php  echo splitter($p->description)?>-<?php echo $p->idcategorie ?>-<?php echo $p->idscategorie ?>.php"><img src="<?php echo $p->image ?>" alt="<?php echo $p->nom ?>" title="<?php echo $p->nom ?>"></a>
				  <h4><a  href="<?php  echo splitter($p->categorie)?>-<?php  echo splitter($p->description)?>-<?php echo $p->idcategorie ?>-<?php echo $p->idscategorie ?>.php"><?php echo $p->nom ?></a></h4>
				  <h5><?php echo $p->description ?></h5>
				 <p><a class="btn btn-default" href="#" role="button">Ajouter au panier</a></p>
			
			</div><!-- /.col-lg-4 -->
       	<?php } ?>
      </div><!-- /.row -->
		 
        </div>
     
      </div>
      <a class="left carousel-control" href="#myCarousel1" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel1" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
	</div>
	
	<div class="container marketing" id="dj">
    <h2 class="itemsTitle">Déjeuner</h2>
	<center><h5>LaResto propose aussi de <strong>déjeuner </strong> y compris les poissons avec frite, les poulets frites  tous les aliments  délicieux que toutes les personnes sont y bienvenus</h5></center>
	<!--<div id="myCarousel2" class="carousel slide" data-ride="carousel">-->
	<div>
      <!-- Indicators -->
      <div class="carousel-inner">
        <div class="item active">
         <div class="row">
		 
		 <?php foreach($findDejeuner AS $p){ ?>
        <div class="col-lg-4">
         	
				  <a  href="<?php  echo splitter($p->categorie)?>-<?php  echo splitter($p->description)?>-<?php echo $p->idcategorie ?>-<?php echo $p->idscategorie ?>.php"><img src="<?php echo $p->image ?>" alt="<?php echo $p->nom ?>" title="<?php echo $p->nom ?>"></a>
				  <h4><a  href="<?php  echo splitter($p->categorie)?>-<?php  echo splitter($p->description)?>-<?php echo $p->idcategorie ?>-<?php echo $p->idscategorie ?>.php"><?php echo $p->nom ?></a></h4>
				   <h5><?php echo $p->description ?></h5>
				  <p><a class="btn btn-default" href="#" role="button">Ajouter au panier</a></p>
			
        </div><!-- /.col-lg-4 -->
      	<?php } ?>
      </div><!-- /.row -->
		 
        </div>
      
    
      </div>
      <a class="left carousel-control" href="#myCarousel2" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel2" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
	</div>
	
	<div class="container marketing"id="dinner">
    <h2 class="itemsTitle">Dinner</h2>
	<!--<div id="myCarousel3" class="carousel slide" data-ride="carousel">-->
	<div >
      <!-- Indicators -->
      <div class="carousel-inner">
        <div class="item active">
         <div class="row">
		     <?php foreach($findDiner AS $p){ ?>
        <div class="col-lg-4">
     
				   <a  href="<?php  echo splitter($p->categorie)?>-<?php  echo splitter($p->description)?>-<?php echo $p->idcategorie ?>-<?php echo $p->idscategorie ?>.php"><img src="<?php echo $p->image ?>" alt="<?php echo $p->nom ?>" title="<?php echo $p->nom ?>"></a>
				  <h4><a  href="<?php  echo splitter($p->categorie)?>-<?php  echo splitter($p->description)?>-<?php echo $p->idcategorie ?>-<?php echo $p->idscategorie ?>.php"><?php echo $p->nom ?></a></h4>
				  <h5><?php echo $p->description ?></h5>
				  <p><a class="btn btn-default" href="#" role="button">Ajouter au panier</a></p>
			
        </div><!-- /.col-lg-4 -->
      	<?php } ?>
      </div><!-- /.row -->
		 
        </div>
       
      </div><!-- /.row -->
		 
        </div>
    
      </div>
      <a class="left carousel-control" href="#myCarousel3" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel3" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	
	<div class="introSection">
		<div class="container">
		<div class="row">
		<div class="col-lg-5">
		<h3>Bienevenue dans LaResto</h3>
		<h5>
		Notre restaurant "LaResto"  prend les commandes et resoud <br>la question qu'est ce on va manger
		aujourd'hui tels que les bons<br> petit déjeuner,déjeuner et même les dinêr quotidiennement
		 <br><br>
		</h5>
		</div>
		
		<div class="col-lg-4">
				<h3>Bienevenue dans LaResto</h3>
				<h5>
				LaResto contient beaucoup de quoi à manger avec beaucoup
				de choix tels que sur les <strong>burger,boissons,gateau à la fraise,...</strong>
				<br>
				 <br><br>
				</h5>
				
		</div>
		
		<div class="col-lg-3">
		<h3>Bienvenue dans la resto</h3>
		<h5>
		Notre restaurant "LaResto"  prend les commandes et resoud <br>la question qu'est ce on va manger
		aujourd'hui tels que les bons<br> petit déjeuner,déjeuner et même les dinêr quotidiennement
		 <br><br>
		</h5>
		
		</div>
		
		</div>
		</div>
	</div>

      <!-- FOOTER -->
      <footer>
		<div class="container">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2018 LaResto Company by Razafindrainibe/Yael/ETU000593 <a  class="href" href="#">Privacy</a> &middot; <a class="href" href="#">Terms</a></p>
		</div>
      </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/holder.js"></script>
  </body>
</html>