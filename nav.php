<!-- <?php print_r($_COOKIE) ?> -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #FFD580;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">EasyEatsHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-4 mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="recipes.php">Recipes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
      <form class="d-flex me-auto mb-2 mb-lg-0" method="get" action="recipes.php">
        <input name="name" class="form-control me-2" type="search" placeholder="Search Recipes" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar-nav me-5 mb-2 mb-lg-0">
        <?php
        if (isset($_COOKIE['user'])) {
          echo '<li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                  </li>';
        } else {
          echo '<li class="nav-item">
                <a class="nav-link" href="login.php">Login</a></li><li>
                <a class="nav-link" href="register.php">Register</a>
                  </li>';
        }
        ?>
      </ul>
    </div>
  </div>
</nav>