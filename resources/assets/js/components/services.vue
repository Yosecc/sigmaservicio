<template>
   <div id="servicios" class="about prlx_parent">
        <div class="about_background prlx" style="background-image:url('frontend/images/bg1.jpeg')"></div>
        
            <div class="container">

                    <div class="col-lg-6 offset-lg-3 text-center section_title">
                        <h2 class="mb-5">Servicios</h2>
                    </div>

                <div class="d-flex justify-content-center align-items-center flex-wrap">
                    
                    <button 
                        v-for="categoria in categorias" 
                        @click="selectCategoria(categoria.id)" 
                        :class="{ active : selected == categoria.id}" 
                        class=" btn-filter btn btn-primary" 
                        type="button">
                        {{ categoria.titulo }}
                    </button>
                    <button  class="btn-filter btn btn-primary" 
                            @click="selectCategoria(0)" 
                            :class="{ active : selected == 0}" 
                            type="button">
                            Todo
                    </button>
                </div>
                <div class="row align-items-end d-flex align-items-stretch">

                    <div    v-show="selected == servicio.categorias_id || selected == 0" 
                            v-for="servicio in servicios" 
                            class="col-lg-4 col-sm-6 mt-3 cont-servicio align-self-stretch"
                            >
                        <div class="card  border-0" style="overflow: hidden; box-shadow: 5px 5px 5px black; border-radius: 0px; height: 100%">
                            <div class="features_item d-flex flex-column align-items-center justify-content-end text-center">
                                <div class="overlay">
                                    <div class="row h-100">
                                        <div class="col-12 text-center d-flex justify-content-center align-items-center">
                                            <button type="button" @click="openModal(servicio.texto)" class="btn btn-primary btn-services-cotizar item-servicio">VER MÁS</button>

                                        </div>
                                    </div>
                                </div>
                                <img :src="asset+servicio.imagen.substring(6)" class="img-fluid m-0" alt="">
                            </div>
                            <div class="p-3 text-center d-flex justify-content-between align-items-center">
                                <h3 class="m-0">{{ servicio.nombre }}</h3>
                            </div>
                        </div>              
                    </div>


                </div>
            </div>
            <modal :show="true" :config="{closeOnBgClick:true}" ref="modal">
                <div v-html="contenido" style="background: white; padding:0.25em 1em;" class="cont-modal">

                </div>
            </modal>
    </div>
</template>

<script>
    import modal from './modal'
    export default {
        name:'services',
        props:['categorias','servicios','asset'],
        components: {
            modal
        },
        data(){
            return{
                selected: this.categorias[0].id,
                contenido: '',
            }
        },
        created(){
        },
        methods:{
            selectCategoria(id){
                this.selected = id
            },
            openModal(contenido){
                this.contenido = contenido
                this.$refs.modal.open()
            }
        }
    }
</script>
