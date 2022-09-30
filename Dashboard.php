<?php
include 'check.php';
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashbord-หน้าหลัก</title>
  <meta charset="UTF-8">
  
  <?php include 'script.php';?>
  <?php 
  $rs_balance = $conn->query("SELECT a.sum-b.sum as balance FROM (\n".
    " SELECT *,SUM(money_in.amount) as sum FROM money_in WHERE money_in.user_id = ".$_SESSION['id']."\n".
    ") as a \n".
    "INNER JOIN (SELECT *,SUM(money_out.amount) as sum FROM money_out WHERE money_out.user_id = ".$_SESSION['id'].") as b ON\n".
    "(a.user_id = b.user_id) AND a.user_id = ".$_SESSION['id']);
  $data_balance = $rs_balance->fetch_array();
  
  $balance = $data_balance['balance'];
  $mouth = 30;
  $sum = number_format($balance/$mouth);
  
  //-------------------------------------------------- [ data table1]
  $rs_table_sum_in = $conn->query("SELECT DATE_FORMAT(a.time_reg,'%d %M %Y') AS date , a.sum_in , b.sum_out 
        , (a.sum_in-b.sum_out) AS sum_all
        FROM(
        SELECT sum(money_in.amount) AS sum_in , money_in.time_reg , money_in.user_id FROM money_in 
        WHERE money_in.user_id = ".$_SESSION['id']."
        GROUP BY DATE(money_in.time_reg)
        ) AS a
        
        LEFT JOIN (
        SELECT sum(money_out.amount) AS sum_out , money_out.time_reg , money_out.user_id   FROM money_out 
        WHERE money_out.user_id = ".$_SESSION['id']."
        GROUP BY DATE(money_out.time_reg)
        ) AS b 
        ON (
        DATE(a.time_reg) = DATE(b.time_reg) AND 
        a.user_id = b.user_id AND a.user_id = ".$_SESSION['id']."
        )");
    ?>


  </head>
  <body>
    <div class="wrapper" >
      <?php include 'newTopBar.php';?>
      <div class="container-fluid" style="margin-top:-5%">
        <div class="row">
          <?php include 'SideLeftBar.php';?>
          <div class="content-wrapper">
            <!----------------------------------------------------------------------Cash,Daily budget---------------------------------------------------------------------->
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6"  style="margin-top: 5% ; margin-bottom: 10px" >
                  <h4 class="mb-0">Dashboard-หน้าหลัก</h4>
                </div>
                <div class="col-sm-6"  style="margin-top: 5% ; margin-bottom: 10px">
                  <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php"
                      class="default-color">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                  <div class="card card-statistics h-100">
                    <div class="card-body">
                      <div class="clearfix">
                        <div class="float-left">
                          <span class="text-success"> <i
                            class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                          </span>
                        </div>
                        <div class="float-right text-right">
                          <p class="card-text text-dark">ยอดเงินคงเหลือ</p>
                          <h4><?php echo $balance." บาท"?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                  <div class="card card-statistics h-100">
                    <div class="card-body">
                      <div class="clearfix">
                        <div class="float-left">
                          <span class="text-warning"> <i
                            class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                          </span>
                        </div>
                        <div class="float-right text-right">
                          <p class="card-text text-dark">งบประมาณวันนี้</p>
                          <h4><?php echo $sum." บาท";?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!----------------------------------------------------------------------Chart---------------------------------------------------------------------->
              <div class="row">
                <div class="col-md-6 mb-30">
                  <div class="card h-100">
                    <div class="card-body">
                      <h5 class="card-title"><i class="fa fa-pie-chart"></i>  รายรับ-รายจ่ายวันนี้</h5>
                      <div class="chart-wrapper">
                        <div id="canvas-holder"
                        style="width: 100%; margin: 0 auto; height: 300px;">
                        <canvas id="income_today" width="400" height="259"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-30">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title"><i class="fa fa-bar-chart-o"></i> รายรับ-รายจ่ายเดือนนี้</h5>
                    <div class="chart-wrapper" style="width: 100%; margin: 0 auto;">
                      <canvas id="chartM" width="400" height="259"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="page-title">
              <!----------------------------------------------------------------------table---------------------------------------------------------------------->
              
            </div>
            <div class="row">
              <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">

                  <div class="card-body">
                    <h5 class="card-title"><i class="fa fa-table"></i>  สรุปรายการ รายรับ - รายจ่ายทั้งหมดของ <?php  echo $_SESSION['name']?></h5>
                    <div class="table-responsive">
                      <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>วันที่</th>
                            <th>รายรับ</th>
                            <th>รายจ่าย</th>
                            <th>คงเหลือ/วัน</th>
                            <th>ผลวิเคราะห์</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $i=1;
                          while($data_table_sum_m = $rs_table_sum_in->fetch_array()){?>
                            <tr>
                              <td><?php echo $i ?></td>
                              <td><?php echo $data_table_sum_m['date']?></td>
                              <td><?php echo $data_table_sum_m['sum_in']?></td>
                              <td><?php echo $data_table_sum_m['sum_out']?></td>
                              <td><?php echo $data_table_sum_m['sum_all']?></td>
                              <?php if($data_table_sum_m['sum_all'] < 0){?>
                               <td style="color: red"><?php echo 'ใช้จ่ายมากเกินไป'?></td>
                              <?php }else{?>
                               <td style="color: green"><?php echo 'ใช้จ่ายกำลังดี'?></td>
                              <?php }?>
                            </tr>
                            <?php $i++; }?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    
                  </div>
                  
                </div>
                
                <div class="col-xl-12 mb-30">     
                  <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                     <h5 class="card-title">กราฟสรุป รายรับ-รายจ่าย ทั้งหมด</h5>
                     <div class="tab round shadow">
                      <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active show" id="home-08-tab" data-toggle="tab" href="#home-08" role="tab" aria-controls="home-08" aria-selected="true"> <p><i class="fa fa-bar-chart-o"></i> รายจ่ายทั้งหมด</p></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-08-tab" data-toggle="tab" href="#profile-08" role="tab" aria-controls="profile-08" aria-selected="false"><p><i class="fa fa-bar-chart-o"></i> รายรับทั้งหมด</p> </a>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane fade active show" id="home-08" role="tabpanel" aria-labelledby="home-08-tab">
                          <canvas id="chartOut" width="400" height="150"></canvas>
                        </div>
                        <div class="tab-pane fade" id="profile-08" role="tabpanel" aria-labelledby="profile-08-tab">
                         <canvas id="chartIn" width="400" height="150"></canvas>
                       </div>
                     </div> 
                   </div>
                 </div>
               </div>   
             </div>

           </div>

           <?php include 'Footer.php';?>
         </div>
         <script src="include/RandColor.js"></script>
         <script>


          var numMounth = []; 
          $(document).ready(function() {

            $.post('dataToGraph.php', function(data) {
              console.log(data);

              var num = [];

              num.push(data[0].a);
              num.push(data[1].b);

            //----------------------- Chart 1 --------------------
            var ctx = document.getElementById('income_today').getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'doughnut',
              data: {
                labels: ['Income', 'Expense'],
                datasets: [{
                  label: '# of Votes',

                  data: num,
                  backgroundColor: [
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
                  ],
                  borderColor: [
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
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
            
            
            
  //----- end post          
})

// chart Mounth
$.post('dataToGraphMonth.php', function(dataMounth) {
  console.log('---------------');
  console.log(dataMounth);

  numMounth.push(dataMounth[0].a);
  numMounth.push(dataMounth[1].b);
            //----------------------- Chart 2 --------------------
            var ctx = document.getElementById('chartM').getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['Income', 'Expense'],
                datasets: [{
                  label: 'Hide Chart',

                  data: numMounth,
                  backgroundColor: [
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
                  ],
                  borderColor: [
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
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
          });

  //--------------------Chart Sum Money Out
  var numM_Out = new Array(2); 
  var data_label = new Array(2);
  $.post('dataToGraphOut.php', function(dataM_Out) {
    console.log('++++++++++++++++++');
    console.log(dataM_Out[0].sum);

    for (i = 0; i < dataM_Out.length; i++) {
      console.log('sum : '+dataM_Out[i][0].sum);
      numM_Out[i] = dataM_Out[i][0].sum;
      data_label[i] = dataM_Out[i][0].detail;
    }
    console.log(numM_Out);
    console.log('---------');
    console.log(data_label);

            //----------------------- Chart 3 --------------------
            var ctx = document.getElementById('chartOut').getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: data_label,
                datasets: [{
                  label: 'Hide Chart',

                  data: numM_Out,
                  backgroundColor: RandColor.getArray(dataM_Out.length),
                  borderColor: [
                  'rgba(153, 102, 255, 3)'
                  ],
                  borderWidth: 1
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
          });
  
  
            //--------------------Chart Sum Money In
            var numM_In = new Array(2); 
            var data_in_label = new Array(2);
            $.post('dataToGraphIn.php', function(dataM_In) {
              console.log('++++++++++++++++++');
              console.log(dataM_In[0].sum);

              for (i = 0; i < dataM_In.length; i++) {
                console.log('sum : '+dataM_In[i][0].sum);
                numM_In[i] = dataM_In[i][0].sum_in;
                data_in_label[i] = dataM_In[i][0].detail;
              }
              console.log(numM_In);
              console.log('---------');
              console.log(data_in_label);

            //----------------------- Chart 4 --------------------
            var ctx = document.getElementById('chartIn').getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: data_in_label,
                datasets: [{
                  label: 'Hide Chart',

                  data: numM_In,
                  backgroundColor: RandColor.getArray(dataM_In.length),
                  borderColor: [
                  'rgba(153, 102, 255, 3)'
                  ],
                  borderWidth: 1
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
          });
            
  //---------------- fn ready 
});
</script>


</body>
</html>