<?php include 'konekcija.php';



include 'header.php';
include 'navigacija.php';


 ?>


 <body style="background-image:url(images/druga.jpg); background-repeat: no-repeat;
  background-size: 100% 100%;">
<br></br>
   <div><h1 style="text-align: center;">Pregled proizvoda Christmas shop</h1></div>
 	<hr>

  <div class="background" style=" border: 2px solid blue; margin: 20px 20px;">



 
  <div class="transbox" style="margin: 30px;
  background-color: white;
  border: 1px solid blue;
  opacity: 0.7;
  filter: alpha(opacity=60);">


<div style="margin: 40px 40px;">
<table class="table table-striped" style=" margin-top: 3%; border: 2px solid blue; ">
  <thead> 
    <tr>
      <th scope="col">Naziv proizvoda</th>
      <th scope="col">Cena</th>
      <th scope="col">Opis</th>
      <th scope="col">Brend</th>
    </tr>
  </thead>
  <tbody >
      <?php $proizvod = $db->rawQuery("select * from proizvod p join brend b on p.brendID=b.brendID");

                  foreach($proizvod as $p){
               ?>


    <tr>
    
      <td><?php echo $p['nazivProizvoda']; ?> </td>
       <td><?php echo $p['cena']; ?> din. </td>
      <td><?php echo $p['opisProizvoda']; ?> </td>
      <td><?php echo $p['nazivBrenda']; ?> </td>
    </tr>
   
     <?php  } ?>
  </tbody>
</table>
 </body>
</div>
</div>
</div>

 
  <?php include 'footer.php'; ?>
  

</body>
</html>