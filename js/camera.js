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

// 이미지 불러오기
function previewFile() {
    var preview = document.getElementById("previewImage");
    var file = document.getElementById("fileInput").files[0];
    var reader = new FileReader();

    reader.addEventListener("load", function () {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

async function predict() {
    const prediction = await model.predict(webcam.canvas);
    for (let i = 0; i < maxPredictions; i++) {
        const className = prediction[i].className;
        const probability = prediction[i].probability.toFixed(2);
        const classPrediction = className + ": " + probability;

        // 확률이 80% 이상인 경우에만 콘솔에 표시
        if (probability >= 0.8) {
            console.log(classPrediction);
        }

        labelContainer.childNodes[i].innerHTML = classPrediction;
    }
}