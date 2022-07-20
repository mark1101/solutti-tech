<template>
    <div>
        <form>
            <div class="form-group">
                <label >Nome</label>
                <input type="text" class="form-control" v-model="fields.name">
            </div>
            <div class="form-group">
                <label>Descrição do Produto</label>
                <textarea class="form-control" rows="3" v-model="fields.description"></textarea>
            </div>
            <div class="form-group">
                <label>Marca</label>
                <select class="form-control" v-model="fields.brand">
                    <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{ brand.name }}</option>
                </select>
            </div>
            <div class="form-group">
                <label>Voltagem</label>
                <select class="form-control" v-model="fields.tension">
                    <option value="110v">110v</option>
                    <option value="220v">220v</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <button @click="submit" type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
</template>

<script>

export default ({
    name: 'product-create',

    data() {
        return {
            brands: null,
            fields: {

            }
        }
    },

    mounted() {
        axios.get('/api/brands').then(response => {
            this.brands = response.data.data;
        });
    },

    methods: {
        submit() {
            axios.post('/api/products', this.fields).then(response => {
                this.fields = {};
            }).catch(error => {
                console.log('error');
            })
        }
    },
})
</script>

