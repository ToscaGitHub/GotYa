<?php require_once("includes/header.inc.php"); ?>

    

<?php




    if (!empty($_SESSION['user']) || !empty($_COOKIE['stayConnectCookie'])) {
        
        ?><h2>Bienvenue, <?php echo $_SESSION['user'];?></h2> 

    <?php
    }
    ?>

    <main>

        <div class="feed">

            <div class="enterNew">
        
                    <form action="" method="POST">
                        
                        <div class="BoxChatNewTitle">
                            <input type="text" id="chatNewTitle" name="chatNewTitle" placeholder="Entrer votre titre...">
                        </div>
                        <hr>
                        <div class="BoxChatNewText">
                            <textarea id="chatNewText" name="chatNewText" placeholder="Entrer votre message..."></textarea>
                        </div>
                        <div class="vfChoice">
                            <div class="vraiChoice">

                                <input type="radio" id="vrai" name="vraifaux" value="VRAI" onclick="sumValuesVrai()">
                                <label for="vrai">VRAI</label>

                            </div>

                            <div class="fauxChoice">

                                <input type="radio" id="faux" name="vraifaux" value="FAUX" onclick="sumValuesFaux()">
                                <label for="faux">FAUX</label>

                            </div>
                                
                        <?php

                            $errorChat = 'Vous devez être connecté ou vous inscrire pour poster votre message.';

                         
                            if (isset($_SESSION['user'])) {
                            ?>
                                                
                                <input class="sendAll" type="submit">
                                            
                            <?php


                                $titre = $_POST['chatNewTitle'];
                                $anecTexte = $_POST['chatNewText'];
                                $vraifaux = $_POST['vraifaux'];
                                $delflag = 0;




                                $result = $pdo->query("SELECT id_user FROM user WHERE pseudo = '".$_SESSION['user']."'");

                                $user = $result->fetch(PDO::FETCH_OBJ);

                                $result = $pdo->exec("INSERT INTO anecdotes (id_author, titre, anecdote, vraifaux, del_flag) VALUES ('".$user->id_user."', '$titre', '$anecTexte','$vraifaux','".$delflag."')");



                            } else {
                            ?>

                                <button type="button" class="sendAll" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Envoyer
                                </button>
                            
                            
                                                
                            <?php
                            }
                            ?>


                        </div>

                    </form>


  
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Erreur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vous devez être connecté ou vous inscrire pour poster votre message.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
                </div>
            </div>
            </div>

            
            </div>

            <div class="feedOther">
            
                <?php

                    
                    $result = $pdo->query("SELECT * FROM anecdotes");
                    while($anecdotes = $result->fetch(PDO::FETCH_ASSOC))
                    {  
                        if ($anecdotes['del_flag'] == 0) {
                ?>
                        <div class="card">
                            <div class="card-header">  

                                <h3>
                                    <?php
                                        echo $anecdotes['titre'];
                                    ?>
                                </h3>

                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo $anecdotes['anecdote'];?></p>
                            
                            </div>
                        </div>


                <?php

                      } else {

                      } 
                    }
                    echo $result->rowCount() . ' enregistrement(s) récupéré(s) par la requête SELECT';
                    
                ?>

            </div>

        </div>

        <div class="TierList">
        
            <p>a</p>
        
        </div>

    </main>

<?php require_once("includes/footer.inc.php"); ?>