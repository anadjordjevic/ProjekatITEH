
<?php include 'konekcija.php'  ?>
<?php include 'header.php'; 
include 'navigacija.php';


?>
   <body style="background-image:url(images/druga.jpg); background-repeat: no-repeat;
   background-size: 100% 100%;">

<div style="margin-top: 8%;  margin-left: 35%; ">
      <h2 style="color: red;!important">Proverite današnji kurs</h2>
     <form method="GET" action="">
        <div class="form-group">
              <label for="iznos" class="cols-sm-2 control-label" style="color: red;!important">Iznos : </label>
           
                <div class="input-group" style="width: 20%">
                  
                  <input type="text" class="form-control" name="iznos" id="iznos"  placeholder="Iznos"/>
                
              </div>
            </div>
     

       <div class="form-group">
              <label for="izvalute" class="cols-sm-2 control-label" style="color: red;!important">Iz valute : </label>
           
                <div class="input-group" style="width: 20%">
                <select name="izvalute" class="form-control">                    
                     <option value="eur">Evro (eur)</option>  
                     <option value="rsd">Dinar (rsd)</option>
                     <option value="usd">Americki Dolar (usd)</option>
                     <option value="aud">Australijski dolar (aud)</option>
                     <option value="chf">Svajcarski franak (chf)</option>
                     <option value="gbp">Funta (gbp)</option>
                     <option value="bam">Konvertibilna Marka (bam)</option>
                     <option value="czk">Ceska Kruna (czk)</option>
                     <option value="cad">Kanadski Dolar (cad)</option>
                     <option value="jpy">Jen (jpy)</option>
                     <option value="rub">Rublja (rub)</option>
                  </select>
                  
                
              </div>
            </div>

            <div class="form-group">
              <label for="uvalutu" class="cols-sm-2 control-label" style="color: red;!important">U valutu : </label>
              
           
                <div class="input-group" style="width: 20%">
                <select name="uvalutu" class="form-control">                    
                     <option value="rsd">Dinar (rsd)</option>
                     <option value="eur">Evro (eur)</option> 
                     <option value="usd">Americki Dolar (usd)</option>
                     <option value="aud">Australijski dolar (aud)</option>
                     <option value="chf">Svajcarski franak (chf)</option>
                     <option value="gbp">Funta (gbp)</option>
                     <option value="bam">Konvertibilna Marka (bam)</option>
                     <option value="czk">Ceska Kruna (czk)</option>
                     <option value="cad">Kanadski Dolar (cad)</option>
                     <option value="jpy">Jen (jpy)</option>
                     <option value="rub">Rublja (rub)</option>
                  </select>
                  
                
              </div>
            </div>
          
           <div class="form-group ">
              <button type="submit" value="konvertuj" name="submit" id="button" class="btn btn-default btn-lg" style="border-radius: 12px;  border: 3px solid red; margin-left: 15%; " >Konvertuj</button>
            </div>
        
     </form>


   <?php if (!empty ($_GET['iznos'])&&!empty ($_GET['izvalute'])&&!empty ($_GET['uvalutu'])){?>
    <?php
    $iznos = $_GET['iznos'];
    $izvalute = $_GET['izvalute'];
    $uvalutu = $_GET['uvalutu'];
    $url = 'https://api.kursna-lista.info/0e0156083e1ccc17dc40319ca542628a/konvertor/'.$izvalute.'/'.$uvalutu.'/'.$iznos;

     $curl = curl_init($url);

     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_POST, false);
    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $parsiran_json = json_decode ($curl_odgovor);

?>
<h2 style="color: red;font-weight: bold; !important">Rezultat:</h2>
<p style="font-size: 20px; color: red; font-weight: bold; font-size:30px!important"   ><?php echo $iznos;?> <?php echo $izvalute;?> vredi <?php echo $parsiran_json->result->value;?> <?php echo $uvalutu;?>.</p>

<?php
}
?>
</div>

<img src="images/v1.png" style="height: 100px; width: 100px; margin-top: 25px; margin-left: 8px;">
<img src="images/v2.png" style="height: 100px; width: 100px; margin-top: 25px; margin-left: 84%;">


  <?php include 'footer.php'; ?>
</body>
</html>