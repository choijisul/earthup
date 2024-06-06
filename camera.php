<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>카메라</title>
    <link rel="stylesheet" href="css/camera.css">
    <link rel="icon" href="img/pavicon.png" type="image/png" sizes="32x32">
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
    <script src="js/camera.js" defer></script>
</head>
<body>
    <!-- 안내문구 -->
    <div class="message">버릴 쓰레기를 인식해주세요!</div>

    <!-- 인식버튼 -->
    <button class="btn-camera" onclick="init()">
        <img src="img/btn-camera.png" alt="인식버튼">
    </button>

    <!-- 사진 불러오기 -->
    <button class="btn-image" onclick="document.getElementById('fileInput').click()">
        <img src="img/btn-image.png" alt="Load image">
    </button>
    <input type="file" id="fileInput" style="display: none;" onchange="previewFile()">
    
    <!-- 불러온 사진을 띄움 -->
    <img id="previewImage" src="" alt="">

    <!-- 웹캠과 인식 결과를 표시할 컨테이너 -->
    <div id="webcam-container"></div>
</body>
</html>
