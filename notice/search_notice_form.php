<?php
// 공통적으로 처리하는 부분
$js_array = ['notice/js/search_notice.js'];
$css_array = ['notice/css/search_notice.css'];
// $title = "회원가입";
$search_flag = (isset($_GET["search_flag"])) ? $_GET["search_flag"] : "";
//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
// 2. DB연결, Member Class 로딩
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/notice/notice.php";
$notice = new Notice($conn);
?>
<!-- 인부분 시작 -->
<div class="main_container">
  <h2 class="search_h2">'<?= $search_flag ?>' 검색결과</h2>
  <?php
  if (!$notice->search_exists_notice($search_flag)) {

  ?>
    <div class="div_nothing">
      <p>검색 결과가 없어요.</p>
      <span>다른 키워드로 다시 검색해보세요.</span>
    </div>
    <?php
  } else {
    $rowArray = $notice->search_info_notice($search_flag);
    for ($i = 0; $i < count($rowArray); $i++) {
    ?>
      <ul class="search_lists">
        <li class="search_li">
          <a class="search_a" href="./detail_notice_form.php?num=<?= $rowArray[$i]["num"] ?>">
            <div class="width_control">
              <p class="title"><?= $rowArray[$i]["title"] ?></p>
              <p class="content"><?= $rowArray[$i]["content"] ?></p>
            </div>
          </a>
        </li>
      </ul>
  <?php
    }
  }
  ?>
</div>
<!-- 메인부분 종료 -->

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>