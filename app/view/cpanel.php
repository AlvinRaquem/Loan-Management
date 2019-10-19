<?php include __DIR__.'/includes/header.php';?>



<section class="content-header">
	<h1>
		<span class="fa fa-home"></span>
		HomePage
	</h1>
</section>

<section class="content">
		<div class="panel panel-default">
   <div  class="panel-body">


      <div class="row">
        <div class="col-lg-3 col-xs-6">
       
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><span id="systemuser">0</span></h3>

              <p>Loan Applicant(s)</p>
            </div>
            <div class="icon">
              <i class="fa fa-edit"></i>
            </div>
          <!--   <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
        
          <div class="small-box bg-red">
            <div class="inner">
              <h3><span id="department">0</span></h3>

              <p>Personal Loan</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
         
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><span id="userID">0</span></h3>

              <p>Motorcycle Loan</p>
            </div>
            <div class="icon">
              <i class="fa fa-motorcycle"></i>
            </div>
          <!--   <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
         
          <div class="small-box bg-green">
            <div class="inner">
              <h3><span id="profile">0</span></h3>

              <p>Profile(s)</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
          <!--   <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
      </div>
  <div class="panel panel-default">
    <div class="panel-body">
        <div class="col-lg-12" id='container' style="max-height:100%;height:500px;"></div>
    </div>
  </div>

   </div>
</div>

</section>
</div>







<?php include __DIR__.'/includes/footer.php';?>
<script type="text/javascript">
 
$(document).ready(function(){
  generatechart();
  setInterval(function(){generatechart()},3600000);
})

function generatechart(){
    $.ajax({
     url: 'getpreviousdata',
     type: 'POST',
     success:function(x){
        getchart(x);
     } 
   }) 
}

 function getchart(datas) {
    var records = JSON.parse(datas);
    $('#systemuser').text(records['systemuser']);
    $('#department').text(records['department']);
    $('#userID').text(records['userID']);
    $('#profile').text(records['profile']);

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo date('Y',time());?> Payment(s) Records'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['January','February','March','April','May','June','July','August','September','October','November','December'],
            crosshair: true,
            title: {
                text: '',
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Payments'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Payment',
            data: records['displayarray'],
            color: 'dimgray',
        }]
    });
};
</script>
</body>
</html>