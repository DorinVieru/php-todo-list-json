<?php
    // RECUPERO IL CONTENUTO DEL FILE todo-list.json, SARA' UNA STRINGA
    $todo_list = file_get_contents('todo-list.json');

    // DECODIFICO LA STRINGA E LA TRASFORMO IN ARRAY ASSOCIATIVO
    $list = json_decode($todo_list, true);

    // VERIFICO SE HO INVIATO TRAMITE CHIAMATA POST L'ELELMENTO NUOVO DA SALVARE NELLA LISTA
    if(isset($_POST['item'])){
        $todoItem = $_POST['item'];

        // AGGIUNGO L'ELEMENTO ALLA LISTA
        $todo = [
            "text" => $todoItem,
            "done" => false,
        ];
        $list[] = $todo;

        file_put_contents('todo-list.json', json_encode($list)); // SALVO IL NUOVO CONTENUTO NEL FILE todo-list.json
    }

    // VERIFICO PER IL CAMBIO DELLO STATO DONE
    if (isset($_POST['indexItem'])) {
        $index = $_POST['indexItem'];

        if($list[$index]['done'] == true){
            $list[$index]['done'] = false;
        }
        else{
            $list[$index]['done'] = true;
        }

        file_put_contents('todo-list.json', json_encode($list));  // SALVO IL NUOVO CONTENUTO NEL FILE todo-list.json
    }

    // AGGIUNGO ALL'HEADER DELLA RISPOSTA CHE STO PASSANDO UN DATO JSON
    header('Content-type: application/json');

    // INVIO L'INFORMAZIONE IN FOMRATO JSON
    echo json_encode($list);
?>