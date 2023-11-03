<?php
    //ADD USER
    
     include_once('config.php');
     if(isset($_POST['add'])){
        $sql = "INSERT INTO users(name,email,password) VALUES(:name,:email,:password)";
        $result = $conn->prepare($sql);
        
        //for hashing password
        $options = ['cost'=> 12];
        $result->execute([
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':password' => password_hash($_POST['password'], PASSWORD_BCRYPT, $options)
        ]);
        $url ='index.php';
        header('Location: '.$url);
    }
?>