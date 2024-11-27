<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT image FROM student WHERE id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

if ($student['image']) {
    unlink("uploads/" . $student['image']); // Remove the image from the server
}

$sql = "DELETE FROM student WHERE id = $id";
$conn->query($sql);

header('Location: index.php');
exit();
?>
