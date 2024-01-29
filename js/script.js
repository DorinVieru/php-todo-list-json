// DICHIARO VARIABILE DEL METODO createApp
const { createApp } = Vue;

// INIZIALIZZAZIONE createApp E CREAZIONE ISTANZA DELL'APPLICAZIONE VUE
createApp({
    // DEFINISCO IL METODO data () NEL QUALE INSERIRO' UN RETURN
    data() {
        return {
            apiUrl: 'server.php',
            todoList: [],
        }
    }, // Chiusura data

    mounted() {
        this.getTodoList();
    }, // Chiusura mounted

    // DEFINISCO IL METODO methods {} NEL QUALE INSERIRO' LE FUNZIONI
    methods: {
        getTodoList() {
            axios.get(this.apiUrl).then((response) => {
                this.todoList = response.data;
            })
        }
    }, // Chiusura methods

    // CHIUSURA createApp CON .mount("ID")
}).mount('#app');