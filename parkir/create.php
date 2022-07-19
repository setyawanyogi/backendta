<?php

    $connection = new mysqli("localhost", "root", "", "db_eparkir");
    $id_kendaraan  = $_POST['id_kendaraan']; 
    $plat_nomor    = $_POST['plat_nomor'];
    $jam_masuk     = time('hh:mm');
    $jam_keluar    = time('hh:mm');
    $tgl           = date('dd-mm-yyyy');
    $status        = $_POST['status']; 

    
    $result = mysqli_query($connection, "INSERT INTO parkir SET id_kendaraan='$id_kendaraan', plat_nomor='$plat_nomor', jam_masuk=NOW(), jam_keluar=NULL, tgl=NOW(), status='$status'");
    
    if($result){
        echo json_encode([
            'message' => 'Data input successfully'
        ]);
    }else{
        echo json_encode([
            'message' => 'Data Failed to input'
        ]);
    }
   
?>