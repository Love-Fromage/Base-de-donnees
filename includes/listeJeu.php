<?php
$page_title = "Tout en un";
include('header2.php');
// Exercices sur la table Jeu de la base de données Chantal_Jeux
// Champs de la table Jeu: idJeu, nomJeu, idProprietaire, idStyle, prix, nbJoueursMax, commentaires
?>
<br>
<ul>
    <li id="tabJeu" class="row rowListeJeux">

        <div>id Console</div>
        <div>Nom du jeu</div>
        <div>description</div>
        <div>Nombre de fois compléter</div>
        <div>Dernier joueur</div>
        <div>Date d'ajout</div>
        <div>Ajouter par</div>

    </li>
    <?php
    //  Obtenir les derniers 5 jeux
    //  SELECT idJeu, nomJeu, idProprietaire, idStyle, prix, nbJoueursMax, commentaires FROM Jeu ORDER BY idJeu DESC LIMIT 0,5
    //  appel de la fonction

    $select = "SELECT  idJeux, idConsoles, nomJeu, descJeu, imgJeu, nbComplete, dernierJoueur, dateAjout, idMembreAjout";
    $from = "FROM Jeux";
    $where =  "";
    $orderBy = "";
    $limit = "";
    $lesJeux = getAllInfos($select, $from, $where, $orderBy, $limit);





    //  début de la boucle foreach pour passer à travers l'array résultant







    foreach ($lesJeux as $unJeu) :
        $idConsoles = $unJeu['idConsoles'];  //id de la console correspondante au jeu.

        $select = "SELECT   nomConsole";
        $from = "FROM Consoles";
        $where =  "WHERE idConsoles = $idConsoles";
        $orderBy = "";
        $limit = "";
        $cetteConsoles = getOneInfo($select, $from, $where, $orderBy, $limit);

        $idMembres = $unJeu['idMembreAjout'];

        $select = "SELECT nomMembre";
        $from = "FROM Membres";
        $where = "WHERE idMembres = $idMembres";
        $orderBy = "";
        $limit = "";
        $membrejabo = getOneInfo($select, $from, $where, $orderBy, $limit);

        ?>
        <!--  création d'une rangée ' -->
        <li class="row rowListeJeux">

            <!--  création des cellules avec la valeur de chaque champ ' -->
            <div><?php echo $cetteConsoles['nomConsole']; ?></div>
            <div><?php echo $unJeu['nomJeu']; ?></div>
            <div><?php echo $unJeu['descJeu']; ?></div>
            <div><?php echo $unJeu['nbComplete']; ?></div>
            <div><?php echo $unJeu['dernierJoueur']; ?></div>
            <div><?php echo $unJeu['dateAjout']; ?></div>
            <div><?php echo $membrejabo['nomMembre']; ?></div>
            <!-- TODO : colonne pour l'ajout d'un formulaire pour modifier le jeu  avec l'icône IconeModifier.png-->


        </li>
    <?php
     endforeach; ?>



</ul>
<?php
include('footer.html');
?>

