<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'dash']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="container-fluid">
          
          <div class="row">
            
            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>0</h3>
  
                  <p>Visitantes Hoje</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?=$base;?>/app/visitantes" class="small-box-footer">Mais <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?=$countReservas;?><sup style="font-size: 20px"></sup></h3>
  
                  <p>Reservas Pendentes</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?=$base;?>/app/reservas" class="small-box-footer">Mais <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?=$countMoradores;?></h3>
  
                  <p>Moradores</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?=$base;?>/app/moradores" class="small-box-footer">Mais <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>0</h3>
  
                  <p>Ocorrências</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?=$base;?>/app/ocorrencias" class="small-box-footer">Mais <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

          </div>

          <div class="row">
              <div class="col-sm-6">
                <h3>Gráfico de Visitantes</h3>
                <canvas id="visitor-chart" width="100%"></canvas>
              </div>

              <div class="col-sm-6">
                <h3>Gráfico de Ocorrências</h3>
                <canvas id="occurrence-chart" width="100%"></canvas>
              </div>
          </div>

          <div class="row">
            <h3 style="margin-top: 10px;">Comunicados</h3>
          </div>

          <div class="row">
              <form action="<?=$base;?>/app/send_statement" method="POST" class="form container">
                  <textarea name="text-statement" class="form-control" id="text-statement" cols="50" rows="5" placeholder="Novo Comunicado"></textarea><br>
                  <input type="submit" class="btn btn-info" value="Publicar">
              </form>
          </div>

          <div class="container">
            <?php foreach($statementsFeed as $statementsFeedItem):?>
            <div class="statement-card">
              <h5><?=$statementsFeedItem->name;?></h5>
              <span>Em: <?php echo date('d/m/Y', strtotime($statementsFeedItem->date)); ?> às <?php echo date('H:i', strtotime($statementsFeedItem->date)); ?></span>
              <hr>
              <p><?php echo $statementsFeedItem->text; ?></p>
            </div>
            <?php endforeach;?>
          </div>        

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
<?php $render('footer'); ?>

<script>
      
$(document).ready(function(){

  dashgraphs();

});

function dashgraphs() 
{
    
    var ctx = document.getElementById('visitor-chart').getContext('2d');
    var myChart = new Chart(ctx, {

        type: 'line',
        data: {
            labels: ['<?=$mes;?>', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [{
                label: 'Visitantes',
                data: [12, 19, 3, 5, 2, 3, 5, 6, 12, 25, 23, 21],
                backgroundColor: [
                    '#C7E8ED'
                ],
                borderColor: [
                    '#148A9D'
                ],
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('occurrence-chart').getContext('2d');
    var myChart = new Chart(ctx, {

        type: 'line',
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [{
                label: 'Ocorrências',
                data: [11, 7, 2, 5, 9, 4, 2, 3, 12, 1, 4, 5],
                backgroundColor: [
                    '#e5a0a6'
                ],
                borderColor: [
                    '#DC3545'
                ],
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
  });

}

  </script>