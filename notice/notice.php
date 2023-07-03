<?php

class Notice
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  //유무 검사
  public function search_exists_notice($search)
  {
    $search_flag = "%$search%";
    $sql = "select * from notice where content or title like :search";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':search', $search_flag);
    $stmt->execute();
    return $stmt->rowCount() ? true : false;
  }
  // notice 검색 게시물 정보 불러오기
  public function search_info_notice($search)
  {
    $search_flag = "%$search%";
    $sql = "select * from notice where content or title like :search";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':search', $search_flag);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function notice_detail_info($num)
  {
    $sql = "select * from notice where num = :num";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':num', $num);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetch();
  }
}
