<template>

    <div class="container" >
<div class="card " >

  </div>


    <div id="app" v-if="!absence" >
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
                                {{emploie.matiere_id}} ({{emploie.filiere_id}})
                                </button>
                                <div class="dropdown-menu">
                                 <a class="dropdown-item" @click="loadetudiant(emploie.filiere_id,emploie.day[0],emploie.day[1],emploie.matiere_id)" >Marquer abcsence</a>
                                </div>
                        </div>

                            </td>
                        </tr>

                        <tr class="gradeA">
                            <td  width="100"> Mardi </td>
                            <td v-for="emploie in Day[1]" v-bind:key="emploie.id">
                                 <div v-if="emploie.day[1]==temps.next()" class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{emploie.matiere_id}} ({{emploie.filiere_id}})
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" @click="loadetudiant(emploie.filiere_id,emploie.day[0],emploie.day[1],emploie.matiere_id)" >Marquer abcsence</a>
                                </div>
                        </div>
                            </td>
                        </tr>

                        <tr class="gradeA">
                            <td  width="100"> Mercredi </td>
                            <td v-for="emploie in Day[2]" v-bind:key="emploie.id">
                             <div v-if="emploie.day[1]==temps.next()" class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{emploie.matiere_id}} ({{emploie.filiere_id}})
                                </button>
                                <div class="dropdown-menu">
                                 <a class="dropdown-item" @click="loadetudiant(emploie.filiere_id,emploie.day[0],emploie.day[1],emploie.matiere_id)" >Marquer abcsence</a>
                                </div>
                        </div>
                            </td>
                        </tr>

                        <tr class="gradeA">
                            <td  width="100"> Jeudi </td>
                            <td v-for="emploie in Day[3]" v-bind:key="emploie.id">
                             <div v-if="emploie.day[1]==temps.next()" class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{emploie.matiere_id}} ({{emploie.filiere_id}})
                                </button>
                                <div class="dropdown-menu">
                                 <a class="dropdown-item" @click="loadetudiant(emploie.filiere_id,emploie.day[0],emploie.day[1],emploie.matiere_id)" >Marquer abcsence</a>
                                </div>
                        </div>
                            </td>
                        </tr>

                        <tr class="gradeA">
                            <td  width="100"> Vendredi </td>
                            <td v-for="emploie in Day[4]" v-bind:key="emploie.id">
                             <div v-if="emploie.day[1]==temps.next()" class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{emploie.matiere_id}} ({{emploie.filiere_id}})
                                </button>
                                <div class="dropdown-menu">
                                 <a class="dropdown-item" @click="loadetudiant(emploie.filiere_id,emploie.day[0],emploie.day[1],emploie.matiere_id)" >Marquer abcsence</a>
                                </div>
                        </div>
                            </td>
                        </tr>

                        <tr class="gradeA">
                            <td  width="100"> Samedi </td>
                            <td v-for="emploie in Day[5]" v-bind:key="emploie.id">
                            <div v-if="emploie.day[1]==temps.next()" class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{emploie.matiere_id}} ({{emploie.filiere_id}})
                                </button>
                                <div class="dropdown-menu">
                                 <a class="dropdown-item" @click="loadetudiant(emploie.filiere_id,emploie.day[0],emploie.day[1],emploie.matiere_id)" >Marquer abcsence</a>
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


<div class="row justify-content-center" v-if="absence">


            <div class="col-md-12">
                <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th >Apogie </th>
                    <th >nom d'etudiant </th>
                    <th >absent  </th>
                    </tr>
                </thead>
                <tbody>
                <tr role="row" class="odd" v-for="etudiant in etudiants" v-bind:key="etudiant.id_etudiant">
                  <td class="sorting_1">{{etudiant.apogie}}</td>
                  <td>{{etudiant.fullname}}</td>
                  <td>
                         <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-bind:id="etudiant.id_etudiant" v-bind:value="etudiant.id_etudiant" v-model="form.absenselist">
                            <label  class="form-check-label" v-bind:for="etudiant.id_etudiant" > absent </label>
                         </div>
                  </td>

                </tr></tbody>


              </table>

<div class="row justify-content-center">
              <div class="col-md-10">
                       <button  class="btn btn-primary btn-lg btn-block" @click="saveData()" >update</button>
                </div>
                </div>
              </div>
            </div>







</div>
</div>









</template>

<script>
var dt = new Date();
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

               absence:false,
               prof:{},
               etudiants:[],
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
                  absenselist: [],
                id_matiere:'',
                  day:'',
                  time:'',
                  month:(dt.getMonth()+1)+'',
            })
    }
     },
     methods:{
         loadetudiant(filiere,day,time,matiere){
             this.form.absenselist=[];
             this.absence=true;
             for(var i=0;i<this.filieres.length;i++){
                if(this.filieres[i].name==filiere){
                    filiere = this.filieres[i].id;
                }
            }
            this.form.id_matiere=this.matieres.find(mat => mat.name_matiere ==matiere).id;
            this.form.day=day;
            this.form.time=time;
             axios.get("api/Etudiant/"+filiere).then((data)=>(this.etudiants = data.data));


         },
         saveData(){
             if(this.form.absenselist.length !== 0){
              this.form.post('savedata')
             }
              this.absence=false;

         },
        loadData(){

            axios.get("api/filiere").then(({data})=>(this.filieres=data.data));
             axios.get("api/matiere").then(({data})=>(this.matieres=data.data));
             axios.get("api/emploia/"+this.id).then(({data})=>(this.dataToEmploie(data)));
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
                        if(this.emploieOfDay[j].filiere_id !='')
                        this.emploieOfDay[j].filiere_id=this.filieres.find(matr => matr.id == this.emploieOfDay[j].filiere_id).name;
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
fillId(data){
    this.id = data[0].id+'p';
    this.prof=data[0];
}


     },
     created(){
        axios.post("absense").then((data)=>(this.fillId(data.data)));

         this.loadData();

     }}

</script>
