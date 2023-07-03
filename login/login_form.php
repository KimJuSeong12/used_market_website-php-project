<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php_teampro/login/css/login.css?v=<?= date('Ymdhis') ?>">
<?php
//보안부분(세션등록, 체크할내용, GET, POST)

// 공통적으로 처리하는 부분
$js_array = ['/login/js/login.js'];
$css_array = ['/login/css/login.css'];
$title = "로그인";
$menu_code = "login";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php"
?>

<!-- 메인부분 시작 -->
<div class="login_main_area">
  <div class="login_title">로그인</div>
  <div class="login_sub_area">
    <form name="member_form" method="post" action="./login.php">
      <div class="login_input_area">
        <div class="login_input">
          <div class="login_input_id_pw">
            <input type="text" name="id" id="id" placeholder="아이디를 입력해주세요" value="" class="login_input_id">
          </div>
        </div>
        <div class="login_input">
          <div class="login_input_id_pw">
            <input type="password" name="pw" id="pw" placeholder="비밀번호를 입력해주세요" value="" class="login_input_pw">
          </div>
        </div>
      </div>
      <div class="login_search_area">
        <a class="login_search_id">아이디 찾기</a>
        <span class="login_search_symbol"></span>
        <a class="login_search_pw">비밀번호 찾기</a>
      </div>
      <div class="login_click_area">
        <button class="login_click_login" type="submit"><span class="login_click_login_text">로그인</span></button>
        <button class="login_click_regist" type="button" id="signin"><span class="login_click_regist_text">회원가입</span></button>
      </div>
    </form>
  </div>
</div>
<!-- 메인부분 종료 -->

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>