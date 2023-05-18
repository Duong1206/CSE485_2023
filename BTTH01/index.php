<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            padding-top: 20px;
        }

        .table-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .table-container table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table-container th,
        .table-container td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table-container th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table-container tbody tr:nth-of-type(even) {
            background-color: #f8f9fa;
        }
        .title {
            text-align: center;
        }

    </style>
</head>
<body>
<h1 class="title">Student List</h1>
<div class="container">
    <div class="table-container">
        <?php
        include('C:\xampp\htdocs\phptest\cse485_2023\BTTH01\repository\impl\StudentRepositoryImpl.php');

        $student_repository = new StudentRepositoryImpl();
        $students = $student_repository->getAll();

        if (sizeof($students) > 0) {
            echo "<table class='table table-striped'>";
            echo "<thead class='thead-dark'><tr><th>ID</th><th>Name</th><th>Age</th><th>Update</th><th>Delete</th></tr></thead>";
            echo "<tbody>";
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>" . $student->getId() . "</td>";
                echo "<td>" . $student->getName() . "</td>";
                echo "<td>" . $student->getAge() . "</td>";
                echo "<td><a href='update.php?id=" . $student->getId() . "' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a></td>";
                echo "<td><a href='delete.php?id=" . $student->getId() . "' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></a></td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No students found.</p>";
        }

        ?>
        <a href="create.php">Create</a>
        <a href="import.php">Import from CSV File</a>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
