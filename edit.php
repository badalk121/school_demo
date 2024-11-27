<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $class_id = $_POST['class_id'];
    $image = $_FILES['image']['name'];

    if (!empty($image)) {
        $target = "uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $imageQuery = ", image = '$image'";
    } else {
        $imageQuery = "";
    }

    $sql = "UPDATE student 
            SET name = '$name', email = '$email', address = '$address', class_id = $class_id $imageQuery 
            WHERE id = $id";

    if ($conn->query($sql)) {
        header('Location: index.php');
        exit();
    }
}

$sql = "SELECT * FROM student WHERE id = $id";
$student = $conn->query($sql)->fetch_assoc();

$classes = $conn->query("SELECT * FROM classes");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Student</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?= $student['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $student['email'] ?>">
            </div>
            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control"><?= $student['address'] ?></textarea>
            </div>
            <div class="mb-3">
                <label>Class</label>
                <select name="class_id" class="form-select" required>
                    <?php while ($row = $classes->fetch_assoc()): ?>
                        <option value="<?= $row['class_id'] ?>" <?= $student['class_id'] == $row['class_id'] ? 'selected' : '' ?>>
                            <?= $row['name'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" accept=".jpg,.png">
                <p><img src="uploads/<?= $student['image'] ?>" alt="Image" class="img-thumbnail" width="100"></p>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
