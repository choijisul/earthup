<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>어썹</title>
    <link rel="stylesheet" href="css/camera.css?val1">
    <link rel="icon" href="img/pavicon.png" type="image/png" sizes="32x32">
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
</head>

<script>
    document.addEventListener("DOMContentLoaded", async function() {
        // 첫 로드 시 안내문구 자동 삭제
        setTimeout(function() {
            var messageElement = document.querySelector('.message');
            if (messageElement) {
                messageElement.style.display = 'none';
            }
        }, 5000);

        // 이벤트 발생 시간 설정
        let eventOccurred = false;

        // 인식 버튼 클릭 이벤트
        const recognitionButton = document.querySelector('.btn-camera');
        recognitionButton.addEventListener('click', async function() {
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
            setTimeout(function() {
                var messageElement = document.querySelector('.message');
                // 웹사이트에 처음 들어왔을 때만 (그 이후로 X)
                if (messageElement) {
                    messageElement.style.display = 'none';
                }
            }, 5000); // 5초

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

            // 3초 대기 후 예측 시작
            setTimeout(async function() {
                if (!predictionMade) {
                    const result = await predict();
                    // 만약 인식률이 30% 이하라면 인식 안내 페이지로 이동
                    if (result.highestProbability <= 0.3) {
                        setTimeout(function() {
                            window.location.href = 'recofailure.php'; // 10초 후에 페이지 이동
                        }, 3000); // 3초
                    } else {
                        sendResultToServer(result);
                        setTimeout(function() {
                            window.location.href = 'recosuccess.php'; // 10초 후에 페이지 이동
                        }, 3000); // 3초
                    }
                    predictionMade = true;
                    // 결과 출력
                    console.log("가장 높은 인식 결과:", result);
                }
            }, 3000); // 3초

            // 웹캠 프레임 업데이트 및 예측 함수
            async function loop() {
                webcam.update();
                window.requestAnimationFrame(loop);
            }

            // 예측 실행 함수
            async function predict() {
                const prediction = await model.predict(webcam.canvas);
                let highestProbability = 0;
                let highestClass = '';

                for (let i = 0; i < maxPredictions; i++) {
                    if (prediction[i].probability > highestProbability) {
                        highestProbability = prediction[i].probability;
                        highestClass = prediction[i].className;
                    }
                }
                // 가장 높은 확률을 객체에 담아 반환
                return {
                    highestProbability,
                    highestClass
                };
            }

            // 서버로 결과를 전송하는 함수
            function sendResultToServer(result) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'recosuccess.php';

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'highestClass';
                input.value = result.highestClass;
                form.appendChild(input);

                document.body.appendChild(form);
                form.submit();
            }
        }
    });
</script>

<body>
    <!-- 안내문구 -->
    <div class="message">
        5초 뒤 카메라가 켜집니다.<br>
        3초동안 인식되니 쓰레기를 카메라 앞으로 가져가세요.
    </div>

    <!-- 인식버튼 -->
    <button class="btn-camera" onclick="init()"> </button>

    <!-- 웹캠과 인식 결과를 표시할 컨테이너 -->
    <div id="webcam-container"></div>
</body>

</html>