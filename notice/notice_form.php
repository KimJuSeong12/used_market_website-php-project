<style>
    #faqs-wrapper {
        display: flex;
        justify-content: center;
        grid-gap: 16px;
        gap: 16px;
    }

    #web-title {
        margin-left: calc(-50vw + 384px);
        padding-left: calc(50vw - 384px);
        padding-right: calc(50vw - 384px);
        width: 768px;
    }

    #web-title {
        display: flex;
        grid-gap: 1rem;
        gap: 1rem;
        font-size: 1.4rem;
        font-weight: 700;
        line-height: 2.7rem;
        letter-spacing: -1%;
        color: var(--seed-scale-color-gray-900);
        padding: 0 1.6rem 1.6rem 1.6rem;
        border-bottom: 1px solid var(--seed-scale-color-gray-200);
    }

    a {
        text-decoration: none;
        user-select: none;
        -webkit-touch-callout: none;
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
    }

    .content-container,
    .company-info-container {
        display: flex;
        flex-direction: column;
        margin-top: 40px;
        grid-gap: 16px;
        gap: 16px;
        width: 40%;
    }

    h1 {
        color: var(--seed-scale-color-gray-900);
        font-size: 1.6rem;
        line-height: 3.24rem;
        letter-spacing: -3%;
        font-weight: 700;
    }

    .search-wrapper {
        position: relative;
        z-index: 2;
    }

    .search-wrapper #search-bar {
        padding: 1.1rem 4.2rem;
        width: 100%;
        background-color: var(--seed-scale-color-gray-100);
        border-radius: 0.6rem;
        border: 1px solid black;
        font-size: 1.2rem;
        font-weight: 400;
        letter-spacing: -2%;
        /* -webkit-appearance: none; */
    }

    #tag-list-wrapper .list {
        display: flex;
        grid-gap: 0.8rem;
        gap: 0.8rem;
        flex-wrap: wrap;
    }

    #tag-list-wrapper .list a {
        flex: 0 0 auto;
        font-size: 0.9rem;
        text-decoration: none;
        font-weight: 400;
        background-color: transparent;
        border: 1px solid var(--seed-scale-color-gray-200);
        color: var(--seed-scale-color-gray-900);
        border-radius: 5.8rem;
        padding: 0.8rem 1.4rem;
        cursor: pointer;
        margin-bottom: 50px;
    }

    h2 {
        font-size: 1.3rem;
        font-weight: 700;
        line-height: 2.43rem;
        letter-spacing: -3%;
        margin: 3.2rem 0 0 0;
    }

    #item-list-wrapper {
        list-style: none;
        margin-bottom: 50px;

    }

    ul {
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
    }

    #item-list-wrapper li {
        align-items: center;
        border-bottom: 1px solid gray;
        text-decoration: none;

    }

    #item-list-wrapper li a {
        display: flex;
        justify-content: space-between;
        text-decoration: none;
        align-items: center;
        color: var(--seed-scale-color-gray-900);
        grid-gap: 2.5rem;
        gap: 2.5rem;
        padding: 2rem 0;
    }

    #item-list-wrapper li a div {
        width: calc(100% - 4rem);
    }

    #item-list-wrapper li a div .title {
        font-size: 1.2rem;
        line-height: 162%;
    }
</style>
<?php
$css_array = ['member/css/notice.css'];

include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./member/css/notice.css">
</head>

<body>
    <div id="faqs-wrapper">

        <div class="content-container">
            <div>
                <h2>안녕하세요,</h2>
                <h2>무엇을 도와드릴까요? </h2>
            </div>
            <div>
                <div class="search-wrapper ">
                    <div class="input-area-wrapper">
                        <form action="./search_notice_form.php" method="get"><input id="search-bar" type="search" name="search_flag" placeholder="궁금한 것을 검색해보세요."></form>
                        </svg>
                    </div>
                </div>
            </div>
            <div id="tag-list-wrapper">
                <div class="list">
                    <a href="./search_notice_form.php?search_flag=채팅" class="">채팅</a>
                    <a href="./search_notice_form.php?search_flag=알림" class="">알림</a>
                    <a href="./search_notice_form.php?search_flag=검색" class="">검색</a>
                    <a href="./search_notice_form.php?search_flag=제이페이" class="">제이페이</a>
                    <a href="./search_notice_form.php?search_flag=제이알바" class="">제이알바</a>
                    <a href="./search_notice_form.php?search_flag=중고차 직거래" class="">중고차 직거래</a>
                    <a href="./search_notice_form.php?search_flag=운영정책" class="">운영정책</a>
                </div>
            </div>
            <h2>자주 묻는 질문</h2>
            <ul id="item-list-wrapper" class="simple faq">
                <li><a href="./search_notice_form.php?search_flag=동일한 게시글을 올려서 내 게시글이 미노출 됐어요">
                        <div>
                            <p class="title">동일한 게시글을 올려서 내 게시글이 미노출 됐어요</p>
                        </div>

                    </a>
                </li>
                <li><a href="./search_notice_form.php?search_flag=동네인증이 안 돼요!">
                        <div>
                            <p class="title">동네인증이 안 돼요!</p>
                        </div>
                    </a> 
                </li>
                <li><a href="./search_notice_form.php?search_flag=제이마켓 광고는 어떻게 만드나요?">
                        <div>
                            <p class="title">제이마켓 광고는 어떻게 만드나요? </p>
                        </div>
                    </a>
                </li>
                <li><a href="./search_notice_form.php?search_flag=채팅제이페이는 어떻게 쓰나요?">
                        <div>
                            <p class="title">제이페이는 어떻게 쓰나요?</p>
                        </div>
                    </a></li>
                <li><a href="./search_notice_form.php?search_flag=비즈프로필은 무엇인가요?">
                        <div>
                            <p class="title">비즈프로필은 무엇인가요?</p>
                        </div>
                    </a>
                </li>
            </ul>
            <h2>카테고리에서 찾기</h2>
            <ul id="item-list-wrapper" class="columned category">
                <li><a href="./search_notice_form.php?search_flag=계정/인증/로그인">
                        <div>
                            <p class="title">계정/인증/로그인</p>
                        </div>
                    </a>
                </li>
                <li><a href="./search_notice_form.php?search_flag=중고거래">
                        <div>
                            <p class="title">중고거래</p>
                        </div>
                    </a>
                </li>
                <li><a href="./search_notice_form.php?search_flag=제이페이">
                        <div>
                            <p class="title">제이페이</p>
                        </div>
                    </a>
                </li>
                <li><a href="./search_notice_form.php?search_flag=비즈프로필">
                        <div>
                            <p class="title">비즈프로필</p>
                        </div>
                    </a>
                </li>
                <li><a href="./search_notice_form.php?search_flag=상품판매">
                        <div>
                            <p class="title">상품판매</p>
                        </div>
                    </a>
                </li>
                <li><a href="./search_notice_form.php?search_flag=광고">
                        <div>
                            <p class="title">광고</p>
                        </div>
                    </a>
                </li>
                <li><a href="./search_notice_form.php?search_flag=동네생활">
                        <div>
                            <p class="title">동네생활</p>
                        </div>
                    </a>
                </li>
                <li><a href="./search_notice_form.php?search_flag=제이알바">
                        <div>
                            <p class="title">제이알바</p>
                        </div>
                    </a>
                </li>
                <li><a href="./search_notice_form.php?search_flag=기타">
                        <div>
                            <p class="title">기타</p>
                        </div>
                    </a>
                </li>
            </ul>

        </div>

    </div>
</body>

</html>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php";
?>