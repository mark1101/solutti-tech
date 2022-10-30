<template>
    <div>
        <form @submit.prevent="submit">
            <div class="alert alert-success" v-show="success">Produto Criado com Sucesso!</div>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" v-model="fields.nome">
                <div class="alert alert-danger" v-if="errors && errors.nome">
                    {{ errors.nome[0] }}
                </div>
            </div>
            <div class="form-group">
                <label>Valor do Produto</label>
                <input class="form-control" rows="3" v-model="fields.valor" />
                <div class="alert alert-danger" v-if="errors && errors.valor">
                    {{ errors.valor[0] }}
                </div>
            </div>
            <div class="form-group">
                <label>Loja</label>
                <select class="form-control" v-model="fields.loja_id">
                    <option v-for="loja in lojas" :key="loja.id" :value="loja.id">{{ loja.nome }}</option>
                </select>
                <div class="alert alert-danger" v-if="errors && errors.loja_id">
                    {{ errors.loja_id[0] }}
                </div>
            </div>
            <div class="form_group">
                <br>
                <p>OBS: Produto será cadastrado inicialmente como ativo</p>
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
            lojas: [],
            fields: {
            },
            success: false,
            errors: {}
        }
    },

    mounted() {
        axios.get('/api/lojas').then(response => {
            this.lojas = response.data;
        });
    },

    methods: {
        submit() {
            var parsedobj = JSON.parse(JSON.stringify(this.fields));
            axios.post('/api/produtos', parsedobj).then(response => {
                this.fields = {};
                this.success = true;
                this.errors = {};
            }).catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data;
                }
            })
        }
    },
})
</script>

