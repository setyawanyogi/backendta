<?php 
    require "../conn.php";
    
    $data       = mysqli_query($con, "SELECT parkir.id_parkir, kendaraan.jenis_kendaraan, parkir.plat_nomor, parkir.jam_masuk, parkir.jam_keluar, parkir.tgl, parkir.barcode, parkir.status, kendaraan.biaya FROM parkir INNER JOIN kendaraan ON parkir.id_kendaraan=kendaraan.id_kendaraan WHERE id_parkir=".$_GET['id_parkir']);
    $data       = mysqli_fetch_array($data, MYSQLI_ASSOC);

    echo json_encode($data);
?>