document.addEventListener("DOMContentLoaded", () => {
  const btn_cf_email = document.querySelector(".btn_cf_email");
  btn_cf_email.addEventListener("click", () => {
    if (document.input_form.userEmail.value == "") {
      alert("이메일을 입력해 주세요");
      document.input_form.userEmail.focus();
      return false;
    }
    // 이메일 패턴검색
    let email_regx =
      /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
    if (document.input_form.userEmail.value.match(email_regx) == null) {
      alert("이메일 폼을 맞춰주십시오.");
      document.input_form.userEmail.value = "";
      document.input_form.userEmail.focus();
      return false;
    }
    //ajax 점검
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./auth.php", true);
    // 전송 데이터 생성
    const formdata = new FormData();
    formdata.append("mode", "email_check");
    formdata.append("email", document.input_form.userEmail.value);
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
            document.input_form.userEmail.value = "";
            document.input_form.userEmail.focus();
            break;
          case "success":
            alert("사용 가능한 이메일입니다.");
            break;
          case "empty_id":
            alert("이메일를 입력해주세요.");
            break;
          case "empty_mode":
            alert("모드를 입력해주세요.");
            break;
          case "form_error_email":
            alert("이메일 폼을 맞춰주십시오.(서버)");
            break;
          default:
        }
      } else {
        alert("서버 통신 불가");
      }
    };
  });

  const btn_withdrawal = document.querySelector(".btn_withdrawal");
  btn_withdrawal.addEventListener("click", () => {
    let a = window.confirm(
      "회원 탈퇴 시 이용 정보와 적립 포인트가 일괄 삭제되어 복구되지 않습니다. 정말 탈퇴 하시겠습니까?"
    );
    if (a) {
      //ajax 점검
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "./auth.php", true);
      // 전송 데이터 생성
      const formdata = new FormData();
      formdata.append("mode", "member_delete");
      formdata.append("id", document.input_form.uid.value);
      xhr.send(formdata);
      // 핸들러기능(비동기식처리)
      xhr.onload = () => {
        if (xhr.status == 200) {
          // json.parse = json객체를 javascript객체 변환
          // {'result': 'success'} => {result: 'success'}
          const data = JSON.parse(xhr.responseText);

          switch (data.result) {
            case "fail":
              alert("실패.");
              document.input_form.userEmail.value = "";
              document.input_form.userEmail.focus();
              break;
            case "success":
              alert("회원 탈퇴 완료되었습니다..");
              self.location.href = "../index.php";

              break;
            case "empty_id":
              alert("아이디를 입력해주세요.");

              break;
            case "empty_mode":
              alert("모드를 입력해주세요.");

              break;

            default:
          }
        } else {
          alert("서버 통신 불가");
        }
      };
    }
  });

  const btn_user_info_modify = document.querySelector(".btn_user_info_modify");
  btn_user_info_modify.addEventListener("click", () => {
    if (document.input_form.newPW.value == document.input_form.newCfPW.value) {
      //ajax 점검
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "./auth.php", true);
      // 전송 데이터 생성
      const formdata = new FormData();
      formdata.append("mode", "member_update");
      formdata.append("id", document.input_form.uid.value);
      formdata.append("oldpw", document.input_form.oldPW.value);
      formdata.append("pw", document.input_form.newPW.value);
      formdata.append("name", document.input_form.userName.value);
      formdata.append("email", document.input_form.userEmail.value);
      xhr.send(formdata);
      // 핸들러기능(비동기식처리)
      xhr.onload = () => {
        if (xhr.status == 200) {
          // json.parse = json객체를 javascript객체 변환
          // {'result': 'success'} => {result: 'success'}
          const data = JSON.parse(xhr.responseText);

          switch (data.result) {
            case "fail":
              alert("회원 수정 실패");
              break;
            case "success":
              alert("회원 수정이 완료되었습니다.");
              break;

            case "empty_mode":
              alert("모드를 입력해주세요.");

              break;
            case "login_fail":
              alert("현재 비밀번호 불일치");

              break;

            default:
          }
        } else {
          alert("서버 통신 불가");
        }
      };
    } else {
      alert("패스워드 재 입력이 일치하지 않스비낟");
    }
  });
});
