function createInputHandler(containerId, callback) {
  const container = document.getElementById(containerId);
  let input;
  let isValidate = false;

  if (container) {
    input = container.querySelector(".input-text");
    const clearButton = container.querySelector(".delete_content");
    const errorMessage = container.querySelector(".error_text");

    input.addEventListener("input", () => {
      if (input.value.trim().length) {
        clearButton.style.setProperty("display", "inline-block");
        errorMessage.style.setProperty("display", "none");
        isValidate = true;
      } else {
        clearButton.style.setProperty("display", "none");
        errorMessage.style.setProperty("display", "block");
        isValidate = false;
      }
      checkValidation();
      callback(); // 입력 상태 변경 시에도 callback 함수 호출
    });

    clearButton.addEventListener("click", () => {
      input.value = "";
      clearButton.style.setProperty("display", "none");
      isValidate = false;
      checkValidation();
      callback(); // 입력 상태 변경 시에도 callback 함수 호출
    });

    input.addEventListener("blur", () => {
      if (!input.value.trim().length) {
        errorMessage.style.setProperty("display", "block");
        isValidate = false;
        checkValidation();
      }
    });
  }

  function checkValidation() {
    callback(); // 입력 상태 변경 시에도 callback 함수 호출
  }

  return { input, isValidate: () => isValidate };
}

document.addEventListener("DOMContentLoaded", () => {
  /** 탭 */
  const select_means = document.getElementById("select_means");
  if (select_means) {
    const form_phone = document.getElementById("form_phone");
    const form_email = document.getElementById("form_email");
    const selectMeansChildren = Array.from(select_means.childNodes).filter(
      (e) => e.nodeName === "BUTTON"
    );

    select_means.addEventListener("click", (e) => {
      if (e.target.dataset.type === "phone") {
        form_phone.classList.add("active");
        form_email.classList.remove("active");
        selectMeansChildren[0].classList.add("active");
        selectMeansChildren[1].classList.remove("active");
      } else {
        form_email.classList.add("active");
        form_phone.classList.remove("active");
        selectMeansChildren[1].classList.add("active");
        selectMeansChildren[0].classList.remove("active");
      }
    });
  }

  const emailNameInput = createInputHandler(
    "email_name_area",
    checkEmailValidation
  );
  const emailEmailInput = createInputHandler(
    "email_email_area",
    checkEmailValidation
  );
  const phoneNameInput = createInputHandler(
    "phone_name_area",
    checkPhoneValidation
  );
  const phonePhoneInput = createInputHandler(
    "phone_phone_area",
    checkPhoneValidation
  );

  const btn_email_ok = document.querySelector(".btn_email_ok");
  const btn_phone_ok = document.querySelector(".btn_phone_ok");
  const btn_auth_num = document.querySelector(".btn_auth_num");

  // if (btn_auth_num) {
  //   const verification_main_area = document.querySelector(
  //     ".verification_main_area"
  //   );
  //   btn_auth_num.addEventListener("click", () => {
  //     verification_main_area.style.setProperty("display", "block");
  //     btn_phone_ok.style.setProperty("display", "block");
  //     btn_auth_num.style.setProperty("display", "none");
  //   });
  // }

  function checkEmailValidation() {
    if (document.find_form.type?.value === "password") {
      if (
        emailNameInput.input.value === emailEmailInput.input.value &&
        emailEmailInput.input.value.length !== 0 &&
        emailNameInput.input.value.length !== 0
      ) {
        btn_email_ok.disabled = false;
      } else {
        btn_email_ok.disabled = true;
      }
    } else {
      if (emailNameInput.isValidate() && emailEmailInput.isValidate()) {
        btn_email_ok.disabled = false;
      } else {
        btn_email_ok.disabled = true;
      }
    }
  }

  function checkPhoneValidation() {
    if (phoneNameInput.isValidate() && phonePhoneInput.isValidate()) {
      btn_auth_num.disabled = false;
    } else {
      btn_auth_num.disabled = true;
    }
  }

  // 초기 로딩 시에도 입력 상태 확인하여 버튼 활성화 상태 업데이트
  checkEmailValidation();
  checkPhoneValidation();

  // const cfnumber_input_area = document.querySelector("#cfnumber_input_area");
  btn_auth_num.addEventListener("click", () => {
    // const form_phone = document.querySelector("#form_phone");
    //ajax 점검
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./member_process.php", true);
    // 전송 데이터 생성
    const formdata = new FormData();
    formdata.append("tel", document.find_form.form_phone.phone.value);
    if (document.find_form.form_phone.name.value == null) {
      formdata.append("id", document.find_form.form_phone.id.value);
    } else {
      formdata.append("name", document.find_form.form_phone.name.value);
    }
    formdata.append("mode", "find_phone_check");
    xhr.send(formdata);
    // 핸들러기능(비동기식처리)
    xhr.onload = () => {
      if (xhr.status == 200) {
        // json.parse = json객체를 javascript객체 변환
        // {'result': 'success'} => {result: 'success'}
        const data = JSON.parse(xhr.responseText);
        switch (data.result) {
          case "fail":
            alert(
              "가입 시 입력하신 회원 정보가 맞는지 다시 한번 확인해 주세요."
            );
            document.find_form.form_phone.name.value = "";
            document.find_form.form_phone.phone.value = "";
            // document.find_form.form_phone.name.focus();
            break;
          case "exist":
            const verification_main_area = document.querySelector(
              ".verification_main_area"
            );
            verification_main_area.style.setProperty("display", "block");
            btn_phone_ok.style.setProperty("display", "block");
            btn_auth_num.style.setProperty("display", "none");
            //ajax 점검
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../../member/moonja.php", true);
            // 전송 데이터 생성
            const formdata = new FormData();
            console.log(document.find_form);
            formdata.append("tel", document.find_form.form_phone.phone.value);
            xhr.send(formdata);
            // 핸들러기능(비동기식처리)
            xhr.onload = () => {
              if (xhr.status == 200) {
                // json.parse = json객체를 javascript객체 변환
                // {'result': 'success'} => {result: 'success'}
                const data = JSON.parse(xhr.responseText);
                if (data.result == "fail") {
                  alert("실패했수꽝.");
                } else {
                  alert("인증번호가 발송되었습니다.");
                  document.find_form.form_phone.cfnumber.value = data.result;
                  window.clearTimeout(timerId);
                  currentSec = 0;
                  isValidate = false;
                  updateRemainingTime();
                }
              } else {
                alert("서버 통신 불가");
              }
            };
            break;
          default:
            alert("dasl;dka;sld.");
        }
      } else {
        alert("서버 통신 불가");
      }
    };
  });

  btn_phone_ok.addEventListener("click", () => {
    if (
      document.find_form.form_phone.cfnumber.value ==
      document.find_form.form_phone.verification_number.value
    ) {
      document.find_form.form_phone.cfnumber_tel_check_flag.value = 1;
      document.find_form.form_phone.submit();
    } else {
      alert("잘못된 인증 번호입니다.");
    }
  });

  const verficationNumberInput = document.getElementById("verification_number");
  if (verficationNumberInput) {
    verficationNumberInput.addEventListener("input", (e) => {
      if (e.target.value) {
        btn_phone_ok.disabled = false;
      } else {
        btn_phone_ok.disabled = true;
      }
    });
  }
  const btn_resend = document.querySelector(".btn_resend");
  btn_resend.addEventListener("click", () => {
    //ajax 점검
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../../member/moonja.php", true);
    // 전송 데이터 생성
    const formdata = new FormData();
    console.log(document.find_form);
    formdata.append("tel", document.find_form.form_phone.phone.value);
    xhr.send(formdata);
    // 핸들러기능(비동기식처리)
    xhr.onload = () => {
      if (xhr.status == 200) {
        // json.parse = json객체를 javascript객체 변환
        // {'result': 'success'} => {result: 'success'}
        const data = JSON.parse(xhr.responseText);
        if (data.result == "fail") {
          alert("실패했수꽝.");
        } else {
          alert("인증번호가 발송되었습니다.");
          document.find_form.form_phone.cfnumber.value = data.result;
          window.clearTimeout(timerId);
          currentSec = 0;
          isValidate = false;
          updateRemainingTime();
        }
      } else {
        alert("서버 통신 불가");
      }
    };
  });
});

const remainingTimeEl = document.querySelector(".remaining_time_text"); // 남은 시간이 표시될 요소

const sec = 180; // 만료 초
let currentSec = 0; // 현재 초
let timerId;
let isValidate = false; // 인증 여부

function updateRemainingTime() {
  const remain = sec - currentSec; // 남은 시간 계산
  const currentMins = Math.floor(remain / 60); // 남은 시간을 분으로 변환
  const currentSecs = remain % 60; // 남은 시간의 초 부분

  remainingTimeEl.innerText = `${currentMins
    .toString()
    .padStart(2, "0")}:${currentSecs.toString().padStart(2, "0")}`; // 텍스트 업데이트

  if (currentSec < sec) {
    currentSec++; // 시간 증가
    timerId = window.setTimeout(updateRemainingTime, 1000); // 1초마다 updateRemainingTime 함수 호출
  } else {
    console.log("유효 시간 만료");
    // 시간 만료 처리 로직 추가
    if (!isValidate) {
      console.log("인증 시간이 만료되었습니다.");
      alert("유효 시간이 만료되었습니다. 다시 시도해 주세요.");
    }
  }
}
