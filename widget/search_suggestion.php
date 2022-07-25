<?php 
  require "../conn.php";

  function matchper($s1, $s2){ 
        similar_text(strtolower($s1), strtolower($s2), $per);
        return $per; //function to find matching similarity of two string
  }

  if(isset($_REQUEST["query"])){
      $query = strtolower($_REQUEST["query"]);
  }else{
      $query = "";
  } //if there is query in parameter then grabe it


  $json["error"] = false;
  $json["errmsg"] = "";
  $json["data"] = array();

  $sql = "SELECT * FROM parkir ORDER BY id_parkir DESC";
  $res = mysqli_query($con, $sql);
  $numrows = mysqli_num_rows($res);
  if($numrows > 0){
     //check if there is any data
     $namelist = array();

      while($obj = mysqli_fetch_object($res)){
           $matching = matchper($query, $obj->plat_nomor);
           //get the similarity between name and query
           $namelist[$matching][$obj->id_parkir] = $obj->plat_nomor;
           //set the matching and student id as key so that we can sort according to key
      }

      krsort($namelist); 
      //to sort array by key in desending order, use ksort() to reverse

      foreach($namelist as $innerarray){
         foreach($innerarray as $idparkir => $platnomor){
            $subdata = array(); //create new array
            $subdata["id_parkir"] = "$idparkir"; //return as string
            $subdata["plat_nomor"] = $platnomor; 

            array_push($json["data"], $subdata); //push sub array into $json array
         }
      }
  }else{
      $json["error"] = true;
      $json["errmsg"] = "No any data to show.";
  }

  mysqli_close($con);
  
  header('Content-Type: application/json');
  // tell browser that its a json data
  echo json_encode($json);

?>