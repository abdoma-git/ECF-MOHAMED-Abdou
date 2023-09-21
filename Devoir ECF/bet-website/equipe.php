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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title text-center">Ajouter une Équipe</h1>
                            <?php 
                                //la table des joueurs 
                                $players = $dba->prepare(" SELECT * FROM `joueur` ");
                                $players->execute();
                                $tablePlayers = $players->fetchAll();
                                //boucle sur les joueurs de la table Pairs
                        
                            ?>

                            <form method="POST"> 
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom de l'Équipe</label>
                                    <input type="text" id="nom" name="nom" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pays" class="form-label">Pays d'appartenance</label>
                                    <input type="text" id="pays" name="pays" class="form-control" required>
                                </div>
                                <div class="mb-3" id="joueurs">
                                    <label for="joueur1" class="form-label">Joueurs</label>

                                    <label for="joueur1" class="form-label">Joueur1</label>
                                    <div class="input-group">
                                        <select id="joueur1" name="joueur1" class="form-control" required>
                                            <option> Selectionner un joueur </option>
                                            
                                            <?php 
                                                foreach ( $tablePlayers as $ligne ){
                                                    print('
                                                        <option value='.$ligne["id"].'>
                                                        '.$ligne["nom"].' '.$ligne["prenom"].'
                                                        </option>
                                                    ');
                                                }
                                            ?>
                                            
                                        </select>
                                        <button type="button" class="btn btn-secondary" onclick="ajouterJoueur()">Ajouter un Joueur</button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>

                            <?php 
                                if ((!empty($_POST['nom'])) && (!empty($_POST['pays'])) && (!empty($_POST['joueur1'])) ){
                                    
                                    $nom = $_POST["nom"];
                                    $pays = $_POST["pays"];
                                    
                                    // Récupère les joueurs de 1 à 11 (vous pouvez les traiter en boucle)
                                    $joueurs = array();

                                    for ($i = 1; $i <= 11; $i++) {
                                        $joueur = $_POST["joueur$i"];
                                        $joueurs[] = $joueur;
                                    }

                                    $equipes = $dba->prepare("INSERT INTO `equipe` (nom, pays, j1, j2, j3, j4, j5, j6, j7, j8, j9, j10, j11)
                                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                    $equipes->execute(array($nom, $pays, $joueurs[0], $joueurs[1], $joueurs[2], $joueurs[3],$joueurs[4],$joueurs[5],$joueurs[6],$joueurs[7],$joueurs[8],$joueurs[9],$joueurs[10]));
                                    echo " </br> Enregistrement réussi.";

                                }
                            ?>

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

     <script>
        let joueurCount = 1;

        function ajouterJoueur() {
            joueurCount++;
            const joueurDiv = document.createElement('div');
            joueurDiv.classList.add('mb-3');
            joueurDiv.innerHTML = `
                <label for="joueur${joueurCount}" class="form-label">Joueur ${joueurCount}</label>
                <div class="input-group">
                    <select id="joueur${joueurCount}" name="joueur${joueurCount}" class="form-control" >
                        <option> Selectionner un joueur </option>
                        <?php 
                            foreach ( $tablePlayers as $ligne ){
                                print('
                                    <option value='.$ligne["id"].'>
                                    '.$ligne["nom"].' '.$ligne["prenom"].'
                                    </option>
                                ');
                            }
                        ?>
                    </select>
                    <button type="button" class="btn btn-secondary" onclick="supprimerJoueur(this)">Supprimer</button>
                </div>
            `;
            
            document.getElementById('joueurs').appendChild(joueurDiv);
        }

        function supprimerJoueur(button) {
            joueurCount--;
            button.parentElement.parentElement.remove();
        }
    </script>

</body>
</html>
