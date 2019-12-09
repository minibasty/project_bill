<?php 

    require'../config.php';
    $result = array('error' => false);

    $sql="SELECT * FROM service";
    $query = $conn->query($sql);
    $data = array();
    while ($row = $query->fetch_assoc()) {
        array_push($data, $row);
    }
    $result['users'] = $data;
    echo json_encode($result);

?>