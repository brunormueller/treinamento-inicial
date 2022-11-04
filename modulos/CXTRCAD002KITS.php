<?php

include('Connections/connpdo.php');


$busca = $conn->prepare("SELECT * from kits");
try {
    $busca->execute();
} catch (PDOException $e) {
    $e->getMessage();
}


$rowcount = $busca->rowCount();

if ($rowcount != 0) {
    $final_array = array();

    while ($row = $busca->fetch(PDO::FETCH_ASSOC)) {
        $arr = array(
            'nome_kits' => $row['nome_kits'],
            'vendidos_kits' => $row['vendidos_kits']
        );
        $final_array[] = $arr;
    }

    $data = array(
        'status' => true,
        'msg' => 'successfully',
        'rowcount' => $rowcount,
        'data' => $final_array
    );
} else {
    $data = array(
        'status' => false,
        'msg' => "Record(s) not found."
    );
}

return json_encode($final_array);
