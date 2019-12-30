<?php

class InsertController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {


    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */

       $agendaModel = new AgendaModel();
       $agendaModel->insert($_POST);
       $response = [
                      'response'=> "ok pour enregistrement",
                      'post'=>$_POST
                    ];
       echo json_encode($response);
       exit();
    }
}
