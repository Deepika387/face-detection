document.getElementById('image').addEventListener('change', async function() {
    const img = await faceapi.bufferToImage(this.files[0]);
    document.getElementById('result').innerHTML = '<p>Detecting faces...</p>';

    await faceapi.nets.tinyFaceDetector.loadFromUri('js/models');
    const detections = await faceapi.detectAllFaces(img).withFaceLandmarks().withFaceDescriptors();

    if (detections.length === 0) {
        document.getElementById('result').innerHTML = '<p>No faces detected!</p>';
        return;
    }

    document.getElementById('result').innerHTML = `<p>Number of faces detected: ${detections.length}</p>`;

    const canvas = faceapi.createCanvasFromMedia(img);
    document.getElementById('result').appendChild(canvas);
    faceapi.matchDimensions(canvas, img);
    const resizedDetections = faceapi.resizeResults(detections, img);
    faceapi.draw.drawDetections(canvas, resizedDetections);
});
