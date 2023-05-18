<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import Data From CSV File</title>
</head>
<body>
<div class="container">
    <form action="import.php" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileInput" name="file">
            </div>
            <div class="input-group-append">
                <input type="submit" name="submit" value="upload" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
</body>
</html>
<?php
include ('C:\xampp\htdocs\phptest\cse485_2023\BTTH01\repository\impl\StudentRepositoryImpl.php');
$studentRepo = new StudentRepositoryImpl();
$mimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv');
if (isset($_POST['submit'])) {
    if (!empty($_FILES['file']['name']) &&
        in_array($_FILES['file']['type'], $mimes)) {
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
        // Read First Line
        $getData = fgetcsv($csvFile);

        while (($getData = fgetcsv($csvFile, 100, ",")) !== FALSE) {


            $id = $getData[0];
            $name = $getData[1];
            $age = $getData[2];

            $student = $studentRepo->getById($id);
            if ($student) {
                $studentRepo->update($id, $name, $age);
            }
            else {
                $studentRepo->create($name, $age);
            }

        }
        fclose($csvFile);

        header("Location: index.php");
    }
    else
    {
        echo "Please select valid file";
    }
}