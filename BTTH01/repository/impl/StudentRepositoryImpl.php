<?php
include ('C:\xampp\htdocs\phptest\cse485_2023\BTTH01\config\DatabaseConnection.php');
include ('C:\xampp\htdocs\phptest\cse485_2023\BTTH01\entity\Student.php');
include ('C:\xampp\htdocs\phptest\cse485_2023\BTTH01\repository\StudentRepository.php');


class StudentRepositoryImpl implements StudentRepository
{
    private  mysqli $conn;

    public function __construct()
    {
        $connection = new DatabaseConnection();
        $this->conn = $connection->getMysqli();
    }


    public function create(string $name, int $age): bool
    {
        // TODO: Implement create() method.
        $sql = "INSERT INTO students (name, age) VALUES ('$name', '$age')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
        $sql = "SELECT * FROM students LIMIT 10";
        $result = $this->conn->query($sql);

        $students = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $student = new Student($row['id'], $row['name'], $row['age']);
                $students[] = $student;
            }
        }

        return $students;
    }

    public function getById(int $id): ?Student
    {
        // TODO: Implement getById() method.
        $sql = "SELECT * FROM students where id =$id";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $student = new Student($row['id'], $row['name'], $row['age']);
            return $student;
        }
        return null;
    }

    public function update(int $id, string $name, int $age): bool
    {
        // TODO: Implement update() method.
        $sql = "UPDATE students SET name='$name', age='$age' WHERE id=$id;";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
        $sql = "DELETE FROM students WHERE id=$id";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}