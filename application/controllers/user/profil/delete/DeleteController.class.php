<?php

class DeleteController
{

  public function httpGetMethod(Http $http, array $queryFields)
  {
    /*
    * Méthode appelée en cas de requête HTTP GET
    *
    * L'argument $http est un objet permettant de faire des redirections etc.
    * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    */
    if(empty($_SESSION) == true) {
      $http->redirectTo('/');
    }

    $id = $_GET['id'];

    $reservationModel = new ReservationModel();

    $reservationModel->deleteReservation($id);

    $http->redirectTo('/user/profil');


  }


  public function httpPostMethod(Http $http, array $formFields)
  {

  }
}
