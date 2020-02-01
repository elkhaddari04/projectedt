<template>
    <div class="container">
        <div class="col-12">
            <div class="card">
                    <div class="card-header">
                <h3 class="card-title">Liste des Etudiants</h3>

                <div class="card-tools">

         <a class="btn btn-primary" @click="newModel()" href="#" role="button" data-toggle="modal" data-target="#addnew" >Add user <i class="fa fa-edit"/></a>


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
                      <th>ID_ETUDIANT</th>
                      <th>FULLNAME</th>
                      <th>APOGIE</th>
                      <th>FILLIERE</th>
                     <th>EDIT ETUDIANT</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="Etudiant in Etudiants.data" :key="Etudiant.id">
                      <td>{{Etudiant.id_etudiant}}</td>
                      <td>{{Etudiant.fullname}} </td>
                      <td>{{Etudiant.apogie}}</td>
                       <td>{{fillierdatas.data.find(prof => prof.id==Etudiant.filiere_id).name}}</td>

                      <td>
                           <center>
                          <a class="btn btn-primary" href="#" role="button"  @click="editModel(prof)" >edit <i class="fa fa-edit"/></a>
                          <a class="btn btn-secondary" href="#" @click="Deleteprof(prof.id)"  role="button">delete <i class="fa fa-edit"/></a>
                         </center>
                      </td>

                    </tr>

                  </tbody>
                </table>

              </div>
                <div class="card-footer">
                  <!--<pagination :data="profs" @pagination-change-page="getResults"></pagination>-->
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

            <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewTitle" v-show="!editmode" >add prof</h5>
                        <h5 class="modal-title" id="addnewTitle" v-show="editmode" >update prof</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  <form @submit.prevent="editmode ? updateProf() : ajoutetudiant()">
                    <div class="modal-body">


                        <div class="form-group">
                        <input v-model="form.fullname" type="text" name="fullname"   placeholder="fullname" class="form-control"
                         :class="{ 'is-invalid': form.errors.has('fullname') }">

                        <has-error :form="form" field="fullname"></has-error>
                         </div>


                         <div class="form-group">
                        <input v-model="form.apogie" type="text" name="apogie"
                           placeholder="apogie" class="form-control" :class="{ 'is-invalid': form.errors.has('apogie') }">
                        <has-error :form="form" field="apogie"></has-error>
                         </div>

                            <div class="form-group">
                             <select  v-model="form.filiere_id" class="custom-select custom-select mb-3">
                         <option v-for="fillier in fillierdatas.data"   v-bind:value="fillier.id" v-bind:key="fillier.id"  > {{fillier.name}} </option>

                            </select>
                         </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" v-show="!editmode" class="btn btn-primary">create</button>
                        <button type="submit" v-show="editmode" class="btn btn-primary">updet</button>


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
               editmode:false,
               Etudiants:{},
               fillierdatas:{},
      form: new Form({
        fullname: '',
        apogie: '',
        filiere_id: '',
      })
    }
     },
     methods:{

    loadProf(){
    axios.get("api/filiere").then((fillierdata)=>(this.fillierdatas = fillierdata.data))
        axios.get("api/Etudiant").then((data)=>(this.Etudiants = data.data))

    },

  ajoutetudiant(){
      this.$Progress.start();
      this.form.post("api/Etudiant")
    .then(() => {
        this.editmode=true;
   $('#addnew').modal('hide');
   Fire.$emit('AfterCreated');
   Toast.fire({
           icon: 'success',
           title: 'Signed in successfully'
           });
   this.$Progress.finish();})
   .catch(() => {})
    },



updateProf(){
    this.$Progress.start();
    this.form.put('api/user/'+this.form.id)
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
  editModel(prof){
   this.editmode=true;
    this.form.reset();
   $('#addnew').modal('show');
   this.form.fill(prof);
},
  newModel(){
    this.editmode=false;
    this.form.reset();
    axios.get("api/filiere").then((fillierdata)=>(this.fillierdatas = fillierdata.data))
   $('#addnew').modal('show');
},
  Deleteprof(id){
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
           this.form.delete('api/user/'+id).then(()=>{
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

     },
      created() {
    this.loadProf();
   Fire.$on('AfterCreated',()=>{
       this.loadProf();
    })
//  setInterval(()=>this.loadProf(),3000);
   },
     }

</script>
