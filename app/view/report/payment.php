<?php include __DIR__.'../../includes/header.php';?>



<section class="content-header">
	<h1>
		<span class="fa fa-edit"></span>
	   <a href="./report_payment">Payment Report(s)</a>
	</h1>

</section>

<section class="content">
		<div class="panel panel-default">
   <div  class="panel-body">

     
          <div class="col col-md-12">
          <div class="panel panel-primary">
              <div class="panel-heading">&nbsp;</div>
                  <div class="panel-body">

                      <form role="form" method="POST" action="searchreportPayment">
            <div class="col-lg-4">
                          Search : 
                            <input class="form-control" type="text" name="txtSearch" />  
                        </div>
                        <div class="col-lg-8">
                          Date Range : 
                        </div>
                            <div class="col-lg-3">
                              <input type="date" class="form-control" name="dateFrom" />
                             </div>
                             <div class="col-lg-3">
                              <input type="date" class="form-control" name="dateTo" />
                             </div>                                           
                      <!--<div class="col-lg-12">-->

                <button style="margin: 15pt 10pt 0pt 10pt" class="btn btn-primary pull-right" type="submit" name="search"><span class="fa fa-check"></span> Submit</button>
                                
                      <!--</div>-->

                    </form>

                    </div>
                </div>
              
                 
                <div class="panel panel-primary">
                <div class="panel-heading">&nbsp;</div>
                    <div class="panel-body">
                      <div class="table-responsive" id="generated1">
                          <table class="table table-bordered table-hover tablesorter" id="generated">
                              <thead>
                                    <th># <i class="fa fa-sort"></i></th>
                                    <th>Loan Refno <i class="fa fa-sort"></i></th>
                                    <th>Name <i class="fa fa-sort"></i></th>
                                    <th>Payment Refno <i class="fa fa-sort"></i></th>
                                    <th>OR Number <i class="fa fa-sort"></i></th>
                                    <th>OR Date <i class="fa fa-sort"></i></th>
                                    <th>Amount <i class="fa fa-sort"></i></th>
                                    <th>PayMonth <i class="fa fa-sort"></i></th>
                                    <th>Particular <i class="fa fa-sort"></i></th>
                                    <th>Remarks <i class="fa fa-sort"></i></th>
                                    <th>Bank <i class="fa fa-sort"></i></th>
                                    <th>Principal <i class="fa fa-sort"></i></th>
                                    <th>Interest <i class="fa fa-sort"></i></th>
                                    <th>DST <i class="fa fa-sort"></i></th>
                                    <th>Insurance <i class="fa fa-sort"></i></th>
                                    <th>Other Penalty <i class="fa fa-sort"></i></th>
                                    <th>Total <i class="fa fa-sort"></i></th>
                                    <th>Created by <i class="fa fa-sort"></i></th>
                                    <th>Created Date <i class="fa fa-sort"></i></th>
                                </thead>
                                <tbody>
                              <?php
                              $ii = 1;
                              $ttl_amount = 0; 
                              $ttl_principal = 0; 
                              $ttl_interest = 0; 
                              $ttl_dst = 0; 
                              $ttl_insurance = 0; 
                              $ttl_penalty = 0; 
                              $ttl_total = 0; 

                              ?>

                              <?php foreach($reports as $row):?>
                                
                                <tr>
                                  <td><?= $ii++;?></td>
                                  <td><?= $row['loantype'];?></td>
                                  <td><?= $row['surname'].", ".$row['firstname'];?></td>
                                  <td><?= $row['payid'];?></td>
                                  <td><?= $row['ornumber'];?></td>
                                  <td><?= $row['ordate'];?></td>
                                  <td align="right"><?= number_format($row['amount'], 2);?></td>
                                  <?php
                                   $strMonth = strtotime($row['paymonth']);
                                    $strMonth = date('M', $strMonth);

                                    $strYr = date('Y', strtotime($row['paymonth']));

                                      $ttl_amount = $ttl_amount + $row['amount']; 
                                      $ttl_principal = $ttl_principal + $row['principal']; 
                                      $ttl_interest = $ttl_interest + $row['interest']; 
                                      $ttl_dst = $ttl_dst + $row['dst']; 
                                      $ttl_insurance = $ttl_insurance + $row['insurance']; 
                                      $ttl_penalty = $ttl_penalty + $row['penalty']; 
                                      $ttl_total = $ttl_total + $row['total']; 

                                    ?>
                                  <td><?= $strMonth." ".$strYr;?></td>
                                  <td><?= $row['particulars'];?></td>
                                  <td><?= $row['remarks'];?></td>
                                  <td><?= $row['bank'];?></td>
                                  <td align="right"><?= number_format($row['principal'], 2);?></td>
                                  <td align="right"><?= number_format($row['interest'], 2);?></td>
                                  <td align="right"><?= number_format($row['dst'], 2);?></td>
                                  <td align="right"><?= number_format($row['insurance'], 2);?></td>
                                  <td align="right"><?= number_format($row['penalty'], 2);?></td>
                                  <td align="right"><?= number_format($row['total'], 2);?></td>
                                  <td><?= $row['created'];?></td>
                                  <td><?= $row['createdDate'];?></td>

                                </tr>

                              <?php endforeach?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td></td>
                                <td>TOTAL</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="right"><?= number_format($ttl_amount, 2);?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="right"><?= number_format($ttl_principal, 2);?></td>
                                <td align="right"><?= number_format($ttl_interest, 2);?></td>
                                <td align="right"><?= number_format($ttl_dst, 2);?></td>
                                <td align="right"><?= number_format($ttl_insurance, 2);?></td>
                                <td align="right"><?= number_format($ttl_penalty, 2);?></td>
                                <td align="right"><?= number_format($ttl_total, 2);?></td>
                                <td></td>
                                <td></td>

                              </tr>

                            </tfoot>

                    
                                
                            </table>
                         </div>
                     </div>
                    </div>
                </div>
                
                
             <!--- # -->  
            </div>


   </div>
</div>

</section>
</div>




<?php include __DIR__.'../../includes/footer.php';?>

<?php 
  $date1 = date('y_m_d');
  $exportFilename = "report_".$date1;

?>

<!--<script type="text/javascript" src="js/tableexport/jquery-1.11.3.min.js"></script>-->
<script type="text/javascript" src="public/js/exportexcel/Blob.js"></script>
<script type="text/javascript" src="public/js/exportexcel/Export2Excel.js"></script>
<script type="text/javascript" src="public/js/exportexcel/FileSaver.js"></script>
<script type="text/javascript" src="public/js/exportexcel/xlsx.core.min.js"></script>
<script type="text/javascript" src="public/js/exportexcel/TableExport.js/jquery.tableexport.v2.js"></script>
<!--<script type="text/javascript" src="js/tableexport/main.js"></script>-->
<script type="text/javascript">
  //$("table").tableExport();

  $("table").tableExport({
    separator: ",",                         // [String] column separator, [default: ","]
    headings: true,                         // [Boolean], display table headings (th elements) in the first row, [default: true]
    buttonContent: "Export",                // [String], text/html to display in the export button, [default: "Export file"]
    addClass: "",                           // [String], additional button classes to add, [default: ""]
    defaultClass: "btn",                    // [String], the default button class, [default: "btn"]
    defaultTheme: "btn-default",            // [String], the default button theme, [default: "btn-default"]
    type: "[xlsx, csv, txt]",               // [xlsx, csv, txt], type of file, [default: "csv"]
    fileName: "<?php echo $exportFilename; ?>",                     // [id, name, String], filename for the downloaded file, [default: "export"]
    position: "bottom",                     // [top, bottom], position of the caption element relative to table, [default: "bottom"]
    stripQuotes: true ,                      // [Boolean], remove containing double quotes (.txt files ONLY), [default: true]

});

</script>
</body>
</html>