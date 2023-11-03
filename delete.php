<?php
    include_once('config.php');
    $sql = "DELETE FROM users WHERE id=?";
    $result = $conn->prepare($sql);
    $result->execute([$_GET['id']]);
    $url = 'index.php';
    header('Location: '.$url);
?>
