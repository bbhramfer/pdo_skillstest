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
    <br><br><br>
    <?php
        include_once('config.php');
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $user_id = $_GET['id'];
            
            $sql = "SELECT id, name, email FROM users WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($row) {
                    echo "<table class='table table-dark table-hover'>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>";
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['email'] . "</td>
                          </tr>";
                    echo "</table>";
                } else {
                    echo "User not found.";
                }
            } else {
                echo "Error executing query.";
            }
        } else {
            echo "Invalid or missing ID parameter.";
        }
        
        $conn = null; // Close the connection
    ?>


<?php include('footer.php'); ?>  