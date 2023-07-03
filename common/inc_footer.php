<div class="container">
  <footer class="footer">
    <div class="container">
      <div class="footer-detail">
        <ul class="footer-links">
          <li>
            <a href="#">중고거래</a>
          </li>
          <li>
            <a href="#">제이알바</a>
          </li>
          <li>
            <a href="#">부동산 직거래</a>
          </li>
          <li>
            <a href="#">중고차 직거래</a>
          </li>
          <li>
            <a href="#">
              <strong>개인정보처리방침</strong>
            </a>
          </li>
          <li>
            <a href="#">이용안내</a>
          </li>
        </ul>

        <ul class="company-info">
          <li>
            <span>법인명 (상호) : 제이</span>
            <span>사업자등록번호 : 012-34-56789</span>

          </li>
          <li>

            <span>개인정보보호책임자 : 서종혁, 김주성, 김정태</span>
          </li>
          <li>
            <span>주소 : 서울시 왕십리로 315, 한동타워 8F</span>
            <span>대표이사 : 김정환, 유철환</span>
          </li>
          <li>

            <span>중고거래 관련문의 : <a href="#">https://github.com/KimJeongHwan0731</a></span>
            <span>제이알바 관련문의 : <a href="#">https://github.com/YuCheolHwan</a></span>
            <span>부동산 직거래 관련문의 : <a href="#">https://github.com/KimJuSeong12</a></span>
            <br>
            <span>중고차 직거래 관련문의 : <a href="#">https://github.com/Seojonghyuk</a></span>
            <span>이용안내 관련문의 : <a href="#">https://github.com/kimjungtaes</a></span>
          </li>

        </ul>



        <ul class="sns-links">
          <li>
            <a href="#">
              <img src="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/img/footer-ig.webp' ?>" alt="인스타그램">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/img/footer-fb.webp' ?>" alt="페이스북">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/img/footer-blog.webp' ?>" alt="네이버 블로그">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/img/footer-post.webp' ?>" alt="네이버 포스트">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/img/footer-ytb.webp' ?>" alt="유튜브">
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="page-top-button">
      <a aria-label="맨 위로"><img src="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/img/top.webp' ?>" alt="탑"></a>
    </div>
  </footer>
</div>

</body>

<script>
  const pageTopBtn = document.querySelector('.page-top-button');

  function onScroll() {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 500) {
        pageTopBtn.classList.add('page-top-button-show');
      } else {
        pageTopBtn.classList.remove('page-top-button-show');
      }
    });
  }

  function movetoTop() {
    pageTopBtn.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      });
    });
  }

  function init() {
    onScroll();
    movetoTop();
  }

  init();
</script>

</html>