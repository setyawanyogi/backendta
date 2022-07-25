<?php

require "../conn.php";

    $id_parkir = $_POST['id_parkir'];

    $result = mysqli_query($con, "DELETE * FROM parkir where id_parkir=".$id_parkir);

    if($result){
        echo json_encode([
            'message' => 'Data delete successfully'
        ]);
    }else{
        echo json_encode([
            'message' => 'Data Failed to delete'
        ]);
    }