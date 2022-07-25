<?php
    require "../conn.php";
    
    $id_kendaraan  = $_POST['id_kendaraan']; 
    $plat_nomor    = $_POST['plat_nomor'];
    $jam_masuk     = date('yyyy-mm-dd hh:mm');
    $jam_keluar     = date('yyyy-mm-dd hh:mm');
    $status        = $_POST['status']; 
    $id_parkir         = $_POST['id_parkir'];
        
    $result = mysqli_query($con, "UPDATE parkir SET id_kendaraan='$id_kendaraan', plat_nomor='$plat_nomor', jam_masuk=='$jam_masuk', jam_keluar=='$jam_keluar', status='$status' WHERE id_parkir='$id_parkir'");
        
    if($result){
        echo json_encode([
            'message' => 'Data edit successfully'
        ]);
    }else{
        echo json_encode([
            'message' => 'Data Failed to update'
        ]);
    }