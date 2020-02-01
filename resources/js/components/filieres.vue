<template>
    <div class="container">
        <div class="col-12">
            <div class="card">
                 <div class="card-header">
                <h3 class="card-title">Liste des classes  </h3>

                <div class="card-tools">

         <a class="btn btn-primary" @click="newModel" href="#" role="button" data-toggle="modal" data-target="#addnew" >AJOUTER FILLIERES </a>


                </div>
              </div>
                </div>
                </div>
       <div class="col-12">
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>classe ID</th>
                      <th>Nom de classe </th>
                      <th>modifier classe  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="filiere in filieres.data" :key="filiere.id">
                      <td>{{filiere.id}}</td>
                      <td>{{filiere.name}} </td>
                      <td>
                          <center>
                          <a class="btn btn-primary" href="#" role="button"  @click="editModel(filiere)" >edit <i class="fa fa-edit"/></a>
                          <a class="btn btn-secondary" href="#" @click="DeleteFiliere(filiere.id)"  role="button">delete <i class="fa fa-edit"/></a>
                        </center>
                      </td>

                    </tr>

                  </tbody>
                </table>

              </div>
                <div class="card-footer">
                     <pagination :data="filieres" @pagination-change-page="getResults"></pagination>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

                        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewTitle" v-show="!editmode" >add filiere</h5>
                        <h5 class="modal-title" id="addnewTitle" v-show="editmode" >update filiere</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editmode ? updateFiliere() : ajouteFiliere()">
                    <div class="modal-body">


                        <div class="form-group">
                        <input v-model="form.name" type="text" name="name"
                           placeholder="name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                         </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" v-show="!editmode" class="btn btn-primary">create</button>
                        <button type="submit" v-show="editmode" class="btn btn-primary">update</button>


                    </div>

                    </form>

                    </div>
                </div>
                </div>

    </div>
</template>

<script>
import Vue from 'vue'
import { Form, HasError, AlertError } from 'vform'
    export default {

     data() {
           return {
               editmode:true,
               filieres:{},
      form: new Form({
        id:'',
        name: ''
      })
    }
     },
     methods:{
         getResults(page = 1) {
			axios.get('api/filiere?page=' + page)
				.then(response => {
					this.filieres = response.data;
				});
		},
         updateFiliere(){
             this.$Progress.start();
             this.form.put('api/filiere/'+this.form.id)
             .then((value) => {
                Fire.$emit('AfterCreated');
                 $('#addnew').modal('hide');
                   Swal.fire(
                        'Updated!',
                        'Your file has been updated.',
                        'success'
                          )
            this.$Progress.finish();
             })
             .catch((err) => {
                 this.$Progress.fail();
             })

         },
           editModel(filiere){
            this.editmode=true;
             this.form.reset();
            $('#addnew').modal('show');
            this.form.fill(filiere);
         },
           newModel(){
               this.editmode=false;
             this.form.reset();
            $('#addnew').modal('show');
         },
          DeleteFiliere(id){
             Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value){
                    this.form.delete('api/filiere/'+id).then(()=>{
                        Fire.$emit('AfterCreated');

                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                          )
                       }
                    ).catch((err) => {Swal.fire('failed !','Ce filiere a des matieres.','error'
                 )})}

                    }).catch(() => {
                        Swal.fire('failed !','Your file has been deleted.','success'
                          )
                    })

        },
         loadFiliere(){
             axios.get("api/filiere").then(({data})=>(this.filieres=data))
         },
         ajouteFiliere(){
               this.$Progress.start();
               this.form.post("api/filiere")
             .then(() => {
            $('#addnew').modal('hide');
            Fire.$emit('AfterCreated');
            Toast.fire({
                    icon: 'success',
                    title: 'Signed in successfully'
                    });
            this.$Progress.finish();})
            .catch(() => {})
        },
     },
        created() {
             this.loadFiliere();
             Fire.$on('AfterCreated',()=>{
                this.loadFiliere();
             })
         //  setInterval(()=>this.loadProf(),3000);
        }


       }

</script>
