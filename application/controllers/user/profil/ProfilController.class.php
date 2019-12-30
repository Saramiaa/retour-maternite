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
    $user = $userModel->getOneUser($_SESSION['id']);

    return [
      "user"=>$user
    ];
  }


  public function httpPostMethod(Http $http, array $formFields)
  {
    $user = new UserModel();

    $user->changeUserProfil($_POST, $_SESSION['id']);

    // $http->redirectTo('/user/profil');
    var_dump($_POST);

  }
}
