<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/member.php";
$member = new Member($conn);
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$password = password_hash($password, PASSWORD_DEFAULT);
$result = $member->find_password($id, $password);
if ($result) {
    die("<script>
        self.location.href = '../login_form.php'
        alert('비밀번호가 변경되었습니다.')
    </script>");
} else {
    die("<script>
    history.go(-1)
</script>");
}
