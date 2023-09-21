
<?php 
    include ("connexion.php");
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
<body>
    <header>
        <?php 
            include ("menu.php");
        ?>

        <div class="banner">
            <div class="banner-text"> 
                <h1 class="display-2">SUPER BOWL 2023</h1>
          <p class="h6">Bienvenue au Super Bowl, l'événement sportif incontournable ! Pariez sur vos équipes favorites en direct au stade. Ne manquez pas cette expérience unique !</p>
                <a target="_blank" href="https://www.youtube.com/watch?v=k5Ye_hOGnrA">Watch Live <i class="fas fa-arrow-right"></i></a>  
            </div>
                
            <div class="banner-img">
                <img src="images/banner.png" alt="">
            </div>
        </div>
    </header>

    <main class="bg-light">
    <?php 
        //la table des joueurs 
        $matchs = $dba->prepare(" SELECT * FROM `match` ");
        $matchs->execute();
        $tableMatchs = $matchs->fetchAll();
        //boucle sur les joueurs de la table Pairs
    ?>

        <section class="container mt-5 col-sm-10 match-jour-phone">
            <div class="match">
                <div class="match-header">
                    <div class="match-status">En direct</div>
                    <div class="match-tournament"><img  src="images/nfl.png" style="width: 100px; height: auto;"  /></div>
                    <div class="match-actions">
                        <button class="btn-icon"><i class="material-icons-outlined">Match en direct</i></button>
                    </div>
                </div>
                <div class="match-content">
                    <div class="column">
                        <div class="team team--home">
                             <div class="team-logo">
                                <img src="images/la.png" style="width: 200px; height: auto;"  />
                            </div>
                            <h2 class="team-name">Los Angeles Rams</h2>
                        </div>
                    </div>
                    <div class="column">
                        <div class="match-details">
                            <div class="match-date">
                                12/09 <strong>12:30</strong>
                            </div>
                        <div class="match-score">
                            <span class="match-score-number match-score-number--leading">15</span>
                            <span class="match-score-divider">:</span>
                            <span class="match-score-number">23</span>
                        </div>
                        <div class="match-time-lapsed">
                            47'
                        </div>
                    <?php 
                        if (isset($_SESSION["connecte"])){
                            print('
                                <a class="match-bet-place" href="parier.php"  text-white"  style="background-color: #4d0f0f;">Parier</a>
                            ');
                        }else{
                            print('
                                <a class="match-bet-place" href="login.php"  text-white"  style="background-color: #4d0f0f;">Parier</a>
                            ');                           
                        }
                    ?>
                </div>
            </div>
                    <div class="column">
                        <div class="team team--away">
                            <div class="team-logo">
                                <img src="images/cin.png" style="width: 200px; height: auto;" />
                            </div>
                            <h2 class="team-name">Cincinnati Bengals</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container bg-light">
            <h1 class="mt-5 text-center">Matchs du jour</h1>
            <div class="row bg-light mt-5">
            <?php 
                foreach ( $tableMatchs as $ligne ){
                    print('
                        <div class="col-md-4 col-sm-8">
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
            </div>
        </div>

        <section class="container mt-5">
            <div class="highlights mt-5">
                <div class="highlights-text m-4">
                    <h3>Moments forts de la Super Bowl 2023</h3>
                           <p class="mt-5 h6">Plongez dans l'action, les retournements de situation, et les performances époustouflantes de la Super Bowl 2023. Notre site vous offre des résumés captivants, des vidéos exclusives, et une couverture complète des instants mémorables qui ont marqué cette édition exceptionnelle de la Super Bowl. Ne manquez rien de l'excitation et de la magie de cet événement sportif légendaire !</p>
                    <a target="_blank" href="https://www.youtube.com/embed/sDFr2Yzd-8s">Voir plus <i class="fas fa-arrow-right"></i></a>  
                </div>
                <div class="highlights-img">
                    <img src="images/match.jpg">
                </div>
            </div>
        </section> 




        <section class="container mt-5">
            <h1>Dernières actualités</h1>
            <div class="latest-videos mt-5">
                <div class="video">
                    <iframe width="auto" height="200" src="https://www.youtube.com/embed/iHUC-cR9DbI?si=U184d9DV8DG_m1OZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <p>Mini Movie: Players Recount Super Bowl LVII Championship Season | Kansas City Chiefs</p>
                </div>
                <div class="video">
                    <iframe width="auto" height="200" src="https://www.youtube.com/embed/dllPHwmhti4?si=KCNWgNpTurBlxvOY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <p>Super Bowl LVII - Le Before Avec Peter Anderson, Anthony Mahoungou et Sébastien Sejean</p>
                    
                </div>
                <div class="video">
                    <iframe width="auto" height="200" src="https://www.youtube.com/embed/xdRHqvBlZVQ?si=bkdII2hpsSOGUmxO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <p>Comprendre Le Football Américain et Le Super Bowl 🏈 - Captain America</p>
                    
                </div>
            </div>
        </section>

       
  <section class="container mt-5">
    <h1 class="section-title section-title-two">Nos partenaires</h1>
    <div class="partners mt-5">
      <div class="partner">
        <img src="images/partners/addidas.png" alt="" />
      </div>
      <div class="partner">
        <img src="images/partners/qatar_air.png" alt="" />
      </div>

      <div class="partner">
        <img src="images/partners/Emirates.png" alt="" />
      </div>
      <div class="partner">
        <img src="images/partners/Boss.png" alt="" />
      </div>
      <div class="partner">
        <img src="images/partners/Palladium_Oro.png" alt="" />
      </div>
      <div class="partner">
        <img src="images/partners/hankook.png" alt="" />
      </div>
      <div class="partner">
        <img src="images/partners/EA.png" alt="" />
      </div>
    </div>
  </section>
    <footer>
        <section class="container" style="display: flex;
    justify-content: center; 
    align-items: center; 
    height: 100%; /">
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
        </main> 
</body>
</html>