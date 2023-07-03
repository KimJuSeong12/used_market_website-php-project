<?php
// 공통적으로 처리하는 부분
$js_array = ['login/find/js/find_id_button.js'];
$css_array = ['login/find/css/find.css'];
// $title = "회원가입";

include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/member.php";
$member = new Member($conn);
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$name = (isset($_POST['name'])) ? $_POST['name'] : '';
$row = $member->find_email($email, $name);

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php"
?>
<!-- 메인부분 시작 -->
<div class="find_success">
  <div class="show_infor_area">
    <div class="success_text">
      고객님의 제이 계정을 찾았습니다.
      <div class="login_request_text">
        아이디 확인 후 로그인해 주세요.
      </div>
    </div>
    <ul class="show_id">
      <li class="show_id_area">
        <img class="show_infor_img" src="../../img/유저.svg" alt="정보">
        <div class="show_id_text">
          <div class="show_user_id"><?= $row['user_id'] ?></div>
          <div class="show_user_regist_day">
            가입일
            <?= $row['join_date'] ?>
          </div>
        </div>
      </li>
    </ul>
    <div class="go_login_area">
      <button class="btn_go_login" type="button">
        <span class="btn_go_login_text">로그인</span>
      </button>
      <button class="btn_go_find_password" type="button">
        <span class="btn_go_find_password_text">비밀번호 찾기</span>
      </button>
    </div>
  </div>
</div>
<!-- 메인부분 종료 -->

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>