document.addEventListener("DOMContentLoaded", () => {
  const btn_go_login = document.querySelector(".btn_go_login");
  const btn_go_find_password = document.querySelector(".btn_go_find_password");
  btn_go_login.addEventListener("click", () => {
    self.location.href = "../login_form.php";
  });
  btn_go_find_password.addEventListener("click", () => {
    self.location.href = "./password.php";
  });
});
