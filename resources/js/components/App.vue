<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Lista de Produtos</router-link>
                    <router-link to="/create" class="nav-item nav-link">Cadastrar Produto</router-link>
                </div>
            </div>
        </nav>
        <div class="container p-5">
            <router-view> </router-view>
        </div>
    </div>
</template>

<script>
export default {}
</script>
