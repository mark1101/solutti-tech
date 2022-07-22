<template>
    <div>
        <form @submit.prevent="submit">
        <div class="alert alert-success" v-show="success">Produto Criado com Sucesso!</div>
            <div class="form-group">
                <label >Nome</label>
                <input type="text" class="form-control" v-model="fields.name">
            <div class="alert alert-danger" v-if="errors && errors.name">
                {{ errors.name[0] }}
            </div>
            </div>
            <div class="form-group">
                <label>Descrição do Produto</label>
                <textarea class="form-control" rows="3" v-model="fields.description"></textarea>
                <div class="alert alert-danger" v-if="errors && errors.description">
                {{ errors.description[0] }}
            </div>
            </div>
            <div class="form-group">
                <label>Marca</label>
                <select class="form-control" v-model="fields.brand_id">
                    <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{ brand.name }}</option>
                </select>
                <div class="alert alert-danger" v-if="errors && errors.brand_id">
                {{ errors.brand_id[0] }}
            </div>
            </div>
            <div class="form-group">
                <label>Voltagem</label>
                <select class="form-control" v-model="fields.tension">
                    <option value="110v">110v</option>
                    <option value="220v">220v</option>
                </select>
                <div class="alert alert-danger" v-if="errors && errors.tension">
                {{ errors.tension[0] }}
            </div>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
</template>

<script>

export default ({
    name: 'product-create',

    data() {
        return {
            brands: [],
            fields: {
            },
            success: false,
            errors: {}
        }
    },

    mounted() {
        axios.get('/api/brands').then(response => {
            this.brands = response.data.data;
        });
    },

    methods: {
        submit() {
            var parsedobj = JSON.parse(JSON.stringify(this.fields));
            axios.post('/api/products', parsedobj).then(response => {
                this.fields = {};
                this.success = true;
                this.errors = {};
            }).catch(error => {
                if(error.response.status == 422){
                    this.errors = error.response.data;
                }
            })
        }
    },
})
</script>

