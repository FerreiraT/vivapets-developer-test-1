<template>
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <form class="row">
                    <div class="col-12 mb-3">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="inputAge" class="form-label">Age</label>
                        <input type="number" class="form-control" id="inputAge" min="0">
                    </div>

                    <div class="col-md-8">
                        <label for="inputBreed" class="form-label">Breed</label>
                        <select class="form-select mb-3"  id="inputBreed">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="formFile" class="form-label">Photo</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data: function() {
            return {
                breeds: [],
                dog: []
            }
        },

        mounted() {
            this.loadBreeds();
            this.loadDog();
            console.log('Dog Form Component mounted.')
        },

        methods: {
            loadBreeds: function() {
                axios.get('/api/v1/admin/breeds')
                .then((response) => {
                    console.log(response.data);
                    this.breeds = response.data.data;
                })
                .catch( function(error) {
                    console.error(error);
                });
            },

            loadDog: function() {
                axios.get('/api/v1/dog/edit')
                .then((response) => {
                    console.log(response.data);
                    this.dog = response.data.data;
                })
                .catch( function(error) {
                    console.error(error);
                });
            }
        }
    }
</script>