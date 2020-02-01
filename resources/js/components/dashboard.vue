<template>
   <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>30 </h3>

                <p>Etudiants</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Matiers</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>3</h3>

                <p> class</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>24 </h3>

                <p>les heures</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

      <div id="app"><div class="vue-tabs"><div class="nav-tabs-navigation"><div class="nav-tabs-wrapper"><ul role="tablist" class="nav nav-tabs  "><li name="tab" id="t-Emploi" aria-selected="true" aria-controls="p-Emploi" role="tab" class="tab active"><a href="#" role="tab" class="active_tab tabs__link"><span class="title title_center">Votre Emploi :  </span></a></li></ul></div></div><div class="tab-content"><section id="p-Emploi" aria-labelledby="t-Emploi" role="tabpanel" class="tab-container" style=""><div class="card "><table cellpadding="0" cellspacing="0" border="0" class="table table-bordered"><tbody><tr class="gradeA"><th>Jours</th> <th>8-10</th> <th>10-12</th> <th>14-16</th> <th>16-18</th></tr> <tr class="gradeA"><td width="100"> Lundi </td> <td><div class="btn-group"><button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dropdown-toggle">
                                c++ (8)
                                </button> <div class="dropdown-menu"><a class="dropdown-item">Delete</a></div></div></td><td><!----></td><td><div class="btn-group"><button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dropdown-toggle">
                                ANALYSE-1 (14)
                                </button> <div class="dropdown-menu"><a class="dropdown-item">Delete</a></div></div></td><td><!----></td></tr> <tr class="gradeA"><td width="100"> Mardi </td> <td><!----></td><td><!----></td><td><!----></td><td><!----></td></tr> <tr class="gradeA"><td width="100"> Mercredi </td> <td><!----></td><td><!----></td><td><!----></td><td><!----></td></tr> <tr class="gradeA"><td width="100"> Jeudi </td> <td><!----></td><td><div class="btn-group"><button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dropdown-toggle">
                                c++ (10)
                                </button> <div class="dropdown-menu"><a class="dropdown-item">Delete</a></div></div></td><td><!----></td><td><!----></td></tr> <tr class="gradeA"><td width="100"> Vendredi </td> <td><!----></td><td><!----></td><td><!----></td><td><!----></td></tr> <tr class="gradeA"><td width="100"> Samedi </td> <td><!----></td><td><!----></td><td><!----></td><td><!----></td></tr></tbody></table></div></section></div></div></div>

      </div><!-- /.container-fluid -->
    </section>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
