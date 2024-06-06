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

<script>
    document.addEventListener("DOMContentLoaded", async function () {
        // 첫 로드 시 안내문구 자동 삭제
        setTimeout(function () {
            var messageElement = document.querySelector('.message');
            if (messageElement) {
                messageElement.style.display = 'none';
            }
        }, 2000); // 2초

        // 이벤트 발생 시간 설정
        let eventOccurred = false;

        // 인식 버튼 클릭 이벤트
        const recognitionButton = document.querySelector('.btn-camera');
        recognitionButton.addEventListener('click', async function () {
            if (!eventOccurred) {
                eventOccurred = true;
                await init();
            }
        });

        // 웹페이지 로드 시 초기화 실행
        if (!eventOccurred) {
            await init();
            eventOccurred = true;
        }

        // 웹캠 초기화 함수
        async function init() {
            // 안내문구 자동 삭제
            setTimeout(function () {
                var messageElement = document.querySelector('.message');
                if (messageElement) {
                    messageElement.style.display = 'none';
                }
            }, 2000); // 2초

            // Teachable Machine 모델 URL
            const URL = "https://teachablemachine.withgoogle.com/models/wpm7vVOQJ/";
            const modelURL = URL + "model.json";
            const metadataURL = URL + "metadata.json";

            let model, webcam, maxPredictions;
            let predictionMade = false;

            // 모델과 메타데이터 로드
            model = await tmImage.load(modelURL, metadataURL);
            maxPredictions = model.getTotalClasses();

            // 웹캠 설정
            const flip = true;
            webcam = new tmImage.Webcam(window.innerWidth, window.innerHeight, flip); // 화면에 꽉 차게 설정
            await webcam.setup();
            await webcam.play();
            window.requestAnimationFrame(loop);
            document.getElementById("webcam-container").appendChild(webcam.canvas);

            // 웹캠 프레임 업데이트 및 예측 함수
            async function loop() {
                webcam.update();
                if (!predictionMade) {
                    const highestProbability = await predict();
                    if (highestProbability <= 0.3) {
                        setTimeout(function () {
                            window.location.href = 'recofailure.php'; // 3초 후에 페이지 이동
                        }, 3000); // 3초
                    }
                    predictionMade = true;
                }
            }

            // 예측 실행 함수
            async function predict() {
                const prediction = await model.predict(webcam.canvas);
                let highestProbability = 0;
                for (let i = 0; i < maxPredictions; i++) {
                    if (prediction[i].probability > highestProbability) {
                        highestProbability = prediction[i].probability;
                    }
                }
                console.log("Predictions:", prediction.map(p => `${p.className}: ${(p.probability * 100).toFixed(2)}%`));
                console.log("Highest probability:", highestProbability.toFixed(2)); // 가장 높은 확률 출력
                return highestProbability;
            }
        }
    });

</script>

<body>
    <!-- 안내문구 -->
    <div class="message">버릴 쓰레기를 인식해주세요!</div>

    <!-- 인식버튼 -->
    <button class="btn-camera" onclick="init()">
        <img src="img/btn-camera.png" alt="인식버튼">
    </button>

    <!-- 웹캠과 인식 결과를 표시할 컨테이너 -->
    <div id="webcam-container"></div>
</body>
</html>
