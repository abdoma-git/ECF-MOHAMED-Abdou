<?php 
    include("connexion.php");
    
    if (isset($_GET["idmatch"])){
        $action = $dba->prepare("DELETE FROM `equipe` WHERE id=:valo ");
        $action->execute(array(":valo"=>$_GET["idmatch"]));
        header("Location : listmatchs.php");
    }
    
   
?>
