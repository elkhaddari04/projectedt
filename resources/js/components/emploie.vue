<template>
    <div class="container">

 <div class="card ">

  <div class="card-body">
            <img src="/img/class.png"  >

 </div>
 </div>
 <div class="card ">

  <div class="card-body">
                                            <form @submit.prevent="ajoutemploie()">

         <div class="form-group">

              <div class="row">

                 <div class="col-md-2">
                        <select  class="form-control" v-model="form.prof_id"  :class="{ 'is-invalid': form.errors.has('prof_id') }" >
                            <option value='' >Select Profeseur</option>
                            <option v-for="prof in profs" v-bind:value="prof.id" v-bind:key="prof.id">{{prof.name}}</option>
                        </select>
                </div>

                 <div class="col-md-2"   >
                        <select  class="form-control" v-model="form.matiere_id"  :class="{ 'is-invalid': form.errors.has('matiere_id') }"    >
                            <option value='' >Select matiere </option>
                            <option v-for="matiere in matieres" v-bind:value="matiere.id" v-bind:key="matiere.id">{{matiere.name_matiere}}</option>
                        </select>
                </div>

                <div class="col-md-2">
                        <select  class="form-control" v-model="form.day" :class="{ 'is-invalid': form.errors.has('day') }" >
                            <option value='' >Select le jour </option>
                            <option > lundi </option>
                            <option > mardi </option>
                            <option > mercredi </option>
                            <option > jeudi </option>
                            <option > vendredi </option>
                            <option > samedi </option>
                        </select>
                </div>

                <div class="col-md-2">
                        <select  class="form-control" v-model="form.heure"  :class="{ 'is-invalid': form.errors.has('day') }">
                            <option value='' >Select le temps </option>
                            <option > 8-10 </option>
                            <option > 10-12 </option>
                            <option > 14-16 </option>
                            <option > 16-18 </option>
                        </select>
                </div>

                <div class="col-md-2">

                        <select  class="form-control" v-model="form.filiere_id"  :class="{ 'is-invalid': form.errors.has('prof_id') }" >
                            <option value='' >Select filliere</option>
                            <option v-for="filliere in fillieres" v-bind:value="filliere.id" v-bind:key="filliere.id">{{filliere.name}}</option>
                        </select>
                     </div>

                <div class="col-md-2">
                       <button type="submit"  class="btn btn-primary btn-block ">AJOUTE </button>
                </div>

             </div>

         </div>
                                 </form>

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
                    profs:{},
                     matieres:{},
                     fillieres:{},
      form: new Form({
        day: '',
        prof_id:'',
        matiere_id:'',
        filiere_id:'',
        heure:'',
        ex:'',
      })
    }
     },
     methods:{
         ajoutemploie(){
             this.form.day=this.form.day+"/"+this.form.heure+"/"+this.form.prof_id;
                            this.$Progress.start();
                    this.form.post("api/emploia").then(() => {
                Fire.$emit('AfterCreated');
                Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                        });
                this.$Progress.finish();}).catch((err) => {Swal.fire('failed !','Ce filiere a des matieres. '+this.form.errors.has('prof_id')  ,'error'
                 )});
                    this.form.reset();



         },
        loadFiliere(){
             axios.get("api/user").then((data)=>(this.profs = data.data));
             axios.get("api/matiere").then(({data})=>(this.matieres=data.data));
             axios.get("api/filiere").then(({data})=>(this.fillieres=data.data));
         },


     },
     created(){
         this.loadFiliere();
     }}

</script>
