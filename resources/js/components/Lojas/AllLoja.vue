<template>
    <div>
        <div class="col sm 12">
            <h2>Lista de Lojas</h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="loja in lojas" :key="loja.id">
                    <th scope="row">{{ loja.id }}</th>
                    <td>{{ loja.nome }}</td>
                    <td>{{ loja.email }}</td>
                    <td>
                        <router-link :to="{ name: 'update/loja', params: { id: loja.id } }" class="btn btn-primary">Editar
                        </router-link>
                        <a class="btn btn-danger" href="#" @click="destroy(loja.id)">Apagar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default ({
    name: 'all-lojas',

    data() {
        return {
            lojas: null,
        }
    },

    mounted() {
        this.show();
    },

    methods: {
        show() {
            axios.get('/api/lojas').then(response => {
                this.lojas = response.data;
            });
        },

        update() {

        },

        destroy(loja) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger m-2'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Apagar a loja?',
                text: "Essa ação não pode ser desfeita",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, apagar agora!',
                cancelButtonText: 'Não, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/lojas/' + loja).then(response => {
                        swalWithBootstrapButtons.fire(
                            'Sucesso!',
                            'A loja foi deletada da base.',
                            'success'
                        );
                        this.show();
                    }).catch(error => {
                        swalWithBootstrapButtons.fire(
                            'Ops!',
                            'Algo deu errado na requisição, tente novamente mais tarde',
                            'error'
                        );
                    });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelada',
                        'Sua requisição foi cancelada',
                        'error'
                    )
                }
            })
        }
    },
})
</script>

<style scoped>
.swal-button {
    margin-left: 10px;
}
</style>

