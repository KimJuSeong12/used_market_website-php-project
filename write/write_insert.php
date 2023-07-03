<?php
$mode = (isset($_POST['mode']) && $_POST['mode'] != '') ? $_POST['mode'] : '';
$select = (isset($_POST['select']) && $_POST['select'] != '') ? $_POST['select'] : '';
$reg_title = (isset($_POST['part_title']) && $_POST['part_title'] != '') ? $_POST['part_title'] : '';
$reg_pay = (isset($_POST['part_pay']) && $_POST['part_pay'] != '') ? $_POST['part_pay'] : '';
$reg_location = (isset($_POST['part_location']) && $_POST['part_location'] != '') ? $_POST['part_location'] : '';
$reg_day = (isset($_POST['part_day']) && $_POST['part_day'] != '') ? $_POST['part_day'] : '';
$reg_time = (isset($_POST['part_time']) && $_POST['part_time'] != '') ? $_POST['part_time'] : '';
$reg_content = (isset($_POST['part_content']) && $_POST['part_content'] != '') ? $_POST['part_content'] : '';

$estate_title = (isset($_POST['estate_title']) && $_POST['estate_title'] != '') ? $_POST['estate_title'] : '';
$estate_location = (isset($_POST['estate_location']) && $_POST['estate_location'] != '') ? $_POST['estate_location'] : '';
$estate_seller = (isset($_POST['estate_seller']) && $_POST['estate_seller'] != '') ? $_POST['estate_seller'] : '';
$estate_type = (isset($_POST['estate_type']) && $_POST['estate_type'] != '') ? $_POST['estate_type'] : '';
$estate_price = (isset($_POST['estate_price']) && $_POST['estate_price'] != '') ? $_POST['estate_price'] : '';
$estate_area = (isset($_POST['estate_area']) && $_POST['estate_area'] != '') ? $_POST['estate_area'] : '';
$estate_room = (isset($_POST['estate_room']) && $_POST['estate_room'] != '') ? $_POST['estate_room'] : '';
$estate_bathroom = (isset($_POST['estate_bathroom']) && $_POST['estate_bathroom'] != '') ? $_POST['estate_bathroom'] : '';
$estate_floor = (isset($_POST['estate_floor']) && $_POST['estate_floor'] != '') ? $_POST['estate_floor'] : '';
$estate_loan = (isset($_POST['estate_loan']) && $_POST['estate_loan'] != '') ? $_POST['estate_loan'] : '';
$estate_moving = (isset($_POST['estate_moving']) && $_POST['estate_moving'] != '') ? $_POST['estate_moving'] : '';
$estate_pet = (isset($_POST['estate_pet']) && $_POST['estate_pet'] != '') ? $_POST['estate_pet'] : '';
$estate_parking = (isset($_POST['estate_parking']) && $_POST['estate_parking'] != '') ? $_POST['estate_parking'] : '';
$estate_elevator = (isset($_POST['estate_elevator']) && $_POST['estate_elevator'] != '') ? $_POST['estate_elevator'] : '';
$estate_content = (isset($_POST['estate_content']) && $_POST['estate_content'] != '') ? $_POST['estate_content'] : '';

$car_title = (isset($_POST['car_title']) && $_POST['car_title'] != '') ? $_POST['car_title'] : '';
$car_location = (isset($_POST['car_location']) && $_POST['car_location'] != '') ? $_POST['car_location'] : '';
$car_price = (isset($_POST['car_price']) && $_POST['car_price'] != '') ? $_POST['car_price'] : '';
$car_ex = (isset($_POST['car_ex']) && $_POST['car_ex'] != '') ? $_POST['car_ex'] : '';
$car_reducing = (isset($_POST['car_reducing']) && $_POST['car_reducing'] != '') ? $_POST['car_reducing'] : '';
$car_type = (isset($_POST['car_type']) && $_POST['car_type'] != '') ? $_POST['car_type'] : '';
$car_year = (isset($_POST['car_year']) && $_POST['car_year'] != '') ? $_POST['car_year'] : '';
$car_regist = (isset($_POST['car_regist']) && $_POST['car_regist'] != '') ? $_POST['car_regist'] : '';
$car_km = (isset($_POST['car_km']) && $_POST['car_km'] != '') ? $_POST['car_km'] : '';
$car_displacement = (isset($_POST['car_displacement']) && $_POST['car_displacement'] != '') ? $_POST['car_displacement'] : '';
$car_fuel = (isset($_POST['car_fuel']) && $_POST['car_fuel'] != '') ? $_POST['car_fuel'] : '';
$car_transmission = (isset($_POST['car_transmission']) && $_POST['car_transmission'] != '') ? $_POST['car_transmission'] : '';
$car_insurance = (isset($_POST['car_insurance']) && $_POST['car_insurance'] != '') ? $_POST['car_insurance'] : '';
$car_special = (isset($_POST['car_special']) && $_POST['car_special'] != '') ? $_POST['car_special'] : '';
$car_owner = (isset($_POST['car_owner']) && $_POST['car_owner'] != '') ? $_POST['car_owner'] : '';
$car_content = (isset($_POST['car_content']) && $_POST['car_content'] != '') ? $_POST['car_content'] : '';

$notice_title = (isset($_POST['notice_title']) && $_POST['notice_title'] != '') ? $_POST['notice_title'] : '';
$notice_content = (isset($_POST['notice_content']) && $_POST['notice_content'] != '') ? $_POST['notice_content'] : '';


session_start();
$userid = (isset($_SESSION["userid"]) && $_SESSION["userid"] != '') ? $_SESSION["userid"] : '';
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/inc/db_connect.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_teampro/write/write.php";
$write = new Write($conn);

if (!$userid) {
  echo ("
  <script>
  alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
  history.go(-1)
  </script>    
      ");
  exit;
}



$upload_dir = "./data/";

$upfile_name = $_FILES["upfile"]["name"];
$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
$upfile_type = $_FILES["upfile"]["type"];
$upfile_size = $_FILES["upfile"]["size"];  // 안되면 php init 에서 최대 크기 수정!
$upfile_error = $_FILES["upfile"]["error"];

if ($upfile_name && !$upfile_error) { // 업로드가 잘되었는지 판단
  $file = explode(".", $upfile_name); // trim과 같다. (memo.sql)
  $file_name = $file[0]; //(memo)
  $file_ext = $file[1]; //(sql)

  $new_file_name = date("Y_m_d_H_i_s");
  $new_file_name = $new_file_name . "_" . $file_name;
  $copied_file_name = $new_file_name . "." . $file_ext; // 2020_09_23_11_10_20_memo.sql
  $uploaded_file = $upload_dir . $copied_file_name; // ./data/2020_09_23_11_10_20_memo.sql 다 합친것

  if ($upfile_size > 1000000) {
    echo ("
      <script>
      alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
      history.go(-1)
      </script>
      ");
    exit;
  }

  if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
    echo ("
        <script>
        alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
        history.go(-1)
        </script>
      ");
    exit;
  }
} else {
  $upfile_name = "";
  $upfile_type = "";
  $copied_file_name = "";
}
switch ($_POST["select"]) {
  case "part_time": {
      $result = $write->write_part_time($userid, $reg_location, $reg_title, $reg_pay, $reg_location, $reg_day, $reg_time, $reg_content, $upfile_name, $upfile_type, $copied_file_name);
      break;
    }
  case "estate": {
      $result = $write->write_estate(
        $userid,
        $estate_location,
        $estate_title,
        $estate_seller,
        $estate_type,
        $estate_price,
        $estate_area,
        $estate_room,
        $estate_bathroom,
        $estate_floor,
        $estate_loan,
        $estate_moving,
        $estate_pet,
        $estate_parking,
        $estate_elevator,
        $estate_content,
        $upfile_name,
        $upfile_type,
        $copied_file_name
      );
      break;
    }
  case "car": {
      $result = $write->write_car(
        $userid,
        $car_location,
        $car_title,
        $car_price,
        $car_year,
        $car_km,
        $car_ex,
        $car_reducing,
        $car_type,
        $car_regist,
        $car_displacement,
        $car_fuel,
        $car_transmission,
        $car_insurance,
        $car_special,
        $car_owner,
        $car_content,
        $upfile_name,
        $upfile_type,
        $copied_file_name
      );
      break;
    }
  case "notice": {
      $result = $write->write_notice(
        $userid,
        $notice_title,
        $notice_content,
        $upfile_name,
        $upfile_type,
        $copied_file_name
      );
      break;
    }
}
if ($result) {
  $result2 = $write->update_point($userid);
  if ($result2) {
    die("
    <script>
    alert('글쓰기 성공.');
    self.location.href = '../index.php'
    </script>
  ");
  }
}

// // 포인트 부여하기
// $point_up = 100;
// $sql2 = "select point from members where id=:userid";

// $stmt2 = $conn->prepare($sql2);
// $stmt2->setFetchMode(PDO::FETCH_ASSOC);
// $stmt2->bindParam(':userid', $userid);
// $stmt2->execute();
// $row = $stmt2->fetch();

// $new_point = $row["point"] + $point_up;

// $sql3 = "update members set point=:new_point where id=:userid";

// $stmt3 = $conn->prepare($sql3);
// $stmt3->bindParam(':new_point', $new_point);
// $stmt3->bindParam(':userid', $userid);
// $stmt3->execute();

// echo "
//    <script>
//     location.href = 'image_board_list.php';
//    </script>
// ";
// } elseif (isset($_POST["mode"]) && $_POST["mode"] === "modify") {
// $num = $_POST["num"];
// $page = $_POST["page"];

// $subject = $_POST["subject"];
// $content = $_POST["content"];
// $file_delete = (isset($_POST["file_delete"])) ? $_POST["file_delete"] : 'no';

// $sql = "select * from image_board where num = :num";
// $stmt2 = $conn->prepare($sql);
// $stmt2->setFetchMode(PDO::FETCH_ASSOC);
// $stmt2->bindParam(':num', $num);
// $stmt2->execute();
// $row = $stmt2->fetch();

// $copied_name = $row["file_copied"];

// $upfile_name = $row["file_name"];
// $upfile_type = $row["file_type"];
// $copied_file_name = $row["file_copied"];
// if ($file_delete === "yes") {
//   if ($copied_name) {
//     $file_path = "./data/" . $copied_name;
//     unlink($file_path);
//   }
//   $upfile_name = "";
//   $upfile_type = "";
//   $copied_file_name = "";
// } else {
//   if (isset($_FILES["upfile"])) {
//     if ($copied_name) {
//       $file_path = "./data/" . $copied_name;
//       unlink($file_path);
//     }

//     $upload_dir = "./data/";

//     $upfile_name = $_FILES["upfile"]["name"];
//     $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
//     $upfile_type = $_FILES["upfile"]["type"];
//     $upfile_size = $_FILES["upfile"]["size"];  // 안되면 php init 에서 최대 크기 수정!
//     $upfile_error = $_FILES["upfile"]["error"];
//     if ($upfile_name && !$upfile_error) { // 업로드가 잘되었는지 판단
//       $file = explode(".", $upfile_name); // trim과 같다. (memo.sql)
//       $file_name = $file[0]; //(memo)
//       $file_ext = $file[1]; //(sql)

//       $new_file_name = date("Y_m_d_H_i_s");
//       $new_file_name = $new_file_name . "_" . $file_name;
//       $copied_file_name = $new_file_name . "." . $file_ext; // 2020_09_23_11_10_20_memo.sql
//       $uploaded_file = $upload_dir . $copied_file_name; // ./data/2020_09_23_11_10_20_memo.sql 다 합친것

//       if ($upfile_size > 1000000) {
//         echo ("
//       <script>
//       alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
//       history.go(-1)
//       </script>
//       ");
//         exit;
//       }

//       if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
//         echo ("
//         <script>
//         alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
//         history.go(-1)
//         </script>
//       ");
//         exit;
//       }
//     } else {
//       $upfile_name = $row["file_name"];
//       $upfile_type = $row["file_type"];
//       $copied_file_name = $row["file_copied"];
//     }
//   }
// }



// $sql = "update image_board set subject=:subject, content=:content,  file_name=:upfile_name, file_type=:upfile_type, file_copied= :copied_file_name";
// $sql .= " where num=:num";



// $stmt2 = $conn->prepare($sql);
// $stmt2->setFetchMode(PDO::FETCH_ASSOC);
// $stmt2->bindParam(':subject', $subject);
// $stmt2->bindParam(':content', $content);
// $stmt2->bindParam(':upfile_name', $upfile_name);
// $stmt2->bindParam(':upfile_type', $upfile_type);
// $stmt2->bindParam(':copied_file_name', $copied_file_name);
// $stmt2->bindParam(':num', $num);
// $stmt2->execute();
// $row = $stmt2->fetch();



// echo "
//       <script>
//           location.href = 'image_board_list.php?page=$page';
//       </script>
//   ";
// } else if (isset($_POST["mode"]) && $_POST["mode"] == "insert_ripple") {
// if (empty($_POST["ripple_content"])) {
//   echo "<script>alert('내용입력요망!');history.go(-1);</script>";
//   exit;
// }
// //"덧글을 다는사람은 로그인을 해야한다." 말한것이다.
// $userid = $_SESSION['userid'];




// $sql = "select * from members where id = :userid";
// $stmt = $conn->prepare($sql);
// $stmt->setFetchMode(PDO::FETCH_ASSOC);
// $stmt->bindParam(':userid', $userid);
// $result = $stmt->execute();
// if (!$result) {
//   die('Error');
// }
// $rowcount = $stmt->rowCount();

// if (!$rowcount) {
//   echo "<script>alert('없는 아이디!!');history.go(-1);</script>";
//   exit;
// } else {
//   $content = input_set($_POST["ripple_content"]);
//   $page = input_set($_POST["page"]);
//   $parent = input_set($_POST["parent"]);
//   $hit = input_set($_POST["hit"]);
//   $q_usernick = isset($_SESSION['usernick']) ? mysqli_real_escape_string($con, $_SESSION['usernick']) : "null";
//   $q_username = $_SESSION['username'];
//   $q_content = $content;
//   $q_parent = $parent;
//   $regist_day = date("Y-m-d (H:i)");

//   $sql = "INSERT INTO `image_board_ripple` VALUES (null,:q_parent, :q_userid,:q_username, :q_usernick,:q_content,:regist_day)";
//   $stmt = $conn->prepare($sql);
//   $stmt->setFetchMode(PDO::FETCH_ASSOC);
//   $stmt->bindParam(':q_parent', $q_parent);
//   $stmt->bindParam(':q_userid', $userid);
//   $stmt->bindParam(':q_username', $q_username);
//   $stmt->bindParam(':q_usernick', $q_usernick);
//   $stmt->bindParam(':q_content', $q_content);
//   $stmt->bindParam(':regist_day', $regist_day);
//   $result = $stmt->execute();


//   if (!$result) {
//     die('Error');
//   }
//   echo "<script>location.href='./image_board_view.php?num=$parent&page=$page&hit=$hit';</script>";
// } //end of if rowcount
// } else if (isset($_POST["mode"]) && $_POST["mode"] == "delete_ripple") {
// $page = input_set($_POST["page"]);
// $hit = input_set($_POST["hit"]);
// $num = input_set($_POST["num"]);
// $parent = input_set($_POST["parent"]);

// $sql = "DELETE FROM `image_board_ripple` WHERE num=:num";
// $stmt = $conn->prepare($sql);
// $stmt->setFetchMode(PDO::FETCH_ASSOC);
// $stmt->bindParam(':num', $num);
// $result = $stmt->execute();

// if (!$result) {
//   die('Error');
// }
// echo "<script>location.href='./image_board_view.php?num=$parent&page=$page&hit=$hit';</script>";
