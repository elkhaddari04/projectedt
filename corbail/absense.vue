<template>
  <div class="container">
  <div class="row justify-content-center">


            <div class="col-md-12">
                <div class="card">
                <div class="card-header">Example Component</div>
                <div class="card-body">

          <div class="form-group">
              <div class="row justify-content-center ">

                <div class="col-md-2">
                        <select  class="form-control"  :class="{ 'is-invalid': form.errors.has('day') }" >
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
                        <select  class="form-control"   :class="{ 'is-invalid': form.errors.has('day') }">
                            <option value='' >Select le temps </option>
                            <option > 8-10 </option>
                            <option > 10-12 </option>
                            <option > 14-16 </option>
                            <option > 16-18 </option>
                        </select>
                </div>


                <div class="col-md-2">
                    <select  class="form-control"   :class="{ 'is-invalid': form.errors.has('day') }">
                            <option value='' >Select matiere </option>
                            <option > 8-10 </option>
                            <option > 10-12 </option>
                            <option > 14-16 </option>
                            <option > 16-18 </option>
                        </select>
                </div>

                  <div class="col-md-2">
                  <button type="button" class="btn btn-info  btn-block ">GEt the liste </button>
                </div>


              </div>
            </div>


                </div>
                </div>
            </div>




</div>


  <div class="row justify-content-center">


            <div class="col-md-12">
                <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Rendering engine</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Browser</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Platform(s)</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Engine version</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">CSS grade</th></tr>
                </thead>
                <tbody>

























































                <tr role="row" class="odd">
                  <td class="sorting_1">Gecko</td>
                  <td>Firefox 1.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.7</td>
                  <td>A</td>
                </tr><tr role="row" class="even">
                  <td class="sorting_1">Gecko</td>
                  <td>Firefox 1.5</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr><tr role="row" class="odd">
                  <td class="sorting_1">Gecko</td>
                  <td>Firefox 2.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr><tr role="row" class="even">
                  <td class="sorting_1">Gecko</td>
                  <td>Firefox 3.0</td>
                  <td>Win 2k+ / OSX.3+</td>
                  <td>1.9</td>
                  <td>A</td>
                </tr><tr role="row" class="odd">
                  <td class="sorting_1">Gecko</td>
                  <td>Camino 1.0</td>
                  <td>OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr><tr role="row" class="even">
                  <td class="sorting_1">Gecko</td>
                  <td>Camino 1.5</td>
                  <td>OSX.3+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr><tr role="row" class="odd">
                  <td class="sorting_1">Gecko</td>
                  <td>Netscape 7.2</td>
                  <td>Win 95+ / Mac OS 8.6-9.2</td>
                  <td>1.7</td>
                  <td>A</td>
                </tr><tr role="row" class="even">
                  <td class="sorting_1">Gecko</td>
                  <td>Netscape Browser 8</td>
                  <td>Win 98SE+</td>
                  <td>1.7</td>
                  <td>A</td>
                </tr><tr role="row" class="odd">
                  <td class="sorting_1">Gecko</td>
                  <td>Netscape Navigator 9</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr><tr role="row" class="even">
                  <td class="sorting_1">Gecko</td>
                  <td>Mozilla 1.0</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1</td>
                  <td>A</td>
                </tr></tbody>

              </table></div>
            </div>







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
        name: '',
        pernom: '',
        email: '',
        role:'1',
        password: '',

      })
    }
     },
     methods:{
        testone(){
             axios.get("/home"+this.id).then(({data})=>(this.dataToEmploie(data)));
             this.Day=[];
        },



     },
    }

</script>
