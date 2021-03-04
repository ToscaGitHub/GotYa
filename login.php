<?php require_once("includes/header.inc.php"); ?>


    
    <h1>Connection</h1>


    <div class="logindiv">


        <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" aria-describedby="pseudoHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="stayConnect" name="stayConnect">
            <label class="form-check-label" for="exampleCheck1">Rester Connecter</label>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

    <?php

    if (!empty($_POST)) {
    
        
        // var_dump($_POST);
        // var_dump($_POST['stayConnect']);
        
        
        
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        
        $result = $pdo->query("SELECT pseudo, mdp FROM user WHERE pseudo = '".$pseudo."' AND mdp = '".md5($_POST['password'])."' ");
        $userinfo = $result->fetch(PDO::FETCH_OBJ);
        
        
        // var_dump($_SESSION);
        
        
        // var_dump($userinfo);
        
        if ($userinfo == true) {
            
            session_start();
            $_SESSION['user'] = $_POST['pseudo'];
            
            if (!empty($_POST['stayConnect'])) {
                
                $t = $pdo->query("SELECT id_user FROM user WHERE pseudo = '".$pseudo."' AND mdp = '".md5($_POST['password'])."' ");
                $token = $t->fetch(PDO::FETCH_OBJ);
                
                // var_dump($token);
                
                setcookie("stayConnectToken", "$token->id_user", time()+60*60*24*365);
                
                // var_dump($_COOKIE);
                
            }
            
            header('location:index.php');
            exit();
            
        } else {

            ?>

                <div class="alert alert-danger errorLogin">

                    <h3>Votre pseudo ou votre mot de passe est incorrect...</h3>

                </div>

            <?php

        }
    }
        
        
        
        
        

?>
    
    
    <?php require_once("includes/footer.inc.php"); ?>