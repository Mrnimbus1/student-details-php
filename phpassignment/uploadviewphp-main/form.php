<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">

     <!-- Latest compiled JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark nav-tab">
        <div class="container-fluid">
            <h1 class="navbar-brand">Student Data</h1>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="form.php">Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view.php">View</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h3 class="header">Enter all Student Data Here:</h3>
        <form action="" method="post">

            <div class="mb-3 mt-3">
              <label for="studentId" class="form-label">Student ID:</label>
              <input type="number" class="form-control" id="student-id" placeholder="Enter Student ID" name="studentid" required="true">
            </div>

            <div class="row">
                <div class="col">
                    <label for="firstname" class="form-label">First Name:</label>   
                    <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" id="firstname" required="true">
                </div>

                <div class="col">
                    <label for="lastname" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" required="true">
                </div>
            </div>

            <div class="mb-3 mt-3">
              <label for="age" class="form-label">Age:</label>
              <input type="date" class="form-control" id="age" name="age" required="true">
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department:</label>
                <input type="text" class="form-control" id="dpt" placeholder="Enter Department" name="department">
            </div>
            <div class="mb-3">
                <label for="grade" class="form-label">Grade:</label>
                <input type="text" class="form-control" id="grade" placeholder="Enter Grade" name="grade">
            </div>
            <h6>Gender:</h6>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="gender" value="male" id="male"> 
                <label class="form-check-label" for="male">Male</label><br/>
                <input class="form-check-input" type="radio" name="gender" value="female" id="female"> 
                <label class="form-check-label" for="female">Female</label><br/>
                <input class="form-check-input" type="radio" name="gender" value="others" id="others">
                <label class="form-check-label" for="others">Others</label>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentid = $_POST['studentid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $department = $_POST['department'];
    $grade = $_POST['grade'];
    $gender = $_POST['gender'];

    // database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "student";

    // create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // die if connection failed
    if (!$conn) {
        die("Sorry, connection failed" . mysqli_connect_error());
    } else {
        $sql = "INSERT INTO `form` (`studentid`, `firstname`, `lastname`, `age`, `department`, `grade`, `gender`) VALUES ('$studentid', '$firstname', '$lastname', '$age', '$department', '$grade', '$gender')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Data inserted successfully";
        } else {
            echo "Data not inserted due to " . mysqli_error($conn);
        }
    }
}
?>
</body>
</html>
