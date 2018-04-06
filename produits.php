<?php 
$id= $_GET['id'];
$idcat= $_GET['idcat'];
// $idscat= $_GET['idcat'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	 <title>LaResto-information sur chaque produit,Déjeuner,Petit déjeuner,Diner</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="keywords" content="LaResto, restaurant ,dinner,déjeuner,petit déjeuner,burger,poulet frite"> 
    <meta name="description" content="LaResto est un restaurant de luxe ayant beaucoup de choix au dinêr,petit déjeuner et le déjeuner tels que les hamburger,poulet frite,..."> 
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
   

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="assets/css/carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
<?php
	require('connexionmysql.php');
	require('model.php');
		$connexion=Mysql_connection();
	$findMenus=find_table("concatenation", "  where idscategorie=".$idcat, $connexion);

	
	?>
  <body>
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
                <li><a href="about.php">A propos</a></li>
                <li><a href="contact.php">Contact</a></li>
                
				<li class="dropdown">
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
	<h1>LaResto</h1>
	<p>
	Notre <strong>restaurant</strong> accepte les commandes  en lignes et la livraison gratuit
	</p>
	</div>
	</div>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

	 <div class="container marketing" id="pd" >
    <h2 class="itemsTitle">Petit déjeuner</h2>
	<div class="row" >
	 <?php foreach($findMenus AS $p){ ?>
	<div class="col-lg-8">
			<ul>
				<li><?php echo $p->categorie ?></li>
				<li><?php echo $p->nom ?></li>
				<li><?php echo $p->description ?></li>
				<li>Prix:<?php echo $p->prix ?> Ar</li>
			 </ul>
	</div>
	 <?php } ?>
	</div>
	<div >
      <!-- Indicators -->
      <div class="carousel-inner">
        <div class="item active">
         <div class="row">
		 
		 <?php foreach($findMenus AS $p){ ?>
			<div class="col-lg-4">
				
				  <img src="<?php echo $p->image ?>" alt="<?php echo $p->nom ?>">
				  <h4><a href="<?php echo $p->categorie ?>-<?php echo $p->nom ?>-<?php echo $p->description ?>-<?php echo $p->idscategorie ?>-<?php echo $p->idcategorie ?>.php"><?php echo $p->nom ?></a></h4>
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
	<div class="introSection">
		<div class="container">
		<div class="row">
		<div class="col-lg-5">
		<h3>Bienevenue dans LaResto</h3>
		<p>
		Notre restaurant "LaResto"  prend les commandes et resoud <br>la question qu'est ce on va manger
		aujourd'hui tels que les bons<br> petit déjeuner,déjeuner et même les dinêr quotidiennement
		 <br><br>
		</p>
		</div>
		
		<div class="col-lg-4">
		<h3>Bienevenue dans LaResto</h3>
		<p>
	    LaResto contient beaucoup de quoi à manger avec beaucoup
		de choix tels que sur les <strong>burger,boissons,gateau à la fraise,...</strong>
		<br>
		 <br><br>
		</p>
		
		</div>
		
		<div class="col-lg-3">
		<h3>Bienvenue dans la resto</h3>
		<p>
		Notre restaurant "LaResto"  prend les commandes et resoud <br>la question qu'est ce on va manger
		aujourd'hui tels que les bons<br> petit déjeuner,déjeuner et même les dinêr quotidiennement
		 <br><br>
		</p>
		
		</div>
		
		</div>
		</div>
		
	</div>





      <!-- FOOTER -->
	
      <footer>
		<div class="container">
        <p class="pull-right"><a class="href" href="#">Back to top</a></p>
        <p>&copy; 2018 LaResto Company by Razafindrainibe/Yael/ETU000593 <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
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
