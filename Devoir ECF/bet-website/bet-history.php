<?php 
    include ("connexion.php");
    $mises = $dba->prepare(" SELECT * FROM `historique_mise`");
    $mises->execute();
    $tableMises = $mises->fetchAll();
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title text-center">Mon Espace</h1>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="dashboard.php" role="tab">Dashboard</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="user-info.php" role="tab" >Informations Utilisateur</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" href="bet-history.php" role="tab">Historique des Mises</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="bet-history" role="tabpanel" aria-labelledby="bet-history-tab">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Match</th>
                                                <th>Montant Misé (USD)</th>
                                                <th>Équipe Mise</th>
                                                <th>Résultat</th>
                                                <th>Actions</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($tableMises as $ligne){
                                                    print('
                                                        <tr>
                                                            <td>'.$ligne["date"].'</td>
                                                            <td>'.$ligne["id_match"].'</td>
                                                            <td>'.$ligne["Montant_mise"].'</td>
                                                            <td>'.$ligne["Equipe_mise"].'</td>
                                                            <td>'.$ligne["resultat"].'</td>
                                                            <td class="justify-content-between">');

                                                            if ($ligne["resultat"] == "En attente" || $ligne["resultat"] == "En cours" ){
                                                                print('
                                                                    <a data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                                                        <button class="btn btn-danger btn-sm">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </a>
                                                                    <a href="miser.php">
                                                                        <button class="btn btn-primary btn-sm my-2">
                                                                            <i class="fas fa-edit"></i> 
                                                                        </button>
                                                                    </a>
                                                                ');
                                                            }
                                                            else{
                                                                print('-----');
                                                            }
                                                            
                                                        
                                                        print(' 
                                                            </td>
                                                        </tr>
                                                    ');
                                                }
                                                
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Fenêtre modale de confirmation de suppression -->
                                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de suppression</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer cet élément ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn btn-danger">Supprimer</button>
                                            </div>
                                        </div>
                                    </div>
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
