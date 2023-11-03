<?php include_once('header.php'); ?>
    <?php
        include_once('config.php');
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $result = $conn->prepare("SELECT * FROM users WHERE id = $id");
            $result->execute();
            
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
            }
        }
    ?>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
            <img src="logo.png" style="width:40px;" class="rounded-pill">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form>
            </div>
        </div>
    </nav>
    <br><br>
    <a class="btn btn-primary btn-lg" href="index.php">BACK</a> 
    <div class="container mt-5 bg-dark">
    <h2 style="color:white;text-align:center;">Update User</h2>
    <form action="update_user.php" method="POST";>
        <div class="mb-3 mt-3">
        <input type="hidden" name="id" value="<?= $id?>" required>
        <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" name="name" value="<?= $name?>"  required>
            <label for="pwd">Full Name</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input type="email" class="form-control"  name="email" value="<?= $email?>" required>
            <label for="email">Email</label>
        </div>
        </div>
        <button type="submit" name="update"; class="btn btn-primary">Submit</button>
    </form>
    </div>

<?php include('footer.php'); ?>  