<?php

class ReservationController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      if(array_key_exists('role', $_SESSION) && $_SESSION['role'] === "user") {
      $http->redirectTo('/user/login');
        exit();
      }

      $reservationModel = new ReservationModel();

      $reservations = $reservationModel-> showReservation();

      // var_dump($reservations);

      return [
        'reservations'=>$reservations
      ];



    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */

       var_dump($_POST);
       var_dump($_SESSION['id']);

       $userId = $_SESSION['id'];

       $reservation = new ReservationModel();

       $reservation->saveReservation($_POST);

       $http->redirectTo('/');

    }
}
