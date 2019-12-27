<?php

class LoginController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    /*
    * Méthode appelée en cas de requête HTTP GET
    *
    * L'argument $http est un objet permettant de faire des redirections etc.
    * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    */

    $error = null;
    return ['error'=> $error];

  }


  public function httpPostMethod(Http $http, array $formFields)
  {

    $user = new UserModel();
    $error = $user->connectUser($_POST);

    // var_dump($_POST);

    // code...
    if (array_key_exists('role', $_SESSION)== false) {
      return ['error'=> $error];
    } else {

      $http->redirectTo('/');
    }




  }
}
