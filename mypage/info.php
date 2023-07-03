<?php
// 공통적으로 처리하는 부분
$js_array = ['mypage/js/info.js'];
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
$name = $_SESSION['username'];
$path = parse_url($_SERVER['REQUEST_URI'])['path'];
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/member.php";
$member = new Member($conn);
$row = $member->getInfo($userid);
?>

<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php_teampro/mypage/css/mypage.css?v=<?= date('Ymdhis') ?>">
<div class="mypage">
  <div class="user_area">
    <div class="user_main">
      <h1 class="user_name"><?= $name ?> 님</h1>
      <div class="user_payments">
        <div class="user_payments_inline">
          <div class="user_point_area">
            <span class="user_payments_text">포인트</span>
            <img src="../img/icon-arrow.svg" alt="화살표" class="img_arrow">
          </div>
          <span class="user_point"><?= $row["point"] ?></span>
        </div>
      </div>
    </div>
  </div>
  <div class="myj">
    <div class="myj_nav">
      <div class="myj_nav_text">마이제이</div>
      <ul class="myj_nav_menu">
        <li>
          <?php if ($path == '/php_teampro/mypage/like_list.php') { ?>
        <li><a class="myj_nav_menu_text active" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php_teampro/mypage/like_list.php">관심목록</a></li>
      <?php } else { ?>
        <li><a class="myj_nav_menu_text" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php_teampro/mypage/like_list.php">관심목록</a></li>
      <?php } ?>
      </li>
      <li>
        <?php if ($path == '/php_teampro/mypage/info.php') { ?>
      <li><a class="myj_nav_menu_text active" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php_teampro/mypage/info.php">개인 정보 수정</a></li>
    <?php } else { ?>
      <li><a class="myj_nav_menu_text" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php_teampro/mypage/info.php">개인 정보 수정</a></li>
    <?php } ?>
    </li>
      </ul>
    </div>
    <!-- 공통 끝 -->
    <div class="info_area">
      <div class="info_area_1">
        <div class="info_area_text">
          <h2 class="info_title">개인 정보 수정</h2>
        </div>
      </div>
      <div class="info_area_2">
        <h4 class="password_recheck_text">비밀번호 재확인</h4>
        <p class="password_recheck_info_text">회원님의 정보를 안전하게 보호하기 위해 비밀번호를 다시 한번 확인해주세요.</p>
        <form name="input_form" action="./auth.php" method="post">
          <div class="info_area_3">
            <div class="info_area_3_id">
              <div class="info_area_3_id_1">
                <label for="user_id" class="info_area_3_user_id">아이디</label>
              </div>
              <div class="info_area_3_id_2">
                <div class="info_area_3_id_2_1">
                  <div class="info_area_3_id_2_1_1">
                    <input id="user_id" name="user_id" type="text" class="info_area_3_id_2_1_1_input" value="<?= $userid ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="info_area_3_id_3"></div>
            </div>
            <div class="info_area_3_pw">
              <div class="info_area_3_pw_1">
                <label for="user_pw" class="info_area_3_user_pw">비밀번호
                  <span class="info_area_3_user_pw_essential">*</span>
                </label>
              </div>
              <div class="info_area_3_pw_2">
                <div class="info_area_3_pw_2_1">
                  <div class="info_area_3_pw_2_1_1">
                    <input id="user_pw" name="user_pw" type="password" class="info_area_3_pw_2_1_1_input" autocomplete="off" placeholder="현재 비밀번호를 입력해 주세요">
                  </div>
                </div>
              </div>
              <div class="info_area_3_pw_3"></div>
            </div>
          </div>
          <div class="btn_area">
            <button class="btn_ok" type="button">
              <span class="btn_ok_text">확인</span>
            </button>
          </div>
        </form>
      </div>
    </div>