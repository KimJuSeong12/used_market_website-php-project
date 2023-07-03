<?php

class Member
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }
  //아이디 검사
  public function id_exists($id)
  {
    $sql = "select * from membership where user_id=:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    // (0,null,'',false) : false 나머지는 : true

    return $stmt->rowCount() ? true : false;
  }
  //휴대폰번호 검사
  public function phone_exists($tel)
  {
    $sql = "select * from membership where tel=:tel";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':tel', $tel);
    $stmt->execute();
    // (0,null,'',false) : false 나머지는 : true

    return $stmt->rowCount() ? true : false;
  }
  //번호 일치 검사
  public function find_phone_exists_id($tel, $name)
  {
    $sql = "select * from membership where tel=:tel and name = :name";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    // (0,null,'',false) : false 나u머지는 : true

    return $stmt->rowCount() ? true : false;
  }
  //번호 일치 검사
  public function find_phone_exists_pw($tel, $user_id)
  {
    $sql = "select * from membership where tel=:tel and user_id = :user_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    // (0,null,'',false) : false 나u머지는 : true

    return $stmt->rowCount() ? true : false;
  }
  //이메일 패턴검사
  public function email_form_check($email)
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }
  //이메일 검사
  public function email_exists($email)
  {
    $sql = "select * from membership where email=:email";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    // (0,null,'',false) : false          나머지는 : true
    return $stmt->rowCount() ? true : false;
  }
  //데이터 입력
  public function input($arr)
  {
    // 단방향 암호화 처리 방법
    $pass_hash = password_hash($arr['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO membership(id,user_id,password,name,email,tel,zipcode,addr1,addr2,point,level,join_date)
    VALUES(:id,:user_id,:password,:name,:email,:tel,:zipcode,:addr1,:addr2,:point,:level,now())";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $arr['id']);
    $stmt->bindParam(':user_id', $arr['user_id']);
    $stmt->bindParam(':password', $pass_hash);
    $stmt->bindParam(':name', $arr['name']);
    $stmt->bindParam(':email', $arr['email']);
    $stmt->bindParam(':tel', $arr['tel']);
    $stmt->bindParam(':zipcode', $arr['zipcode']);
    $stmt->bindParam(':addr1', $arr['addr1']);
    $stmt->bindParam(':addr2', $arr['addr2']);
    $stmt->bindParam(':point', $arr['point']);
    $stmt->bindParam(':level', $arr['level']);
    $stmt->execute();
  }
  // 아이디와 패스워드 검사
  public function login($id, $pw)
  {
    $sql = "select * from membership where `user_id`=:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $info = $stmt->rowCount() ? true : false;
    if ($info == true) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if (password_verify($pw, $row['password'])) {

        return "login_success";
      } else {
        // 패스워드가 맞지 않는 경우
        return "pw_fail";
      }
    } else {
      // 아이디가 없는 경우
      return "id_fail";
    }
  }
  // 사용자 정보
  public function getInfo($id)
  {
    $sql = "select * from membership where `user_id`=:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetch();
  }
  // 사용자 수정
  public function edit($pass, $name, $email)
  {
    $sql = "UPDATE membership SET `password` = :password, `name` = :name, 
    `email` = :email ";

    $params = [
      ':password' => $pass,
      ':name' => $name,
      ':email' => $email,
    ];

    if ($pass != '') {
      $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
      $sql .= ", `password` = :password ";
      $params[':password'] = $pass_hash;
    }



    $stmt = $this->conn->prepare($sql);
    return $stmt->execute($params);
  }
  // 사용자 정보 전체 가져오기
  public function list($page, $limit, $paramArr)
  {
    $start = ($page - 1) * $limit;

    $where = "";
    if ($paramArr['sn'] != '' && $paramArr['sf'] != '') {
      switch ($paramArr['sn']) {
        case 1:
          $sn_str = 'name';
          break;
        case 2:
          $sn_str = 'id';
          break;
        case 3:
          $sn_str = 'email';
          break;
      }
      $where = " where {$sn_str} like '%{$paramArr['sf']}%' ";
    }

    $sql = "select idx, id, name, email, DATE_FORMAT(create_at, '%Y-%m-%d %H:%i') AS create_at from membership $where order by `idx` desc limit $start , $limit";
    $stmt = $this->conn->prepare($sql);
    // if ($where != '') {
    //   $stmt->bindParam(':sf', $paramArr['sf']);
    // }
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  //전체목록카운트(조건: 아이디, 이름, 이메일 목록)
  public function total($paramArr)
  {
    $where = "";
    if ($paramArr['sn'] != '' && $paramArr['sf'] != '') {
      switch ($paramArr['sn']) {
        case 1:
          $sn_str = 'name';
          break;
        case 2:
          $sn_str = 'id';
          break;
        case 3:
          $sn_str = 'email';
          break;
      }
      $where = "where $sn_str like '%{$paramArr['sf']}%'";
    }
    $sql = "select count(*) as cnt from membership " . $where;
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row['cnt'];
  }
  // 전체목록리스트 가져오기
  public function getAllData()
  {
    $sql = "select * from membership order by `idx` asc";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  // 회원맴버 삭제
  public function member_delete($user_id)
  {
    $sql = "delete from membership where user_id =:user_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    return $stmt->execute();
  }
  // 사용자 정보(idx를 통해서 가져옴)
  public function getInfoFromIdx($idx)
  {
    $sql = "select * from membership where `idx`=:idx";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':idx', $idx);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetch();
  }
  public function find_id($tel, $name)
  {
    $sql = "select user_id, join_date from membership where `tel`=:tel and `name`=:name";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':name', $name);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetch();
  }
  public function find_password($user_id, $password)
  {
    $sql = "update membership set password = :password where `user_id`=:user_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->execute();
  }
  public function find_email($email, $name)
  {
    $sql = "select user_id,join_date from membership where email=:email and name =:name";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name', $name);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetch();
  }
  public function find_password_email($password, $id)
  {
    $sql = "update membership set password = :password where `user_id`=:user_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':user_id', $id);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetch();
  }
}
