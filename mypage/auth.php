<?php
// 1. 보안부분(세션등록, 체크할내용, GET, POST)
$mode = (isset($_POST['mode']) && $_POST['mode'] != '') ? $_POST['mode'] : '';
$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$password1 = (isset($_POST['pw']) && $_POST['pw'] != '') ? $_POST['pw'] : '';
$email = (isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : '';
$name = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';

if ($mode == '') {
  die(json_encode(['result' => 'empty_mode']));
}

// 2. DB연결, Member Class 로딩
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/member.php";
$member = new Member($conn);

// 3. 구현할부분
switch ($mode) {

  case 'login': {
      if ($id == '') {
        die(json_encode(['result' => 'empty_id']));
      }
      if ($password1 == '') {
        die(json_encode(['result' => 'empty_pw']));
      }
      //아이디와 패스워드 검색체크
      $result = $member->login($id, $password1);
      switch ($result) {
        case 'login_success':
          $userInfo = $member->getInfo($id);
          die(json_encode(['result' => 'login_success']));
          break;
        case 'pw_fail':
          die(json_encode(['result' => 'pw_fail']));
          break;
        case 'id_fail':
          die(json_encode(['result' => 'id_fail']));
          break;
      }

      break;
    }
  case 'email_check': {
      if ($email == '') {
        die(json_encode(['result' => 'empty_email']));
      }
      //이메일 패턴 검색체크
      if ($member->email_form_check($email) == false) {
        die(json_encode(['result' => 'form_error_email']));
      }

      if ($member->email_exists($email)) {
        die(json_encode(['result' => 'fail']));
      } else {
        die(json_encode(['result' => 'success']));
      }
      break;
    }
  case 'member_delete': {
      if ($id == '') {
        die(json_encode(['result' => 'empty_id']));
      }

      if ($member->member_delete($id)) {
        die(json_encode(['result' => 'success']));
      } else {
        die(json_encode(['result' => 'fail']));
      }
      break;
    }
  case 'member_update': {
      if ($id == '') {
        die(json_encode(['result' => 'empty_id']));
      }

      if ($member->edit($password1, $name,  $email)) {
        die(json_encode(['result' => 'success']));
      } else {
        die(json_encode(['result' => 'fail']));
      }
      break;
    }
}
