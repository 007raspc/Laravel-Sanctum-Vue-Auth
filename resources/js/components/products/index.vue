<template>
    <div class="row">
        <div class="col-12 mb-3">
            <router-link class="btn btn-success" :to="{name: 'products.create'}">Create new</router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive-xxl" v-if="data && Object.keys(data).length > 0">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Name</th>
                            <th scope="col">Color</th>
                            <th scope="col">Size</th>
                            <th scope="col">Company</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product, key) in data" :key="key">
                            <th scope="row">{{ key + 1 }}</th>
                            <td>{{ product.type }}</td>
                            <td>{{ product.article }}</td>
                            <td>{{ product.name }}</td>
                            <td>{{ product.color }}</td>
                            <td>{{ product.size }}</td>
                            <td>
                                <div class="btn-group">
                                    <router-link class="btn btn-success"
                                                 :to="{name: 'products.edit', params: { id: product.id }}">
                                        <i class="bi bi-pen"></i>
                                    </router-link>
                                    <DeleteProduct :product_id="product.id" :iconic="true" @success="deleted()" />
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-else>
                <p>Product list is empty</p>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex'
import DeleteProduct from '../products/delete.vue'

export default {
    name: 'Index Product Component',
    data() {
        return {
            name: 'Index Product Component',
            data: null,
            errors: {},
        }
    },
    components: {
        DeleteProduct,
    },
    methods: {
        ...mapActions([
            'productIndex',
        ]),
        load() {
            this.productIndex()
                .then(response => {
                    this.data = response.data
                })
                .catch(error => {
                    this.errors = error.errors || {}
                })
        },
        deleted() {
            this.load()
        },
    },
    mounted() {
        this.load()
        console.log('Index Product Component')
    },
}
</script>
