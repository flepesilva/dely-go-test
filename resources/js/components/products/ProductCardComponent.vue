<template>

    <div class="col-xs-12 col-sm-10 col-md-4">
        <div class="card">
            <header class="bg-primary padding">

            </header>
            <div class="card-body padding">
                <h2 class="card-title">
                    <a :href="'/productos/'+product.id">
                    {{product.title}}
                    </a>
                </h2>
                <h4 class="card-subtitle">{{product.humanPrice}}</h4>
                <p class="card-text">{{product.description}}</p>
                <img :src="'/images/' + product.image" class="card-img" width="100" height="230">
            </div>
        </div>
    </div>

</template>


<script>
    export default {
        props:{
            product: {
                type: Object
            }
        }
    }
</script>
