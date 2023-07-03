<?php

// 공통적으로 처리하는 부분
$js_array = ['login/find/js/find.js'];
$css_array = ['login/find/css/find.css'];
$title = "로그인";
$menu_code = "login";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php"
?>
<!-- 메인부분 시작 -->
<div class="find_id">
  <div class="title">비밀번호 찾기</div>
  <div class="common_area">
    <div class="select_means" id="select_means">
      <button type="button" data-type='phone' class="select_tel_email active">휴대폰 인증</button>
      <button type="button" data-type='email' class="select_tel_email">이메일 인증</button>
    </div>
    <!-- 인증수단 휴대폰 -->
    <div>
      <form action="./success_password.php" method="post" class="find_input_area active" name="find_form" id="form_phone">
        <input type='hidden' id='idaa' value='아이디' />
        <div id="phone_name_area">
          <div class="id_name_area">
            <label for="id" class="find_input_name">아이디</label>
            <div class="name_input">
              <input id="id" name="id" placeholder="아이디를 입력해 주세요" type="text" class="input-text name_input_box" value="">
              <button class="delete_content" type="button"></button>
            </div>
          </div>
          <p class="error_text">가입 시 등록한 아이디를 입력해 주세요.</p>
        </div>
        <div id="phone_phone_area">
          <div class="id_tel_area">
            <label for="phone" class="find_input_tel">휴대폰 번호</label>
            <div class="tel_input">
              <input id="phone" name="phone" placeholder="휴대폰 번호를 입력해 주세요" type="text" class="input-text tel_input_box" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="11" maxlength="11">
              <button class="delete_content" type="button"></button>
              <input id="cfnumber" name="cfnumber" type="hidden" value="input">
            </div>
          </div>
          <p class="error_text">가입 시 등록한 휴대폰 번호를 입력해 주세요.</p>
        </div>
        <div class="verification_main_area">
          <div class="verification_area">
            <div class="verification">
              <label for="verification_number" class="find_input_verification">인증번호</label>
              <div class="verification_input">
                <input id="verification_number" name="verificationNumber" placeholder="인증번호 6자리" type="tel" class="input-clear verification_input_box" value="">
                <button class="delete_content" type="button"></button>
              </div>
            </div>
            <button class="btn_resend" type="button">
              <span class="btn_resend_text">재발송</span>
            </button>
            <input type="hidden" name="cfnumber_tel_check_flag" value="input">
            <p class="remaining_time_text">03:00</p>
          </div>
          <p class="error_text">인증번호를 입력해 주세요</p>
        </div>
        <div class="auth_num">
          <button class="btn_auth_num" type="button" disabled>
            <span class="btn_auth_num_text">인증번호 받기</span>
          </button>
          <button class="btn_phone_ok" type="button">
            <span class="btn_ok_text">확인</span>
          </button>
        </div>
      </form>
    </div>
    <!-- 인증수단 이메일 -->
    <form action="./success_password.php" method="post" class="find_input_area" name="find_form" id="form_email">
      <div id="email_name_area">
        <div class="id_name_area">
          <label for="id" class="find_input_name">아이디</label>
          <div class="name_input">
            <input id="id" name="id" placeholder="아이디를 입력해 주세요" type="text" class="input-text name_input_box" value="">
            <button class="delete_content" type="button"></button>
          </div>
        </div>
        <p class="error_text">가입 시 등록한 아이디를 입력해 주세요.</p>
      </div>
      <div id="email_email_area">
        <div class="id_tel_area">
          <label for="email" class="find_input_tel">이메일</label>
          <div class="tel_input">
            <input id="email" name="email" placeholder="이메일을 입력해 주세요" type="text" class="input-text tel_input_box" value="">
            <button class="delete_content" type="button"></button>
          </div>
        </div>
        <p class="error_text">가입 시 등록한 이메일을 입력해 주세요.</p>
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