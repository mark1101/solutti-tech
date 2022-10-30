<template>
    <div>
        <div class="col-sm-12">
            <h2>Cadastro de Loja</h2>
        </div>
        <form @submit.prevent="submit">
            <div class="alert alert-success" v-show="success">Loja Criada com Sucesso!</div>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" v-model="fields.nome">
                <div class="alert alert-danger" v-if="errors && errors.nome">
                    {{ errors.nome[0] }}
                </div>
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input class="form-control" type="email" v-model="fields.email" />
                <div class="alert alert-danger" v-if="errors && errors.email">
                    {{ errors.email[0] }}
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
    name: 'create-loja',

    data() {
        return {
            fields: {
            },
            success: false,
            errors: {}
        }
    },

    mounted() {

    },

    methods: {
        submit() {
            var parsedobj = JSON.parse(JSON.stringify(this.fields));
            axios.post('/api/lojas', parsedobj).then(response => {
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

