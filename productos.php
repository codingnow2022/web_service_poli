<?php
require_once('config.php');

// Obtener todos los productos
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $stmt = $conn->prepare("SELECT * FROM productos_table");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($result);
}

// Crear un nuevo producto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    echo $input[0];
    $stmt = $conn->prepare("INSERT INTO productos_table (cod_producto, name_producto, category_producto, description_producto, price_producto, status_producto) VALUES (:cod_producto, :name_producto, :category_producto, :description_producto, :price_producto, :status_producto)");
    $stmt->bindParam(':cod_producto', $input['cod_producto']);
    $stmt->bindParam(':name_producto', $input['name_producto']);
    $stmt->bindParam(':category_producto', $input['category_producto']);
    $stmt->bindParam(':description_producto', $input['description_producto']);
    $stmt->bindParam(':price_producto', $input['price_producto']);
    $stmt->bindParam(':status_producto', $input['status_producto']);
    $stmt->execute();
    $lastInsertId = $conn->lastInsertId();
    if ($lastInsertId) {
        $output = array('cod_producto' => $input['cod_producto'], 'name_producto' => $input['name_producto'], 'category_producto' => $input['category_producto'], 'description_producto' => $input['description_producto'], 'price_producto' => $input['price_producto'], 'status_producto' => $input['status_producto']);
        header('Content-Type: application/json');
        echo json_encode($output);
    } else {
        header('HTTP/1.1 500 Internal Server Error');
    }
}

// Actualizar un producto existente
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $input = json_decode(file_get_contents('php://input'), true);
    $stmt = $conn->prepare("UPDATE productos_table SET name_producto = :name_producto, category_producto = :category_producto, description_producto = :description_producto, price_producto = :price_producto, status_producto = :status_producto WHERE cod_producto = :cod_producto");
    $stmt->bindParam(':cod_producto', $input['cod_producto']);
    $stmt->bindParam(':name_producto', $input['name_producto']);
    $stmt->bindParam(':category_producto', $input['category_producto']);
    $stmt->bindParam(':description_producto', $input['description_producto']);
    $stmt->bindParam(':price_producto', $input['price_producto']);
    $stmt->bindParam(':status_producto', $input['status_producto']);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    if ($rowCount) {
        $output = array('cod_producto' => $input['cod_producto'], 'name_producto' => $input['name_producto'], 'category_producto' => $input['category_producto'], 'description_producto' => $input['description_producto'], 'price_producto' => $input['price_producto'], 'status_producto' => $input['status_producto']);
        header('Content-Type: application/json');
        echo json_encode($output);
    } else {
        header('HTTP/1.1 500 Internal Server Error');
    }
}


// Eliminar un producto existente
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $input = json_decode(file_get_contents('php://input'), true);
    $stmt = $conn->prepare("DELETE FROM productos_table WHERE cod_producto = :cod_producto");
    $stmt->bindParam(':cod_producto', $input['cod_producto']);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    if ($rowCount) {
        header('HTTP/1.1 204 No Content');
    } else {
        header('HTTP/1.1 500 Internal Server Error');
    }
}