<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
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
<h2 class="title">Create Student</h2>
<div class="container form-container">
    <form method="POST" action="create.php">
        <div class="form-input">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>
        </div>
        <div class="form-input">
            <label for="age">Age:</label>
            <input type="number" name="age" id="age" min="18" max="24" required><br>
        </div>
        <button type="submit">Create Student</button>
    </form>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include('C:\xampp\htdocs\phptest\cse485_2023\BTTH01\repository\impl\StudentRepositoryImpl.php');
$studentRepo = new StudentRepositoryImpl();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];


    $result = $studentRepo->create($name, $age);

    if ($result) {
        header("location: index.php");
    } else {
        echo "Error creating student.";
    }

}
?>
