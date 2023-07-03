<?php
// 공통적으로 처리하는 부분
$js_array = ['mypage/js/like_list.js'];
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
    <?php
    // 2. DB연결, Member Class 로딩
    include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/wish/wish.php";
    $wish = new Wish($conn);
    $wishCount = $wish->wish_personal_get_list_count($userid);
    ?>
    <div class="like_list_area">
      <div class="like_list_area_1">
        <h2 class="like_list_title">관심 목록(<?= $wishCount ?>)</h2>
        <span class="like_list_info_text">관심 목록은 최대 100개까지 저장됩니다.</span>
      </div>
      <?php
      if ($wishCount <= 0) {

      ?>
        <!-- 관심 목록 없을 경우 -->
        <div class="like_list_no">
          <div class="like_list_no_icon">
            <svg width="60" height="60" viewBox="0 0 68 68" xmlns="http://www.w3.org/2000/svg">
              <path d="M57.025 14.975c-5.3-5.3-13.889-5.3-19.186 0L34 18.812l-3.837-3.837c-5.3-5.3-13.89-5.3-19.19 0-5.296 5.297-5.296 13.886 0 19.186l3.838 3.837 18.482 18.485a1 1 0 0 0 1.414 0s0 0 0 0l18.482-18.485h0l3.837-3.837c5.3-5.3 5.3-13.89 0-19.186z" stroke="#e2e2e2" stroke-width="2" stroke-linecap="round" fill="none" fill-rule="evenodd"></path>
            </svg>
          </div>

          <strong class="like_list_no_text">관심 목록이 없습니다.</strong>
          <a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/car/car_form.php' ?>">
            <button class="btn_go_second" type="button">
              <span class="btn_go_second_text">상품 보러 가기</span>
            </button>
          </a>
        </div>
      <?php
      } else {
      ?>
        <!-- 관심 목록 있을 경우 -->
        <div class="like_list_yes">
          <div class="likeList">
            <div class="like_list_area1">
              <div class="like_list_area2">
              <?php
              $rowArray = $wish->wish_personal_get_list($userid);
              for ($i = 0; $i < count($rowArray); $i++) {
                $board_name = $rowArray[$i]["board_name"];
                switch ($board_name) {
                  case "part_time": {
                      $pay = 'hour_pay';
                      break;
                    }
                  case "car": {
                      $pay = 'ex_price';
                      break;
                    }
                  case "estate": {
                      $pay = 'price';
                      break;
                    }
                }
                $wished_num = $rowArray[$i]["wished_num"];
                $row = $wish->wish_get_list($board_name, $wished_num);
                echo "
                  <div class='like_list_area3'>
                  <a href='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/$board_name/detail_{$board_name}_form.php?num=" . $row['num'] . "' class='like_list_area3_photo_area'>
                  <input type='hidden' name='num' id='hidden_num_flag' value='$wished_num'>

                    <span class='like_list_area3_photo1'>
                      <span class='like_list_area3_photo2'>
                        <img src='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/write/data/" . $row['file_copied'] . "' alt='' class='like_list_area3_photo3'>
                      </span>
                    </span>
                  </a>
                  <div class='like_list_area4'>
                    <div class='like_list_area4_main'>
                      <div class='like_list_area4_title'>
                        <a href='#' class='like_list_area4_title_a'>" . $row["title"] . "</a>
                      </div>
                      <div class='like_list_area4_price_area'>
                        <span class='like_list_area4_price'>" . $row[$pay] . "</span>
                      </div>
                    </div>
                    <div class='like_list_area5'>
                      <!-- <button class='like_list_delete' type='button'>
                        <span class='like_list_delete_text'>삭제</span>
                      </button> -->
                      <img src='../img/color_heart-36.png' alt='관심 등록' id='heart'>
                    </div>
                  </div>
                </div>
                  ";
              }
            }
              ?>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>