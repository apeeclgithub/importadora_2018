<?php

    require_once '../model/classVenta.php';
    $objVenta = new Venta();
    $objVenta->selectVentaById($_POST['id']);
    $json['success'] = false;
    foreach ((array) $objVenta as $key) {
        foreach($key as $value){
            if(is_array($value)){
                $json['success'] = true;
            }
        } 
    }

    echo json_encode($json);

?>