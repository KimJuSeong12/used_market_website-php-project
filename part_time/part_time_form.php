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
$js_array = ['part_time/js/part_time.js'];
$css_array = ['part_time/css/part_time.css'];
$title = "알바";
// $menu_code = "member";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/create_table.php";
create_table($conn, 'part_time');
?>
<!-- 메인부분 시작 -->
<div class="main_container">
    <div class="slide_section">
        <div class="slide_section_texts">
            <div class="slide_section_texts2">
                <h1 class="text_h1">우리 동네에서 찾는<br>제이알바</h1>
                <p class="text_p">걸어서 10분 거리의<br>동네 알바들 여기 다 있어요.</p>
            </div>
            <div class="slide_section_image">
                <span class="image_span">
                    <img src="./images/map_mark_cloth.png" alt="">
                </span>
            </div>
        </div>
    </div>

    <div class="part_time_lists">
        <h2 class="text_h2">인기 제이알바</h2>
        <div class="inside_lists">


            <?php
            // 2. DB연결, Member Class 로딩
            include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/part_time/part_time.php";
            $part_time = new Part_time($conn);
            $row = $part_time->part_time_info();
            // var_dump($row);
            // exit;
            for ($i = 0; $i < count($row); $i++) {
                echo "
                <div class='list'>
                <a href='./detail_part_time_form.php?num=" . $row[$i]['num'] . "'>
                    <div class='list_flex'>
                        <div class='img_div'>
                            <span class='image_span'>
                                <img class='img_images' src='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/write/data/" . $row[$i]['file_copied'] . "' alt=''>
                            </span>
                        </div>
                        <div class='list_text'>
                            <div class='text_title'>" . $row[$i]['title'] . "</div>
                            <div class='text_addr'>" . $row[$i]['writer_address'] . "</div>
                            <div class='text_price'>시급 " . $row[$i]['hour_pay'] . "원</div>
                        </div>
                    </div>
                </a>
            </div>
                ";
            }
            ?>



            <div class="section_addr2">
                <div class="section_addr1_left">
                    <div class="addr1_img">
                        <span>
                            <img src="./images/cloth.png" alt="">
                        </span>
                    </div>
                    <div class="addr1_text">
                        우리동네 알바가 궁금하다면 <br>제이마켓에서 바로 찾아보세요!
                    </div>
                </div>
                <!-- <button type="button" class="btn_ad">이용방법 알아보기</button> -->
            </div>
        </div>
    </div>
    <!-- 메인부분 종료 -->

    <!-- 푸터부분 시작 -->
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
    ?>