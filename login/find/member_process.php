<?php
// 1. 보안부분(세션등록, 체크할내용, GET, POST)
$mode = (isset($_POST['mode']) && $_POST['mode'] != '') ? $_POST['mode'] : '';
$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';
$password1 = (isset($_POST['password']) && $_POST['password'] != '') ? $_POST['password'] : '';
$password2 = (isset($_POST['password2']) && $_POST['password2'] != '') ? $_POST['password2'] : '';
$email = (isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : '';
$tel = (isset($_POST['tel']) && $_POST['tel'] != '') ? $_POST['tel'] : '';
$point = (isset($_POST['point']) && $_POST['point'] != '') ? $_POST['point'] : 0;
$level = (isset($_POST['level']) && $_POST['level'] != '') ? $_POST['level'] : 1;
$old_email = (isset($_POST['old_email']) && $_POST['old_email'] != '') ? $_POST['old_email'] : '';
$old_photo = (isset($_POST['old_photo']) && $_POST['old_photo'] != '') ? $_POST['old_photo'] : '';
$zipcode = (isset($_POST['zipcode']) && $_POST['zipcode'] != '') ? $_POST['zipcode'] : '';
$addr1 = (isset($_POST['addr1']) && $_POST['addr1'] != '') ? $_POST['addr1'] : '';
$addr2 = (isset($_POST['addr2']) && $_POST['addr2'] != '') ? $_POST['addr2'] : '';

if ($mode == '') {
  die(json_encode(['result' => 'empty_mode']));
}

// 2. DB연결, Member Class 로딩
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/member.php";
$member = new Member($conn);

// 3. 구현할부분
switch ($mode) {

  case 'find_phone_check': {
      if ($name == "") {
        $func = $member->find_phone_exists_pw($tel, $id);
      } else {
        $func = $member->find_phone_exists_id($tel, $name);
      }
      //아이디 패턴 검색체크
      if ($func) {
        die(json_encode(['result' => 'exist']));
      } else {
        die(json_encode(['result' => 'fail']));
      }
      break;
    }
}
