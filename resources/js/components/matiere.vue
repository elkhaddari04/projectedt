<template>
    <div class="container">
          <div class="col-12">
            <div class="card">
                  <div class="card-header">
                <h3 class="card-title">Liste des Matières</h3>

                <div class="card-tools">

         <a class="btn btn-primary" @click="newModel" href="#" role="button" data-toggle="modal" data-target="#addnew" >AJOUTE MATIERE   </a>


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
                      <th>Matiere ID</th>
                      <th>Nom de Matiere </th>
                      <th>Nom de filiere </th>
                      <th>modifier Matiere  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="matiere in matieres.data" :key="matiere.id">

                      <td>{{matiere.id}}</td>
                      <td>{{matiere.name_matiere}} </td>
                      <td>{{filieres.data.find(filiere => filiere.id==matiere.filiere_id).name}} </td>

                      <td>
                          <center>
                          <a class="btn btn-primary" href="#" role="button"  @click="editModel(matiere)" >edit <i class="fa fa-edit"/></a>
                          <a class="btn btn-secondary" href="#" @click="DeleteFiliere(matiere.id)"  role="button">delete <i class="fa fa-edit"/></a>
                     </center>
                      </td>

                    </tr>

                  </tbody>
                </table>

              </div>
                <div class="card-footer">
                     <pagination :data="matieres" @pagination-change-page="getResults"></pagination>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

                        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewTitle" v-show="!editmode" >add matieres</h5>
                        <h5 class="modal-title" id="addnewTitle" v-show="editmode" >update matieres</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editmode ? updateMatiere() : ajouteMatiere()">
                    <div class="modal-body">


                        <div class="form-group">
                        <input v-model="form.name_matiere"  type="text" name="name_matiere"
                           placeholder="name_matiere" class="form-control" :class="{ 'is-invalid': form.errors.has('name_matiere') }">
                        <has-error :form="form" field="name_matiere"></has-error>
                         </div>



                           <div class="form-group">
                         <select id="filiere" v-model="form.filiere_id" class="form-control form-control">
                         <option  value="" > choisie fillere </option>
                         <option v-for="filiere in filieres.data" v-bind:key="filiere.id" v-bind:value="filiere.id" >{{filiere.name}}</option>
                        </select>
                         </div>

                        <div class="form-group">
                         <select  v-model="form.prof_id" class="form-control form-control">
                         <option value="" > choise prof </option>
                         <option v-for="prof in profs.data" v-bind:value="prof.id" v-bind:key="prof.id" >{{prof.name}}</option>
                        </select>
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
               matieres:{},
               profs:{},
               filieres:{},
      form: new Form({
        id:'',
        name_matiere: '',
        prof_id: '',
        prof_name:'',
        filiere_id: '',
        filiere_name:'',

      })
    }
     },
     methods:{
         getResults(page = 1) {
			axios.get('api/matiere?page=' + page)
				.then(response => {
					this.matieres = response.data;
				});
        },
        getFiliereIdInForm(){
            var flii =  this.filieres.data.find(filiere => filiere.name==this.form.filiere_name);
            if(typeof this.form.filiere_name!=="" && flii !== undefined){
                this.form.filiere_id=flii.id;
            }
        },
        getProfIdInForm(){
            var pro = this.profs.data.find(prof => prof.name==this.form.prof_name);
            if(typeof this.form.prof_name!=="" && pro !== undefined){
                this.form.prof_id=pro.id;
            }
        },
         updateMatiere(){
             this.$Progress.start();
             this.form.put('api/matiere/'+this.form.id)
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
           editModel(matiere){
            this.editmode=true;
             this.form.reset();
            $('#addnew').modal('show');
            this.form.fill(matiere);
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
                    this.form.delete('api/matiere/'+id).then(()=>{
                        Fire.$emit('AfterCreated');

                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                          )
                       }
                    )}

                    }).catch(() => {
                        Swal.fire('failed !','Your file has been deleted.','success'
                          )
                    })

        },
         loadFiliere(){
             axios.get("api/user").then((data)=>(this.profs = data));
             axios.get("api/filiere").then(({data})=>(this.filieres=data));
             axios.get("api/matiere").then(({data})=>(this.matieres=data));
         },
         ajouteMatiere(){
               this.$Progress.start();
               this.form.post("api/matiere")
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
