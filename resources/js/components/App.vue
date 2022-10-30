<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/loja" class="nav-item nav-link">Lista de Lojas</router-link>
                    <router-link to="/loja/create" class="nav-item nav-link">Cadastrar Loja</router-link>
                    <router-link to="/produto" class="nav-item nav-link">Lista de Produtos</router-link>
                    <router-link to="/produto/create" class="nav-item nav-link">Cadastrar Produto</router-link>
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
