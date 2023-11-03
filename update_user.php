<?php
    include_once('config.php');
    
    if(isset($_POST['update'])){
        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
        ];
        
        $sql = "UPDATE users SET name=:name, email=:email WHERE id=:id";
        $result = $conn->prepare($sql);
        $result->execute($data);
        
        $url = 'index.php';
        header('Location: '.$url);
        exit();
    }
?>