<?php
// 1. 보안부분(세션등록, 체크할내용, GET, POST)
session_start();
$wished_id = $_SESSION["userid"];
$board_name = 'estate';
$mode = (isset($_POST['mode']) && $_POST['mode'] != '') ? $_POST['mode'] : '';

$wished_num = (int)((isset($_POST['num']) && $_POST['num'] != '') ? $_POST['num'] : '');
if ($mode == '') {
  die(json_encode(['result' => 'empty_mode']));
}

// 2. DB연결, Member Class 로딩
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/wish/wish.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/estate/estate.php";
$estate = new Estate($conn);
$wish = new Wish($conn);

// 3. 구현할부분
switch ($mode) {

  case 'push': {
      $result = $wish->wish_push($wished_id, $wished_num, $board_name);
      if ($result) {
        die(json_encode(['result' => 'success']));
      } else {
        die(json_encode(['result' => 'fail']));
      }

      break;
    }
  case 'delete': {
      $result = $wish->wish_delete($wished_id, $wished_num, $board_name);
      if ($result) {
        die(json_encode(['result' => 'success']));
      } else {
        die(json_encode(['result' => 'fail']));
      }

      break;
    }
  case 'delete_board': {
      $result = $estate->estate_delete($wished_num);
      if ($result) {
        die(json_encode(['result' => 'success']));
      } else {
        die(json_encode(['result' => 'fail']));
      }
    }
}
