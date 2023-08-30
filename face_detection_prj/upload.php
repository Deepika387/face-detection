<?php
if (isset($_FILES['image']['tmp_name'])) {
    $imagePath = $_FILES['image']['tmp_name'];

    // Save the uploaded image to the 'uploads' folder
    $targetDir = 'uploads/';
    $targetFile = $targetDir . basename($_FILES['image']['name']);
    move_uploaded_file($imagePath, $targetFile);

    header('Location: face_detection.php?image=' . $targetFile);
    exit();
}
?>
