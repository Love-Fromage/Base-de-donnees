<?php include('header2.php');
$page_title = "Tout en un";

$idJeu = $_GET['idJeu'];
$select ="SELECT nomJeu";
$from = "FROM Jeux";
$where = "WHERE idJeux = '$idJeu' ";
$orderBy = "";
$limit = "";
$unJeu = getOneInfo( $select, $from, $where, $orderBy,  $limit);
$idMembres =  $_SESSION['idMembres'];
// vérification que le formulaire a été soumis

if (isset($_POST['soumis']))
{
    echo 3;
    // vérification que tous les éléments ont été remplis correctement
    if(!empty($_POST['commentaire'])){



        $comment =htmlspecialchars( $_POST['commentaire']);





        //  appel de la fonction pour ajouter un jeu
        $insertInto = "INSERT INTO Commentaire";
        $fieldList = "(commentaire, idMembresJeu)";
        $valueList = "VALUES ( \" $comment \", $idMembres)";
        $lastID = insertInfo(  $insertInto, $fieldList, $valueList);












        if ($lastID >= 1) {
            echo "bingo";}


    }
    else{
        echo "Les champs requis ne sont pas tous remplis.";
    }



}//  fin de la partie traitement du formulaire
else {
// Champs de la table Jeu: idJeu, nomJeu, possesseur, console, prix, nbJoueursMax, commentaires

    ?>
    <!--   création du formulaire pour insérer un jeu vidéo -->
    <form action="formInsertJeu.php" method="post">

        <fieldset>
            <legend>
                Commentaire pour <?php echo $unJeu['nomJeu']; ?> :
            </legend>
            <br/>

            <p>
                <label>Commentaire:</label>
                <br>
                <br>
                <br>
                <br>
                <textarea name="commentaire" rows="5" cols="40"> </textarea>
            </p>

        </fieldset>

        <div align="center">
            <input type="submit" name="submit" value="Soumettre les informations"/>
        </div>


        <input type="hidden" name="soumis" value="TRUE"/>
    </form>

    <?php
}


include('footer.html');
?>
