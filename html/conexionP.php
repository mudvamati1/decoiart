<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=decoiart', 'root', '');
    //echo 'conectado';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>