<?php

class ReservationModel {

  public function saveReservation($post) {

    $database = new Database();

    $userId = $_SESSION['id'];

  	$sql = "INSERT INTO `reservation` (Day, Hour, Location, City, User_Id) VALUES ( ?, ?, ?, ?, $userId )";

    $database->executeSql($sql,[

      $post['day'],
      strval($post['hour']),
      $post['adress'],
      $post['city'],

    ]);  }

  }
?>
