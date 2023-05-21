<?php
// Kết nối database
$servername = "localhost";
$username = "";
$password = "";
$dbname = "sinhvien";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý điểm danh sinh viên
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form điểm danh
    $id_student = $_POST["id_student"];
    $status = $_POST["status"];

    // Kiểm tra xem sinh viên đã được điểm danh hay chưa
    $sql = "SELECT * FROM attendance WHERE id_student = '$id_student' AND day = CURDATE()";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Sinh viên đã được điểm danh
        echo "Sinh viên đã được điểm danh!";
    } else {
        // Sinh viên chưa được điểm danh, thêm vào cơ sở dữ liệu
        $sql = "INSERT INTO attendance (day, id_class, id_student, status) VALUES (CURDATE(), 126, '$id_student', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "Điểm danh thành công!";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
}

// Đóng kết nối database
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Điểm danh sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .success-message {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Điểm danh sinh viên</h1>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="id_student">Mã sinh viên:</label>
            <input type="text" id="id_student" name="id_student" required>
            
            <label for="status">Trạng thái:</label>
            <select id="status" name="status">
                <option value="present">Có mặt</option>
                <option value="absent">Vắng mặt</option>
            </select>
            
            <button type="submit">Điểm danh</button>
        </form>

       
