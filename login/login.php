<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";

$id = (isset($_POST["id"]) && $_POST["id"] != '') ? $_POST["id"] : "";
$pass = (isset($_POST["pw"]) && $_POST["pw"] != '') ? $_POST["pw"] : "";


if ($id == "" or $pass == "") {
  die("<script>
        alert('아이디 또는 비밀번호를 입력해 주세요.');
        history.go(-1);
        </script>");
}

$sql = "select * from membership where user_id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$info = $stmt->rowCount() ? true : false;

if ($info == false) {
  die("<script>
        alert('아이디, 비밀번호를 확인해 주세요.1');
        history.go(-1);
        </script>");
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!password_verify($pass, $row['password'])) {
  die("<script>
  alert('아이디, 비밀번호를 확인해 주세요.2');
  history.go(-1);
  </script>");
}

session_start();
$_SESSION["num"] = $row["id"];
$_SESSION["userid"] = $row["user_id"];
$_SESSION["username"] = $row["name"];
$_SESSION["useremail"] = $row["email"];
$_SESSION["userphone"] = $row["tel"];
$_SESSION["userlevel"] = $row["level"];
$_SESSION["userpoint"] = $row["point"];

echo "
      <script>
        self.location.href = 'http://{$_SERVER['HTTP_HOST']}/php_teampro/index.php'
      </script>
    ";
