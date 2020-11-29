<?php
$page_title = "Tout en un";
include('header2.php');
// Exercices sur la table Jeu de la base de données Chantal_Jeux
// Champs de la table Jeu: idJeu, nomJeu, idProprietaire, idStyle, prix, nbJoueursMax, commentaires
?>
<br>
<ul>
    <li id="tabJeu" class="row rowListeJeux">


        <div>Nom du Club</div>
        <div>Nombre de membres</div>

        

    </li>
    <?php
    //  Obtenir les derniers 5 jeux
    //  SELECT idJeu, nomJeu, idProprietaire, idStyle, prix, nbJoueursMax, commentaires FROM Jeu ORDER BY idJeu DESC LIMIT 0,5
    //  appel de la fonction

    $select = "SELECT  idClub, nomClub, nbMembres";
    $from = "FROM Club";
    $where =  "";
    $orderBy = "";
    $limit = "";
    $lesClubs = getAllInfos($select, $from, $where, $orderBy, $limit);

    /*$select = "SELECT  idConsoles, nomConsole";
    $from = "FROM Consoles";
    $where =  "";
    $orderBy = "";
    $limit = "";
    $lesConsoles = getAllInfos($select, $from, $where, $orderBy, $limit);*/




    //  début de la boucle foreach pour passer à travers l'array résultant
    foreach ($lesClubs as $unClub) :

        ?>
        <li class="row rowListeJeux">

            <!--  création des cellules avec la valeur de chaque champ ' -->
            <div><a href="ClubBrun.php?idClub=<?php echo $unClub['idClub']; ?>"><?php echo $unClub['nomClub']; ?></a></div>
            <div><?php echo $unClub['nbMembres']; ?></div>

            <!-- TODO : colonne pour l'ajout d'un formulaire pour modifier le jeu  avec l'icône IconeModifier.png-->


        </li>

    <?php endforeach; ?>








<?php
include('footer.html');
?>

