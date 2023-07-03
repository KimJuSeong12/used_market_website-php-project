<?php
//보안부분(세션등록, 체크할내용, GET, POST)
// if (!isset($_POST['chk']) || $_POST['chk'] != 1) {
//     die("
// <script>
//   alert('약관동의 후 접근가능');
//   self.location.href = './stipulation.php';
// </script>");
// }

// 공통적으로 처리하는 부분
$js_array = ['estate/js/estate.js'];
$css_array = ['estate/css/estate.css'];
$title = "부동산 직거래";
// $menu_code = "member";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/create_table.php";
create_table($conn, 'estate');
?>
<!-- 메인부분 시작 -->
<div class="main_container">
    <section class="slide_section">
        <div class="slide_section_texts">
            <div class="slide_section_texts2">
                <h1 class="text_h1">복비없이 투명한<br>부동산 직거래</h1>
                <p class="text_p">이웃이 살던 집, 제이마켓에서<br>편하게 직거래해보세요.</p>
            </div>
            <div class="slide_section_image">
                <span class="image_span">
                    <img src="./images/estate_image.png" alt="">
                </span>
            </div>
        </div>
    </section>

    <div class="part_time_lists">
        <h2 class="text_h2">인기 부동산 직거래 게시글</h2>
        <div class="inside_lists">
            <?php
            // 2. DB연결, Estate Class 로딩
            include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/estate/estate.php";
            $estate = new Estate($conn);
            $row = $estate->estate_info();

            for ($i = 0; $i < count($row); $i++) {
                echo "
                <div class='list'>
                <a href='./detail_estate_form.php?num=" . $row[$i]['num'] . "'>
                    <div class='list_flex'>
                        <div class='img_div'>
                            <span class='image_span'>
                                <img class='img_images' src='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/write/data/" . $row[$i]['file_copied'] . "' alt=''>
                            </span>
                        </div>
                        <div class='list_text'>
                            <div class='text_title'>" . $row[$i]['title'] . "</div>
                            <div class='text_addr'>" . $row[$i]['writer_address'] . "</div>
                            <div class='text_price'>" . $row[$i]['price'] . "</div>
                        </div>
                    </div>
                </a>
            </div>
                ";
            }
            ?>




        </div>
    </div>
    <!-- 메인부분 종료 -->

    <!-- 푸터부분 시작 -->
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
    ?>