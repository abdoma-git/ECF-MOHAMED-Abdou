<?php 
    include ("connexion.php");
    if (isset($_GET["id"])){
        $id_match = $_GET["id"];

        //la table des joueurs 
        $matchs = $dba->prepare(" SELECT * FROM `match` WHERE id=:val1 ");
        $matchs->execute(array("val1"=>$id_match));
        $tableMatch = $matchs->fetchAll();

        foreach ($tableMatch as $ligne){
            $id_team1 = $ligne["team1"];
            $id_team2 = $ligne["team2"];
        }
        
        //boucle sur les joueurs de la table Pairs

    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STANIA</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fb93ded780.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>

        <?php 
            include ("menu.php");
        ?>
        
    </header>

    <?php

        foreach ($tableMatch as $match){
            print('
            <main class="bg-light">
        
                <section class="container mt-5">
                    <div class="match">
                        <div class="match-header">
                            <div class="match-status">Details</div>
                            <div class="match-tournament"><img src="images/nfl.png" style="width: 100px; height: auto;" /></div>
                            <div class="match-actions">
                                <button class="btn-icon"><i class="material-icons-outlined">Match</i></button>
                            </div>
                        </div>
                        <div class="match-content">
                            <div class="column">
                                <div class="team team--home">
                                    <div class="team-logo">
                                        <img src="images/la.png" style="width: 200px; height: auto;" />
                                    </div>
                                    <h2 class="team-name">');

                                    $k = $dba->prepare(" SELECT * FROM `equipe` WHERE id=:val ");
                                    $k->execute(array(':val'=>$id_team1));
                                    $tablek = $k->fetchAll();

                                    foreach ( $tablek as $l ){

                                        $team1_name=$l["nom"];
                                        print(''.$l["nom"].'');      
                                    }
                                    
                            print('</h2>
                                </div>
                            </div>
                            <div class="column">
                                <div class="match-details">
                                    <div class="match-score">
                                        <span class="match-score-number match-score-number--leading">'.$match["score1"].'</span>
                                        <span class="match-score-divider">-</span>
                                        <span class="match-score-number">'.$match["score2"].'</span>
                                    </div>
                                    <div class="match-time-lapsed">
                                        '.$match["status"].'
                                    </div>');

                                    if (isset($_SESSION["connecte"])){
                                        print('
                                            <a class="match-bet-place" href="parier.php"  text-white"  style="background-color: #4d0f0f;">Parier</a>
                                        ');
                                    }else{
                                        print('
                                            <a class="match-bet-place" href="login.php"  text-white"  style="background-color: #4d0f0f;">Parier</a>
                                        ');                           
                                    }
                                    
                            print('</div>
                            </div>
                            <div class="column">
                                <div class="team team--away">
                                    <div class="team-logo">
                                        <img src="images/cin.png" style="width: 200px; height: auto;" />
                                    </div>
                                    <h2 class="team-name">');

                                    $k = $dba->prepare(" SELECT * FROM `equipe` WHERE id=:val ");
                                    $k->execute(array(':val'=>$id_team2));
                                    $tablek = $k->fetchAll();

                                    foreach ( $tablek as $l ){
                                        $team2_name=$l["nom"];
                                        print(''.$l["nom"].'');      
                                    }
                                    
                            print('</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="matchDetails" class="container mt-5">
                    <div class="container">
                        <h1 class="mb-4">Détails du match</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Nom des équipes</h2>
                                <p>'.$team1_name.' vs. '.$team2_name.'</p>
                            </div>
                            <div class="col-md-6">
                                <h2>Heure de début et heure de fin</h2>
                                <p>Heure de début : '.$match["heure_debut"].'</p>
                                <p>Heure de fin : '.$match["heure_fin"].'</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h2>Compositions</h2>
                                <p>Nombre de joueurs : 11</p>
    
                            </div>
                            <div class="col-md-6">
                                <h2>Cote des équipes</h2>
                                <p>Cincinnati Bengals : '.$match["cote1"].'</p>
                                <p>Los Angeles Rams : '.$match["cote2"].'</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h2>Statut du match</h2>
                                <p>'.$match["status"].'</p>
                            </div>
                            <div class="col-md-6">
                                <h2>Météo lors du match</h2>
                                <p>'.$match["meteo"].'</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h2>Commentaires et scores</h2>
                                <ul>
                                    <li>Commentaire 1 - Score: 0-0, "Jean Dupont réalise une superbe action!"</li>
                                    <li>Commentaire 2 - Score: 0-1, "Marie Martin marque le premier but!"</li>
                                    <li>Commentaire 3 - Score: 1-1, "Pierre Lefebvre égalise pour les Rams!"</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">');
                                if (isset($_SESSION["connecte"])){
                                    print('
                                        <a href="miser.php?team1='.$team1_name.'&team2='.$team2_name.'&smatch='.$match["status"].'"><button class="btn btn-primary" id="betButton" >Miser</button> </a>                                    ');
                                }else{
                                    print('
                                        <a href="login.php?msg=1><button class="btn btn-primary" id="betButton" >Miser</button> </a>                                    ');                           
                                }
                                
                            print('</div>
                        </div>
                    </div>
                </section>
            </main>

            ');
        }
            
        ?>
    

    <footer class="bg-light">
        <section class="container" style="display: flex; justify-content: center; align-items: center; height: 100%;">
            <div class="footer-part">
                <div class="footer-logo">
                    <img src="images/Logo.png" alt="">
                </div>
                <div class="social-icons">
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-youtube"></i>
                </div>
                <div class="copyright">
                    <p>Copyright &#169; 2023 STANIA</p>
                </div>
            </div>
        </section>
    </footer>
</body>
</html>
