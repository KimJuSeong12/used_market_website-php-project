<?php

class Part_time
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }
  // 알바 게시물 정보 불러오기
  public function part_time_info()
  {
    $sql = "select * from part_time";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function part_time_detail_info($num)
  {
    $sql = "select * from part_time where num = :num";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':num', $num);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetch();
  }
  public function part_time_delete($num)
  {
    $sql = "delete from part_time where num = :num";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':num', $num);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->execute();
  }
}
