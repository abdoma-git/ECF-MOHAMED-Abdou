<?php 
    include("connexion.php");
    $matchs = $dba->prepare(" SELECT * FROM `match` ");
    $matchs->execute();
    $tableMatchs = $matchs->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Parier</title>
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
        <div class="container bg-light">
            <h1 class="mt-5 text-center">Parier</h1>
            <form id="parierForm" method="POST">
                <div class="row bg-light mt-5">
                    <?php
                        print('
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <div class="row">
                                            <div class="col">
                                                <img src="images/la.png" alt="Team 1 Logo" class="img-fluid team-logo">
                                                <h5 class="card-title">Team 11</h5>
                                            </div>
                                            <div class="col score">
                                                <br><br>
                                                <h6>14 - 21</h6> 
                                            </div>
                                            <div class="col">
                                                <img src="images/cin.png" alt="Team 2 Logo" class="img-fluid team-logo">
                                                <h5 class="card-title">Team 2</h5>
                                            </div>
                                        </div>
                                        <input type="radio" name="parierMatch" value="match1">
                                    </div>
                                </div>
                            </div>
                        ');
                    ?>
                </div>
                <!-- Bouton "Miser sur la sélection" -->
                <button type="submit" id="miserSelectionButton" class="btn btn-primary">Miser sur la sélection</button>
            </form>
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

</body>
</html>
