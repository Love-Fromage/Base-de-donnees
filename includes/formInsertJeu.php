<?php include('header2.php');
$page_title = "Tout en un";



// vérification que le formulaire a été soumis

if ( isset($_POST['soumis']))
{
    // vérification que tous les éléments ont été remplis correctement
    if(!empty($_POST['nomJeu'])  AND !empty($_POST['descJeu'])){

        $nomJeu = htmlspecialchars( $_POST['nomJeu']);
        $idConsoles = (int) $_POST['idConsoles'];
        $dateAjout = $_POST['dateAjout'];
        $descJeu =htmlspecialchars( $_POST['descJeu']);
        $idMembres = (int) $_SESSION['idMembres'];
        $nomConsole =  htmlspecialchars( $_POST['nomConsole']);
        $nbComp = (int) $_POST['nbComp'];



        //  appel de la fonction pour ajouter un jeu
        $insertInto = "INSERT INTO Jeux";
        $fieldList = "(nomJeu, idConsoles, descJeu, dateAjout, idMembreAjout, nbComplete)";
        $valueList = "VALUES ('$nomJeu', $idConsoles, \" $descJeu \", NOW(), $idMembres, $nbComp)";
        $lastID = insertInfo(  $insertInto, $fieldList, $valueList);








        if ($lastID >= 1)  { echo "Les informations ont été ajoutées. Merci";}
        else { echo "Les informations n'ont pas été ajoutées. Contactez votre administrateur-système.";}


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
                Formulaire d'insertion des jeux vidéos
            </legend>
            <br/>

            <p>
                <label>Nom du jeu:</label>
                <input type="text" name="nomJeu" size="20" maxlength="40" required/>
            </p>

            <p>
                <label>Console:</label>

                <select name="idConsoles">
                <?php
                $select = "SELECT idConsoles, nomConsole ";
                $from = "FROM Consoles";
                $where = "";
                $orderBy = "";
                $limit = "";

                $tousLesItems = getAllInfos( $select, $from, $where, $orderBy, $limit);

                foreach($tousLesItems as $unItem){
                    echo '<option value="'.$unItem["idConsoles"].'">'.$unItem["nomConsole"].'</option>';

                }
                ?>

                </select>


            </p>


            <p>
            <a href="formAjoutConsole.php">Ajouter la console</a></p>









            <p>
                <label>Description:</label>
                <textarea name="descJeu" rows="3" cols="40" required></textarea>
            </p>

            <p>
                <label>Nombre de fois complétés:</label>
                <input type="text" name="nbComp" size="20" maxlength="40" required/>
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
