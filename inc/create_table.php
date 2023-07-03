<?php

function create_table($conn, $table_name)
{
  $createTableFlag = false;
  $sql = "show tables from daangn where tables_in_daangn = :table_name";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(":table_name", $table_name);
  $result = $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_NUM);
  $count = $stmt->rowCount();

  //테이블이 있는지 없는지 확인
  $createTableFlag = ($count > 0) ? true : false;

  if ($createTableFlag == false) {
    switch ($table_name) {
      case 'membership':
        $sql = "CREATE TABLE membership (
          id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '고객번호',
          user_id varchar(100) NOT NULL COMMENT '고객 아이디',
          password varchar(100) NOT NULL COMMENT '고객 패스워드',
          name varchar(100) NOT NULL COMMENT '고객 이름',
          email varchar(100) NOT NULL COMMENT '고객 이메일',
          tel varchar(100) NOT NULL COMMENT '고객 전화번호',
          zipcode varchar(30) DEFAULT '' COMMENT '우편번호',
          addr1 varchar(100) DEFAULT '' COMMENT '기본주소',
          addr2 varchar(100) DEFAULT '' COMMENT '상세주소',
          point int(11) DEFAULT '0' COMMENT '고객 적립금',
          level int(11) DEFAULT '1' COMMENT '회원, 관리자 구분',
          join_date datetime DEFAULT NULL COMMENT '가입년월일시분초',
          PRIMARY KEY (id),
          UNIQUE KEY user_id_uk (user_id) USING BTREE,
          UNIQUE KEY tel_uk (tel) USING BTREE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";
        break;

      case 'part_time':
        $sql = "CREATE TABLE `part_time` (
          `num` int(11) NOT NULL AUTO_INCREMENT,
          `writer_id` char(15) NOT NULL,
          `writer_address` char(15) NOT NULL,
          `title` char(80) NOT NULL,
          `hour_pay` int(11) NOT NULL,
          `work_location` char(20) DEFAULT NULL,
          `work_day` char(20) DEFAULT NULL,
          `work_time` int(11) DEFAULT NULL,
          `content` varchar(1000) NOT NULL,
          `hit` int NOT NULL DEFAULT 0,
          `file_name` char(40) NOT NULL,
          `file_type` char(40) NOT NULL,
          `file_copied` char(40) NOT NULL,
          PRIMARY KEY (`num`)
        ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
        ";
        break;
      case 'estate':
        $sql = "CREATE TABLE `estate` (
            `num` int(11) NOT NULL AUTO_INCREMENT,
            `writer_id` char(15) NOT NULL,
            `writer_address` char(15) NOT NULL,
            `title` char(80) NOT NULL,
            `seller` char(10) NOT NULL,
            `building_type` char(10) NOT NULL,
            `price` char(10) NOT NULL,
            `area` int(11) NOT NULL,
            `room_count` int(11) NOT NULL,
            `bathroom_count` int(11) NOT NULL,
            `floor` int(11) NOT NULL,
            `loan` char(20) DEFAULT NULL,
            `moving_day` char(30) DEFAULT NULL,
            `pet` char(10) DEFAULT NULL,
            `parking` char(10) DEFAULT NULL,
            `elevator` char(10) DEFAULT NULL,
            `content` varchar(1000) NOT NULL,
            `hit` int NOT NULL DEFAULT 0,
            `file_name` char(40) NOT NULL,
            `file_type` char(40) NOT NULL,
            `file_copied` char(40) NOT NULL,
            PRIMARY KEY (`num`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";
        break;
      case 'car':
        $sql = "CREATE TABLE `car` (
              `num` int(11) NOT NULL AUTO_INCREMENT,
              `writer_id` char(15) NOT NULL,
              `writer_address` char(15) NOT NULL,
              `title` char(80) NOT NULL,
              `price` int(11) NOT NULL,
              `year` int(11) NOT NULL,
              `km` int(11) NOT NULL,
              `ex_price` int(11) NOT NULL,
              `reducing_price` int(11) NOT NULL,
              `car_type` char(10) NOT NULL,
              `regist_day` char(20) NOT NULL,
              `displacement` int(11) NOT NULL,
              `fuel` char(10) NOT NULL,
              `transmission` char(10) NOT NULL,
              `insurance_history` int(11) NOT NULL,
              `special_used` int(11) NOT NULL,
              `owner_change_history` int(11) NOT NULL,
              `content` varchar(1000) NOT NULL,
              `hit` int NOT NULL DEFAULT 0,
              `file_name` char(40) NOT NULL,
              `file_type` char(40) NOT NULL,
              `file_copied` char(40) NOT NULL,
              PRIMARY KEY (`num`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";
        break;
      case 'wish':
        $sql = "CREATE TABLE `wish` (
          `num` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `wished_id` varchar(100) NOT NULL,
          `wished_num` int(11) NOT NULL,
          `board_name` varchar(100) NOT NULL,
          PRIMARY KEY (`num`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";
        break;
      case 'notice':
        $sql = "CREATE TABLE `notice` (
          `num` int(11) NOT NULL AUTO_INCREMENT,
          `writer_id` char(30) NOT NULL,
          `title` char(100) NOT NULL,
          `content` varchar(1000) NOT NULL,
          `hit` int(11) NOT NULL DEFAULT '0',
          `file_name` char(40) NOT NULL,
          `file_type` char(40) NOT NULL,
          `file_copied` char(40) NOT NULL,
          PRIMARY KEY (`num`)
        ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";
        break;
      default:
        $sql = "";
        print "<script>
          alert('해당 $table_name 이 없습니다.')
        </script>";
        break;
    } // end of switch
    if ($sql != "") {
      $stmt = $conn->prepare($sql);
      $result = $stmt->execute();
      if ($result) {
        print "<script>
          alert('해당 $table_name 테이블 이 생성되었습니다.')
        </script>";
      } else {
        print "<script>
        alert('해당 $table_name 테이블이 생성 실패 되었습니다.')
      </script>";
      }
    }
  } // end of if
} // end of function
