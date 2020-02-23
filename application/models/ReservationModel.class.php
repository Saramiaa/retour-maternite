<?php

class ReservationModel {

  public function saveReservation($post) {

    $database = new Database();

    $userId = $_SESSION['id'];

    $sql = "INSERT INTO `reservation` (Day, Hour, User_Id) VALUES ( ?, ?, $userId )";

    $database->executeSql($sql,[

      $post['day'],
      strval($post['hour']),

    ]);  }

    public function showReservation() {
      $database = new Database();

      $sql = 'SELECT * FROM `reservation`
      INNER JOIN users ON users.Id = reservation.User_Id';

      return $database->query($sql, []);
    }


    public function deleteReservation($id) {

      $database = new Database();

      $sql = 'DELETE FROM reservation WHERE Id=?';

      $database->executeSql($sql, [ $id ]);

    }

    public function getReservationByUser($userId) {
      $database = new Database();
      $sql = "SELECT * FROM reservation WHERE User_Id=?";
      return $database->query($sql, [ $userId ]);
    }


  }
  ?>
