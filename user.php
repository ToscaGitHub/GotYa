<?php require_once("includes/header.inc.php"); ?>




    <a href="logout.php">Logout</a>


    <?php

    if (isset($_POST['name'])) {
        $id = $_POST['name'];
        $pdo->exec("UPDATE anecdotes SET del_flag = 1");
    }


    $result = $pdo->query("SELECT id_user FROM user WHERE pseudo = '".$_SESSION['user']."'");

    $user = $result->fetch(PDO::FETCH_OBJ);

    $result = $pdo->query("SELECT * FROM anecdotes WHERE id_author = '$user->id_user'");
    
    while($anecdotes = $result->fetch(PDO::FETCH_ASSOC))
    {
        
        if ($anecdotes['del_flag'] == 0) { ?>

        <div class="card">
            <div class="card-header">  

                <h5>
                    ID de l'Anecdote : <?php echo $anecdotes['id_anecdote']; ?>
                </h5>
                <h3>Titre de l'Anecdote :
                    <?php
                        echo $anecdotes['titre'];
                    ?>
                </h3>

            </div>
            <div class="card-body">
                <p class="card-text">Contenue de l'Anecdote : <?php echo $anecdotes['anecdote'];?></p>
            
            </div>
            <button onclick="SuppAnec(this.value)" value="<?php echo $anecdotes['id_anecdote']; ?>" >Supprimer</button>
        </div>
        


    <?php
    } else {


    }
}
    ?>


    












<?php require_once("includes/footer.inc.php"); ?>