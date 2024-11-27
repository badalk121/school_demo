<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT student.*, classes.name AS class_name 
        FROM student 
        LEFT JOIN classes ON student.class_id = classes.class_id 
        WHERE student.id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">View Student</h1>
        <div class="card p-4">
            <h2><?= $student['name'] ?></h2>
            <p><strong>Email:</strong> <?= $student['email'] ?></p>
            <p><strong>Address:</strong> <?= $student['address'] ?></p>
            <p><strong>Class:</strong> <?= $student['class_name'] ?></p>
            <p><strong>Created At:</strong> <?= $student['created_at'] ?></p>
            <p><img src="uploads/<?= $student['image'] ?>" alt="Image" class="img-fluid" width="200"></p>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </div>
    </div>
</body>
</html>
