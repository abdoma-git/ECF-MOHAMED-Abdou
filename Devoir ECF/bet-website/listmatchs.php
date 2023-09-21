<?php 
    include ("connexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace - STANIA</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fb93ded780.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</head>
<body>
    <header>
        <?php 
            include ("menu.php");
        ?>
    </header>

    <main class="bg-light">
        <section class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title text-center">Liste des Matchs</h1>
                            
                            <div class="tab-content" id="myTabContent">
                                <?php 
                                    //la table des matchs 
                                    $matchs = $dba->prepare(" SELECT * FROM `match` ");
                                    $matchs->execute();
                                    $tableMatch = $matchs->fetchAll();
                                    //boucle sur les joueurs de la table Pairs
                                ?>
                                <div class="tab-pane fade show active" id="bet-history" role="tabpanel" aria-labelledby="bet-history-tab">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>id team1</th>
                                                <th>id team2</th>
                                                <th>score 1</th>
                                                <th>score 2</th>
                                                <th>match_day</th>
                                                <th>status</th>
                                                <th>heure_debut</th>
                                                <th>heure_fin</th>
                                                <th>meteo</th>
                                                <th>cote1</th>
                                                <th>cote2</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($tableMatch as $ligne){
                                                    print('
                                                        <tr>
                                                            <td>'.$ligne["id"].'</td>
                                                            <td>'.$ligne["team1"].'</td>
                                                            <td>'.$ligne["team2"].'</td>
                                                            <td>'.$ligne["score1"].'</td>
                                                            <td>'.$ligne["score2"].'</td>
                                                            <td>'.$ligne["match_day"].'</td>
                                                            <td>'.$ligne["status"].'</td>
                                                            <td>'.$ligne["heure_debut"].'</td>
                                                            <td>'.$ligne["heure_fin"].'</td>
                                                            <td>'.$ligne["meteo"].'</td>
                                                            <td>'.$ligne["cote1"].'</td>
                                                            <td>'.$ligne["cote2"].'</td>
                                                            <td class="justify-content-between">');

                                                            print('
                                                                <a href="deletematch.php?idmatch='.$ligne["id"].'">
                                                                    <button class="btn btn-danger btn-sm">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </a>
                                                                <a>
                                                                    <button class="btn btn-primary btn-sm my-2">
                                                                        <i class="fas fa-edit"></i> 
                                                                    </button>
                                                                </a>
                                                            ');
                                                        }
                                                            
                                                        print(' 
                                                            </td>
                                                        </tr>
                                                    ');
                                                
                                                
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
