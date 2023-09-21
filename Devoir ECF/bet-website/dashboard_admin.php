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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <!-- Inclure les liens vers les fichiers Bootstrap et Chart.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title text-center">Espace Administrateur</h1>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="equipe-tab" data-bs-toggle="tab" href="equipe.php" role="tab" aria-controls="equipe" aria-selected="true">Création d'Équipes</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="joueur-tab" data-bs-toggle="tab" href="joueur.php" role="tab" aria-controls="joueur" aria-selected="false">Création de Joueurs</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="affectation-tab" data-bs-toggle="tab" href="affectation_equipe.php" role="tab" aria-controls="affectation" aria-selected="false">Affectation d'Équipes dans des Matchs</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="affectation-tab" data-bs-toggle="tab" href="listmatchs.php" role="tab" aria-controls="affectation" aria-selected="false">Liste des matchs</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="affectation-tab" data-bs-toggle="tab" href="listequipes.php" role="tab" aria-controls="affectation" aria-selected="false">Liste des equipes</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="affectation-tab" data-bs-toggle="tab" href="listejoueurs.php" role="tab" aria-controls="affectation" aria-selected="false">Liste des joueurs</a>
                                </li>
                            </ul>
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


 <script>
        const dates = ["13/09", "14/09", "15/09", "16/09"];
        const montants = [100, -50, 80, -30];
        const colors = montants.map(amount => amount >= 0 ? 'rgba(75, 192, 192, 0.5)' : 'rgba(255, 99, 132, 0.5)');
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Montants',
                    data: montants,
                    backgroundColor: colors,
                    borderColor: colors,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>