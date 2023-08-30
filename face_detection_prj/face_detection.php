<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Detection Result</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Face Detection Result</h1>
        <a href="index.php">Back to Upload</a>
        <br>
        <?php
        if (isset($_GET['image'])) {
            $imagePath = $_GET['image'];
            echo '<img src="' . $imagePath . '" alt="Uploaded Image">';
        }
        ?>
        <div id="result"></div>
    </div>
    <script src="js/face-api.min.js"></script>
    <script src="js/face_detection.js"></script>
</body>
</html>
