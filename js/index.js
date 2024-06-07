document.addEventListener("DOMContentLoaded", function() {
  // AOS 초기화
  AOS.init({
    duration: 1200,
  });

  // 모든 배너 이미지 요소를 선택
  let images = document.querySelectorAll(".banner-image");
  // 현재 이미지의 인덱스를 저장하는 변수
  let currentImageIndex = 0;

  showImage(currentImageIndex);

  // 주어진 인덱스의 이미지를 보여주는 함수
  function showImage(index) {
    // 모든 이미지를 숨김
    images.forEach(image => image.style.opacity = 0);
    // 주어진 인덱스의 이미지를 표시
    images[index].style.opacity = 1;
  }

  // 다음 이미지로 이동하는 함수
  function nextImage() {
    // 다음 이미지의 인덱스를 계산하고 배열 길이로 나누어 순환
    currentImageIndex = (currentImageIndex + 1) % images.length;
    // 다음 이미지를 표시
    showImage(currentImageIndex);
  }

  // 일정한 간격으로 다음 이미지로 전환하는 타이머 설정
  setInterval(nextImage, 5000); // 5초마다 다음 이미지로 전환

  // 로고 클릭 시 페이지 하단으로 이동
  var logo = document.querySelector(".logName");
  logo.addEventListener("click", function() {
    window.location.href = "#footer";
  });

  // 더보기 버튼 클릭 시 추가 컨텐츠 표시
  document.getElementById('moreBtn').addEventListener('click', function() {
    const moreContent = document.querySelectorAll('.more-content');
    moreContent.forEach(function(content) {
      content.style.display = 'block';
    });
    // 닫기 버튼 생성
    const closeButton = document.createElement('button');
    closeButton.textContent = '닫기';
    closeButton.classList.add('close-button');
    this.parentNode.appendChild(closeButton);

    // 더보기 버튼 숨김
    this.style.display = 'none';

    // 닫기 버튼에 이벤트 추가
    closeButton.addEventListener('click', function() {
      moreContent.forEach(function(content) {
        content.style.display = 'none';
      });
      // 더보기 버튼 표시
      document.getElementById('moreBtn').style.display = 'block';
      // 닫기 버튼 삭제
      closeButton.parentNode.removeChild(closeButton);
    });
  });
});
