<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Latest compiled JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark nav-tab">
        <div class="container-fluid">
            <h1 class="navbar-brand">Student Data</h1>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="form.php">Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="view.php">View</a>
                </li>
    
            </ul>

        </div>
    </nav>

    <div class="container">

        <table class="table table-hover">
            <tr>
              <th>Student ID</th> 
              <th>Full Name</th>
              <th>Age</th>
              <th>Department</th>
              <th>Grades</th>
              <th>Gender</th>
            </tr>

            <?php
            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "student";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch data from the database
            $sql = "SELECT * FROM form";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>".$row['studentid']."</td>
                            <td>".$row['firstname']." ".$row['lastname']."</td>
                            <td>".$row['age']."</td>
                            <td>".$row['department']."</td>
                            <td>".$row['grade']."</td>
                            <td>".$row['gender']."</td>
                          </tr>";
                }
            } else {
                echo "0 results";
            }

            // Close the connection
            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>
