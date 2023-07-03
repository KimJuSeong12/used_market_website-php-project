document.addEventListener(`DOMContentLoaded`, () => {
  createInputHandler("amuguna");
  createInputHandler("cfnumber_input_area");
  // 중복확인 버튼 클릭 이벤트
  const id_doublecheck = document.querySelector("#id_doublecheck");
  id_doublecheck.addEventListener("click", () => {
    if (document.input_form.id.value == "") {
      alert("아이디를 입력해 주세요");
      document.input_form.id.focus();
      return false;
    }
    // 아이디 패턴검색
    let id_regx = /^[a-z]{1}[a-z0-9A-Z_]{5,9}$/g;
    if (document.input_form.id.value.match(id_regx) == null) {
      alert(
        "첫자 영문자 소문자,숫자,_,대소문자입력 가능. 최소 6자이상 10자이하"
      );
      document.input_form.id.value = "";
      document.input_form.id.focus();
      return false;
    }
    //ajax 점검
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./member_process.php", true);
    // 전송 데이터 생성
    const formdata = new FormData();
    formdata.append("id", document.input_form.id.value);
    formdata.append("mode", "id_check");
    xhr.send(formdata);
    // 핸들러기능(비동기식처리)
    xhr.onload = () => {
      if (xhr.status == 200) {
        // json.parse = json객체를 javascript객체 변환
        // {'result': 'success'} => {result: 'success'}
        const data = JSON.parse(xhr.responseText);
        switch (data.result) {
          case "fail":
            alert("사용 불가능한 아이디입니다.");
            document.input_form.id.value = "";
            document.input_form.id_check.value = "0";
            document.input_form.id.focus();
            break;
          case "success":
            alert("사용 가능한 아이디입니다.");
            document.input_form.id_doublecheck_check_flag.value = 1;
            break;
          case "empty_id":
            alert("아이디를 입력해주세요.");
            document.input_form.id_check.value = "0";
            document.input_form.id.focus();
            break;
          case "empty_mode":
            alert("모드를 입력해주세요.");
            document.input_form.id_check.value = "0";
            document.input_form.id.focus();
            break;
          default:
        }
      } else {
        alert(xhr.status);
        alert("서버 통신 불가");
      }
    };
  });
  const email_doublecheck = document.querySelector("#email_doublecheck");
  email_doublecheck.addEventListener("click", () => {
    if (document.input_form.email.value == "") {
      alert("이메일을 입력해 주세요");
      document.input_form.email.focus();
      return false;
    }
    // 이메일 패턴검색
    let email_regx =
      /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
    if (document.input_form.email.value.match(email_regx) == null) {
      alert("이메일 폼을 맞춰주십시오.");
      document.input_form.email.value = "";
      document.input_form.email.focus();
      return false;
    }

    //ajax 점검
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./member_process.php", true);
    // 전송 데이터 생성
    const formdata = new FormData();
    formdata.append("email", document.input_form.email.value);
    formdata.append("mode", "email_check");
    xhr.send(formdata);
    // 핸들러기능(비동기식처리)
    xhr.onload = () => {
      if (xhr.status == 200) {
        // json.parse = json객체를 javascript객체 변환
        // {'result': 'success'} => {result: 'success'}
        const data = JSON.parse(xhr.responseText);
        switch (data.result) {
          case "fail":
            alert("이미 사용중인 이메일입니다.");
            document.input_form.email.value = "";
            document.input_form.email_check.value = "0";
            document.input_form.email.focus();
            break;
          case "success":
            alert("사용 가능한 이메일입니다.");
            document.input_form.email_doublecheck_check_flag.value = 1;
            break;
          case "empty_id":
            alert("이메일를 입력해주세요.");
            document.input_form.email_check.value = "0";
            document.input_form.email.focus();
            break;
          case "empty_mode":
            alert("모드를 입력해주세요.");
            document.input_form.email_check.value = "0";
            document.input_form.email.focus();
            break;
          case "form_error_email":
            alert("이메일 폼을 맞춰주십시오.(서버)");
            document.input_form.email.value = "";
            document.input_form.email_check.value = "0";
            document.input_form.email.focus();
            break;
          default:
        }
      } else {
        alert("서버 통신 불가");
      }
    };
  });

  // 가입전송(폼 전송 체크)
  const btn_submit = document.querySelector(`#btn_submit`);
  btn_submit.addEventListener("click", () => {
    const f = document.input_form;
    if (f.id.value == "") {
      alert("아이디를 입력해주세요.");
      f.id.focus();
      return false;
    }

    // if (f.id_check.value == 0) {
    //   alert("아이디 중복확인을 해주세요.");
    //   return false;
    // }

    if (f.password.value == "") {
      alert("비밀번호를 입력해주세요.");
      f.password.focus();
      return false;
    }
    if (f.password2.value == "") {
      alert("비밀번호 확인을 입력해주세요.");
      f.password2.focus();
      return false;
    }
    if (f.password.value != f.password2.value) {
      alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
      f.password.value = "";
      f.password2.value = "";
      f.password2.focus();
      return false;
    }
    if (f.name.value == "") {
      alert("이름을 입력해주세요.");
      f.name.focus();
      return false;
    }
    if (f.email.value == "") {
      alert("이메일을 입력해주세요.");
      f.email.focus();
      return false;
    }

    // if (f.zipcode.value == "") {
    //   alert("우편번호를 입력해주세요.");
    //   f.zipcode.focus();
    //   return false;
    // }
    // if (f.addr1.value == "") {
    //   alert("기본주소를 입력해주세요.");
    //   f.addr1.focus();
    //   return false;
    // }

    if (
      document.input_form.agree1.checked != true ||
      document.input_form.agree2.checked != true ||
      document.input_form.age.checked != true
    ) {
      alert("이용약관동의");
      return false;
    }
    if (document.input_form.id_doublecheck_check_flag.value != 1) {
      alert("아이디 중복 확인해주세요.");
      return false;
    }
    if (document.input_form.email_doublecheck_check_flag.value != 1) {
      alert("이메일 중복 확인해주세요.");
      return false;
    }
    if (document.input_form.cfnumber_tel_check_flag.value != 1) {
      alert("인증번호를 확인해주세요.");
      return false;
    }
    //ajax 점검
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./member_process.php", true);
    // 전송 데이터 생성
    const formdata = new FormData();
    formdata.append("tel", document.input_form.tel.value);
    formdata.append("mode", "phone_check");
    xhr.send(formdata);
    // 핸들러기능(비동기식처리)
    xhr.onload = () => {
      if (xhr.status == 200) {
        // json.parse = json객체를 javascript객체 변환
        // {'result': 'success'} => {result: 'success'}
        const data = JSON.parse(xhr.responseText);
        switch (data.result) {
          case "fail":
            f.submit();
            break;
          case "exist":
            alert("이미 사용중인 전화번호입니다.");
            document.input_form.tel.value = "";
            document.input_form.tel.focus();
            break;
          default:
            alert("dasl;dka;sld.");
        }
      } else {
        alert("서버 통신 불가");
      }
    };
  });
  const checkbox = document.querySelectorAll(".checkbox");
  let checkCount = 0;
  checkbox.forEach((value) => {
    value.addEventListener("click", () => {
      if (value.checked == true) {
        checkCount += 1;
      } else {
        checkCount -= 1;
      }
      if (checkCount == 4) {
        document.input_form.all_agree.checked = true;
      } else {
        document.input_form.all_agree.checked = false;
      }
    });
  });

  const all_agree = document.querySelector("#all_agree");
  all_agree.addEventListener("click", () => {
    if (document.input_form.all_agree.checked == true) {
      checkCount = 4;
      document.input_form.agree1.checked = true;
      document.input_form.agree2.checked = true;
      document.input_form.agree3.checked = true;
      document.input_form.age.checked = true;
    }
    if (document.input_form.all_agree.checked == false) {
      checkCount = 0;
      document.input_form.agree1.checked = false;
      document.input_form.agree2.checked = false;
      document.input_form.agree3.checked = false;
      document.input_form.age.checked = false;
    }
  });

  // 모달
  // 모달 창을 가져옵니다.
  const termsModal = document.getElementById("terms-modal");
  const modalContent = termsModal.querySelector(".modal-content p");

  // 모든 약관보기 링크를 가져옵니다.
  const termsLinks = document.querySelectorAll(".a_agree1");

  // 해당 약관 내용을 배열에 저장합니다.
  const terms = [
    "이용약관 내용입니다.",
    "개인정보 수집 및 이용 동의 내용입니다.",
    "선택적 개인정보 수집 및 이용 동의 내용입니다.",
  ];

  // 각 약관보기 링크에 클릭 이벤트를 추가합니다.
  for (let i = 0; i < termsLinks.length; i++) {
    termsLinks[i].addEventListener("click", (e) => {
      e.preventDefault();
      modalContent.textContent = terms[i]; // 해당 약관 내용을 모달에 넣습니다.
      termsModal.style.display = "block"; // 모달 창을 보여줍니다.
    });
  }

  // 모달 창의 닫기 버튼을 가져옵니다.
  const closeModal = document.querySelector(".close");

  // 닫기 버튼을 클릭하면 모달 창을 닫습니다.
  closeModal.addEventListener("click", () => {
    termsModal.style.display = "none";
  });

  // 사용자가 모달 창 외부를 클릭하면 모달 창을 닫습니다.
  window.onclick = (event) => {
    if (event.target == termsModal) {
      termsModal.style.display = "none";
    }
  };

  const cfnumber_input_area = document.querySelector("#cfnumber_input_area");
  const tel_doublecheck = document.querySelector("#tel_doublecheck");
  tel_doublecheck.addEventListener("click", () => {
    //ajax 점검
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./moonja.php", true);
    // 전송 데이터 생성
    const formdata = new FormData();
    formdata.append("tel", document.input_form.tel.value);
    xhr.send(formdata);
    // 핸들러기능(비동기식처리)
    xhr.onload = () => {
      if (xhr.status == 200) {
        // json.parse = json객체를 javascript객체 변환
        // {'result': 'success'} => {result: 'success'}
        const data = JSON.parse(xhr.responseText);
        if (data.result == "fail") {
          alert("실페헸습니다.");
        } else {
          alert("인증번호가 발송되었습니다.");
          document.input_form.cfnumber.value = data.result;
          cfnumber_input_area.style.setProperty("display", "flex");
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

  const cfnumber_tel_check = document.querySelector("#cfnumber_tel_check");
  const remaining_time_text = document.querySelector(".remaining_time_text");
  // const cfnumber_input_area = document.querySelector("#cfnumber_input_area");
  cfnumber_tel_check.addEventListener("click", () => {
    if (
      document.input_form.cfnumber.value ==
      document.input_form.cfnumber_tel.value
    ) {
      document.input_form.cfnumber_tel_check_flag.value = 1;
      remaining_time_text.style.setProperty("display", "none");
      alert("인증에 성공하였습니다.");
      cfnumber_input_area.style.setProperty("display", "none");
      document.input_form.tel.readOnly = true;
    } else {
      alert("잘못된 인증 번호입니다.");
    }
  });
});

function asyncFunc(isSuccess, timeout) {
  timeout = timeout ?? 1000;

  return new Promise((resolve) => {
    window.setTimeout(() => {
      resolve(isSuccess);
    }, timeout);
  });
}

const remainingTimeEl = document.querySelector(".remaining_time_text"); // 남은 시간이 표시될 요소

const sec = 180; // 만료 초
let currentSec = 0; // 현재 초
let timerId;
let isValidate = false; // 인증 여부
let isSuccess = false;

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

function createInputHandler(containerId) {
  const container = document.getElementById(containerId);
  const input = container.querySelector(".input-text");
  const button = container.querySelector(".button-text");

  input.addEventListener("input", () => {
    if (input.value.trim().length) {
      button.removeAttribute("disabled");
    } else {
      button.setAttribute("disabled", "");
    }
  });

  return input;
}
