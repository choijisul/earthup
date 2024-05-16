<?php
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";
echo "<head>\n";
echo "    <meta charset=\"UTF-8\">\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
echo "    <link rel=\"stylesheet\" href=\"css/membership.css\">\n";
echo "    <link rel=\"stylesheet\" href=\"css/loginMembershipNav.css\">\n";
echo "    \n";
echo "    <title> 회원가입</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "    <!-- nav -->\n";
echo "    <header>\n";
echo "        <div class=\"nav_container\">\n";
echo "            <h1>\n";
echo "                <p><button onClick=\"location.href=\'index.html\'\" class=\"backButton\"><img\n";
echo "                    src=\"./img/backButton.png\"></button>\n";
echo "            </h1>\n";
echo "        </div>\n";
echo "    </header>\n";
echo "    <div class=\"header_container\">\n";
echo "        <h1>\n";
echo "            <i onClick=\"location.href=\'camera.html\'\" class=\"garbageSearch\">쓰레기 검색</i>   \n";
echo "            <i onClick=\"location.href=\'froggingBoard.html\'\" class=\"froggingBoard\">플로깅 게시판</i>\n";
echo "            <i onClick=\"location.href=\'membership.html\'\" class=\"membership\">회원가입</i>\n";
echo "            <i onClick=\"location.href=\'login.html\'\" class=\"login\">로그인</i>\n";
echo "        </h1>\n";
echo "    </div>\n";
echo "\n";
echo "    <!-- 로그인 회색 상자 -->\n";
echo "    <div class=\"login_container\"></div>\n";
echo "\n";
echo "    <!-- 입력 -->\n";
echo "    <div class=\"input\">\n";
echo "        <!-- 아이디 -->\n";
echo "        <div class=\"member-id\">\n";
echo "            <div class=\"id\">아이디</div>\n";
echo "            <input type=\"text\" placeholder=\"아이디\" class=\"input-id\">\n";
echo "        </div>\n";
echo "        \n";
echo "        <!-- 비밀번호 -->\n";
echo "        <div class=\"member-pw\">\n";
echo "            <div class=\"pw\">비밀번호</div>\n";
echo "            <input type=\"text\" placeholder=\"비밀번호\" class=\"input-pw\">\n";
echo "        </div>\n";
echo "\n";
echo "        <!-- 비밀번호 재확인-->\n";
echo "        <div class=\"member-reconfirm\">\n";
echo "            <div class=\"reconfirm\">비밀번호 재확인</div>\n";
echo "            <input type=\"text\" placeholder=\"비밀번호 재확인\" class=\"input-reconfirm\">\n";
echo "        </div>\n";
echo "\n";
echo "        <!-- 이메일 -->\n";
echo "        <div class=\"member-email\">\n";
echo "            <div class=\"email\">이메일</div>\n";
echo "            <input type=\"text\" placeholder=\"이메일\" class=\"input-email\">\n";
echo "        </div>\n";
echo "    </div>\n";
echo "\n";
echo "    <button class=\"membershipButton\">회원가입</button>\n";
echo "    \n";
echo "    \n";
echo "</body>\n";
echo "<script src=\"js/index.js\"></script>\n";
echo "</html>\n";
?>