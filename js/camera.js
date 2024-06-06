// 안내문구 3초 뒤에 자동삭제
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        var messageElement = document.querySelector('.message');
        if (messageElement) {
            messageElement.style.display = 'none';
        }
    }, 3000); // 3초
});

// 인식 확인
document.addEventListener("DOMContentLoaded", function () {
    var recognitionButton = document.querySelector('.btn-camera');
    var messageElement = document.querySelector('.message');

    recognitionButton.addEventListener('click', function () {
        alert('인식 중 입니다!');
        messageElement.style.display = 'block';
    });
});

// Teachable Machine 모델 URL
const URL = "https://teachablemachine.withgoogle.com/models/wpm7vVOQJ/";

let model, webcam, labelContainer, maxPredictions;
let predictionMade = false;

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