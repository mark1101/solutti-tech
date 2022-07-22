<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Marca</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <th scope="row">{{ product.id }}</th>
                    <td>{{ product.name }}</td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.brand.name }}</td>
                    <td>
                        <router-link :to="{name: 'edit', params: { id: product.id }}" class="btn btn-primary">Editar</router-link>
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
            products: null,
        }
    },

    mounted() {
        this.show();
    },

    methods: {
        show() {
            axios.get('/api/products').then(response => {
                this.products = response.data;
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
                text: "Essa ação não pode ser revertida",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, apagar agora!',
                cancelButtonText: 'Não, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/products/' + product).then(response => {
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

