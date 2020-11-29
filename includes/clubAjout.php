<?php include('header2.php');
$page_title = "Tout en un";



// vérification que le formulaire a été soumis

if ( isset($_POST['soumis'])) {
    // vérification que tous les éléments ont été remplis correctement
    if (!empty($_POST['idMembra']) AND !empty($_POST['idClub'])) {


        $idMembres = (int) $_POST['idMembra'];
        $idClub = (int) $_POST['idClub'];


        //  appel de la fonction pour ajouter un jeu
        $update = "UPDATE Membres";
        $set = "SET idClub = $idClub";
        $where = "WHERE idMembres = $idMembres";
        $nowRow = updateInfo($update, $set, $where);

        $update = "UPDATE Club";
        $set = "SET nbMembres = nbMembres + 1";
        $where = "WHERE idClub = $idClub";
        $nowRow = updateInfo($update, $set, $where);


    }//  fin de la partie traitement du formulaire

}else {
// Champs de la table Jeu: idJeu, nomJeu, possesseur, console, prix, nbJoueursMax, commentaires

        ?>
        <!--   création du formulaire pour insérer un jeu vidéo -->
        <form action="clubAjout.php" method="post">

            <fieldset>
                <legend>
                    Formulaire d'insertion de membres à un Club
                </legend>
                <br/>

                <p>
                    <label>Nom du membres:</label>
                    <select name="idMembra">
                        <?php
                        $select = "SELECT idMembres, nomMembre";
                        $from = "FROM Membres";
                        $where = "";
                        $orderBy = "";
                        $limit = "";

                        $tousLesItem = getAllInfos($select, $from, $where, $orderBy, $limit);

                        foreach ($tousLesItem as $unIte) {
                            echo '<option value="'. $unIte["idMembres"] .'">'. $unIte["nomMembre"] .'</option>';

                        }
                        ?>

                    </select>
                </p>

                <p>
                    <label>Club:</label>

                    <select name="idClub">
                        <?php
                        $select = "SELECT idClub, nomClub ";
                        $from = "FROM Club";
                        $where = "";
                        $orderBy = "";
                        $limit = "";

                        $tousLesItems = getAllInfos($select, $from, $where, $orderBy, $limit);

                        foreach ($tousLesItems as $unItem) {
                            echo '<option value="' . $unItem["idClub"] . '">' . $unItem["nomClub"] . '</option>';

                        }
                        ?>

                    </select>


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
