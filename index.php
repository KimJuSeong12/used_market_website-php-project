<?php
//보안부분(세션등록, 체크할내용, GET, POST)

// 공통적으로 처리하는 부분
$js_array = ['main/js/main.js'];
$css_array = ['main/css/main.css'];
$title = "회원가입";
// $menu_code = "member";

//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/create_table.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/wish/wish.php";
create_table($conn, "wish");
create_table($conn, "notice");
$wish = new Wish($conn);
$part_time_rowArray = $wish->select_high_hits("part_time");
$estate_rowArray = $wish->select_high_hits("estate");
$car_rowArray = $wish->select_high_hits("car");
?>
<!-- 메인부분 시작 -->
<section id="sec1">
  <div id="divq">
    <div>
      <h1 id="hh">당신 근처의<br>제이마켓</h1>
      <p id="p5"><span>중고 거래부터 동네 정보까지,</span><br><span>이웃과 함께해요.</span><br><br><span>가깝고 따뜻한</span><br><br><span>당신의 근처를 만들어요.</span></p>
    </div>
    <div id="divw">
      <img id="divw" src="./img/img1.webp">
    </div>
  </div>
</section>

<section id="sec2">
  <div id="dive">
    <div id="divr">
      <img id="divr" src="./img/img2.webp">
    </div>
    <div>
      <h1 id="h2">우리 동네<br>중고 직거래 마켓</h1>
      <p id="p1">
        동네 주민들과 가깝고 따뜻한 거래를
        지금 경험해보세요.
      </p>
    </div>
  </div>
</section>

<section class="sec3 bpg">
  <div class="divt divy">
    <div class="imgw imgq">
      <img class="imgq" loading="lazy" src="./img/img3.webp">
    </div>
    <div>
      <h1 id="h3">이웃과 함께 하는<br>동네생활</h1>
      <p id="p1">
        우리 동네의 다양한 이야기를 이웃과 함께 나누어요.
      </p>
      <ul id="ul1">
        <li id="li2">
          <div class="is "></div>
          <div class="ts text-bold mt-3 mb-2">우리동네질문</div>
          <div class="txs">궁금한 게 있을 땐 이웃에게 물어보세요.</div>
        </li>
        <li id="li2">
          <div class="is "></div>
          <div class="ts text-bold mt-3 mb-2">동네분실센터</div>
          <div class="txs">무언가를 잃어버렸을 때, 함께 찾을 수 있어요.</div>
        </li>
        <li id="li2">
          <div class="is "></div>
          <div class="ts text-bold mt-3 mb-2">동네모임</div>
          <div class="txs">관심사가 비슷한 이웃과 온오프라인으로 만나요.</div>
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="sec4">
  <div id="divm">
    <div class="imgx imgz">
      <img class="imgz" loading="lazy" src="./img/img4.webp">
    </div>
    <div>
      <h1 id="h4">내 근처에서 찾는<br>동네가게</h1>
      <p class="tm">
        우리 동네 가게를 찾고 있나요?<br>동네 주민이 남긴 진짜 후기를 함께 확인해보세요!
      </p>
    </div>
  </div>
</section>

<section class="sec5 background-gray">
  <div class="divj">
    <h1 class="hmtitle text-center hhtitle">
      중고거래 인기매물
    </h1>
    <div class="cards-wrap">
      <!-- 알바 인기글 노출 시작 -->
      <?php
      for ($i = 0; $i < count($part_time_rowArray); $i++) {
        echo "
        <article class='card-top' id='card" . $i + 1 . "'>
        <a class='card-link' href='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/part_time/detail_part_time_form.php?num=" . $part_time_rowArray[$i]['num'] . "'>
          <div class='card-photo'>
            <img src='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/write/data/" . $part_time_rowArray[$i]['file_copied'] . "'>
          </div>
          <div class='card-desc'>
            <h2 class='card-title'>" . $part_time_rowArray[$i]['title'] . "</h2>
            <div class='card-price '>
              시급 " . $part_time_rowArray[$i]['hour_pay'] . " 원
            </div>
            <div class='card-region-name'>
            " . $part_time_rowArray[$i]['writer_address'] . "
            </div>
            <div class='card-counts'>
              <span>
                조회수 " . $part_time_rowArray[$i]['hit'] . "
              </span>
              
            </div>
          </div>
        </a>
      </article>
        ";
      }
      ?>



      <!-- <article class="card-top" id="card1">
        <a class="card-link " href="#">
          <div class="card-photo ">
            <img src="./img/img555.webp">
          </div>
          <div class="card-desc">
            <h2 class="card-title">위닉스 제습기 판매</h2>
            <div class="card-price ">
              50,000원
            </div>
            <div class="card-region-name">
              경남 거제시 옥포2동
            </div>
            <div class="card-counts">
              <span>
                관심 5
              </span>
              ∙
              <span>
                채팅 41
              </span>
            </div>
          </div>
        </a>
      </article> -->

      <!-- <article class="card-top" id="card2">
        <a class="card-link " href="#">
          <div class="card-photo ">
            <img src="./img/img555.webp">
          </div>
          <div class="card-desc">
            <h2 class="card-title">위닉스 제습기 판매</h2>
            <div class="card-price ">
              50,000원
            </div>
            <div class="card-region-name">
              경남 거제시 옥포2동
            </div>
            <div class="card-counts">
              <span>
                관심 5
              </span>
              ∙
              <span>
                채팅 41
              </span>
            </div>
          </div>
        </a>
      </article>

      <article class="card-top" id="card3">
        <a class="card-link " href="#">
          <div class="card-photo ">
            <img src="./img/img555.webp">
          </div>
          <div class="card-desc">
            <h2 class="card-title">위닉스 제습기 판매</h2>
            <div class="card-price ">
              50,000원
            </div>
            <div class="card-region-name">
              경남 거제시 옥포2동
            </div>
            <div class="card-counts">
              <span>
                관심 5
              </span>
              ∙
              <span>
                채팅 41
              </span>
            </div>
          </div>
        </a>
      </article>

      <article class="card-top" id="card4">
        <a class="card-link " href="#">
          <div class="card-photo ">
            <img src="./img/img555.webp">
          </div>
          <div class="card-desc">
            <h2 class="card-title">위닉스 제습기 판매</h2>
            <div class="card-price ">
              50,000원
            </div>
            <div class="card-region-name">
              경남 거제시 옥포2동
            </div>
            <div class="card-counts">
              <span>
                관심 5
              </span>
              ∙
              <span>
                채팅 41
              </span>
            </div>
          </div>
        </a>
      </article> -->
      <!-- 알바 인기글 노출 종료 -->

      <!-- 부동산 직거래 인기글 노출 시작 -->
      <?php
      for ($i = 0; $i < count($estate_rowArray); $i++) {
        echo "
        <article class='card-top' id='card" . $i + 5 . "'>
        <a class='card-link' href='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/estate/detail_estate_form.php?num=" . $estate_rowArray[$i]['num'] . "'>
          <div class='card-photo'>
            <img src='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/write/data/" . $estate_rowArray[$i]['file_copied'] . "'>
          </div>
          <div class='card-desc'>
            <h2 class='card-title'>" . $estate_rowArray[$i]['title'] . "</h2>
            <div class='card-price '>
              " . $estate_rowArray[$i]['price'] . " 만원
            </div>
            <div class='card-region-name'>
            " . $estate_rowArray[$i]['writer_address'] . "
            </div>
            <div class='card-counts'>
              <span>
                조회수 " . $estate_rowArray[$i]['hit'] . "
              </span>
              
            </div>
          </div>
        </a>
      </article>
        ";
      }
      ?>
      <!-- 부동산 직거래 인기글 노출 종료 -->

      <!-- 중고차 직거래 인기글 노출 시작 -->
      <?php
      for ($i = 0; $i < count($car_rowArray); $i++) {
        echo "
        <article class='card-top' id='card" . $i + 9 . "'>
        <a class='card-link' href='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/car/detail_car_form.php?num=" . $car_rowArray[$i]['num'] . "'>
          <div class='card-photo'>
            <img src='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/write/data/" . $car_rowArray[$i]['file_copied'] . "'>
          </div>
          <div class='card-desc'>
            <h2 class='card-title'>" . $car_rowArray[$i]['title'] . "</h2>
            <div class='card-price '>
              " . $car_rowArray[$i]['ex_price'] . " 만원
            </div>
            <div class='card-region-name'>
            " . $car_rowArray[$i]['writer_address'] . "
            </div>
            <div class='card-counts'>
              <span>
                조회수 " . $car_rowArray[$i]['hit'] . "
              </span>
              
            </div>
          </div>
        </a>
      </article>
        ";
      }
      ?>
      <!-- 중고차 직거래 인기글 노출 종료 -->

    </div>
  </div>
</section>
<!-- 메인부분 종료 -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const card1 = document.getElementById("card1");
    const card2 = document.getElementById("card2");
    const card3 = document.getElementById("card3");
    const card4 = document.getElementById("card4");
    const card5 = document.getElementById("card5");
    const card6 = document.getElementById("card6");
    const card7 = document.getElementById("card7");
    const card8 = document.getElementById("card8");
    const card9 = document.getElementById("card9");
    const card10 = document.getElementById("card10");
    const card11 = document.getElementById("card11");
    const card12 = document.getElementById("card12");
    const observer = new IntersectionObserver(function(entries) {
      for (const entry of entries) {
        if (entry.isIntersecting) {
          entry.target.style.setProperty('transform', 'translateY(0)');
          entry.target.style.setProperty('opacity', '1');
        } else {
          entry.target.style.setProperty('transform', 'translateY(100%)');
          entry.target.style.setProperty('opacity', '0');
        }
      }
    });
    observer.observe(card1)
    observer.observe(card2)
    observer.observe(card3)
    observer.observe(card4)
    observer.observe(card5)
    observer.observe(card6)
    observer.observe(card7)
    observer.observe(card8)
    observer.observe(card9)
    observer.observe(card10)
    observer.observe(card11)
    observer.observe(card12)
  });
</script>

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>