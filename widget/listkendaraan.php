<?php 

    //  $connection = new mysqli("localhost","root","","db_eparkir");
    //  $data       = mysqli_query($connection, "SELECT * FROM kendaraan");
    //  $data       = mysqli_fetch_all($data, MYSQLI_ASSOC);
    //  $final_data =  json_encode($data,  JSON_NUMERIC_CHECK);
    
    // echo json_encode($data);
    // echo $final_data;
    // echo str_replace(']"',']',str_replace('"[',"[",$final_data));
    // echo str_replace('"', '', $final_data);


  $db = "db_eparkir";
  $host = "localhost";
  $db_user = 'root';
  $db_password = '';
  //MySql server and database info

  $link = mysqli_connect($host, $db_user, $db_password, $db);
  //connecting to database

  if(isset($_REQUEST["jenis_kendaraan"])){
      $country = $_REQUEST["jenis_kendaraan"];
  }else{
      $country = "";
  } //if there is country parameter then grab it

//   $json["error"] = false;
//   $json["errmsg"] = "";
  $json["kendaraan"] = array();

  $country = mysqli_real_escape_string($link, $country);
  //remove the conflict of inverted comma with SQL query. 

  $sql = "SELECT * FROM kendaraan";
  $res = mysqli_query($link, $sql);
  $numrows = mysqli_num_rows($res);
  if($numrows > 0){
     //check if there is any data
      while($array = mysqli_fetch_assoc($res)){
           array_push($json["kendaraan"], $array);
      }
  }else{
      $json["error"] = true;
      $json["errmsg"] = "No any data to show.";
  }

  mysqli_close($link);

  header('Content-Type: application/json');
  // tell browser that its a json data
  echo json_encode($json ,JSON_NUMERIC_CHECK);

?>

