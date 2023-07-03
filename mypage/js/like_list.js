document.addEventListener("DOMContentLoaded", () => {
  const heart = document.querySelector("#heart");
  heart.addEventListener("click", () => {
    if (heart.src.includes("color_heart-36.png")) {
      heart.src = "../img/heart.png";
      //ajax 점검
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "./wished.php", true);
      // 전송 데이터 생성
      const formdata = new FormData();
      formdata.append("mode", "delete");
      formdata.append("num", document.querySelector("#hidden_num_flag").value);
      xhr.send(formdata);
      // 핸들러기능(비동기식처리)
      xhr.onload = () => {
        if (xhr.status == 200) {
          // json.parse = json객체를 javascript객체 변환
          // {'result': 'success'} => {result: 'success'}
          const data = JSON.parse(xhr.responseText);

          switch (data.result) {
            case "success":
              location.reload();
              break;
            case "fail":
              alert("실패");
              break;
            default:
            // alert("디펄트");
          }
        } else {
          alert("서버 통신 불가");
        }
      };
    } else {
      heart.src = "../img/color_heart-36.png";
    }
  });
});
