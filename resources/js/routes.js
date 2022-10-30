import AllLoja from './components/Lojas/AllLoja';
import CreateLoja from './components/Lojas/CreateLoja';
import UpdateLoja from './components/Lojas/UpdateLoja';
import AllProduto from './components/Produtos/AllProduto';
import CreateProduto from './components/Produtos/CreateProduto';
import UpdateProduto from './components/Produtos/UpdateProduto';

export const routes = [

    {
        name: 'home loja',
        path: '/loja',
        component: AllLoja
    },

    {
        name: 'create loja',
        path: '/loja/create',
        component: CreateLoja
    },

    {
        name: 'update/loja',
        path: '/loja/update/:id',
        component: UpdateLoja
    },

    {
        name: 'home produto',
        path: '/produto',
        component: AllProduto
    },

    {
        name: 'create Produto',
        path: '/produto/create',
        component: CreateProduto
    },

    {
        name: 'update/produto',
        path: '/produto/update/:id',
        component: UpdateProduto
    }



   /* {
        name: 'home',
        path: '/',
        component: AllProduct
    },
    {
        name: 'create',
        path: '/create',
        component: CreateProduct
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProduct
    }, */

];
