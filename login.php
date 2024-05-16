<?php
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";
echo "<head>\n";
echo "    <meta charset=\"UTF-8\">\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
echo "    <link rel=\"stylesheet\" href=\"css/loginMembershipNav.css\">\n";
echo "    <link rel=\"stylesheet\" href=\"css/login.css\">\n";
echo "\n";
echo "\n";
echo "    <title>로그인</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "\n";
echo "    <!-- nav -->\n";
echo "    <header>\n";
echo "        <div class=\"nav_container\">\n";
echo "            <h1>\n";
echo "                <p><button onClick=\"location.href=\'index.html\'\" class=\"backButton\"><img\n";
echo "                    src=\"./img/backButton.png\"></button>\n";
echo "            </h1>\n";
echo "        </div>\n";
echo "    </header>\n";
echo "\n";
echo "    <!-- 로고 이미지 -->\n";
echo "    <div class=\"logo\">로고</div>\n";
echo "\n";
echo "    <!-- 아이디 입력창 -->\n";
echo "    <input type=\"text\" placeholder=\"아이디\" class=\"input-id\">\n";
echo "    <!-- 비밀번호 입력창 -->\n";
echo "    <input type=\"text\" placeholder=\"비밀번호\" class=\"input-pw\">\n";
echo "\n";
echo "    <!-- 로그인 버튼 -->\n";
echo "    <button class=\"loginButton\">로그인</button>\n";
echo "\n";
echo "    <i onClick=\"location.href=\'membership.html\'\" class=\"goMembership\">회원가입</i>\n";
echo "\n";
echo "</body>\n";
echo "<script src=\"js/index.js\"></script>\n";
echo "</html>\n";
?>