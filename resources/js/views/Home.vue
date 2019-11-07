<template>
    <div>
        <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
            <h2 class="title">Bienvenido a SogueStore</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 producto-box" v-for="(producto,index) in productos" v-bind:key="index">
                            <router-link :to="{ path: '/productos/'+producto.id}">
                                <img :src="producto.image" :alt="producto.nombre">
                                <h5><span v-html="producto.nombre"></span>
                                    <span class="small-text text-muted float-right">$ {{producto.precio}}</span>
                                </h5>
                                <button class="col-md-4 btn btn-sm btn-primary float-right">Comprar</button>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                productos : []
            }
        },
        mounted(){
            axios.get("api/productos/").then(response => this.productos = response.data)
        }
    }
</script>
<style scoped>
.small-text {
    font-size: 14px;
}
.producto-box {
    border: 1px solid #cccccc;
    padding: 10px 15px;
}
.hero-section {
    height: 30vh;
    background: #ababab;
    align-items: center;
    margin-bottom: 20px;
    margin-top: -20px;
}
.title {
    font-size: 60px;
    color: #ffffff;
}
</style>

