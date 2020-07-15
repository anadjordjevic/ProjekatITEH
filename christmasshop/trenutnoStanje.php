<?php include 'konekcija.php';


if($_SESSION['user']['uloga'] =='0' || $_SESSION['user']==''){
  header("Location:login.php");
  echo "Morate biti korisnik da bi dodali stanje";
  exit;
}
include 'header.php';
include 'navigacija.php';


 ?>


 <body style="background-image:url(images/gifts3.jpg); background-repeat: no-repeat;
  background-size: 100% 900px;">

   <div><h1 style="text-align: center;">Trenutno stanje u Christmas shop-u</h1></div>
 	<hr>



<div style="margin: 40px 40px;">
<table class="table table-condensed table-bordered" style=" margin-top: 3%; border: 3px solid blue; background: rgba(255,255,255,0.7);">

  <tr style="background-color: #0c0c0c;">
    <th>Naziv prodavnice</th>
    <th>Naziv proizvoda</th>
    <th>Brend</th>
    <th>Količina</th>
    <th>Izmeni</th>
    <th>Obriši</th>
  </tr>



     <?php 

              //$stanje = $db->rawQuery("select * from stanjezaliha s join prodavnica p on s.prodavnicaID=p.prodavnicaID join proizvod pr on s.proizvodID = pr.proizvodID join brend b on pr.brendID=b.brendID");

               $zahtev = curl_init("http://localhost/christmasshop/api/stanja");
              curl_setopt($zahtev, CURLOPT_RETURNTRANSFER, 1);
              $odgovor = curl_exec($zahtev);
              $stanje = json_decode($odgovor);
              curl_close($zahtev);

  


                  foreach($stanje as $s){
               ?>


    <tr>
     
    
      <td><?php echo $s->nazivProdavnice; ?> </td>
       <td><?php echo $s->nazivProizvoda; ?></td>
      <td><?php echo $s->nazivBrenda; ?> </td>
      <td><?php echo $s->kolicina; ?> </td>
      <td ><a href="izmeniStanje.php?id=<?php echo $s->stanjeID; ?>" ><i class="fa fa-bars fa" aria-hidden="true" style="color: black;"></i></a> </td>
      <td ><a href="obrisiStanje.php?id=<?php echo $s->stanjeID; ?>"><i class="fa fa-trash fa" aria-hidden="true" style="color: black"></i></a> </td>
               </tr>
  
    <?php  } ?>

</table>


 </body>
</div>
</div>
</div>



 
  <?php include 'footer.php'; ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</body>
</html>