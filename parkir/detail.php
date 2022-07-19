<?php 

    $connection = new mysqli("localhost","root","","db_eparkir");
    $data       = mysqli_query($connection, "SELECT * FROM parkir WHERE id_parkir=".$_GET['id_parkir']);
    $data       = mysqli_fetch_array($data, MYSQLI_ASSOC);

    echo json_encode($data);
?>