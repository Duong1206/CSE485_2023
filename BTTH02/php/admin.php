<!DOCTYPE html>
<html>
<head>
    <title>Trang quản lý sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 500px;
            margin: 0 auto;
            background-color: #fff;
            border-collapse: collapse;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Danh sách điểm danh sinh viên</h2>
    <table>
        <tr>
            <th>Mã sinh viên</th>
            <th>Ngày điểm danh</th>
            <th>Tên lớp</th>
            <th>Trạng thái</th>
        </tr>
        <?php
        // Kết nối cơ sở dữ liệu
        $servername = "localhost";
        $username = "admin";
        $password = "adm";
        $dbname = "sinhvien";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Truy vấn cơ sở dữ liệu
        $sql = "SELECT attendance.id_student, attendance.day, class.name, attendance.status
                FROM attendance
                INNER JOIN class ON attendance.id_class = class.id_class";

        $result = $conn->query($sql);

        // Hiển thị dữ liệu
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_student"] . "</td>";
                echo "<td>" . $row["day"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Không có dữ liệu điểm danh</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>