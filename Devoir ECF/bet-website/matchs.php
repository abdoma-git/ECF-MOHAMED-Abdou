<?php 
    include ("connexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Match Grid</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <style>
        .score {
            text-align: center;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .team-logo {
            max-width: 100px;
            height: 50px;
        }
         .center-button {
        margin: 0 auto;
        display: block;
    }
    </style>
    <title>Match Grid</title>
</head>
<body>
    <header>

    <?php 
        include ("menu.php");
    ?>
        
    </header>
    <main class="bg-light">

    <?php 
        //la table des joueurs 
        $matchs = $dba->prepare(" SELECT * FROM `match` ");
        $matchs->execute();
        $tableMatchs = $matchs->fetchAll();
        //boucle sur les joueurs de la table Pairs
    ?>

    <div class="container bg-light">
        <h1 class="mt-5 text-center">Liste des matchs</h1>
        <div class="row bg-light mt-5">
        <?php 
            foreach ( $tableMatchs as $ligne ){
                print('
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="col">
                                        <img src="images/la.png" alt="Team 1 Logo" class="img-fluid team-logo">
                                        <h5 class="card-title">');

                                        $k = $dba->prepare(" SELECT * FROM `equipe` WHERE id=:val ");
                                        $k->execute(array(':val'=>$ligne["team1"]));
                                        $tablek = $k->fetchAll();

                                        foreach ( $tablek as $l ){
                                            print(''.$l["nom"].'');      
                                        }

                                        


                                print('</h5>
                                    </div>
                                    <div class="col score">
                                        <br><br>
                                        <h6>'.$ligne['score1'].' - '.$ligne['score2'].'</h6> 
                                    </div>
                                    <div class="col">
                                        <img src="images/cin.png" alt="Team 2 Logo" class="img-fluid team-logo">
                                        <h5 class="card-title">');

                                        $equipe2 = $dba->prepare(" SELECT * FROM `equipe` WHERE id=:val ");
                                        $equipe2->execute(array(':val'=>$ligne["team2"]));
                                        $tableEquipe2 = $equipe2->fetchAll();

                                        foreach ( $tableEquipe2 as $l2 ){
                                            print(''.$l2["nom"].'');
                                        }   
                                        
                                        print('</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="small">Match Day: '.$ligne['match_day'].'</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p class="small">Status: '.$ligne['status'].'</p>
                                    </div>
                                </div>
                                    <a href="match.php?id='.$ligne['id'].'">
                                        <button class="btn btn-primary btn-block center-button">Details</button>
                                    </a>   
                            </div>
                        </div>
                    </div>
                    
                    ');
                }
            ?>
            
            
            
        </div>
    </div>
</main>
    <footer class="bg-light">
        <section class="container" style="display: flex; justify-content: center; align-items: center; height: 100%;">
            <div class="footer-part">
                <div class="footer-logo">
                    <img src="images/Logo.png" alt="">
                </div>
                <div class="copyright">
                    <p>Copyright &#169; 2023 STANIA</p>
                </div>
            </div>
        </section>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>
