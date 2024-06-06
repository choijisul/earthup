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
                await predict();
                predictionMade = true;
            }
            window.requestAnimationFrame(loop);
        }

        // 예측 실행 함수
        async function predict() {
            const prediction = await model.predict(webcam.canvas);
            for (let i = 0; i < maxPredictions; i++) {
                const classPrediction = prediction[i].className + ": " + prediction[i].probability.toFixed(2);
                console.log(classPrediction);
            }
            webcam.stop();
        }
    }
});
