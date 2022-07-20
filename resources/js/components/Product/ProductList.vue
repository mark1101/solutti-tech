<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Marca</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <th scope="row">{{ $product.id }}</th>
                    <td>{{ $product.name }}</td>
                    <td>{{ $product.description }}</td>
                    <td>{{ $product.brand }}</td>
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
        axios.get('/api/products').then(response => {
            this.products = response.data;
        });
    },

    methods: {

    },
})
</script>

