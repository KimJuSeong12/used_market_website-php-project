<?php

class Wish
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }
  // 알바 게시물 정보 불러오기
  public function wish_push($wished_id, $wished_num, $board_name)
  {
    $sql = "insert into wish values(null, :wished_id, :wished_num, :board_name)";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':wished_id', $wished_id);
    $stmt->bindParam(':wished_num', $wished_num);
    $stmt->bindParam(':board_name', $board_name);

    return $stmt->execute();
  }
  // 알바 게시물 정보 불러오기
  public function wish_delete($wished_id, $wished_num, $board_name)
  {
    $sql = "delete from wish where wished_id = :wished_id and wished_num = :wished_num and board_name = :board_name";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':wished_id', $wished_id);
    $stmt->bindParam(':wished_num', $wished_num);
    $stmt->bindParam(':board_name', $board_name);

    return $stmt->execute();
  }
  public function wish_personal_get_wished($userid, $board_name, $num)
  {
    $sql = "select * from wish where wished_id = :userid and board_name = :board_name and wished_num = :num";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':userid', $userid);
    $stmt->bindParam(':board_name', $board_name);
    $stmt->bindParam(':num', $num);
    $stmt->execute();
    return $stmt->rowCount();
  }
  public function wish_personal_get_list_count($userid)
  {
    $sql = "select * from wish where wished_id = :userid";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':userid', $userid);
    $stmt->execute();
    return $stmt->rowCount();
  }
  public function wish_personal_get_list($userid)
  {
    $sql = "select * from wish where wished_id = :userid";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':userid', $userid);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function wish_get_list($board_name, $num)
  {
    $sql = "select * from $board_name where num = :num";
    $stmt = $this->conn->prepare($sql);
    // $stmt->bindParam(':board_name', $board_name);
    $stmt->bindParam(':num', $num);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetch();
  }
  // 조회수 변경
  public function update_hit($board_name, $new_hit, $num)
  {
    $sql = "update $board_name set hit=:new_hit where num=:num";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':new_hit', $new_hit);
    $stmt->bindParam(':num', $num);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetch();
  }
  // 조회수 변경
  public function select_high_hits($board_name)
  {
    $sql = "select * from $board_name order by hit desc limit 4";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
