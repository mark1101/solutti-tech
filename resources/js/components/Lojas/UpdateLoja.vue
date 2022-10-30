<template>
    <div>
        <h2 class="text-center">Editar Loja</h2>
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="updateLoja">
                    <div class="alert alert-success" v-show="success">Loja Editada com Sucesso!</div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="loja.nome">
                        <div class="alert alert-danger" v-if="errors && errors.nome">
                            {{ errors.nome[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>E-mail da Loja</label>
                        <input class="form-control" rows="3" v-model="loja.email" />
                        <div class="alert alert-danger" v-if="errors && errors.email">
                            {{ errors.email[0] }}
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <router-link to="/loja" class="btn btn-primary">Voltar para Lista </router-link>
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
            loja: {},
            success: false,
            errors: {}
        }
    },
    created() {
        axios
            .get(`/api/lojas/${this.$route.params.id}`)
            .then((response) => {
                this.loja = response.data;
            });
    },
    methods: {
        updateLoja() {
            axios
                .put(`/api/lojas/${this.$route.params.id}`, this.loja)
                .then((response) => {
                    this.success = true;
                    this.errors = {};
                }).catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data;
                    }
                });
        }
    }
}
</script>
