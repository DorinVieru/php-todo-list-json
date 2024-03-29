<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!-- Collegamento a font awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> <!-- Collegamento a bootstrap -->
    <link rel="stylesheet" href="./css/style.css"> <!-- Collegamento al file css -->
    <title>PHP ToDo List JSON</title>
</head>

<body>
    <!-- CONTENITORE #APP -->
    <div id="app">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="text-primary text-center">PHP ToDo List JSON</h1>
                </div>
                <!-- CORPO DELLA LISTA -->
                <div class="col-8 pt-5">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between" v-for="(todo, index) in todoList" :key="index">
                            <div @click="toggleDone(index)" class="cursor" :class="todoList[index].done ? 'text-decoration-line-through' : ''">
                                <span>{{ todo.text }}</span>
                            </div>
                            <!-- BOTTONI -->
                            <div class="buttons">
                                <!-- BOTTONE CHECK -->
                                <button class="btn btn-sm btn-square mx-1" :class="todo.done ? 'btn-dark' : 'btn-primary'" @click="toggleDone(index)">
                                    <i class="fas" :class="todo.done ? 'fa-times' : 'fa-check'">
                                    </i>
                                </button>
                                <!-- BOTTONE CANCELLA -->
                                <button class="btn btn-sm btn-square btn-danger mx-1" @click="deleteTodo(index)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-12 pt-4">
                    <div class="row justify-content-center">
                        <div class="col-3"></div>
                        <div class="col-6 d-flex justify-content-center">
                            <div class="col-6">
                                <input type="text" @keyup.enter="updateTodoList" v-model="todoItem" class="form-control" placeholder="Inserisci elemento">
                            </div>
                            <div class="col-4 ms-3">
                                <button type="button" @click="updateTodoList" class="btn btn-success">Aggiungi alla Lista</button>
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js" integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> <!-- Collegamento ad axios -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> <!-- Collegamento a vuejs -->
    <script type="text/javascript" src="./js/script.js"></script> <!-- Collegamento al file js -->
</body>

</html>