<?php

class AdminController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      if(array_key_exists('role', $_SESSION) && $_SESSION['role'] === "user") {
      $http->redirectTo('/user/login');
        exit();
      }

      $userModel = new UserModel();

      $users = $userModel->getAllUsers();

<<<<<<< HEAD
      // var_dump($users);
=======
      var_dump($users);
>>>>>>> cd9907ce01b9cc906351658d214842debc1e9d66

    return [
      // for each pour Affichage
      'users'=>$users
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


    }
}
