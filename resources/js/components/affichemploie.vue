<template>

    <div class="container">
<div class="card ">
  <div class="card-header bg-info mb-3 ">
    Ajoute les emploie
  </div>
  <vue-tabs>
          <v-tab title="Recherche par classe">

  <div class="card-body">
        <form @submit.prevent="loadEmploie()">

         <div class="form-group">

              <div class="row">
                <div class="col-md-2">

                        <select  class="form-control" v-model="id"  :class="{ 'is-invalid': form.errors.has('prof_id') }" >
                            <option value='' >Select filliere</option>
                            <option v-for="filliere in filieres" v-bind:value="filliere.id+'f'" v-bind:key="filliere.id">{{filliere.name}}</option>
                        </select>
                     </div>

                <div class="col-md-1">
                       <button type="submit" class="btn btn-primary">search</button>
                </div>

             </div>

         </div>
                                 </form>

  </div>
    </v-tab>
    <v-tab title="Recherche par prof">
        <div class="card-body">
        <form @submit.prevent="loadEmploie()">

         <div class="form-group">

              <div class="row">
                <div class="col-md-2">

                        <select  class="form-control" v-model="id"  :class="{ 'is-invalid': form.errors.has('prof_id') }" >
                            <option value='' >Select prof</option>
                            <option v-for="prof in profs" v-bind:value="prof.id+'p'" v-bind:key="prof.id">{{prof.name}}</option>
                        </select>
                     </div>

                <div class="col-md-1">
                       <button type="submit" class="btn btn-primary">search</button>
                </div>

             </div>

         </div>
                                 </form>

  </div></v-tab>
</vue-tabs>
  </div>


    <div id="app">
 <vue-tabs>
    <v-tab title="Emploi">
      <div class="card ">
 <table cellpadding="0" cellspacing="0" border="0"  class="table table-bordered">
                    <tbody>
                        <tr class="gradeA">
                            <th>Jours</th>
                            <th>8-10</th>
                            <th>10-12</th>
                            <th>14-16</th>
                            <th>16-18</th>

                        </tr>
                        <tr class="gradeA">
                            <td  width="100"> Lundi </td>
                           <td v-for="emploie in Day[0]" v-bind:key="emploie.id">
                          <div v-if="emploie.day[1]==temps.next()" class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{emploie.matiere_id}} ({{emploie.day[1]}})
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" @click="DeleteEmploi(emploie.id)">Delete</a>
                                </div>
                        </div>

                            </td>
                        </tr>

                        <tr class="gradeA">
                            <td  width="100"> Mardi </td>
                            <td v-for="emploie in Day[1]" v-bind:key="emploie.id">
                                 <div v-if="emploie.day[1]==temps.next()" class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{emploie.matiere_id}} ({{emploie.day[1]}})
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" @click="DeleteEmploi(emploie.id)">Delete</a>
                                </div>
                        </div>
                            </td>
                        </tr>

                        <tr class="gradeA">
                            <td  width="100"> Mercredi </td>
                            <td v-for="emploie in Day[2]" v-bind:key="emploie.id">
                             <div v-if="emploie.day[1]==temps.next()" class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{emploie.matiere_id}} ({{emploie.day[1]}})
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" @click="DeleteEmploi(emploie.id)">Delete</a>
                                </div>
                        </div>
                            </td>
                        </tr>

                        <tr class="gradeA">
                            <td  width="100"> Jeudi </td>
                            <td v-for="emploie in Day[3]" v-bind:key="emploie.id">
                             <div v-if="emploie.day[1]==temps.next()" class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{emploie.matiere_id}} ({{emploie.day[1]}})
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" @click="DeleteEmploi(emploie.id)">Delete</a>
                                </div>
                        </div>
                            </td>
                        </tr>

                        <tr class="gradeA">
                            <td  width="100"> Vendredi </td>
                            <td v-for="emploie in Day[4]" v-bind:key="emploie.id">
                             <div v-if="emploie.day[1]==temps.next()" class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{emploie.matiere_id}} ({{emploie.day[1]}})
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" @click="DeleteEmploi(emploie.id)">Delete</a>
                                </div>
                        </div>
                            </td>
                        </tr>

                        <tr class="gradeA">
                            <td  width="100"> Samedi </td>
                            <td v-for="emploie in Day[5]" v-bind:key="emploie.id">
                            <div v-if="emploie.day[1]==temps.next()" class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{emploie.matiere_id}} ({{emploie.day[1]}})
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" @click="DeleteEmploi(emploie.id)">Delete</a>
                                </div>
                        </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
  </div>
    </v-tab>
</vue-tabs>

</div>



</div>





</template>

<script>
import Vue from 'vue'
import { Form, HasError, AlertError } from 'vform'
Array.prototype.next = function() {
    if(this.current==3)
        this.current=-1;
    return this[++this.current];
};
Array.prototype.current = -1;
    export default {

     data() {
           return {
               profs:[],
              filieres:[],
              matieres:[],
              emploies:[],
              emploieOfDay:[],
              emploieVide:{day:['',''],filiere_id:'',id:'',matiere_id:'',prof_id:''},
              days:['lundi','mardi','mercredi','jeudi','vendredi','samedi'],
              Day:[],
              thisDay:'',
              temps:[8,10,14,16],
              id:'',
      form: new Form({
          id:'',
          name:'',
      })
    }
     },
     methods:{
        loadEmploie(){
             axios.get("api/emploia/"+this.id).then(({data})=>(this.dataToEmploie(data)));
             this.Day=[];
        },
        loadData(){
            axios.get("api/filiere").then(({data})=>(this.filieres=data.data));
             axios.get("api/matiere").then(({data})=>(this.matieres=data.data));
             axios.get("api/user").then((data)=>(this.profs = data.data))
         },
         dataToEmploie(data){
             data.forEach(function(item){
                item.day=item.day.split('/');
            })
            this.emploies=data;
            for(var i=0;i<6;i++){
                this.thisDay=this.days[i];

                this.isHere();
               for(var j=0;j<4;j++){
                    if(this.emploieOfDay[j].matiere_id !='')
                        this.emploieOfDay[j].matiere_id=this.matieres.find(matr => matr.id == this.emploieOfDay[j].matiere_id).name_matiere;
                }
                this.Day.push(this.emploieOfDay);
            }
         },
         isHere(){
             this.emploieOfDay=this.emploies.filter(emp => emp.day[0]== this.thisDay);
             if(this.emploieOfDay.length!=0){
                this.emploieOfDay.forEach(function(item){
                  item.day[1]=parseInt(item.day[1])
                })
                if(this.emploieOfDay.length>1){
                    this.emploieOfDay.sort(function(a, b){return a.day[1]-b.day[1]});
                }
                if(this.emploieOfDay.length<4){

                  for(var i=0;i<3;i++){
                      if(!this.emploieOfDay[i].day.includes(this.temps[i])){
                          this.emploieOfDay.splice(i,0,this.emploieVide);
                      }else if(this.emploieOfDay.length==1 || (this.emploieOfDay.length==2 && this.emploieOfDay[1].day.includes(this.temps[1])) ){
                          break;
                      }
                  }

                 }
             }
            while(this.emploieOfDay.length<4){
                this.emploieOfDay.push(this.emploieVide);
            }
         },
           DeleteEmploi(id){
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
           this.form.delete('api/emploia/'+id).then(()=>{
               Fire.$emit('AfterCreated');
               Swal.fire(
               'Deleted!',
               'Your file has been deleted.',
               'success'
                 );
                 this.loadEmploie();
              }
           ).catch((err) => {Swal.fire('failed !','Your file has been deleted.','error'
                 )})}

           }).catch((err) => {
               Swal.fire('failed !','Your file has been deleted.','success'
                 )
           });
},


     },
     created(){
         this.loadData();
     }}

</script>
