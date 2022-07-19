<?php 

    $connection = new mysqli("localhost","root","","db_eparkir");
    $data       = mysqli_query($connection, "SELECT parkir.id_parkir, kendaraan.jenis_kendaraan, parkir.plat_nomor, parkir.jam_masuk, parkir.jam_keluar, parkir.tgl, parkir.barcode, parkir.status, kendaraan.biaya FROM parkir INNER JOIN kendaraan ON parkir.id_kendaraan=kendaraan.id_kendaraan WHERE parkir.status = 'Selesai' ORDER BY parkir.id_parkir DESC");
    $data       = mysqli_fetch_all($data, MYSQLI_ASSOC);

    echo json_encode($data);

?>
