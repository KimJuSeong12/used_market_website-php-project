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
  case 'id_check': {
      if ($id == '') {
        die(json_encode(['result' => 'empty_id']));
      }
      //아이디 패턴 검색체크
      if ($member->id_exists($id)) {
        die(json_encode(['result' => 'fail']));
      } else {
        die(json_encode(['result' => 'success']));
      }
      break;
    }
  case 'phone_check': {
      //아이디 패턴 검색체크
      if ($member->phone_exists($tel)) {
        die(json_encode(['result' => 'exist']));
      } else {
        die(json_encode(['result' => 'fail']));
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
  case 'input': {
      if ($password1 != $password2) {
        die("<script>
          alert('패스워드가 맞지 않습니다');
          self.location.href = 'http://{$_SERVER['HTTP_HOST']}/php_teampro/member_input.php'
        </script>");
      }

      // 연관배열
      $arr = [
        'user_id' => $id,
        'password' => $password1,
        'name' => $name,
        'email' => $email,
        'tel' => $tel,
        'zipcode' => $zipcode,
        'addr1' => $addr1,
        'addr2' => $addr2,
        'point' => $point,
        'level' => $level
      ];

      $member->input($arr);

      die("<script>
        self.location.href = 'http://{$_SERVER['HTTP_HOST']}/php_teampro/login/login_form.php'
        </script>");
    }
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
          // 세션등록
          session_start();
          $_SESSION['ses_id'] = $id;
          $_SESSION['ses_level'] = $userInfo['level'];
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
    // case 'edit': {
    //     //프로필 이미지 처리
    //     $photo = $old_photo;
    //     if (isset($_FILES['photo']) && $_FILES['photo']['name'] != '') {
    //       //기존 이미지가 있는지 없는지 파악
    //       if ($old_photo != '') {
    //         unlink($_SERVER['DOCUMENT_ROOT'] . "/php_member/data/profile/" . $old_photo);
    //       }
    //       //첨부된 이미지 파일 확장자 구하기
    //       $temp_arr = explode('.', $_FILES['photo']['name']);
    //       $ext = end($temp_arr);
    //       $photo = $id . "." . $ext;
    //       copy($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/data/profile/" . $photo);
    //     }
    //     session_start();
    //     // 연관배열
    //     $arr = [
    //       'id' => $_SESSION['ses_id'],
    //       'name' => $name,
    //       'password' => $password1,
    //       'email' => $email,
    //       'zipcode' => $zipcode,
    //       'addr1' => $addr1,
    //       'addr2' => $addr2,
    //       'photo' => $photo
    //     ];

    //     $member->edit($arr);

    //     die("<script>
    //     alert('수정완료했습니다.');
    //     self.location.href = 'http://{$_SERVER['HTTP_HOST']}/php_teampro/index.php'
    //   </script>");

    //     break;
    //   }
}
