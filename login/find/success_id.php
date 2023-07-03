<?php
// 보안부분(세션등록, 체크할내용, GET, POST)
if (!isset($_POST['email']) || $_POST['email'] != "") {
  die("
<script>
  alert('비정상적인 접근입니다.');
  self.location.href = '../index.php';
</script>");
}

include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/member.php";
$member = new Member($conn);
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$name = (isset($_POST['name'])) ? $_POST['name'] : '';
$row = $member->find_email($email, $name);

?>
<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php_teampro/login/find/css/find.css?v=<?= date('Ymdhis') ?>">

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