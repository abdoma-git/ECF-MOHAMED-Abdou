<?php 
    $servername = 'localhost';
    $dbname = 'cours';
    $user = 'root';
    $password = '';

    try 
    {
        $dba = new PDO("mysql:host=$servername;dbname=$dbname",$user,$password);
        $dba->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
    } 
    catch (PDOException $error) 
    {
        echo "connection failed : ".$error->getMessage() ."<br/>";
    }
?>
