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
$js_array = ['member/js/member_input.js'];

$css_array = ['member/css/member.css'];
$title = "회원가입";
$menu_code = "member";
//헤더부분 시작
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/create_table.php";
create_table($conn, 'membership');
?>
<!-- 메인부분 시작 -->
<section class="signup">
    <!-- 모달 -->
    <div id="terms-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>이용약관</h2>
            <p>이용약관 필수동의</p>
        </div>
    </div>
    <div class="inner">
        <div class="signup-title">
            회원가입
        </div>
        <form name="input_form" action="./member_process.php" method="post">
            <input type="hidden" name="mode" value="input">

            <div class="line-starter">
                <span class="star">*</span>필수입력사항
            </div>
            <div class="signup-form">
                <div class="form-tr">
                    <span class="form-list">아이디<span class="star">*</span></span>
                    <input name="id" type="text" class="signup-input" placeholder="아이디를 입력해주세요.">
                    <button type="button" id="id_doublecheck" class="doublecheck"><span>중복확인</span></button>
                    <input type="hidden" name="id_doublecheck_check_flag" value="input">
                </div>
                <div class="form-tr">
                    <span class="form-list">비밀번호<span class="star">*</span></span>
                    <input name="password" type="password" class="signup-input" placeholder="비밀번호를 입력해주세요.">
                </div>
                <div class="form-tr">
                    <span class="form-list">비밀번호 확인<span class="star">*</span></span>
                    <input name="password2" type="password" class="signup-input" placeholder="비밀번호를 한번 더 입력해주세요.">
                </div>
                <div class="form-tr">
                    <span class="form-list">이름<span class="star">*</span></span>
                    <input name="name" type="text" class="signup-input" placeholder="이름을 입력해주세요.">
                </div>
                <div class="form-tr">
                    <span class="form-list">이메일<span class="star">*</span></span>
                    <input name="email" type="email" class="signup-input" placeholder="예: example@example.com">
                    <button type="button" id="email_doublecheck" class="doublecheck"><span>중복확인</span></button>
                    <input type="hidden" name="email_doublecheck_check_flag" value="input">
                </div>
                <div class="form-tr" id="amuguna">
                    <span class="form-list">휴대폰<span class="star">*</span></span>
                    <input name="tel" type="tel" class="signup-input input-text" placeholder="예: 숫자만 입력해주세요.">
                    <button type="button" id="tel_doublecheck" class="doublecheck button-text" disabled><span>인증번호 받기</span></button>
                    <input id="cfnumber" name="cfnumber" type="hidden" value="input">
                </div>

                <div class="form-tr" id="cfnumber_input_area">
                    <span class="form-list">인증번호<span class="star">*</span></span>
                    <input name="cfnumber_tel" type="text" class="signup-input input-text" placeholder="인증번호 6자리" minlength="6" maxlength="6" autocomplete="off">
                    <button type="button" name="cfnumber_tel_check" id="cfnumber_tel_check" class="doublecheck button-text" disabled><span>인증번호 확인</span></button>
                    <input type="hidden" name="cfnumber_tel_check_flag" value="input">
                    <p class="remaining_time_text">03:00</p>
                </div>

                <?php
                ?>
                <!-- <div class="form-tr">
                    <span class="form-list">주소<span class="star">*</span></span>
                    <div class="address-container">
                        <button class="address">
                            <img src="https://res.kurly.com/pc/service/cart/2007/ico_search.svg" alt="">
                            <span class="span">주소 검색</span>
                        </button>
                        <span class="form-text">배송지에 따라 상품 정보가 달라질 수 있습니다.</span>
                    </div>
                </div> -->
                <div class="line-tos"></div>
                <div class="form-tr">
                    <span class="form-list">이용약관동의<span class="star">*</span></span>
                    <div class="tos">
                        <div class="tos-tr">
                            <div class="tos-img-container">
                                <input type="checkbox" name="all_agree" id="all_agree">
                            </div>
                            <label for="all_agree" class="agree-all">전체 동의합니다.</label>
                        </div>
                        <p>선택항목에 동의하지 않은 경우도 회원가입 및 일반적인 서비스를 이용할 수 있습니다.</p>
                        <div class="tos-tr">
                            <div class="tos-img-container">
                                <input class="checkbox" type="checkbox" name="agree1" id="agree1">
                            </div>
                            <label for="agree1" class="agree">이용약관 동의 <span class="color_grey"> (필수)</span></label>
                            <div class="div_agree1"><a class="a_agree1" href="#">약관보기</a></div>
                        </div>
                        <div class="tos-tr">
                            <div class="tos-img-container">
                                <input class="checkbox" type="checkbox" name="agree2" id="agree2">
                            </div>
                            <label for="agree2" class="agree">개인정보 수집∙이용 동의 <span class="color_grey"> (필수)</span></label>
                            <div class="div_agree2"><a class="a_agree1" href="#">약관보기</a></div>
                        </div>
                        <div class="tos-tr">
                            <div class="tos-img-container">
                                <input class="checkbox" type="checkbox" name="agree3" id="agree3">
                            </div>
                            <label for="agree3" class="agree">개인정보 수집∙이용 동의 <span class="color_grey"> (선택)</span></label>
                            <div class="div_agree2"><a class="a_agree1" href="#">약관보기</a></div>
                        </div>
                        <div class="tos-tr">
                            <div class="tos-img-container">
                                <input class="checkbox" type="checkbox" name="age" id="age">
                            </div>
                            <label for="age" class="agree">본인은 만 14세 이상입니다.<span class="color_grey"> (필수)</span></label>
                        </div>
                    </div>
                </div>
                <div id="sub" class="form-tr">
                    <button type="button" id="btn_submit" class="doublecheck">
                        <span>가입</span>
                    </button>
                </div>
            </div>
    </div>
    </form>
    </div>
</section>
<!-- 메인부분 종료 -->

<!-- 푸터부분 시작 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/common/inc_footer.php"
?>