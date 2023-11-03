<?php include_once('header.php'); ?>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        <img src="logo.png" style="width:40px;" class="rounded-pill">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
        <ul style="font-family: Sans-serif; color: white;" class="navbar-nav me-auto">
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
        <form class="d-flex" action="index.php" method="get">
            <input class="form-control me-2" type="text" name="search" placeholder="Search">
            <button class="btn btn-primary" name="submit"   type="button" >Search</button>
        </form>
       
        </div>

    </div>
    </nav>
    <div style="margin-left: 200px; margin-right: 200px; margin-top: 100px; " >
    <a style="margin-left: 1390px;"class="btn btn-primary btn-lg " href="add.php">+Add User</a>
        <table style="font-family: Arial;" class="table table-dark table-hover";>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
                </thead>  
            <?php
                include_once('config.php');
                $result = $conn->prepare('SELECT * FROM users');
                $result->execute();
                foreach($result->fetchAll() as $key=>$row){
            ?>
            <tbody>
                <tr  style="text-align: justify;">
                    <td><?=$row ['id'] ?></td>
                    <td><?=$row ['name'] ?></td>
                    <td><?=$row ['email'] ?></td>
                    <td style="text-align: center;">
                        <a class="btn btn-info btn-lg"    href="view.php?id=<?= $row['id'] ?>">View</a>
                        <a class="btn btn-success btn-lg" href="update.php?id=<?= $row['id'] ?>">Update</a>
                        <a class="btn btn-danger btn-lg"  href="delete.php?id=<?= $row['id'] ?>">Delete</a>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
<?php include('footer.php'); ?>