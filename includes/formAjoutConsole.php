<?php include('header2.php');
$page_title = "Tout en un";



// vérification que le formulaire a été soumis

if ( isset($_POST['soumis']))
{
    // vérification que tous les éléments ont été remplis correctement
    if(!empty($_POST['nomConsole'])){


        $nomConsole =  htmlspecialchars( $_POST['nomConsole']);



        //  appel de la fonction pour ajouter un jeu
        $insertInto = "INSERT INTO Consoles";
        $fieldList = "(nomConsole)";
        $valueList = "VALUES ('$nomConsole')";
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
    <form action="formAjoutConsole.php" method="post">

        <fieldset>
            <legend>
                Formulaire d'insertion des jeux vidéos
            </legend>
            <br/>

            <p>
                <label>Nom de la console:</label>
                <input type="text" name="nomConsole" size="20" maxlength="40" required/>
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

