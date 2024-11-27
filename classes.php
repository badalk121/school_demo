<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $sql = "INSERT INTO classes (name) VALUES ('$name')";
    $conn->query($sql);
    header('Location: classes.php');
    exit();
}

$sql = "SELECT * FROM classes";
$classes = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Manage Classes</h1>
        <form method="POST" class="mb-4">
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Class Name" required>
                <button type="submit" class="btn btn-primary">Add Class</button>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $classes->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['class_id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
