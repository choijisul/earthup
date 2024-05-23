// 안내문구 3초 뒤에 자동삭제
document.addEventListener("DOMContentLoaded", function () {
    // 3초 후에 .message 요소를 숨김
    setTimeout(function () {
        var messageElement = document.querySelector('.message');
        if (messageElement) {
            messageElement.style.display = 'none';
        }
    }, 3000); // 3초
});

// 인식 확인
document.addEventListener("DOMContentLoaded", function() {
    var recognitionButton = document.querySelector('.btn-camera');
    var messageElement = document.querySelector('.message');

    recognitionButton.addEventListener('click', function() {
        alert('인식 중 입니다!');
        messageElement.style.display = 'block';
    });
});
