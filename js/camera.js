document.addEventListener("DOMContentLoaded", function () {
    // 3초 후에 .message 요소를 숨김
    setTimeout(function () {
        var messageElement = document.querySelector('.message');
        if (messageElement) {
            messageElement.style.display = 'none';
        }
    }, 3000); // 3초
});