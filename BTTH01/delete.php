<?php
include ('C:\xampp\htdocs\phptest\cse485_2023\BTTH01\repository\impl\StudentRepositoryImpl.php');


$student_repository = new StudentRepositoryImpl();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $student_repository->delete($id);
    if ($result) {
        header('location: index.php');
    } else {
        echo "Failed when delete";
    }
}
?>