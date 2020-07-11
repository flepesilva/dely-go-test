<template>
<div>
    <material-transition-group tag="div">
        <article :key="product.id" class="card-product" :data-index="index" v-for="(product, index) in products">
            <div class="row">
                <div class="col-8">
                    <strong>{{product.title}}</strong>
                </div>
                <div class="col-4">
                    {{product.humanPrice}}
                </div>
            </div>
        </article>
        
    </material-transition-group>

<article class="total card-product">

            <div class="row">
                <div class="col-8">
                    <strong>Total: </strong>
                </div>
                <div class="col-4">
                    {{total}}
                </div>
            </div>

        </article>
</div>
    
</template>

<script>
export default {
    data(){
        return {
            endpoint: '/carrito/productos',
            products: []
        }
    },
    created(){
        this.fetchProducts();
    },
    computed:{
        total(){
            let peso = this.products.reduce((acumulator, currentObj)=>{
                return acumulator + currentObj.numberPrice
            }, 0);

            return `$${peso}`;
        }
    },
    methods: {
        fetchProducts(){
            axios.get(this.endpoint).then(response => {
                console.log(response);
                this.products = response.data.data;
                console.log(this.products);
            });
        }
    }
}
</script>