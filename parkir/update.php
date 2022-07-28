<?php
    require "../conn.php";
    
    $id_kendaraan  = $_POST['id_kendaraan']; 
    $plat_nomor    = $_POST['plat_nomor'];
    $jam_masuk     = time('hh:mm');
    $jam_keluar    = time('hh:mm');
    $tgl           = date('dd-mm-yyyy');
    $status        = $_POST['status']; 
        
    $result = mysqli_query($con, "UPDATE parkir SET id_kendaraan='$id_kendaraan', plat_nomor='$plat_nomor', jam_masuk='$jam_masuk', jam_keluar=NOW(), tgl='$tgl', status='Selesai' WHERE id_parkir='$id_parkir'");
    
    $id = mysqli_insert_id($con);
    $quer = mysqli_query($con, "SELECT parkir.id_parkir, kendaraan.jenis_kendaraan, parkir.plat_nomor, parkir.jam_masuk, parkir.jam_keluar, parkir.tgl, parkir.barcode, parkir.status, kendaraan.biaya FROM parkir INNER JOIN kendaraan ON parkir.id_kendaraan=kendaraan.id_kendaraan WHERE parkir.status = 'Parkir' AND id_parkir='$id'");

    if($result){
       $row = mysqli_fetch_array($quer, MYSQLI_ASSOC);
        echo json_encode([
            'message'       => 'Data input successfully',
            'id_parkir'     => $id,
            'plat_nomor'    => $row["plat_nomor"],
            'jam_masuk'     => $row["jam_masuk"],
            'jam_keluar'    => $row["jam_keluar"],
            'tgl'           => $row["tgl"],
            'status'        => $row["status"],
            'biaya'         => $row["biaya"],
        ]);
    }else{
        echo json_encode([
            'message' => 'Data Failed to update'
        ]);
    }