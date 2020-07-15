<?php include 'konekcija.php'; ?>
<?php include 'header.php'; 
include 'navigacija.php';
 

?>

<?php  
 $connect = mysqli_connect("localhost", "root", "", "christmasshop");  
 
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO images(name) VALUES ('$file')";  
      if(mysqli_query($connect, $query))  
      {  
           
      }  
 }  
 ?>  
       


  <body style="background-image:url(images/4.jpg); background-repeat: no-repeat;
   background-size: 100% 2500px;">
    


    <!-- Ubacivanje grafika- kolicine po proizvodima-->
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
    
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(grafik);

    function grafik() {
    		    var jsonData = $.ajax({
    		    url: "podaciGrafik.php",
    		    dataType:"json",
    		    async: false
    		  }).responseText;
    		  var data = new google.visualization.DataTable(jsonData);
    		  var options = {'title':'Statistika proizvoda',

    		   backgroundColor: { fill:'transparent' },
    		    titleTextStyle: {
    		  textAlign: 'center',
    		      color: 'black',
    		      fontSize: 38},
    		      'width':800,
    		      'height':700,
    		      is3D:true,
    		  legend: {
    		      textStyle: {
    		    color: 'black'
    		      }
    		  },
    		  };

    		  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));


    		  chart.draw(data,  options);

    		}
    </script>
  
    <div id="chart_div" style="width:100; height:100; margin-left: 20%;"></div>


<!-- anketa za glasanje -->
 <div id="poll" style="margin-left: 37%; margin-top: 35px; margin-bottom: 10px;">
<h3>Da li Vam se svidja izbor brendova?</h3>
<form style="margin-bottom: 15%;">
Da:
<input type="radio" name="vote" value="0" onclick="getVote(this.value)">
<br>Ne:
<input type="radio" name="vote" value="1" onclick="getVote(this.value)">
</form>
</div>


 
<script>
function getVote(int) {
 
 xmlhttp=new XMLHttpRequest();
  
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>

<!-- Ubacivanje slike u bazu podataka -->
     <div style="margin-left: 30%;">
      <h2><b>Ubacite sliku omiljenih proizvoda</b></h2>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
                    
                   <button type="submit" name="insert" id="insert" class="btn btn-primary btn-md" style="border-radius: 12px;  border: 2px solid #9ccce5; margin-left: 15%; margin-bottom: 5px;" >Ubacite sliku</button> 
                   
                </form>  
                <br>
               

                
                              
</div> 
<hr style="border: 1px solid grey;">
                     
                <?php  
                $query = "SELECT * FROM images ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                     <div>
                          <div class="gallery"  style=" float: left; margin-left:6%; margin-bottom:5%;">
               
               <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" alt="Trolltunga Norway" style="width: 200px;
    height: 200px;  border-radius: 50%; ">
              

                </div>
                     ';  
                }  
                ?>  
               


  <?php include 'footer.php'; ?>
  

</body>

</html>