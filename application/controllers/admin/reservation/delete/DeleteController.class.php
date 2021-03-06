<?php

class DeleteController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      if(array_key_exists('role', $_SESSION) && $_SESSION['role'] === "user") {
      $http->redirectTo('/user/login');
        exit();
      }

      $id = $_GET['id'];

      $reservationModel = new ReservationModel();

      $reservationModel->deleteReservation($id);

      $http->redirectTo('/admin/reservation');

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */


    }
}
