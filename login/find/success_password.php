<?php
//보안부분(세션등록, 체크할내용, GET, POST)

// 공통적으로 처리하는 부분
$js_array = ['login/find/js/find.js'];
$css_array = ['login/find/css/find.css'];
$title = "비밀번호 재설정";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php"
?>
<!-- 메인부분 시작 -->
<div class="reset_password">

  <div class="title">비밀번호 재설정</div>
  <div class="common_area">
    <form action="./find_password.php" method="post" class="find_input_area active" name="find_form" id="form_email">
      <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
      <input type="hidden" name="type" value="password">
      <div id="email_name_area">
        <div class="id_name_area">
          <label for="password" class="find_input_name">새 비밀번호 등록</label>
          <div class="name_input">
            <input id="password" name="password" placeholder="새 비밀번호를 입력해 주세요" type="password" class="input-text name_input_box" value="">
            <button class="delete_content" type="button"></button>
          </div>
        </div>
        <p class="error_text">8자 이상 입력</p>
      </div>
      <div id="email_email_area">
        <div class="id_name_area">
          <label for="password2" class="find_input_name">새 비밀번호 확인</label>
          <div class="name_input">
            <input id="password2" name="password2" placeholder="새 비밀번호를 한 번 더 입력해 주세요" type="password" class="input-text name_input_box" value="">
            <button class="delete_content" type="button"></button>
          </div>
        </div>
        <p class="error_text">동일한 비밀번호를 입력해 주세요.</p>
      </div>
      <div class="auth_num">
        <button class="btn_email_ok" type="submit" disabled>
          <span class="btn_ok_text">확인</span>
        </button>
      </div>
    </form>
  </div>
</div>
<!-- 메인부분 종료 -->

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>