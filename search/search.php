<?php

class Search{
    private $conn;

    public function __construct($db)
    {
      $this->conn = $db;
    }

    //유무 검사
  public function search_exists_car($search)
  {
    $search_flag = "%$search%";
    $sql = "select * from car where content or title like :search";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':search', $search_flag);
    $stmt->execute();
    return $stmt->rowCount() ? true : false;
  }
    // car 검색 게시물 정보 불러오기
    public function search_info_car($search)
  {
    $search_flag = "%$search%";
    $sql = "select * from car where content or title like :search";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':search', $search_flag);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function search_exists_estate($search)
  {
    $search_flag = "%$search%";
    $sql = "select * from estate where content or title like :search";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':search', $search_flag);
    $stmt->execute();
    return $stmt->rowCount() ? true : false;
  }
  // estate 검색 게시물 정보 불러오기
  public function search_info_estate($search)
  {
    $search_flag = "%$search%";
    $sql = "select * from estate where content or title like :search";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':search', $search_flag);

    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function search_exists_part_time($search)
  {
    $search_flag = "%$search%";
    $sql = "select * from part_time where content or title like :search";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':search', $search_flag);
    $stmt->execute();
    return $stmt->rowCount() ? true : false;
  }
  // part_time 검색 게시물 정보 불러오기
  public function search_info_part_time($search)
  {
    $search_flag = "%$search%";
    $sql = "select * from part_time where content or title like :search";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':search', $search_flag);

    $stmt->execute();
    return $stmt->fetchAll();
  }
}

?>