<?php

class Estate
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }
  // 알바 게시물 정보 불러오기
  public function estate_info()
  {
    $sql = "select * from estate";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function estate_detail_info($num)
  {
    $sql = "select * from estate where num = :num";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':num', $num);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetch();
  }
  public function estate_delete($num)
  {
    $sql = "delete from estate where num = :num";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':num', $num);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->execute();
  }
}
