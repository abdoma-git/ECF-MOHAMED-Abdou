<?php 
    session_start();
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-blue p-3">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
        <li class="nav-item active">

                <?php 
                
                    if (isset($_SESSION["role"]))
                    {
                        if ($_SESSION["role"] == 1)
                        {
                            print('
                                <a class="nav-link text-white" href="dashboard_Admin.php">Accueil</a>
                            ');                            

                        }else{

                            print('
                                <a class="nav-link text-white" href="index.php">Accueil</a>
                            ');
                        }
                    }

                    else{
                        print('
                            <a class="nav-link text-white" href="index.php">Accueil</a>
                        ');
                    }
                ?>
                
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="matchs.php">Matchs</a>
            </li>
            <li class="nav-item">
                <?php 
                    if (isset($_SESSION["connecte"])){
                        print('
                            <a class="nav-link text-white" href="parier.php">Parier</a>
                        ');
                    }else{
                        print('
                            <a class="nav-link text-white" href="login.php?msg=1">Parier</a>
                        ');
                    }
                ?>               
            </li>
            <li class="nav-item">
                <?php 
                    if (isset($_SESSION["connecte"])){

                        if (isset($_SESSION["role"]))
                        {
                            if ($_SESSION["role"] == 1)
                            {
                                print('
                                    <a class="nav-link text-white" href="dashboard_Admin.php">Mon espace</a>
                                ');                            

                            }else{

                                print('
                                    <a class="nav-link text-white" href="dashboard.php">Mon espace</a>
                                ');
                            }
                        }

                    }else{
                        print('
                            <a class="nav-link text-white" href="login.php?msg=1">Mon Espace</a>
                        ');
                    }
                ?>
            </li>
        </ul>
    </div>

    <div class="login">
        <i class="fas fa-sign-in-alt"></i>
        <?php
            if (isset($_SESSION["connecte"])){
                if ($_SESSION["connecte"] == 1){
                    print ("
                        <a href='deconnexion.php'>Se deconnecter</a>
                    ");
                }else{
                    print ("
                        <a href='login.php'>Se connecter</a>
                    ");
                }
            }else{
                print ("
                        <a href='login.php'>Se connecter</a>
                    ");
            }
                
        
        ?>
    </div>
</nav>

