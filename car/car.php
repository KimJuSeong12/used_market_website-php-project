<?php

class Car
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }
  // 알바 게시물 정보 불러오기
  public function car_info()
  {
    $sql = "select * from car";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function car_detail_info($num)
  {
    $sql = "select * from car where num = :num";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':num', $num);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetch();
  }
  public function car_delete($num)
  {
    $sql = "delete from car where num = :num";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':num', $num);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->execute();
  }
}
