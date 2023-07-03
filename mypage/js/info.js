document.addEventListener("DOMContentLoaded", () => {
  const btn_ok = document.querySelector(".btn_ok");
  btn_ok.addEventListener("click", () => {
    //ajax 점검
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./auth.php", true);
    // 전송 데이터 생성
    const formdata = new FormData();
    formdata.append("mode", "login");
    formdata.append("id", document.input_form.user_id.value);
    formdata.append("pw", document.input_form.user_pw.value);
    xhr.send(formdata);
    // 핸들러기능(비동기식처리)
    xhr.onload = () => {
      if (xhr.status == 200) {
        // json.parse = json객체를 javascript객체 변환
        // {'result': 'success'} => {result: 'success'}
        const data = JSON.parse(xhr.responseText);

        switch (data.result) {
          case "login_success":
            self.location.href = "./modify.php";

            break;
          case "empty_mode":
            alert("모드를 입력해주세요.");
            break;
          case "empty_pw":
            alert("패스워드를 입력해주세요.");
            break;
          case "pw_fail":
            alert("패스워드를 확인해주세요.");
            break;
          default:
        }
      } else {
        alert("서버 통신 불가");
      }
    };
  });
});
