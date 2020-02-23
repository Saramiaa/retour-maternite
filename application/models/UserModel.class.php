<?php

class UserModel {

  public function addUser($post) {

    $database = new Database();

    $user = $database -> queryOne('SELECT Id FROM users WHERE Email =?', [$post['email'] ]);

    $hashPassword = $this->hashPassword($post['password']);

    if($user !== false) {
      var_dump('Mail déjà existant !');
    } else {

      $sql = 'INSERT INTO
      users(FirstName, LastName, Birthday, Email, Phone, Password, Adress, City, Zip, Country, Role, CreationTimeStamp)
      VALUES
      (?, ?, ?, ?, ?, ?, ?,?, ?, ?, "user", NOW() )';

      $database->executeSql($sql,
      [
        ucfirst($post['firstname']),
        ucfirst($post['lastname']),
        $post['birthday'],
        $post['email'],
        intval($post['phone']),
        $hashPassword,
        $post['adress'],
        $post['city'],
        intval($post['zip']),
        $post['country'],

      ]); }
    }

    private function hashPassword($password)
    {

      $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

      return crypt($password, $salt);
    }

    private function verifyPassword($password, $hashedPassword)
    {
      return crypt($password, $hashedPassword) == $hashedPassword;
    }

    public function connectUser($post) {
      $database = new Database();

      $user = $database->queryOne('SELECT * FROM users WHERE Email =?', [ $post['email'] ]);

      if ($user == false) {
        return "Adresse E-mail inconnue. Veuillez vous enregistrer";
      }

      // var_dump($user);

      if( $user !== false && $this->verifyPassword($post['password'], $user['Password']) == true ) {
        $_SESSION['id'] = $user['Id'];
        $_SESSION['email'] = $user['Email'];
        $_SESSION['firstName'] = $user['FirstName'];
        $_SESSION['lastName'] = $user['LastName'];
        $_SESSION['adress'] = $user['Adress'];
        $_SESSION['city'] = $user['City'];
        $_SESSION['zip'] = $user['Zip'];
        $_SESSION['role'] = $user['Role'];

        return null;

      } else {

        return "Mot de passe incorrect";
      }
    }

    public function getAllUsers() {
      $database = new Database();

      $sql = 'SELECT
      *
      FROM users';

      return $database->query($sql, []);
    }

    public function changeUserProfil($post, $id) {
      $database = new Database();
      $sql = 'UPDATE users SET FirstName=?, LastName=?, Email=?, Adress=?, City=?, Zip=? WHERE Id=?';

      $database->executeSql($sql,
      [
        $post['firstname'],
        $post['lastname'],
        $post['email'],
        $post['address'],
        $post['city'],
        $post['zip'],
        $id
      ]);
    }

    public function getOneUser($id) {
      $database = new Database();
      $sql = 'SELECT * FROM users WHERE Id = ?';

      return $database->queryOne($sql, [$id]);
    }


  }

  ?>
