<html>
<head>
    <style>
    .boxed {
   margin-left: 500px;
  border: 2.8px solid grey ;
  width:600px;
}

</style>
<!--<script src="https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=YOUR_API_KEY"></script>

<script src="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522,151.1957362&radius=500&type=restaurant&keyword=cruise&key=YOUR_API_KEY"></script>
-->
<script type="text/javascript">
  
function myfunc(){

 var result = document.querySelector('input[name="loc"]:checked').value;
 //alert(result);

if(result=="heree"){

       document.getElementById("loc_edit").setAttribute('disabled', true);
    }
  
if(result=="heyloc"){

       document.getElementById("loc_edit").removeAttribute('disabled');
    }
    

}

function clearData(clear_form) {
            document.getElementById('inputText').value = "";
             document.getElementById('loc_edit').value = "";
          document.getElementById('dist').value = "";
        clear_form.category.value="default";

     document.getElementById("here").checked=false;
     document.getElementById("loc_loc").checked=false;


          
}


</script>

</head>
<body>
<div class="boxed">
    <div style="height:70px">
 <form class ="placeForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
       <i> <p style="margin-left: 100px;font-size: 30px;margin-bottom: -3px;margin-top: 2px"> Travel and Entertainment Search</p></i>

     <hr style="height:1.3px;border:none;background-color:grey;width: 570px;" />
   </div>

<div style="margin-bottom: 5px" >
      <b> <label style="margin-left: 8px;margin-bottom: 5px"> Keyword:</b> </label>
      <input type ="text" name ="keyword" id ="inputText" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {echo $_POST['keyword']; } ?>"  required >
       </div>
         
         <div style="margin-bottom: 5px" >
       <b>   <label style="margin-left: 8px;margin-bottom: 5px">Category: </label></b>
       
         <select name="category">
<option name="default" selected=selected value="" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['locationType'] == "default"){ echo "selected"; } } ?> > default</option>

<option name ="cafe" value="cafe" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['category'] == "cafe"){ echo "selected"; } } ?> >cafe</option>
<option name ="bakery" value="bakery" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['category'] == "bakery"){ echo "selected"; } } ?> >bakery</option>
 <option  name ="restaurant" value="restaurant" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['category'] == "restaurant"){ echo "selected"; } } ?> >restaurant</option>
 <option name ="beauty" value="beauty" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['category'] == "beauty"){ echo "selected"; } } ?> >beauty salon</option>
 <option name ="casino" value="casino" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['category'] == "casino"){ echo "selected"; } } ?> >casino</option>
 <option name ="movie" value="movie" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['category'] == "movie"){ echo "selected"; } } ?> >movie theater</option>
 <option name ="lodging" value="lodging" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['category'] == "lodging"){ echo "selected"; } } ?> >lodging</option>
 <option  name ="airport" value="airport" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['category'] == "airport"){ echo "selected"; } } ?> >airport</option>
 <option name ="train" value="train" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['category'] == "train"){ echo "selected"; } } ?> >train station</option>
<option name ="subway" value="subway" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['category'] == "subway"){ echo "selected"; } } ?> >subway station</option>
<option name ="bus" value="bus" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['category'] == "bus"){ echo "selected"; } } ?> >bus station</option>

</select> 
</div>
 <div style="margin-bottom: 5px" >
  <b> <label style="margin-left: 8px;margin-bottom: 5px">Distance(miles): </label></b>

 <input type="text" name ="distance" placeholder="10" default="10" id="dist"> <b> From:</b>
  <input type="radio" name="loc" id="here" onchange="myfunc()" value="heree" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['loc'] == "heree"){ echo "checked"; } } ?> >Here<br>


<input type="radio" name="loc" id="loc_loc" onchange="myfunc()" value="heyloc" style="margin-left: 330px" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){ if($_POST['loc'] == "heyloc"){ echo "checked"; } } ?>>
 <input type="text" placeholder="location" id="loc_edit" name="location" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {echo $_POST['location']; } ?>" required><br>
 <br>
</div>

        <div id="inputButton" style="margin-left: 70px">
        <input type ="submit"  name="Search" value="Search" style ="margin-right:10px">
        <input type ="button" name="Clear" value ="Clear" onclick="clearData(this.form);"><br><br>
        </div>
        
    </form>

</div>

<div id="demo"></div>
<?php
$adr= $_POST['location'];

  $adr= str_replace(' ', '+', $adr);


$url = "http://maps.google.com/maps/api/geocode/json?address=$adr&sensor=false&region=UK";
$response = file_get_contents($url);
$response = json_decode($response, true);
 
//print_r($response);
 
$lat = $response['results'][0]['geometry']['location']['lat'];
$long = $response['results'][0]['geometry']['location']['lng'];
 
echo "latitude: " . $lat . " longitude: " . $long;
?>
</body>
</html>

