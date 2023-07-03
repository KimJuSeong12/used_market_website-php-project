<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= (isset($title) && $title != '') ? $title : '홈홈홈' ?></title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="./css/inc_header.css"> -->
  <?php
  session_start();
  $userid  = (isset($_SESSION['userid']) && $_SESSION['userid'] != "") ? $_SESSION['userid'] : "";
  $path = parse_url($_SERVER['REQUEST_URI'])['path'];
  // 외부스크립트
  if (isset($js_array)) {
    foreach ($js_array as $value) {
      print "<script src='http://" . $_SERVER['HTTP_HOST'] . "/php_teampro/$value?v=" . date('Ymdhis') . "' defer></script>" . PHP_EOL;
    }
  }
  if (isset($css_array)) {
    foreach ($css_array as $value) {
      print "<link rel=\"stylesheet\" href=\"http://{$_SERVER['HTTP_HOST']}/php_teampro/{$value}?v=" . date('Ymdhis') . "\">";
    }
  }
  ?>
  <style>
    ul {
      list-style-type: none;
    }

    .nav a:hover {
      color: #ff8c00 !important;
    }

    header {
      z-index: 1020;
      background-color: white;
    }

    .active {
      color: #ff8c00 !important;
    }

    .page-top-button img {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 50%;
    }

    .page-top-button {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 60px;
      height: 60px;
      opacity: 0;
      transition: opacity 0.3s ease-in-out;
      font-size: 24px;
      color: white;
      line-height: 50px;
      text-align: center;
      background-size: cover;
      z-index: 9999;
    }

    .page-top-button:hover {
      filter: brightness(85%);
    }

    .page-top-button-show {
      opacity: 1;
    }

    .footer {
      padding: 40px 0;
    }

    .footer .container {
      display: flex;
      justify-content: center;
    }

    .footer-links {
      display: flex;
      margin-bottom: 30px;
      font-size: 14px;
    }

    .footer-links li {
      margin-right: 20px;
    }

    .footer-links li strong {
      font-weight: 500;
    }

    .company-info {
      font-size: 12px;
      color: #999999;
    }

    .company-info li span::after {
      content: '|';
      display: inline-block;
      padding: 0 3px 0 6px;
    }

    .company-info li a {
      color: #ff8c00;
    }

    .sns-links {
      display: flex;
    }

    .sns-links li {
      margin-right: 10px;
    }

    .sns-links img {
      width: 30px;
      height: 30px;
    }

    a {
      text-decoration: none;
      color: black;
    }

    a:hover {
      color: #ff8c00;
    }
  </style>
</head>

<body>
  <header class="p-3 text-bg-white position-sticky top-0">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/index.php' ?>" class="d-flex align-items-center mb-2 mb-lg-0 text-black text-decoration-none">
          <img src="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/img/j.jpg' ?>" alt="로고 이미지" width="100%" height="48">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <?php if ($path == '/php_teampro/index.php') { ?>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/index.php' ?>" class="nav-link px-2 text-black active" style="font-size: 1.2rem; font-weight:700">중고거래</a></li>
          <?php } else { ?>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/index.php' ?>" class="nav-link px-2 text-black" style="font-size: 1.2rem; font-weight:700">중고거래</a></li>
          <?php } ?>
          <?php if ($path == '/php_teampro/part_time/part_time_form.php') { ?>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/part_time/part_time_form.php' ?>" class="nav-link px-2 text-black active" style="font-size: 1.2rem; font-weight:700">알바</a></li>
          <?php } else { ?>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/part_time/part_time_form.php' ?>" class="nav-link px-2 text-black" style="font-size: 1.2rem; font-weight:700">알바</a></li>
          <?php } ?>
          <?php if ($path == '/php_teampro/estate/estate_form.php') { ?>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/estate/estate_form.php' ?>" class="nav-link px-2 text-black active" style="font-size: 1.2rem; font-weight:700">부동산 직거래</a></li>
          <?php } else { ?>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/estate/estate_form.php' ?>" class="nav-link px-2 text-black" style="font-size: 1.2rem; font-weight:700">부동산 직거래</a></li>
          <?php } ?>
          <?php if ($path == '/php_teampro/car/car_form.php') { ?>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/car/car_form.php' ?>" class="nav-link px-2 text-black active" style="font-size: 1.2rem; font-weight:700">중고차 직거래</a></li>
          <?php } else { ?>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/car/car_form.php' ?>" class="nav-link px-2 text-black" style="font-size: 1.2rem; font-weight:700">중고차 직거래</a></li>
          <?php } ?>
        </ul>

        <form name="search_form" action="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/search/search_form.php' ?>" method="post" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 w-25" role="search">
          <input class="form-control" id="search_aaa" name="text" type="text" placeholder="물품이나 동네를 검색해보세요." aria-label="default input example">
        </form>
        <?php
        if (!$userid) {
        ?>
          <div class="text-end">
            <a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/login/login_form.php' ?>">
              <button type="button" name="login" class="btn btn-outline-secondary">로그인</button>
            </a>
            <a href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/member/member_input.php' ?>">
              <button type="button" class="btn btn-outline-secondary">회원가입</button>
            </a>
          </div>
        <?php } else { ?>
          <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/img/유저.svg' ?>" alt="유저 사진" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
              <li class="m-3"><a style="padding: 0;" class="dropdown-item" href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/notice/notice_form.php' ?>">자주 묻는 질문</a></li>
              <li class="m-3"><a style="padding: 0;" class="dropdown-item" href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/mypage/like_list.php' ?>">관심 목록</a></li>
              <li class="m-3"><a style="padding: 0;" class="dropdown-item" href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/mypage/info.php' ?>">개인 정보 수정</a></li>
              <li class="m-3"><a style="padding: 0;" class="dropdown-item" href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/write/write_form.php' ?>">글쓰기</a></li>
              <!-- <li><a class="dropdown-item" href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/mypage/info.php' ?>">메뉴 추가 시 경로 설정</a></li> -->
              <li class="m-3">
                <hr class="dropdown-divider">
              </li>
              <li class="m-3"><a style="padding: 0;" class="dropdown-item" href="http://<?= $_SERVER['HTTP_HOST'] . '/php_teampro/login/logout.php' ?>">로그아웃</a></li>
            </ul>
          </div>
        <?php } ?>
      </div>
    </div>
  </header>