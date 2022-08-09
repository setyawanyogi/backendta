<?php
    require "../conn.php";

    // $connection = new mysqli("localhost", "root", "", "db_eparkir");
    
    $id_kendaraan  = $_POST['id_kendaraan']; 
    $plat_nomor    = $_POST['plat_nomor'];
    $jam_masuk     = time('hh:mm');
    $jam_keluar    = time('hh:mm');
    $tgl           = date('dd-mm-yyyy');
    $status        = $_POST['status']; 
    //$imagePath     = 'images/'.$image;
    $image = $_FILES['image']['name'];
    $imagePath     = 'images/'.$image;
    $tmp_name      = $_FILES['image']['tmp_name']; 

    //move image to images folder
    move_uploaded_file($tmp_name, $imagePath);
    // move_uploaded_file($_FILES['userfile']['tmp_name'], $imagePath);

    
    $result = mysqli_query($con, "INSERT INTO parkir SET id_kendaraan='$id_kendaraan', plat_nomor='$plat_nomor', jam_masuk=NOW(), jam_keluar=NULL, tgl=NOW(), status='$status', image='$image'");
    
    $id = mysqli_insert_id($con);
    $quer = mysqli_query($con, "SELECT parkir.id_parkir, kendaraan.jenis_kendaraan, parkir.plat_nomor, parkir.jam_masuk, parkir.jam_keluar, parkir.tgl, parkir.image, parkir.status, parkir.addedby, kendaraan.biaya FROM parkir INNER JOIN kendaraan ON parkir.id_kendaraan=kendaraan.id_kendaraan WHERE parkir.status = 'Parkir' AND id_parkir='$id'");
    
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
            'image'         => $row["image"],
            'addedby'       => $row["addedby"],
            // 'data' => $courses

        ]);
    }else{
        echo json_encode([
            'message' => 'Data Failed to input'
        ]);
    }
   
?>