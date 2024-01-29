<?php
    // RECUPERO IL CONTENUTO DEL FILE todo-list.json, SARA' UNA STRINGA
    $todo_list = file_get_contents('todo-list.json');

    // AGGIUNGO ALL'HEADER DELLA RISPOSTA CHE STO PASSANDO UN DATO JSON
    header('Content-type: application/json');

    // INVIO L'INFORMAZIONE IN FOMRATO JSON
    echo $todo_list;
?>