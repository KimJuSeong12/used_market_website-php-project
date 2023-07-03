<?php
//보안부분(세션등록, 체크할내용, GET, POST)
// if (!isset($_POST['chk']) || $_POST['chk'] != 1) {
//     die("
// <script>
//   alert('약관동의 후 접근가능');
//   self.location.href = './stipulation.php';
// </script>");
// }

$num = (isset($_GET["num"])) ? $_GET["num"] : "";

// 공통적으로 처리하는 부분
$js_array = ['part_time/js/detail_part_time.js'];
$css_array = ['part_time/css/detail_part_time.css'];
$title = "알바 상세페이지";
// $menu_code = "member";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
// 2. DB연결, Member Class 로딩
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/part_time/part_time.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/wish/wish.php";
$wish = new Wish($conn);
$wishRowCount = $wish->wish_personal_get_wished($userid, "part_time", $num);
$imageUrl = "";
if ($wishRowCount > 0) {
    $imageUrl = "./images/color_heart-36.png";
} else {
    $imageUrl = "./images/heart.png";
}
$part_time = new Part_time($conn);
$row = $part_time->part_time_detail_info($num);
$new_hit = $row["hit"] + 1;
$result = $wish->update_hit("part_time", $new_hit, $num);


?>
<!-- 메인부분 시작 -->
<div class="main_container">
    <form name="part_time_form" action="#" method="post">
        <input type="hidden" name="getNum" value="<?= $num ?>">

        <div class="image_slide_flex">
            <div class="slide_div">
                <div class="image_div">
                    <span class="image_span">
                        <img src="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/write/data/' . $row['file_copied'] . '' ?>" alt="">
                    </span>
                </div>
            </div>
        </div>
        <section class="member_information_section">
            <div class="information_div_flex">
                <div class="profile_div">
                    <img src="./images/profile.png" alt="">
                </div>
                <div class="information_texts">
                    <div class="text_userid"><?= $row["writer_id"] ?></div>
                    <div class="text_addr"><?= $row["writer_address"] ?></div>
                </div>
            </div>
            <div class="like_div">
                <img id="heart" src="<?= $imageUrl ?>" alt="">
            </div>
        </section>
        <div class="line"></div>
        <section class="title_text">
            <h1><?= $row["title"] ?></h1>
        </section>
        <section class="information_section">
            <h2 class="information_h2">정보</h2>
            <div class="information_div">
                <img src="./images/won-20.png" alt="">
                <div class="price_text">
                    시급 <?= $row["hour_pay"] ?>원
                </div>
            </div>
            <div class="information_div">
                <img src="./images/mark-20.png" alt="">
                <div class="price_text">
                    <?= $row["work_location"] ?>
                </div>
            </div>
            <div class="information_div">
                <img src="./images/calendar-20.png" alt="">
                <div class="price_text">
                    <?= $row["work_day"] ?>
                </div>
            </div>
            <div class="information_div">
                <img src="./images/clock-20.png" alt="">
                <div class="price_text">
                    <?= $row["work_time"] ?>시간
                </div>
            </div>
        </section>
        <section class="detail_contents">
            <h2 class="detail_contents_h2">상세 내용</h2>
            <p class="contents"><?= $row["content"] ?></p>
        </section>
        <?php
        if ($row["writer_id"] == $userid) {
        ?>
            <div style="display: flex; justify-content: end;">
                <button type="button" id="btndelete" class="btn btn-outline-secondary">삭제하기</button>
            </div>
        <?php
        }
        ?>
    </form>
</div>
<!-- 메인부분 종료 -->

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>