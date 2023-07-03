document.addEventListener("DOMContentLoaded", () => {
  const login_search_id = document.querySelector(".login_search_id");
  login_search_id.addEventListener("click", () => {
    self.location.href = "./find/id.php";
  });
  const login_search_pw = document.querySelector(".login_search_pw");
  login_search_pw.addEventListener("click", () => {
    self.location.href = "./find/password.php";
  });
  const signin = document.querySelector("#signin");
  signin.addEventListener("click", () => {
    self.location.href = "../member/member_input.php";
  });
});
