<?php include('header2.php'); ?>

<?php if (isset($_POST['envoyerEdit'])) {


    $id = $_SESSION['userName'];

    $nom = htmlspecialchars(addslashes($_POST['nomMembre']));
    $usager = htmlspecialchars(addslashes($_POST['userName']));
    $motDePasse = htmlspecialchars(addslashes($_POST['motDePasse']));

    if(!empty($_POST['nomMembre'])){
    $update = "UPDATE Membres";
    $set = "SET nomMembre = '$nom' ";
    $where = "WHERE username = '$id' ";
    $noRows = updateInfo($update, $set, $where);
    }

 if(!empty($_POST['userName'])){
    $update = "UPDATE Membres";
    $set = "SET userName = '$usager' ";
    $where = "WHERE username = '$id' ";
    $noRows = updateInfo($update, $set, $where);
    }




   ?>




    <script> window.location.replace('../index.php'); </script>
    <?php
    }

    ?>
    <form action="formEditProfile.php" method="post" class="form-login">

        <!-- ----- Connexion  ----- -->

        <fieldset>
            <p>
                Profil de <?php echo $_SESSION['nom']; ?>
            </p>
            <br/>

            <p>
                <label>Nom:</label>
                <input type="text" name="nomMembre" size="10" maxlength="45" required/>
            </p>

            <p>
                <label>Nom d'usager:</label>
                <input type="text" name="userName" size="10" maxlength="45" required/>
            </p>

            <p>
                <label>Nouveau mot de passe:</label>
                <input type="password" name="motDePasse" size="8" maxlength="12" />
            </p>
            <p>
                <label> Confirmer le mot de passe:</label>
                <input type="password" name="motDePasse" size="8" maxlength="12" />
            </p>


            <!-- ----- bouton envoyer  ----- -->

            <input type="submit" name="submit" value="Enregistrer" class="myButton"/>
            <input type="hidden" name="envoyerEdit" value="TRUE">

        </fieldset>
    </form>

            <p>Vous devrez vou reconnectez pour voir les changements apparaitre.</p>


    </section>

<?php include('footer.php'); ?>