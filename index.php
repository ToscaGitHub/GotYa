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
                        <input class="vraiChoice" type="button" id="vrai" name="vrai" value="VRAI" onclick="sumValuesVrai()">

                        <input class="fauxChoice" type="button" id="faux" name="faux" value="FAUX" onclick="sumValuesFaux()">
                    </div>

                </form>

            <?php

            $errorChat = 'Vous devez être connecté ou vous inscrire pour poster votre message.';

            

            if (!empty($_SESSION['user'])) {


    
            }
            else { ?>

                <div class="alert alert-danger errorChat">

                    <p><?php echo $errorChat; ?></p>

                </div>


            <?php
            }
            ?>
            

        </div>

        <div class="feedOther">
        
            


        </div>

    </div>

    <div class="TierList">
    
    <p>a</p>
    
    </div>


    </main>

<?php require_once("includes/footer.inc.php"); ?>