<?php include('header2.php'); ?>



<main class="wrapper">


    <?php

    //  TODO : (if1) Test pour voir si un des deux formulaires a été envoyé  (voir les champs cachés de chacun des formulaires ci-dessous)
    if (isset($_POST['envoyerConnexion']) OR isset($_POST['envoyerInscription'])){

        //  TODO : (if2) Test pour voir si le formulaire de première inscription a été envoyé
        if (isset($_POST['envoyerInscription'])) {

            /*  TODO : (if3) Test pour vérifier si l'usager et le mot de passe ont été envoyés ET ensuite
                      s'ils ont entre 8 et 12 caractères de long, avec la fonction strlen()
            */
            if (strlen($_POST['userName']) >= 4 AND strlen($_POST['userName']) <= 25 AND strlen($_POST['motDePasse']) >= 4 AND strlen($_POST['motDePasse']) <= 25){
                // TODO : (if4) Test pour voir si les deux mots de passes sont pareils

                if($_POST['verif-motDePasse'] == $_POST['motDePasse']) {


                    //  TODO : Obtenir les informations de l'usager et de son mot de passe dans des variables via $_POST

                    $nom = htmlspecialchars(addslashes($_POST['nomMembre']));
                    $usager = htmlspecialchars(addslashes($_POST['userName']));
                    $motDePasse = htmlspecialchars(addslashes($_POST['motDePasse']));



                    // TODO : Utiliser la fonction de hachage password_hash()  pour encrypter le mot de passe

                    $motDePasseHASH = password_hash($motDePasse, PASSWORD_DEFAULT);

                    /*  TODO : Faire une requête pour vérifier s'il y a un membre avec cet usager
                               ATTENTION, ici on ne veut avoir qu'un enregistrement, donc on utiliser getOneInfo()  et on n'aura pas besoin de boucle foreach
                    */
                    echo 1;
                    $select ="SELECT userName, motDePasse, idMembres";
                    $from = "FROM Membres";
                    $where = "WHERE userName = '$usager' ";
                    $orderBy = "";
                    $limit = "";
                    $unMembre = getOneInfo( $select, $from, $where, $orderBy,  $limit);
                    echo 2;


                    /*  TODO :  (if5) Test pour voir si l'id du membre est  >=1
                                Si c'est le cas,
                                        Faire un message comme quoi cette combinaison usager et mot de passe est déjà prise
                                (if5) Sinon
                                        Faire une requête pour insérer cet usager et ce mot de passe enctypté dans la bd
                                        (if6) Si elle a fonctionné,
                                                [À VENIR] Assigner nos variables de session
                                                [À VENIR] Puis retournez à l'index
                                         (if6) Sinon
                                                Dire que l'inscription n'a pas fonctionné
                    */
                    if( $unMembre['idMembres'] >=1){
                        echo "Cet usager est déjà prit.";
                    } else {
                        $insertInto = "INSERT INTO Membres";
                        $fieldList = "(nomMembre, userName, motDePasse)";
                        $valueList = " VALUES ('$nom', '$usager', '$motDePasseHASH' )";

                        $lastID = insertInfo(  $insertInto, $fieldList, $valueList);
                        echo 4;
                        if ($lastID >=1){
                            $_SESSION['userName'] = $usager;
                            $_SESSION['idMembres'] = $lastID;

                            echo 3;

                            ?>
                            <script> window.location.replace('../index.php'); </script>

                            <?php

                        }else {

                            echo "Problème lors de l'inscription";
                        }
                    }

                    // TODO : (if4) Sinon message comme quoi "les mots de passe ne correspondent pas"
                } else {
                    echo "les deux mots de passes ne sont pas pareils";
                }
            }
            // TODO : (if3) Sinon message comme quoi "le nom d'utilisateur et le mot de passe doivent contenir entre 8 et 12 caractères."
        } else {
            echo "l'usager et le mot de passe doit etre entre 8 et 12 de long";
        }


        // TODO : (if2) Fin de isset($_POST['envoyerInscription']))
    }

    /* TODO : (if7) Test pour voir si le formulaire de Connexion a ete envoyé  ----- -- */

    if(isset($_POST['envoyerConnexion'])){
        echo 5;

        // TODO : (if8) Test pour vérifier si l'usager et le mot de passe ont été envoyés et non vides
    if(isset($_POST['userName']) AND isset($_POST['motDePasse'])) {
        echo 6;





        // TODO : Obtenir les informations de l'usager et de son mot de passe dans des variables via $_POST
        // ** Attention, l'oubli de addslashes ici pourra engendrer des attaques

        $usager = htmlspecialchars(addslashes($_POST['userName']));
        $motDePasse = htmlspecialchars(addslashes($_POST['motDePasse']));

        /* TODO : Faire une requête pour vérifier s'il y a un membre avec cet usager, on aura besoin du idMembre et de son mot de passe
                  ATTENTION, ici on ne veut avoir qu'un enregistrement, donc on utiliser getOneInfo()  et on n'aura pas besoin de boucle foreach
        */
        $select ="SELECT motDePasse, idMembres";
        $from = "FROM Membres";
        $where = "WHERE userName = '$usager' ";
        $orderBy = "";
        $limit = "";
        $unMembre = getOneInfo( $select, $from, $where, $orderBy,  $limit);
        echo 7;
        /* TODO : Créer une variable pour le id du membre et pour le mot de passe encrypté provenant de la BD
         */

        $idMembre =$unMembre['idMembres'];
        $motDePasseEncrypte = $unMembre['motDePasse'];

        // TODO : (if9) Test pour voir si l'id du membre est >=1

    if($idMembre >= 1) {


        // TODO : Déclarer une variable et vérifier le mot de passe avec password_verify()

        $auth = password_verify($motDePasse, $motDePasseEncrypte);
        // TODO : (if10) Si la variable de vérification est vraie
    if($auth){
        echo 9;


        $select ="SELECT nomMembre, estPremium";
        $from = "FROM Membres";
        $where = "WHERE userName = '$usager' ";
        $orderBy = "";
        $limit = "";
        $unMembre = getOneInfo( $select, $from, $where, $orderBy,  $limit);



        $_SESSION['idMembres']= $idMembre;
        $_SESSION['userName']= $usager;
        $_SESSION['nom'] = $unMembre['nomMembre'];
        $_SESSION['estPremium'] = $unMembre['estPremium'];



        ?>
        <script> window.location.replace('../index.php'); </script>
    <?php

    }else {
        echo "L'authentification a échoué. Vérifier votre mot de passe.";
    }



    /* TODO : Faire une requête pour mettre à jour le champ dernierAcces à now() pour ce membre
    *   [À VENIR] Ajouter les variables de session
    *   [À VENIR] Puis retournez à l'index
    */
    // TODO : (if10) Dire que l'authentification a échoué
    // TODO : (if9) Dire que le compte n'existe pas et qu'il faut le créer
    }
    //TODO : (if8) Fin
    }
    //TODO : (if7) Fin
    }else{
    /*  sinon     -- ----- Le formulaire n'a pas été envoyé donc on visite la page pour la premiere fois  ----- -- */
    ?>

        <h1>Inscription</h1>

        <section class="login-container">

            <form action="formConnexion.php" method="post">


                <ul>
                    <li>
                        <p>
                            <label>Votre Nom:</label>
                            <input type="text" name="nomMembre" size="10" maxlength="45" />
                        </p>
                    </li>
                    <li>
                        <p>
                            <label>Nom d'usager:</label>
                            <input type="text" name="userName" size="10" maxlength="45" required />
                        </p>
                    </li>

                    <li>
                        <p>
                            <label>Mot de passe:</label>
                            <input type="password" name="motDePasse" size="8" maxlength="12" required />
                        </p>
                    </li>
                    <li>

                        <p>
                            <label>Confirmer le mot de passe:</label>
                            <input type="password" name="verif-motDePasse" size="8" maxlength="12"/>
                        </p>
                    </li>
                </ul>
                <div align="center">
                    <input type="submit" name="submit" value="CRÉER UN COMPTE" class="submit"/>
                </div>


                <input type="hidden" name="envoyerInscription" value="TRUE">


            </form>
        </section>






        <?php
    }
    ?>

</main>


<?php include('footer.php'); ?>
