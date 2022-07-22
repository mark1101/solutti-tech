<template>
    <div>
        <h3 class="text-center">Editar Produto</h3>
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="updateProduct">
                    <div class="alert alert-success" v-show="success">Produto Editado com Sucesso!</div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="product.name">
                        <div class="alert alert-danger" v-if="errors && errors.name">
                            {{ errors.name[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descrição do Produto</label>
                        <textarea class="form-control" rows="3" v-model="product.description"></textarea>
                        <div class="alert alert-danger" v-if="errors && errors.description">
                            {{ errors.description[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Marca</label>
                        <select class="form-control" v-model="product.brand_id">
                            <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{ brand.name }}</option>
                        </select>
                        <div class="alert alert-danger" v-if="errors && errors.brand_id">
                            {{ errors.brand_id[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Voltagem</label>
                        <select class="form-control" v-model="product.tension">
                            <option value="110v">110v</option>
                            <option value="220v">220v</option>
                        </select>
                        <div class="alert alert-danger" v-if="errors && errors.tension">
                            {{ errors.tension[0] }}
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            brands: [],
            product: {},
            success: false,
            errors: {}
        }
    },
    created() {
        axios.get('/api/brands').then(response => {
            this.brands = response.data.data;
        });
        axios
            .get(`/api/products/${this.$route.params.id}`)
            .then((response) => {
                this.product = response.data;
            });
    },
    methods: {
        updateProduct() {
            axios
                .put(`/api/products/${this.$route.params.id}`, this.product)
                .then((response) => {
                    this.success = true;
                    this.errors = {};
                    this.$router.push({ name: 'home' });
                }).catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        }
    }
}
</script>
