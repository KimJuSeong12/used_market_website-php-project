<?php
$search_flag = (isset($_POST["text"])) ? $_POST["text"] : "";
// 공통적으로 처리하는 부분
$js_array = ['search/js/search.js'];
$css_array = ['search/css/search.css'];
$title = "검색페이지";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php"
?>

<!-- 메인부분 시작 -->
<section class="result_section">
  <div class="result_container">
    <div class="empty_result">
      <p class="empty_result_message">
        <span class="zero_keyword">
          입력값이 들어갈 데이터
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
<!-- 메인부분 종료 -->

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>