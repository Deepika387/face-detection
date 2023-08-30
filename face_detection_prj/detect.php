<?php
// detect.php

// Include the OpenCV library
require 'path_to_opencv/autoload.php';

use svay\FaceDetector; // Use the FaceDetector class from your previous code

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imageFile'])) {
    $uploadedFile = $_FILES['imageFile'];

    // Check if the file was uploaded without errors
    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        // Move the uploaded file to the 'uploads' directory
        $uploadDir = 'uploads/';
        $fileName = uniqid() . '_' . $uploadedFile['name'];
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($uploadedFile['tmp_name'], $targetFilePath)) {
            // Perform face detection using the FaceDetector class
            $faceDetector = new FaceDetector();
            $faceDetected = $faceDetector->faceDetect($targetFilePath);

            if ($faceDetected) {
                // Output the detected face image
                $faceDetector->cropFaceToJpeg($targetFilePath);

                // Display the result on the page
                echo '<img src="' . $targetFilePath . '">';
            } else {
                echo 'No face detected in the uploaded image.';
            }
        } else {
            echo 'Error moving the uploaded file.';
        }
    } else {
        echo 'Error uploading the file. Code: ' . $uploadedFile['error'];
    }
} else {
    echo 'Invalid request.';
}
?>
