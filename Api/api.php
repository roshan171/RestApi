<?php
header('content-type:application/json');
header('Access-control-Allow-origin:*');
header('Access-control-Allow-Methods:GET, POST, PUT, DELETE');
header('Access-control-Allow-Headers:Access-control-Allow-Headers,Content-type,Access-control-Allow-Methods,Authorization,X-Requested-With');

// Include your database configuration file
include "config.php";

// Function to get all students
function getStudents() {
    global $conn;
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    $students = array();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }

    return $students;
}

// Function to get a single student by ID
function getStudentById($id) {
    global $conn;
    $sql = "SELECT * FROM student WHERE id = {$id}";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }

    return null;
}

// Function to insert a new student
function insertStudent($data) {
    global $conn;
    $name = $data['name'];
    $city = $data['city'];
    $email = $data['email'];

    $sql = "INSERT INTO student(name, city, email) VALUES('{$name}', '{$city}', '{$email}')";

    return $conn->query($sql);
}

// Function to update a student by ID
function updateStudent($id, $data) {
    global $conn;
    $name = $data['name'];
    $city = $data['city'];
    $email = $data['email'];

    $sql = "UPDATE student SET name='{$name}', city='{$city}', email='{$email}' WHERE id={$id}";

    return $conn->query($sql);
}

// Function to delete a student by ID
function deleteStudent($id) {
    global $conn;
    $sql = "DELETE FROM student WHERE id={$id}";

    return $conn->query($sql);
}

// Handle CRUD operations based on HTTP method
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id) {
            $student = getStudentById($id);
            if ($student) {
                echo json_encode(array('message' => 'Student found', 'status' => true, 'data' => $student));
            } else {
                echo json_encode(array('message' => 'Student not found', 'status' => false));
            }
        } else {
            $students = getStudents();
            echo json_encode(array('message' => 'Students retrieved', 'status' => true, 'data' => $students));
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);

        if (insertStudent($data)) {
            echo json_encode(array('message' => 'Student inserted', 'status' => true));
        } else {
            echo json_encode(array('message' => 'Failed to insert student', 'status' => false));
        }
        break;

    case 'PUT':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $data = json_decode(file_get_contents("php://input"), true);

        if ($id && updateStudent($id, $data)) {
            echo json_encode(array('message' => 'Student updated', 'status' => true));
        } else {
            echo json_encode(array('message' => 'Failed to update student', 'status' => false));
        }
        break;

    case 'DELETE':
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id && deleteStudent($id)) {
            echo json_encode(array('message' => 'Student deleted', 'status' => true));
        } else {
            echo json_encode(array('message' => 'Failed to delete student', 'status' => false));
        }
        break;

    default:
        echo json_encode(array('message' => 'Invalid request method', 'status' => false));
}

mysqli_close($conn);
?>
