<?php require_once("includes/header.inc.php"); ?>


    
    <h1>Connection</h1>


    <div class="logindiv">


        <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" aria-describedby="pseudoHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

    <div class="formRegister">

        <?php
    
    
    if (empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['password'])) {
        
        ?>
        <p>Veuillez remplir les champs.</p>
        <?php

    } else {
        
        
        var_dump($_POST);
        
        
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        
        
        $checkEmail = $pdo->query("SELECT COUNT(*) FROM user WHERE email = '".$email."' ");
        
        $checkPseudo = $pdo->query("SELECT COUNT(*) FROM user WHERE pseudo = '".$pseudo."' ");
        
        $fetchCheckEmail = $checkEmail->fetch(PDO::FETCH_COLUMN);
        
        $fetchCheckPseudo = $checkPseudo->fetch(PDO::FETCH_COLUMN);
        
        
        
        echo '<br>';
        
        if ($fetchCheckEmail > 0 or $fetchCheckPseudo > 0) {
            if ($fetchCheckEmail > 0) { ?>
            <div class="registererror">

                <div class="alert alert-danger">
                <p>
                    Cet Email est déjà attribué...
                </p>
                </div>

                <br>

                <button class="btn btn-primary"><a href="login.php">Login</a></button>


                <?php } elseif ($fetchCheckPseudo > 0) { ?>

                    <div class="alert alert-danger">

                        <p>
                            Ce Pseudo est déjà attribué...
                        </p>
                    
                    </div>

                    <br>

                    <button class="btn btn-primary"><a href="login.php">Login</a></button>
                    
                    <?php }
        } else {
            try {

                $result = $pdo->exec("INSERT INTO user (pseudo, email, mdp) VALUES ('".$pseudo."', '".$email."','".$password."')");

        
        ?>
            <div class="alert alert-success">
                <h1> Vous êtes enregistré</h1>
            </div>
            <a href="FormLogin.php">Login</a>

        <?php } catch (PDOException $e) {
                
                echo "command failed" . $e->getmessage;
            
            }
        }
        ?>    
            </div>
            <?php


    }   

?>
</div>
    
    
    <?php require_once("includes/footer.inc.php"); ?>