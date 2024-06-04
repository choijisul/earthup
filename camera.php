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

    <script src="js/camera.js"></script>
    <script type="text/javascript">
        // Teachable Machine 모델 URL
        const URL = "https://teachablemachine.withgoogle.com/models/wpm7vVOQJ/";

        let model, webcam, labelContainer, maxPredictions;

        // 모델과 웹캠 초기화 함수
        async function init() {
            const modelURL = URL + "model.json";
            const metadataURL = URL + "metadata.json";

            // 모델과 메타데이터 로드
            model = await tmImage.load(modelURL, metadataURL);
            maxPredictions = model.getTotalClasses();

            // 웹캠 설정
            const flip = true;
            webcam = new tmImage.Webcam(200, 200, flip);
            await webcam.setup();
            await webcam.play();
            window.requestAnimationFrame(loop);

            // 웹캠 캔버스를 DOM에 추가
            document.getElementById("webcam-container").appendChild(webcam.canvas);
        }

        // 웹캠 프레임 업데이트 및 예측 함수
        async function loop() {
            webcam.update();
            await predict();
            window.requestAnimationFrame(loop);
        }

        // 예측 실행 함수
        async function predict() {
            const prediction = await model.predict(webcam.canvas);
            for (let i = 0; i < maxPredictions; i++) {
                const classPrediction = prediction[i].className + ": " + prediction[i].probability.toFixed(2);
                console.log(classPrediction);
            }
        }

        // 파일 프리뷰 함수 (추가 기능)
        function previewFile() {
            const preview = document.getElementById('previewImage');
            const file = document.getElementById('fileInput').files[0];
            const reader = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }


    </script>
</body>
</html>
