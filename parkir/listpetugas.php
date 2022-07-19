<?php 

    $connection = new mysqli("localhost","root","","db_eparkir");
    $data       = mysqli_query($connection, "SELECT users.id, users.email, users.password, users.nama, role.nama_role, users.id_role, users.createdDate FROM users INNER JOIN role ON users.id_role=role.id_role");
    $data       = mysqli_fetch_all($data, MYSQLI_ASSOC);

    echo json_encode($data);

?>