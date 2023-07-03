<?php
//보안부분(세션등록, 체크할내용, GET, POST)

$num = (isset($_GET["num"])) ? $_GET["num"] : "";
// 공통적으로 처리하는 부분
$js_array = ['notice/js/notice.js'];
$css_array = ['notice/css/notice.css'];
// $title = "회원가입";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/notice/notice.php";
$notice = new Notice($conn);
$row = $notice->notice_detail_info($num);
?>
<!-- 메인부분 시작 -->
<div class="main_container">
  <form name="part_time_form" action="#" method="post">
    <input type="hidden" name="getNum" value="<?= $num ?>">

    <section class="title_text">
      <h1><?= $row["title"] ?></h1>
    </section>
    <section class="detail_contents">
      <h2 class="detail_contents_h2">상세 내용</h2>
      <p class="contents"><?= $row["content"] ?></p>
    </section>
  </form>
</div>
<!-- 메인부분 종료 -->

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>