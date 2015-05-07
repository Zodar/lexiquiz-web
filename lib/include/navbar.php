<?php
if (!isset($_SESSION)) 
{ 
	session_start();
}
?>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span> Menu </span>
					</button>
					<a class="navbar-brand navbar-middle" href="http://lexiquiz.alwaysdata.net">
						Accueil
					</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
<?php
	if(!isset($_SESSION['idConnexion'])) {
?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle bold" data-toggle="dropdown" > Connexion <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="http://lexiquiz.alwaysdata.net/connexion/inscription.php"> Inscription </a></li>
								<li class="divider"></li>
								<li><a href="http://lexiquiz.alwaysdata.net/connexion/connect.php"> Se connecter </a></li>
								<li class="divider"></li>
								<li><a href="http://lexiquiz.alwaysdata.net/connexion/mdpOubli.php">Mot de passe oublié</a></li>
							</ul>
						</li>
<?php
	} else{
		$idConnexion = $_SESSION['idConnexion'];
		$sqlNavbar = "SELECT * FROM connexion WHERE idUser = '$idConnexion'";
		$resultNavbar = mysql_query($sqlNavbar);
		if(mysql_num_rows($resultNavbar)){
			while($rowResultNavbar = mysql_fetch_assoc($resultNavbar)){
?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle bold" data-toggle="dropdown"> <?php echo $rowResultNavbar['pseudo']; ?> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="http://lexiquiz.alwaysdata.net/connexion/inscription.php">Progression</a></li>
								<li class="divider"></li>
								<li><a href="http://lexiquiz.alwaysdata.net/user/profil.php"> Mon Profil </a></li>
								<li class="divider"></li>
								<li><a href="http://lexiquiz.alwaysdata.net/connexion/deconnect.php"> Déconnexion </a></li>
							</ul>
						</li>
<?php
			}
		}
	}
?>
					</ul>
				</div>
			</div>
		</nav>
		<img src="http://lexiquiz.alwaysdata.net/lib/img/fullLogo.png" class="centrer-image img-responsive" alt="logoLexiQuiz">
