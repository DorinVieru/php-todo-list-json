// DICHIARO VARIABILE DEL METODO createApp
const { createApp } = Vue;

// INIZIALIZZAZIONE createApp E CREAZIONE ISTANZA DELL'APPLICAZIONE VUE
createApp({
    // DEFINISCO IL METODO data () NEL QUALE INSERIRO' UN RETURN
    data() {
        return {
            apiUrl: 'server.php',
            todoItem: '',
            todoList: [],
        }
    }, // Chiusura data

    mounted() {
        this.getTodoList();
    }, // Chiusura mounted

    // DEFINISCO IL METODO methods {} NEL QUALE INSERIRO' LE FUNZIONI
    methods: {
        // FUNZIONE PER AGGIUNGERE UNA TASK
        updateTodoList() {
            const data = {
                item: this.todoItem,
            }
            
            axios.post(this.apiUrl, data, {
                headers: { 'Content-type': 'multipart/form-data' }
            }).then((response) => {
                this.todoItem = '';
                
                this.todoList = response.data;
            })
        },

        // FUNZIONE PER "PRENDERE" I VALORI DELLA TODO LIST DALL'API
        getTodoList() {
            axios.get(this.apiUrl).then((response) => {
                this.todoList = response.data;
            })
        },

        // FUNZIONE PER SEGNARE LA TASK COME COMPLETATA
        toggleDone(index) {
            const data = {
                indexItem: index
            }

            axios.post(this.apiUrl, data, {
                headers: { 'Content-type': 'multipart/form-data' }
            }).then((response) => {
                this.todoList = response.data;
            })
        },

        // FUNZIONE PER ELIMINARE LA TASK
        deleteTodo(index){
            const data = {
                indexItemDelete: index
            }

            axios.post(this.apiUrl, data, {
                headers: { 'Content-type': 'multipart/form-data' }
            }).then((response) => {
                this.todoList = response.data;
            })
        }
    }, // Chiusura methods

    // CHIUSURA createApp CON .mount("ID")
}).mount('#app');