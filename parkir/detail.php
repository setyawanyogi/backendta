<?php 
    require "../conn.php";
    
    $data       = mysqli_query($con, "SELECT * FROM parkir WHERE id_parkir=".$_GET['id_parkir']);
    $data       = mysqli_fetch_array($data, MYSQLI_ASSOC);

    echo json_encode($data);
?>