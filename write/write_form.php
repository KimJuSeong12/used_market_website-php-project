<?php
//보안부분(세션등록, 체크할내용, GET, POST)
// if (!isset($_POST['chk']) || $_POST['chk'] != 1) {
//   die("
// <script>
//   alert('약관동의 후 접근가능');
//   self.location.href = './stipulation.php';
// </script>");
// }

// 공통적으로 처리하는 부분
$js_array = ['write/js/write.js'];
$css_array = ['write/css/write.css'];
$title = "글쓰기";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php"
?>
<!-- 메인부분 시작 -->
<article>
  <div class="container" role="main">
    <h2>게시판</h2>
    <form name="write_form" id="write_form" role="write_form" method="post" action="./write_insert.php" enctype="multipart/form-data">
      <div class="mb-3">
        <div class="container1">
          <select class="form-control" id="sel" name="select" onchange="displayForm()">
            <option value="">선택해주세요.</option>
            <option value="part_time">알바</option>
            <option value="estate">부동산 직거래</option>
            <option value="car">중고차 직거래</option>
            <?php
            if ($_SESSION["userlevel"] == 100) {

            ?>
              <option value="notice">공지사항</option>

            <?php
            }
            ?>
          </select>
        </div>
      </div>
      <!-- 알바 -->
      <div id="part_time_form" class="hidden">
        <div class="mb-3">
          <label for="reg_id">제목</label>
          <input type="text" class="form-control" name="part_title" id="reg_id" placeholder="제목을 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="reg_m">급여금</label>
          <input type="text" class="form-control" name="part_pay" id="reg_m" placeholder="급여금을 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="reg_p">위치</label>
          <input type="text" class="form-control" name="part_location" id="reg_p" placeholder="위치를 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="reg_d">근무요일</label>
          <input type="text" class="form-control" name="part_day" id="reg_d" placeholder="근무요일을 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="reg_t">근무시간</label>
          <input type="text" class="form-control" name="part_time" id="reg_t" placeholder="근무시간을 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="content">상세내용</label>
          <textarea class="form-control" rows="5" name="part_content" id="content" placeholder="내용을 입력해 주세요"></textarea>
        </div>
      </div>
      <!-- 부동산 -->
      <div id="estate_form" class="hidden">
        <div class="mb-3">
          <label for="reg_id">제목</label>
          <input type="text" class="form-control" name="estate_title" id="reg_id" placeholder="제목을 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="reg_p">위치</label>
          <input type="text" class="form-control" name="estate_location" id="reg_p" placeholder="위치를 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="reg_a">판매자</label>
          <input type="text" class="form-control" name="estate_seller" id="reg_a" placeholder="판매자를 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="reg_a">건물 종류</label>
          <input type="text" class="form-control" name="estate_type" id="reg_a" placeholder="건물 종류를 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="reg_a">건물 가격</label>
          <input type="text" class="form-control" name="estate_price" id="reg_a" placeholder="건물 종류를 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="reg_a">면적</label>
          <input type="text" class="form-control" name="estate_area" id="reg_a" placeholder="면적을 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="reg_s">방 수</label>
          <input type="text" class="form-control" name="estate_room" id="reg_s" placeholder="방/욕실 수를 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="reg_s">욕실 수</label>
          <input type="text" class="form-control" name="estate_bathroom" id="reg_s" placeholder="방/욕실 수를 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="reg_f">층</label>
          <input type="text" class="form-control" name="estate_floor" id="reg_f" placeholder="층을 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="reg_g">대출가능여부</label>
          <input type="text" class="form-control" name="estate_loan" id="reg_g" placeholder="대출가능여부를 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="reg_h">입주 가능일</label>
          <input type="text" class="form-control" name="estate_moving" id="reg_h" placeholder="입주가능일을 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="reg_j">반려동물</label>
          <input type="text" class="form-control" name="estate_pet" id="reg_j" placeholder="반려동물 출입여부를 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="reg_k">주차</label>
          <input type="text" class="form-control" name="estate_parking" id="reg_k" placeholder="주차여부를 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="reg_l">엘리베이터</label>
          <input type="text" class="form-control" name="estate_elevator" id="reg_l" placeholder="엘리베이터여부를 입력해주세요">
        </div>
        <div class="mb-3">
          <label for="content">소개</label>
          <textarea class="form-control" rows="5" name="estate_content" id="content" placeholder="내용을 입력해주세요"></textarea>
        </div>
      </div>

<!-- 중고차 -->
<div id="used_car_form" class="hidden">
        <div class="mb-3">
          <label for="reg_id">제목</label>
          <input type="text" class="form-control" name="car_title" id="reg_id" placeholder="제목을 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="reg_p">위치</label>
          <input type="text" class="form-control" name="car_location" id="reg_p" placeholder="위치를 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="reg_q">차 가격</label>
          <input type="text" class="form-control" name="car_price" id="reg_q" placeholder="차 가격을 입력해 주세요(숫자만 입력)">
        </div>
        <div class="mb-3">
          <label for="reg_q">총 구매 예상비용</label>
          <input type="text" class="form-control" name="car_ex" id="reg_q" placeholder="총 구매 예상비용을 입력해 주세요(숫자만 입력)">
        </div>
        <div class="mb-3">
          <label for="reg_q">직거래로 아끼는 비용</label>
          <input type="text" class="form-control" name="car_reducing" id="reg_q" placeholder="직거래로 아끼는 비용 수 있는 가격을 입력해 주세요(숫자만 입력)">
        </div>
        <div class="mb-3">
          <label for="reg_w">차종</label>
          <input type="text" class="form-control" name="car_type" id="reg_w" placeholder="차종을 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="reg_e">연식</label>
          <input type="text" class="form-control" name="car_year" id="reg_e" placeholder="연식을 입력해 주세요(숫자만 입력)">
        </div>
        <div class="mb-3">
          <label for="reg_e">등록일</label>
          <input type="text" class="form-control" name="car_regist" id="reg_e" placeholder="등록일을 입력해 주세요( ex: xx년 xx일 등록)">
        </div>
        <div class="mb-3">
          <label for="reg_r">주행거리</label>
          <input type="text" class="form-control" name="car_km" id="reg_r" placeholder="주행거리를 입력해 주세요(숫자만 입력)">
        </div>
        <div class="mb-3">
          <label for="reg_y">배기량</label>
          <input type="text" class="form-control" name="car_displacement" id="reg_y" placeholder="배기량을 입력해 주세요(숫자만 입력)">
        </div>
        <div class="mb-3">
          <label for="reg_u">연료</label>
          <input type="text" class="form-control" name="car_fuel" id="reg_u" placeholder="연료를 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="reg_i">변속기</label>
          <input type="text" class="form-control" name="car_transmission" id="reg_i" placeholder="변속기를 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="reg_o">보험사고 이력</label>
          <input type="text" class="form-control" name="car_insurance" id="reg_o" placeholder="보험사고 이력을 입력해 주세요(숫자만 입력)">
        </div>
        <div class="mb-3">
          <label for="reg_o">자동차 특수 용도 이력</label>
          <input type="text" class="form-control" name="car_special" id="reg_o" placeholder="자동차 특수 용도 이력을 입력해 주세요(숫자만 입력)">
        </div>
        <div class="mb-3">
          <label for="reg_o">소유자 변경 이력</label>
          <input type="text" class="form-control" name="car_owner" id="reg_o" placeholder="소유자 변경 이력을 입력해 주세요(숫자만 입력)">
        </div>
        <div class="mb-3">
          <label for="content">소개</label>
          <textarea class="form-control" rows="5" name="car_content" id="content" placeholder="내용을 입력해 주세요"></textarea>
        </div>
      </div>
      <!-- 공지사항 -->
      <div id="notice_form" class="hidden">
        <div class="mb-3">
          <label for="reg_id">제목</label>
          <input type="text" class="form-control" name="notice_title" id="reg_id" placeholder="제목을 입력해 주세요">
        </div>
        <div class="mb-3">
          <label for="content">상세내용</label>
          <textarea class="form-control" rows="5" name="notice_content" id="content" placeholder="내용을 입력해 주세요"></textarea>
        </div>
      </div>
      <!-- 공지사항 -->

      <div>
        <div class="flex-grow-1">
          <label for="form_photo" class="form-label">이미지</label>
          <input type="file" name="upfile" class="form-control" id="form_photo">
        </div>
      </div>
      <div>
        <button class="btn btn-sm btn-primary mt-3" id="btnSave">등록</button>
      </div>
    </form>
  </div>
</article>
<!-- 메인부분 종료 -->

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>