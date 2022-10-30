<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Loja Registrada</th>
                    <th scope="col">Referência</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in produtos" :key="product.id">
                    <td>{{ product.nome }}</td>
                    <td>{{ product.valor }}</td>
                    <td>{{ product.loja.nome }}</td>
                    <td>{{ product.ativo }}</td>
                    <td>
                        <router-link :to="{name: 'update/produto', params: { id: product.id }}" class="btn btn-primary">Editar</router-link>
                        <a class="btn btn-danger" href="#" @click="destroy(product.id)">Apagar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default ({
    name: 'product-create',

    data() {
        return {
            produtos: null,
        }
    },

    mounted() {
        this.show();
    },

    methods: {
        show() {
            axios.get('/api/produtos').then(response => {
                this.produtos = response.data.data;
            });
        },

        update() {

        },

        destroy(product) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger m-2'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Apagar o produto?',
                text: "Essa ação não pode ser desfeita",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, apagar agora!',
                cancelButtonText: 'Não, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/produtos/' + product).then(response => {
                        swalWithBootstrapButtons.fire(
                            'Sucesso!',
                            'O produto foi deletado da base.',
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

