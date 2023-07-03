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
$js_array = ['estate/js/detail_estate.js'];
$css_array = ['estate/css/detail_estate.css'];
$title = "부동산 상세페이지";
// $menu_code = "member";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
// 2. DB연결, Member Class 로딩
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/estate/estate.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/wish/wish.php";
$wish = new Wish($conn);
$wishRowCount = $wish->wish_personal_get_wished($userid, "estate", $num);
$imageUrl = "";
if ($wishRowCount > 0) {
    $imageUrl = "./images/color_heart-36.png";
} else {
    $imageUrl = "./images/heart.png";
}
$estate = new Estate($conn);
$row = $estate->estate_detail_info($num);
?>
<!-- 메인부분 시작 -->
<div class="main_container">
    <form name="estate_form" action="#" method="post">
        <input type="hidden" name="getNum" value="<?= $num ?>">
        <div class="image_slide_flex">
            <div class="slide_div">
                <div class="image_div">
                    <span class="image_span">
                        <img src="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/write/data/' . $row['file_copied'] ?>" alt="">
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
            <div class="house_owner">
                <span class="house_owner_text"><?= $row["seller"] ?></span>
                <span class="house_owner_data"><?= $row["building_type"] ?></span>
            </div>
            <h1 class="title_text_h1">
                <span class="text_color">판매중</span>
                <?= $row["price"] ?>
            </h1>
        </section>
        <section class="information_section">
            <h2 class="information_h2">정보</h2>
            <ul class="room_information_ul">
                <li class="ri_contents">
                    <span class="ri_list">면적</span>
                    <span class="ri_data"><?= $row["area"] ?></span>
                </li>
                <li class="ri_contents">
                    <span class="ri_list">방/욕실 수</span>
                    <span class="ri_data">방 <?= $row["room_count"] ?>개 / 화장실 <?= $row["bathroom_count"] ?>개</span>
                </li>
                <li class="ri_contents">
                    <span class="ri_list">층</span>
                    <span class="ri_data"><?= $row["floor"] ?></span>
                </li>
                <li class="ri_contents">
                    <span class="ri_list">대출가능여부</span>
                    <span class="ri_data"><?= $row["loan"] ?></span>
                </li>
                <li class="ri_contents">
                    <span class="ri_list">입주 가능일</span>
                    <span class="ri_data"><?= $row["moving_day"] ?></span>
                </li>
                <li class="ri_contents">
                    <span class="ri_list">반려동물</span>
                    <span class="ri_data"><?= $row["pet"] ?></span>
                </li>
                <li class="ri_contents">
                    <span class="ri_list">주차</span>
                    <span class="ri_data"><?= $row["parking"] ?></span>
                </li>
                <li class="ri_contents">
                    <span class="ri_list">엘레베이터</span>
                    <span class="ri_data"><?= $row["elevator"] ?></span>
                </li>
            </ul>
        </section>
        <section class="detail_contents">
            <h2 class="detail_contents_h2">소개</h2>
            <p class="contents"><?= $row["content"] ?></p>
        </section>
        <div style="display: flex; justify-content: end;">
            <button type="button" id="btndelete" class="btn btn-outline-secondary">삭제하기</button>
        </div>
    </form>
</div>
<!-- 메인부분 종료 -->

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>