<?php

    $connection = new mysqli("localhost", "root", "", "db_eparkir");

    $id_parkir = $_POST['id_parkir'];

    $result = mysqli_query($connection, "DELETE * FROM parkir where id_parkir=".$id_parkir);

    if($result){
        echo json_encode([
            'message' => 'Data delete successfully'
        ]);
    }else{
        echo json_encode([
            'message' => 'Data Failed to delete'
        ]);
    }