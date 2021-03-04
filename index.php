<?php require_once("includes/header.inc.php"); ?>

    

<?php




    if (!empty($_SESSION['user']) || !empty($_COOKIE['stayConnectCookie'])) {
        
        ?><h2>Bienvenue, <?php echo $_SESSION['user'];?></h2> 

    <?php
    }
    
    
    
    
    ?>




<?php require_once("includes/footer.inc.php"); ?>