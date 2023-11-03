<?php
    include_once('config.php');
    
    // Check if a search term is provided via GET request
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search_term = $_GET['search'];
        
        $sql = "SELECT id, name, email FROM users WHERE name LIKE :search_term OR email LIKE :search_term";
        $stmt = $conn->prepare($sql);
        
        // Bind the parameter using wildcards for a partial match
        $search_param = '%' . $search_term . '%';
        $stmt->bindParam(':search_term', $search_param, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['email'] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "Error executing query.";
        }
    } else {
        echo "Enter a search term.";
    }
    
    $conn = null; // Close the connection
?>
