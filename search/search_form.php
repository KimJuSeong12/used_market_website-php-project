<?php
//보안부분(세션등록, 체크할내용, GET, POST)
// if (!isset($_POST['chk']) || $_POST['chk'] != 1) {
//     die("
// <script>
//   alert('약관동의 후 접근가능');
//   self.location.href = './stipulation.php';
// </script>");
// }
$search_flag = (isset($_POST["text"])) ? $_POST["text"] : "";

// 공통적으로 처리하는 부분
$js_array = ['search/js/search.js'];
$css_array = ['search/css/search.css'];
$title = "검색페이지";
// $menu_code = "member";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
// 2. DB연결, Member Class 로딩
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/search/search.php";
$search = new Search($conn);


?>
<!-- 메인부분 시작 -->
<section class="result_section">
    <div class="result_container">
        <div class="trade_lists_div">
            <?php
            if ($search->search_exists_part_time($search_flag)) {
                $row3 = $search->search_info_part_time($search_flag);

            ?>
                <p class="trade_p">알바</p>
                <?php
                for ($i = 0; $i < count($row3); $i++) {
                    echo "
                <article class='article_flat_card'>
                <a class='trade_link' href=\"http://{$_SERVER['HTTP_HOST']}/php_teampro/part_time/detail_part_time_form.php?num=" . $row3[$i]['num'] . "\">
                    <div class='photo'>
                        <img class='img_control' src='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/write/data/" . $row3[$i]['file_copied'] . "' alt=''>
                    </div>
                    <div class='trade_info'>
                        <div class='trade_title_div'>
                            <span class='trade_title'>" . $row3[$i]['title'] . "</span>
                        </div>
                        <p class='region_name'>" . $row3[$i]['writer_address'] . "</p>
                        <p class='price_name'>시급 " . $row3[$i]['hour_pay'] . "만원</p>
                    </div>
                </a>
            </article>
                ";
                }
                ?>
        </div>
    <?php
            }

            if ($search->search_exists_estate($search_flag)) {
                $row2 = $search->search_info_estate($search_flag);


    ?>
        <div class="trade_lists_div">
            <p class="trade_p">부동산 직거래</p>
            <?php
                for ($i = 0; $i < count($row2); $i++) {
                    echo "
                <article class='article_flat_card'>
                <a class='trade_link' href=\"http://{$_SERVER['HTTP_HOST']}/php_teampro/estate/detail_estate_form.php?num=" . $row2[$i]['num'] . "\">
                    <div class='photo'>
                        <img class='img_control' src='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/write/data/" . $row2[$i]['file_copied'] . "' alt=''>
                    </div>
                    <div class='trade_info'>
                        <div class='trade_title_div'>
                            <span class='trade_title'>" . $row2[$i]['title'] . "</span>
                        </div>
                        <p class='region_name'>" . $row2[$i]['writer_address'] . "</p>
                        <p class='price_name'>" . $row2[$i]['price'] . "</p>
                    </div>
                </a>
            </article>
                ";
                }
            ?>

        </div>
    <?php
            }


            if ($search->search_exists_car($search_flag)) {
                $row1 = $search->search_info_car($search_flag);


    ?>
        <div class="trade_lists_div">
            <p class="trade_p">중고차 직거래</p>
            <?php
                for ($i = 0; $i < count($row1); $i++) {
                    echo "
                <article class='article_flat_card'>
                <a class='trade_link' href=\"http://{$_SERVER['HTTP_HOST']}/php_teampro/car/detail_car_form.php?num=" . $row1[$i]['num'] . "\">
                    <div class='photo'>
                        <img class='img_control' src='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/write/data/" . $row1[$i]['file_copied'] . "' alt=''>
                    </div>
                    <div class='trade_info'>
                        <div class='trade_title_div'>
                            <span class='trade_title'>" . $row1[$i]['title'] . "</span>
                        </div>
                        <p class='region_name'>" . $row1[$i]['writer_address'] . "</p>
                        <p class='price_name'>" . $row1[$i]['price'] . "만원</p>
                    </div>
                </a>
            </article>
                ";
                }
            ?>

        </div>
    <?php
            }
            if (!($search->search_exists_car($search_flag)) && !($search->search_exists_estate($search_flag)) && !($search->search_exists_part_time($search_flag))) {

    ?>

        <div class="empty_result">
            <p class="empty_result_message">
                <span class="zero_keyword">
                    <?= $search_flag ?>
                </span>
                에 대한 검색 결과가 없어요.
                <br>
                검색어를 다시 확인해주세요!
            </p>
            <div class="research_div">
                <span class="research">다시 검색하기</span>
            </div>
        </div>
    </div>
</section>
<?php
            }
?>
<!-- <div class="more_btn_div">
    <span class="more_text">더보기</span>
</div> -->
</div>
</section>
<!-- 메인부분 종료 -->

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>