<template>
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-7">
            <div class="list-group">
                <router-link class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true" v-for="user in users"  :to="{ name: 'listUserDogs', params: { id: user.id}}">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ user.name }}</h6>
                            <p class="mb-0 opacity-75">{{ user.email }}</p>
                        </div>
                        
                        <div class="btn-group">
                            <button @click="banUser(user.id)" type="button" class="btn btn-sm btn-outline-danger">Block User</button>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                users: []
            }
        },

        mounted() {
            this.loadUsers();
            console.log('Users Component mounted.')
        },

        methods: {
            loadUsers: function() {
                axios.get('/api/v1/admin/users')
                .then((response) => {
                    this.users = response.data.data;

                    console.log(response);
                })
                .catch(function (error) {
                    console.error(error);
                });
            },

            banUser: function(id) {
                axios.post('api/v1/admin/users/block/'+id)
                .then((response) => {

                })
                .catch(function(error) {
                    console.error(error);
                });
            }
        }
    }
</script>