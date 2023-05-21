<?php
// Kiểm tra dữ liệu đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Thực hiện kiểm tra đăng nhập tại đây
    // Ví dụ: kiểm tra trong cơ sở dữ liệu hoặc bất kỳ phương thức nào khác

    if ($username == "admin" && $password == "admin") {
        header("Location: admin.php");
        exit;
    } elseif ($username == "student" && $password == "student") {
        header("Location: student.php");
        exit;
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Trang đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            text-align: center;
            
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form method="post" action="index.php">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>