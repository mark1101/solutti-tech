<template>
    <div>
        <h3 class="text-center">Editar Produto</h3>
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="updateProduct">
                    <div class="alert alert-success" v-show="success">Produto Editado com Sucesso!</div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="produto.nome">
                        <div class="alert alert-danger" v-if="errors && errors.nome">
                            {{ errors.nome[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descrição do Produto</label>
                        <input class="form-control" rows="3" v-model="produto.valor" />
                        <div class="alert alert-danger" v-if="errors && errors.valor">
                            {{ errors.valor[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Loja</label>
                        <select class="form-control" v-model="produto.loja_id">
                            <option v-for="loja in lojas" :key="loja.id" :value="loja.id">{{ loja.nome }}</option>
                        </select>
                        <div class="alert alert-danger" v-if="errors && errors.loja_id">
                            {{ errors.loja_id[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Referência</label>
                        <select class="form-control" v-model="produto.ativo">
                            <option v-for="reference in referencia" :key="reference.id" :value="reference.value">{{ reference.label }}</option>
                        </select>
                        <div class="alert alert-danger" v-if="errors && errors.ativo">
                            {{ errors.ativo[0] }}
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <router-link to="/produto" class="btn btn-primary">Voltar para Lista </router-link>
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
            lojas: [],
            produto: {},
            success: false,
            errors: {},
            referencia: [
                {
                    'label' : 'Ativo',
                    'value': 1
                },
                {
                    'label' : 'Desativado',
                    'value' : 0
                }
            ]
        }
    },
    created() {
        axios.get('/api/lojas').then(response => {
            this.lojas = response.data;
        });
        axios
            .get(`/api/produtos/${this.$route.params.id}`)
            .then((response) => {
                this.produto = response.data;
            });
    },
    methods: {
        updateProduct() {
            axios
                .put(`/api/produtos/${this.$route.params.id}`, this.produto)
                .then((response) => {
                    this.success = true;
                    this.errors = {};

                    //this.$router.push({ name: 'home' });
                }).catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data;
                    }
                });
        }
    }
}
</script>
