<?php

class ProfilController
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


    $userModel = new UserModel();
    $reservationModel = new ReservationModel();
    // $id = $_GET['Id'];

    $user = $userModel->getOneUser($_SESSION['id']);
    $reservation = $reservationModel-> getReservationByUser($_SESSION['id']);

    // $reservationModel->deleteReservation($id);

    // var_dump($reservation);

    return [
      "user"=>$user,
      "reservation"=>$reservation
    ];
  }


  public function httpPostMethod(Http $http, array $formFields)
  {
    $user = new UserModel();

    $user->changeUserProfil($_POST, $_SESSION['id']);

    $http->redirectTo('/user/profil');
    var_dump($_POST);

  }
}
