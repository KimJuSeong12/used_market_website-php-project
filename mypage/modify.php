<?php
$js_array = ['mypage/js/modify.js'];
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
$userid = $_SESSION["userid"];
$username = $_SESSION["username"];
$useremail = $_SESSION["useremail"];
$userphone = $_SESSION["userphone"];
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
      <h1 class="user_name"><?= $username ?> 님</h1>
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
        <?php if ($path == '/php_teampro/mypage/modify.php') { ?>
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
      <div class="info_modify">
        <form name="input_form" action="#" method="post">
          <div class="info_modify_id_area">
            <div class="info_modify_id_text">
              <label for="uid" class="info_modify_id_label">아이디</label>
            </div>
            <div class="info_modify_id_input">
              <div class="info_modify_id_input2">
                <div class="info_modify_id_input3">
                  <input id="uid" name="uid" type="text" class="info_modify_id_input4" value="<?= $userid ?>" readonly>
                </div>
              </div>
            </div>
            <div class="info_modify_id_input5"></div>
          </div>

          <div class="info_modify_old_pw_area">
            <div class="info_modify_old_pw_text">
              <label for="oldPW" class="info_modify_old_pw_label">현재 비밀번호</label>
            </div>
            <div class="info_modify_old_pw_input">
              <div class="info_modify_old_pw_input2">
                <div class="info_modify_old_pw_input3">
                  <input id="oldPW" name="oldPW" type="password" class="info_modify_old_pw_input4" value="" placeholder="비밀번호를 입력해 주세요" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="info_modify_old_pw_input5"></div>
          </div>

          <div class="info_modify_new_pw_area">
            <div class="info_modify_new_pw_text">
              <label for="newPW" class="info_modify_new_pw_label">새 비밀번호</label>
            </div>
            <div class="info_modify_new_pw_input">
              <div class="info_modify_new_pw_input2">
                <div class="info_modify_new_pw_input3">
                  <input id="newPW" name="newPW" type="password" class="info_modify_new_pw_input4" value="" placeholder="새 비밀번호를 입력해 주세요" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="info_modify_new_pw_input5"></div>
          </div>

          <div class="info_modify_new_pw_cf_area">
            <div class="info_modify_new_pw_cf_text">
              <label for="newCfPW" class="info_modify_new_pw_cf_label">새 비밀번호 확인</label>
            </div>
            <div class="info_modify_new_pw_cf_input">
              <div class="info_modify_new_pw_cf_input2">
                <div class="info_modify_new_pw_cf_input3">
                  <input id="newCfPW" name="newCfPW" type="password" class="info_modify_new_pw_cf_input4" value="" placeholder="새 비밀번호를 다시 입력해 주세요" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="info_modify_new_pw_cf_input5"></div>
          </div>

          <div class="info_modify_name_area">
            <div class="info_modify_name_text">
              <label for="userName" class="info_modify_name_label">이름</label>
            </div>
            <div class="info_modify_name_input">
              <div class="info_modify_name_input2">
                <div class="info_modify_name_input3">
                  <input id="userName" name="userName" type="text" class="info_modify_name_input4" value="<?= $username ?>">
                </div>
              </div>
            </div>
            <div class="info_modify_name_input5"></div>
          </div>

          <div class="info_modify_email_area">
            <div class="info_modify_email_text">
              <label for="userEmail" class="info_modify_email_label">이메일</label>
            </div>
            <div class="info_modify_email_input">
              <div class="info_modify_email_input2">
                <div class="info_modify_email_input3">
                  <input id="userEmail" name="userEmail" type="text" class="info_modify_email_input4" value="<?= $useremail ?>">
                </div>
              </div>
            </div>
            <div class="info_modify_email_input5">
              <button class="btn_cf_email" type="button">
                <span class="btn_cf_email_text">중복확인</span>
              </button>
            </div>
          </div>

          <div class="info_modify_phone_area">
            <div class="info_modify_phone_text">
              <label for="userPhone" class="info_modify_phone_label">휴대폰</label>
            </div>
            <div class="info_modify_phone_input">
              <div class="info_modify_phone_input2">
                <div class="info_modify_phone_input3">
                  <input id="userPhone" name="userPhone" type="tel" class="info_modify_phone_input4" value="<?= $userphone ?>" readonly>
                </div>
              </div>
            </div>
            <div class="info_modify_phone_input5">
            </div>
          </div>

          <div class="modify_btn_area">
            <button class="btn_withdrawal" type="button">
              <span class="btn_withdrawal_text">탈퇴하기</span>
            </button>
            <button class="btn_user_info_modify" type="button">
              <span class="btn_user_info_modify_text">회원정보수정</span>
            </button>
          </div>

        </form>
      </div>
    </div>