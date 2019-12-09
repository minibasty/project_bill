var app = new Vue({
    el: '#vue',
    data: {
        errorMsg: "",
        users: []
    },
    mounted: function() {
        this.getAllUsers();
    },
    methods: {
        getAllUsers() {
            axios.get("http://localhost/project_bill/invoice/invoice_list.php").then(function(response) {
                if (response.data.error) {
                    app.errorMsg = response.data.message;


                } else {
                    app.users = response.data.users;
                }
                console.log('ทดสอบ')
            });
        }
    }
});