<?php

$host = 'firebird-server';
$port = '3050';
$database = '/firebird/data/DATABASE.GDB';
$username = 'SYSDBA';
$password = 'masterkey';

$query = 'SELECT * FROM funcionario';

try {
    $conn = new PDO(
        "firebird:dbname=$host/$port:$database;charset=utf-8;dialect=1",
        $username,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($query);
    $stmt->execute();

    echo '<pre>';
    while ($row = $stmt->fetch()) {
        print_r($row['NOME'] . '<br>');
    }
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
