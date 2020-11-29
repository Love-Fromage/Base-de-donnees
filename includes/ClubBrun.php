<?php
$page_title = "Tout en un";
include('header2.php');

$club = $_GET['idClub'];

$select = "SELECT nomClub";
$from = "FROM Club";
$where =  "WHERE idClub = $club";
$orderBy = "";
$limit = "";
$leClub = getOneInfo($select, $from, $where, $orderBy, $limit);
// Exercices sur la table Jeu de la base de données Chantal_Jeux
// Champs de la table Jeu: idJeu, nomJeu, idProprietaire, idStyle, prix, nbJoueursMax, commentaires
?>
<br>
<ul>
    <div><?php echo $leClub['nomClub']; ?></div>
    <li id="tabJeu" class="row rowListeJeux">


        <div>Nom du Membre</div>
        <div>Nombre de jeux complété</div>



    </li>
    <?php
    //  Obtenir les derniers 5 jeux
    //  SELECT idJeu, nomJeu, idProprietaire, idStyle, prix, nbJoueursMax, commentaires FROM Jeu ORDER BY idJeu DESC LIMIT 0,5
    //  appel de la fonction




    $select = "SELECT  idMembres, nomMembre, idClub, nbJeuComp";
    $from = "FROM Membres";
    $where =  "WHERE idClub = $club";
    $orderBy = "";
    $limit = "";
    $lesMembres = getAllInfos($select, $from, $where, $orderBy, $limit);





    //  début de la boucle foreach pour passer à travers l'array résultant
    foreach ($lesMembres as $unMembres) :

        ?>
        <li class="row rowListeJeux">

            <!--  création des cellules avec la valeur de chaque champ ' -->
            <div><?php echo $unMembres['nomMembre']; ?></div>
            <div><?php echo $unMembres['nbJeuComp']; ?></div>

            <!-- TODO : colonne pour l'ajout d'un formulaire pour modifier le jeu  avec l'icône IconeModifier.png-->


        </li>

    <?php endforeach; ?>








<?php
include('footer.html');
?>


