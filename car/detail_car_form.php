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
$js_array = ['car/js/detail_car.js'];
$css_array = ['car/css/detail_car.css'];
$title = "중고차 상세페이지";
// $menu_code = "member";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
// 2. DB연결, Member Class 로딩
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/car/car.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/wish/wish.php";
$wish = new Wish($conn);
$wishRowCount = $wish->wish_personal_get_wished($userid, "car", $num);
$imageUrl = "";
if ($wishRowCount > 0) {
    $imageUrl = "./images/color_heart-36.png";
} else {
    $imageUrl = "./images/heart.png";
}
$car = new Car($conn);
$row = $car->car_detail_info($num);
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
            <p class="car_type"><?= $row["title"] ?></p>
            <p class="car_price"><?= $row["price"] ?>만원 ⸱ <?= $row["year"] ?>년식 ⸱ <?= $row["km"] ?>km</p>
        </section>
        <section class="price_info">
            <h2 class="price_info_h2">가격 정보</h2>
            <ul class="price_info_ul">
                <li class="price_info_lists">
                    <div class="total_price">총 구매 예상비용</div>
                    <div class="total_price_data_div">
                        <b class="total_price_data"><?= $row["ex_price"] ?>만원</b>
                    </div>
                </li>
                <li class="price_info_lists">
                    <div class="total_price">직거래로 아끼는 비용</div>
                    <div class="total_price_data_div">
                        <b class="total_price_data"><?= $row["reducing_price"] ?>만원</b>
                    </div>
                </li>
            </ul>
        </section>
        <section class="information_section">
            <h2 class="information_h2">정보</h2>
            <ul class="room_information_ul">
                <li class="ri_contents">
                    <div class="ri_list">차종</div>
                    <span class="ri_data"><?= $row["car_type"] ?></span>
                </li>
                <li class="ri_contents">
                    <div class="ri_list">연식/등록일</div>
                    <div class="ri_data"><?= $row["year"] ?>년식 / <?= $row["regist_day"] ?></div>
                </li>
                <li class="ri_contents">
                    <div class="ri_list">주행거리</div>
                    <div class="ri_data"><?= $row["km"] ?>km</div>
                </li>
                <li class="ri_contents">
                    <div class="ri_list">배기량</div>
                    <div class="ri_data"><?= $row["displacement"] ?>cc</div>
                </li>
                <li class="ri_contents">
                    <div class="ri_list">연료</div>
                    <div class="ri_data"><?= $row["fuel"] ?></div>
                </li>
                <li class="ri_contents">
                    <div class="ri_list">변속기</div>
                    <div class="ri_data"><?= $row["transmission"] ?></div>
                </li>
            </ul>
        </section>
        <section class="insurance">
            <h2 class="insurance_info">보험이력 정보</h2>
            <ul class="insurance_info_contents">
                <li class="ii_contents">
                    <div class="ri_list">보험사고 이력</div>
                    <div class="ri_data"><?= $row["insurance_history"] ?>회</div>
                </li>
                <li class="ii_contents">
                    <div class="ri_list">자동차 특수용도 이력</div>
                    <div class="ri_data"><?= $row["special_used"] ?>회</div>
                </li>
                <li class="ii_contents">
                    <div class="ri_list">소유자 변경 이력</div>
                    <div class="ri_data"><?= $row["owner_change_history"] ?>회</div>
                </li>
            </ul>
            <div class="blank_div"></div>
        </section>
        <section class="insurance">
            <h2 class="insurance_info">차량 옵션</h2>
            <ul class="car_option">
                <li class="car_option_list">
                    <img src="./images/dashboard-18.png" alt="">
                    <span class="car_option_span">크루즈 컨트롤</span>
                </li>
                <li class="car_option_list">
                    <img src="./images/emergency-18.png" alt="">
                    <span class="car_option_span">긴급 제동</span>
                </li>
                <li class="car_option_list">
                    <img src="./images/emergency-18.png" alt="">
                    <span class="car_option_span">후측방 경보</span>
                </li>
                <li class="car_option_list">
                    <img src="./images/sun-18.png" alt="">
                    <span class="car_option_span">파라노마 선루프</span>
                </li>
                <li class="car_option_list">
                    <img src="./images/sensor-18.png" alt="">
                    <span class="car_option_span">후방 카메라</span>
                </li>
                <li class="car_option_list">
                    <img src="./images/sensor-18.png" alt="">
                    <span class="car_option_span">주차 센서: 후방</span>
                </li>
                <li class="car_option_list">
                    <img src="./images/heat-18.png" alt="">
                    <span class="car_option_span">열선 시트</span>
                </li>
                <li class="car_option_list">
                    <img src="./images/heat-18.png" alt="">
                    <span class="car_option_span">가축 시트</span>
                </li>
            </ul>
            <div class="blank_div"></div>
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