<?php include $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>너님 근처의 제이마켓</title>
  <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/main/css/main.css' ?>">
  <script src="./js/main.js" defer></script>
</head>

<body>
  <main>
    <section id="sec1">
      <div id="divq">
        <div>
          <h1 id="hh">당신 근처의<br>제이마켓</h1>
          <p id="p5"><span>중고 거래부터 동네 정보까지,</span><br><span>이웃과 함께해요.</span><br><br><span>가깝고 따뜻한</span><br><br><span>당신의 근처를 만들어요.</span></p>
        </div>
        <div id="divw">
          <img id="divw" src="../img/img1.webp">
        </div>
      </div>
    </section>

    <section id="sec2">
      <div id="dive">
        <div id="divr">
          <img id="divr" src="../img/img2.webp">
        </div>
        <div>
          <h1 id="h2">우리 동네<br>중고 직거래 마켓</h1>
          <p id="p1">
            동네 주민들과 가깝고 따뜻한 거래를
            지금 경험해보세요.
          </p>
          <div id="btn1">
            <a id="btn2" href="#">인기매물 보기</a>
            <a id="btn2" href="#">믿을 수 있는 중고거래</a>
          </div>
        </div>
      </div>
    </section>



    <section class="sec3 bpg">
      <div class="divt divy">
        <div class="imgw imgq">
          <img class="imgq" loading="lazy" src="../img/img3.webp">
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
          <img class="imgz" loading="lazy" src="../img/img4.webp">
        </div>
        <div>
          <h1 id="h4">내 근처에서 찾는<br>동네가게</h1>
          <p class="tm">
            우리 동네 가게를 찾고 있나요?<br>동네 주민이 남긴 진짜 후기를 함께 확인해보세요!
          </p>
          <div class="btn3">
            <a class=" home-button text text-bold" href="#">당근마켓 동네가게 찾기</a>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

</html>



<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teamProject/footer.php";
?>