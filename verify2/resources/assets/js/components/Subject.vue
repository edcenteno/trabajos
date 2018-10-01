<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Personas
                        <button type="button" @click="abrirModal('subject','registrar')" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarSubject(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarSubject(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Número de Documento</th>
                                    <th>Nombres</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Fecha de Nacimiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="subject in arraySubject" :key="subject.id">
                                    <td>
                                        <button type="button" @click="abrirModal('subject','actualizar',subject)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <template v-if="subject.condicion">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarSubject(subject.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else>
                                            <button type="button" class="btn btn-info btn-sm" @click="activarSubject(subject.id)">
                                                <i class="icon-check"></i>
                                            </button>
                                        </template>
                                    </td>
                                    <td v-text="subject.nombre"></td>
                                    <td v-text="subject.descripcion"></td>
                                    <td>
                                        <div v-if="subject.condicion">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Número de Documento</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="doc_value" class="form-control" placeholder="Número de Documento">

                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Descripción</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="descripcion" class="form-control" placeholder="Ingrese descripción">
                                    </div>
                                </div> -->
                                <div v-show="errorSubject" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjSubject" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarSubject()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarSubject()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
        </main>
</template>

<script>
    export default {
        data (){
            return {
                subject_id: 0,
                doc_type : '',
                doc_value : '',
                name : '',
                first_last_name : '',
                last_last_name : '',
                birthday : '',
                arraySubject : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorSubject : 0,
                errorMostrarMsjSubject : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'name',
                buscar : ''
            }
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }

                var from = this.pagination.current_page - this.offset;
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2);
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;

            }
        },
        methods : {
            listarSubject (page,buscar,criterio){
                let me=this;
                var url= '/subject?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    console.log(data);
                    var respuesta= response.data;
                    me.arraySubject = respuesta.subject.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarSubject(page,buscar,criterio);
            },
            registrarSubject(){
                if (this.validarSubject()){
                    return;
                }

                let me = this;

                axios.post('/subject/registrar',{
                    /*'doc_type': this.doc_type,*/
                    'doc_value': this.doc_value/*,
                    'name,': this.name,
                    'first_last_name,': this.first_last_name,
                    'last_last_name,': this.last_last_name,
                    'birthday,': this.birthday*/

                }).then(function (response) {
                    me.cerrarModal();
                    me.listarSubject(1,'','name');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            actualizarSubject(){
               if (this.validarSubject()){
                    return;
                }

                let me = this;

                axios.put('/subject/actualizar',{
                    'doc_type': this.doc_type,
                    'doc_value': this.doc_value,
                    'name,': this.name,
                    'first_last_name,': this.first_last_name,
                    'last_last_name,': this.last_last_name,
                    'birthday,': this.birthday,
                    'id': this.categoria_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarCategoria(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            desactivarSubject(id){
               swal({
                title: 'Esta seguro de eliminar esta persona?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/categoria/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarSubject(1,'','name');
                        swal(
                        'Desactivado!',
                        'El registro ha sido desactivado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });


                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {

                }
                })
            },
            activarSubject(id){
               swal({
                title: 'Esta seguro de activar esta categoría?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/subject/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarCategoria(1,'','name');
                        swal(
                        'Activado!',
                        'El registro ha sido activado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });


                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {

                }
                })
            },
            validarSubject(){
                this.errorSubject=0;
                this.errorMostrarMsjSubject =[];

                if (!this.doc_value) this.errorMostrarMsjSubject.push("El Número de Documento no puede estar vacío.");

                if (this.errorMostrarMsjSubject.length) this.errorSubject = 1;

                return this.errorSubject;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre='';
                this.descripcion='';
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "subject":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Persona';
                                this.doc_value= '';
                                /*this.descripcion = '';*/
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Persona';
                                this.tipoAccion=2;
                                this.subject_id=data['id'];
                                this.doc_value = data['doc_value'];
                                /*this.descripcion= data['descripcion'];*/
                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarSubject(1,this.buscar,this.criterio);
        }
    }
</script>
<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>
