<?php
session_start();

?>

<?php include_once("../bd_includes/bd_functions.php");




?>
<html>
	<head>
		<meta charset="utf-8">
		<title> <?php echo $page_title; ?></title>

<link href="styles/styles.css" type="text/css" rel="stylesheet" media="screen">
<!-- Éléments HTML5. -->
        <script src="js/script.js"></script>
<link href="http://html5shiv.googlecode.com/svn/trunk/html5.js">
<!-- Référence à jQuery. -->

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">

<!--<script type="application/javascript" src="js/jquery_1-12.4.min.js"></script>-->

<!--<link href="./includes/form.css" type="text/css" rel="stylesheet" />-->
</head>
<body>
<div class="wrapper">
    <section id="option-connect" class="before-pop">
        <div>
            <form  action="./includes/formConnexion.php" method="post">


                <a id="close" href="#" ><i class="material-icons">clear</i></a>
                <input type="text" name="userName"
                       placeholder="Inscrire votre usager" required />


                <input type="password" name="motDePasse"
                       placeholder="Mot de passe" required />

                <!--<a href="#" class="myButton" type="submit" name="submit" id="close-pop">ENVOYER</a>-->
                <input type="submit" name="submit" value="Connexion" class="myButton"/>
                <input type="hidden" name="envoyerConnexion" value="TRUE">

            </form>
        </div>
    </section>

    <header class="header-page">
        <h1><a href="./index.php">CLUB OGRE</a></h1>
        <nav class="main-nav">
            <label for="show-menu" class="show-menu"><i class="material-icons">
                    menu
                </i></label>


            <input type="checkbox" class="toggle-menu" id="show-menu" hidden>
            <ul class="main-menu">

                    <li>
                        <a href="./index.php">Accueil</a>
                    </li>

                    <li>
                        <a href="#">Categorie</a>
                        <ul>
                            <li>
                                <a href="./includes/listeJeu.php">Liste des jeux</a>
                            </li>
                            <li>
                                <a href="./includes/Club.php">Clubs</a>
                            </li>

                        </ul>


                    </li>


                    <?php
                    if(!empty($_SESSION['userName'])) :

                        ?>
                        <li>
                            <a href="./includes/formInsertJeu.php">Ajout Jeu</a>
                        </li>
                    <?php
                    endif;
                    ?>

                <?php
                if($_SESSION['estPremium'] == 1) :

                    ?>
                    <li>
                        <a href="./includes/clubAjout.php">Ajout au Club</a>
                    </li>
                <?php
                endif;
                ?>

                    <?php
                    if(!empty($_SESSION['userName'])) :

                        ?>
                        <li>
                            <a href="#">Compte</a>
                            <ul class="secondMenu">
                                <li><a href="./includes/formEditProfile.php">Modifier</a></li>
                                <li><a href="./includes/formDeconnexion.php">Déconnexion</a></li>
                            </ul>

                        </li>
                    <?php
                    else:
                        ?>

                        <li>
                            <a href=#">Connexion/Inscription</a>
                            <ul class="secondMenu">
                                <li id="open"><a href="#">Connexion</a></li>
                                <li><a href="./includes/formConnexion.php">Inscription</a></li>
                            </ul>

                        </li>
                    <?php
                    endif;
                    ?>



                </ul>







        </nav>
    </header>
