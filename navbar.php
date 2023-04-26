<!-- Navbar exportable-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <!-- Logo -->
      <a class="navbar-brand rounded " href="index.php">
        <img class="rounded-circle" src="./images/1.png" alt="logo" width="55px">
      </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php // Restriction : Session Active
          if (isset($_SESSION['PROFILE'])) { 
            // Si session active et role = responsable
            if ($_SESSION['PROFILE']['role']=='responsable') { ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="ajoutProduit.php">Ajouter un produit</a>
              </li><?php } ?>
            <!-- Si session active-->
            <li class="nav-item">
              <a class="nav-link active" href="user.php">Utilisateurs</a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="logOut.php">
                <span class="btn btn-warning btn-sm">Se déconnecter</span>
              </a>
            </li>
            <?php }
          // Sinon (si pas connecté)
          else {?>
          <li class="nav-item">
              <a class="nav-link active" href="login.php">
                <span class="btn btn-warning btn-sm">Se connecter</span> 
              </a>
          </li>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="inscription.php">
              <span class="btn btn-warning btn-sm">S'inscrire</span>
            </a>
          </li>
        <?php } ?>
      </ul>
      <!-- Envoie des infos avec l'action $_Post vers => recherche.php pour le traitement-->
      <form action="recherche.php" method="post"class="d-flex" role="search">
        <input class="form-control me-2 animleft" type="search" name="recherche" aria-label="Search">
        <button class="btn btn-outline-success anim" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>