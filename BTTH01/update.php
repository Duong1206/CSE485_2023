<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-container label {
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .form-container button[type="submit"]:hover {
            background-color: #45a049;
        }

        .title {
            text-align: center;
        }
    </style>
</head>
<body>
<?php
include('C:\xampp\htdocs\phptest\cse485_2023\BTTH01\repository\impl\StudentRepositoryImpl.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $studentId = $_GET['id'];


    $studentRepo = new StudentRepositoryImpl();
    $student = $studentRepo->getById($studentId);

    if ($student) {
        // Display the update form
        ?>
        <h2 class="title">Update Student</h2>
        <div class="container form-container">
            <form method="POST" action="update.php">
                <div class="form-input">
                    <input type="hidden" name="id" value="<?php echo $student->getId(); ?>">
                </div>
                <div class="form-input">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="<?php echo $student->getName(); ?>" required><br>
                </div>
                <div class="form-input">
                    <label for="age">Age:</label>
                    <input type="number" name="age" min="18" max="24" value="<?php echo $student->getAge(); ?>"
                           required><br>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
        <?php
    } else {
        echo "Student not found.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $studentID = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Update the student
    $studentRepo = new StudentRepositoryImpl();
    $result = $studentRepo->update($studentID, $name, $age);

    if ($result) {
        header('location: index.php');
    } else {
        echo "Error updating student.";
    }
} else {
    echo "Invalid request.";
}
?>
</body>
</html>

