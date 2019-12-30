<?php

class AgendaModel {

  public function insert($post) {

    $database = new Database();

    $sql = "
     INSERT INTO events
     (title, start_event, end_event)
     VALUES (:title, :start_event, :end_event)
     ";

     $value = array(
        ':title'  => $post['title'],
        ':start_event' => $post['start'],
        ':end_event' => $post['end']
       )
       $database->executSql($sql, $value );


  }

  }
?>
