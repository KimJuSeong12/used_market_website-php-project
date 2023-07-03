<?php

class Write
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }
  public function update_point($user_id)
  {
    $sql = "update membership set point = 10 where user_id = :user_id ";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':user_id', $user_id);
    return $stmt->execute();
  }
  // 알바 게시물 정보 불러오기
  public function write_part_time($writer_id, $writer_address, $title, $hour_pay, $work_location, $work_day, $work_time, $content, $file_name, $file_type, $file_copied)
  {
    $sql = "insert into part_time ";
    $sql .= "values(null,:writer_id, :writer_address, :title, :hour_pay, :work_location, :work_day, :work_time, :content,0, ";
    $sql .= ":file_name, :file_type, :file_copied)";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':writer_id', $writer_id);
    $stmt->bindParam(':writer_address', $writer_address);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':hour_pay', $hour_pay);
    $stmt->bindParam(':work_location', $work_location);
    $stmt->bindParam(':work_day', $work_day);
    $stmt->bindParam(':work_time', $work_time);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':file_name', $file_name);
    $stmt->bindParam(':file_type', $file_type);
    $stmt->bindParam(':file_copied', $file_copied);

    return $stmt->execute();
  }

  public function write_estate(
    $writer_id,
    $writer_address,
    $title,
    $seller,
    $building_type,
    $price,
    $area,
    $room_count,
    $bathroom_count,
    $floor,
    $loan,
    $moving_day,
    $pet,
    $parking,
    $elevator,
    $content,
    $file_name,
    $file_type,
    $file_copied
  ) {
    $sql = "insert into estate ";
    $sql .= "values(null,:writer_id, :writer_address, :title, :seller, :building_type, :price, :area, :room_count, :bathroom_count, 
    :floor, :loan, :moving_day, :pet, :parking, :elevator, :content,0,  ";
    $sql .= ":file_name, :file_type, :file_copied)";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':writer_id', $writer_id);
    $stmt->bindParam(':writer_address', $writer_address);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':seller', $seller);
    $stmt->bindParam(':building_type', $building_type);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':area', $area);
    $stmt->bindParam(':room_count', $room_count);
    $stmt->bindParam(':bathroom_count', $bathroom_count);
    $stmt->bindParam(':floor', $floor);
    $stmt->bindParam(':loan', $loan);
    $stmt->bindParam(':moving_day', $moving_day);
    $stmt->bindParam(':pet', $pet);
    $stmt->bindParam(':parking', $parking);
    $stmt->bindParam(':elevator', $elevator);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':file_name', $file_name);
    $stmt->bindParam(':file_type', $file_type);
    $stmt->bindParam(':file_copied', $file_copied);

    return $stmt->execute();
  }
  public function write_car(
    $writer_id,
    $writer_address,
    $title,
    $price,
    $year,
    $km,
    $ex_price,
    $reducing_price,
    $car_type,
    $regist_day,
    $displacement,
    $fuel,
    $transmission,
    $insurance_history,
    $special_used,
    $owner_change_history,
    $content,
    $file_name,
    $file_type,
    $file_copied
  ) {
    $sql = "insert into car ";
    $sql .= "values(null,:writer_id, :writer_address, :title, :price, :year, :km, :ex_price, :reducing_price ,:car_type, 
    :regist_day, :displacement, :fuel, :transmission, :insurance_history, :special_used, :owner_change_history, :content,0,  ";
    $sql .= ":file_name, :file_type, :file_copied)";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':writer_id', $writer_id);
    $stmt->bindParam(':writer_address', $writer_address);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':km', $km);
    $stmt->bindParam(':ex_price', $ex_price);
    $stmt->bindParam(':reducing_price', $reducing_price);
    $stmt->bindParam(':car_type', $car_type);
    $stmt->bindParam(':regist_day', $regist_day);
    $stmt->bindParam(':displacement', $displacement);
    $stmt->bindParam(':fuel', $fuel);
    $stmt->bindParam(':transmission', $transmission);
    $stmt->bindParam(':insurance_history', $insurance_history);
    $stmt->bindParam(':special_used', $special_used);
    $stmt->bindParam(':owner_change_history', $owner_change_history);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':file_name', $file_name);
    $stmt->bindParam(':file_type', $file_type);
    $stmt->bindParam(':file_copied', $file_copied);

    return $stmt->execute();
  }
  // 공지사항 게시물 쓰기
  public function write_notice($writer_id, $title, $content, $file_name, $file_type, $file_copied)
  {
    $sql = "insert into notice ";
    $sql .= "values(null,:writer_id, :title, :content, 0, ";
    $sql .= ":file_name, :file_type, :file_copied)";
    $stmt = $this->conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':writer_id', $writer_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':file_name', $file_name);
    $stmt->bindParam(':file_type', $file_type);
    $stmt->bindParam(':file_copied', $file_copied);

    return $stmt->execute();
  }
}
