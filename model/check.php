<?php
class check {
  public static $instance;
  public static function getInstance () {
    return check::$instance = new check();
  }
  private function __construct () {

  }
  public function select ($id) {
      $conn = db::connection();
      $row = mysqli_query($conn, "select *from detail where id=$id");
      if(mysqli_num_rows($row) > 0) {
        while($rows = mysqli_fetch_assoc($row)) {
          $list['id'] = $rows['id'];
          $list['first_name'] = $rows['first_name'];
          $list['last_name'] = $rows['last_name'];
          $list['date_of_birth'] = $rows['date_of_birth'];
          $list['details_of_graduation'] = $rows['details_of_graduation'];
          $list['blood_group'] = $rows['blood_group'];
          $list['gender'] = $rows['gender'];
          $list['profile_picture'] = $rows['profile_picture'];
          $list['rights'] = $rows['rights'];
        }
      }
      db::close($conn);
      return $list;
  }
 public function selectEmail ($id) {
  $list = [];
  $conn = db::connection();
  $row = mysqli_query($conn,"select email_id from email where user_id=$id");
  if(mysqli_num_rows($row) > 0) {
    while($rows = mysqli_fetch_assoc($row)) {
        array_push($list, $rows['email_id']);
    }
  }
  $list= implode(",",$list);
  db::close($conn);
  return $list;
}
public function selectMobile ($id) {
  $list = [];
  $conn = db::connection();
  $row = mysqli_query($conn,"select mobile_no from mobile where user_id=$id");
  if(mysqli_num_rows($row) > 0) {
    while($rows = mysqli_fetch_assoc($row)) {
        array_push($list, $rows['mobile_no']);
    }
  }
  $list= implode(",",$list);
  db::close($conn);
  return $list;
}
public function selectAreaOfInterest ($id) {
  $list = [];
  $conn = db::connection();
  $row = mysqli_query($conn,"select area_of_interest from area_of_interest where user_id=$id");
  if(mysqli_num_rows($row) > 0) {
    while($rows = mysqli_fetch_assoc($row)) {
        array_push($list, $rows['area_of_interest']);
    }
  }
  $list= implode(",",$list);
  db::close($conn);
  return $list;
}
 public function selectNamePassword ($name,$password) {
   $list = [];
   $conn = db::connection();
   $row = mysqli_query($conn,"select * from detail where first_name='$name'");
   if(mysqli_num_rows($row) > 0) {
     while($rows = mysqli_fetch_assoc($row)) {
       $list['id'] = $rows['id'];
       $list['first_name'] = $rows['first_name'];
       $list['last_name'] = $rows['last_name'];
       $list['date_of_birth'] = $rows['date_of_birth'];
       $list['details_of_graduation'] = $rows['details_of_graduation'];
       $list['blood_group'] = $rows['blood_group'];
       $list['gender'] = $rows['gender'];
       $list['profile_picture'] = $rows['profile_picture'];
       $list['password'] = $rows['password'];
       $list['rights'] = $rows['rights'];
       if(password_verify($password, $list['password'])) {
         return $list;
       }
     }
   }
   db::close($conn);
 }
}

$check = check::getInstance();
 ?>
