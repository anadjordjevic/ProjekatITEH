

<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #ffffff;border-bottom: 2px solid blue;border-top: 2px solid blue;font-color:blue;">
    <div class="container">
       <a href="index.php" class="navbar-brand">Christmas shop</a>
        <ul class="nav navbar-nav">
       
        <li><a href="proizvodi.php">Lista proizvoda</a></li>
      

        <li><a href="prodajniObjekti.php">Prodajni objekti</a></li>

        <li><a href="valuta.php">Kurs</a></li>
        
        <?php if($_SESSION['user'] != ''){ ?>
      
       
        <li><a href="dodajStanje.php">Dodaj na stanje</a></li>
         <li><a href="grafik.php">Sve o proizvodima </a></li>
       


        <?php if($_SESSION['user']['uloga'] == 1){ ?>
    
          <li><a href="trenutnoStanje.php">Trenutno stanje</a></li>
        
        <li><a href="dodajProizvod.php">Dodaj proizvod</a></li>
         <li><a href="dodajBrend.php">Dodaj brend</a></li>
      <?php } ?>
      
      <li><a href="logout.php">Logout</a></li>
    <?php }else{ ?>

      <li><a href="register.php">Registracija</a></li>
      <li><a href="login.php">Login</a></li>
    <?php } ?>
      </ul>
    </div>
  </nav>
