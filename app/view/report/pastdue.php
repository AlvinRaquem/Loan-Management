<?php 

include __DIR__.'../../includes/header.php';
use model/loan;
$loan = new loan;
$search = "ALL";
if (isset($_POST['btnSearch'])){
     $search = $_POST['search'];  
}

$dMonthNow = date("m");
$dYearNow = date('Y');
$dateNow = date('Y-m-d');

?>



<section class="content-header">
	<h1>
		<span class="fa fa-edit"></span>
	 <a href="report_pastdue">LOAN PAST DUE</a> 
  
	</h1>

</section>

<section class="content">
		<div class="panel panel-default">
   <div  class="panel-body">
          <div class="col col-md-12">
          <div class="panel panel-primary">
              <div class="panel-heading">BORROWERS LIST</div>
                  <div class="panel-body">

                    <form role="form" method="POST" action="">
                    <div class="form-group">
                            <div class="col col-md-2">
                                <label>Search</label>
                            </div>
                                <div class="col col-md-4">  
                                  <select name="search" class="form-control">
                                    <option><?php echo $search; ?></option>
                                    <option>ALL</option>
                                    <option>due month</option>
                                    <option>over due</option>
                                  </select>
                                </div>
                                <div class="col col-md-4">
                                  <button type="submit" class="btn btn-info" name="btnSearch" >Submit</button>
                                </div>
                        </div>
                      </form>
                    
                      <div class="col-lg-12">
                        <div class="table-responsive">
                          <table class="table table-bordered tablesorter">
                            <thead>
                            <tr>
                              <th>RefNo <i class="fa fa-sort"></i></th>
                              <th>Date Loan<i class="fa fa-sort"></i></th>
                              <th>Id no <i class="fa fa-sort"></th>
                              <th>Name <i class="fa fa-sort"></i></th>
                              <th>Due Month <i class="fa fa-sort"></i></th>
                              <th>Balance <i class="fa fa-sort"></i></th>
                              <th>Remarks <i class="fa fa-sort"></i></th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $grandTotal = 0;?>

                              <?php foreach($reports as $row):?>
                                  <?php
                                   $remarks = "";
                                    $idno = $row['idno'];
                                    $refno = $row['refno'];
                                    $strStartPay = strtotime($row['startPay']);
                                    $strLoanMonth = date('m', $strStartPay);
                                    $strLoanYear = date('Y', $strStartPay);
                                    $monthlypayment = $row['montlyPayment'];
                                    $displayName = $row['surname'].", ".$row['firstname'];
                                    $loanDate = $row['dateloan'];

                                      $displayID = "";
                                      if ($row['type']=="Personal"){
                                        $displayID = "PL".$refno."-".date("y", strtotime($row['dateloan']));
                                      } elseif ($row['type']=="Motorcycle") {
                                        $displayID = "ML".$refno."-".date("y", strtotime($row['dateloan']));;
                                      } else {
                                        $displayID ="OL".$refno."-".date("y", strtotime($row['dateloan']));;
                                      }

                                       switch ($search) {
                                              case 'due month':

                                          $dateMonth = date('m');
                                          $dateYear = date('Y');
                                          $dateMonth2 = date('M');

                                    $sqlPay = "select * from loan_tbl_payment where refno='$refno' and MONTH(paymonth)='$dateMonth' and YEAR(paymonth)='$dateYear' and isDelete='0'";
                                    $sqlPay = stripslashes($sqlPay);
                                    $resPay = $loan->generateSQL($sqlPay);
                                    $rwCnt = $resPay != NULL ? count($resPay) : 0;

                                      if ($rwCnt>0){
                                        $balanceAmount = $monthlypayment;
                                   
                                        foreach($resPay as $rp){
                                          $balanceAmount = $balanceAmount - $rp['amount'];
                                        }
                                        if ($balanceAmount>0){
                                            echo '<tr class="warning">';
                                            echo "<td>".$displayID."</td>";
                                            echo "<td>".$loanDate."</td>";
                                            echo "<td>".$idno."</td>";
                                            echo "<td>".$displayName."</td>";
                                            echo "<td>".$dateMonth2." ".$dateYear."</td>";
                                            echo '<td align="right">'.number_format($balanceAmount, 2)."</td>";
                                            echo "<td>overdue</td>";
                                            echo "</tr>";
                                            $grandTotal = $grandTotal + $balanceAmount; 
                                        }

                                      } else {
                                        echo '<tr class="warning">';
                                          echo "<td>".$displayID."</td>";
                                          echo "<td>".$loanDate."</td>";
                                          echo "<td>".$idno."</td>";
                                          echo "<td>".$displayName."</td>";
                                          echo "<td>".$dateMonth2." ".$dateYear."</td>";
                                          echo '<td align="right">'.number_format($monthlypayment, 2)."</td>";
                                          echo "<td>due month</td>";
                                          echo "</tr>"; 
                                          $grandTotal = $grandTotal + $monthlypayment; 
                                      }


                                  
                                  break;

                                  case 'over due':
                                  //Overdue 

                                  //Overdue 
                                  $date1=date_create($row['startPay']);
                                  $date2=date_create($dateNow);
                                  $diff=date_diff($date1,$date2);
                                  $diff2 =  $diff->format("%m");
                                  //$diff2 = $diff2 + 1;

                                  $nextPay = $row['startPay'];
                                  for ($x=0; $x<=$diff2; $x++){
                                    $nextPay = strtotime($nextPay);
                                    $displayYear = date('Y', $nextPay);
                                    $displayMonth = date('M', $nextPay);

                                    $dateMonth = date('m', $nextPay);
                                    $dateYear = date('Y', $nextPay);
                                    $nextPay= date('Y-m-d', strtotime("+1 month", $nextPay));


                                    if ((date('m')!=$dateMonth) || (date('Y')!=$dateYear)){
                                      $sqlPay = "select * from loan_tbl_payment where refno='$refno' and MONTH(paymonth)='$dateMonth' and YEAR(paymonth)='$dateYear' and isDelete='0'";
                                      $sqlPay = stripslashes($sqlPay);
                                        $resPay = $loan->generateSQL($sqlPay);
                                         $rwCnt = $resPay != NULL ? count($resPay) : 0;

                                        if ($rwCnt>0){
                                          $balanceAmount = $monthlypayment;
                                      
                                        foreach($resPay as $rp){
                                          $balanceAmount = $balanceAmount - $rp['amount'];
                                        }
                                          if ($balanceAmount>0){
                                            echo '<tr class="danger">';
                                              echo "<td>".$displayID."</td>";
                                              echo "<td>".$loanDate."</td>";
                                              echo "<td>".$idno."</td>";
                                              echo "<td>".$displayName."</td>";
                                              echo "<td>".$displayMonth." ".$displayYear."</td>";
                                              echo '<td align="right">'.number_format($balanceAmount, 2)."</td>";
                                              echo "<td>overdue</td>";
                                              echo "</tr>"; 
                                              $grandTotal = $grandTotal + $balanceAmount;
                                          }

                                        } else {
                                          echo '<tr class="danger">';
                                            echo "<td>".$displayID."</td>";
                                            echo "<td>".$loanDate."</td>";
                                            echo "<td>".$idno."</td>";
                                            echo "<td>".$displayName."</td>";
                                            echo "<td>".$displayMonth." ".$displayYear."</td>";
                                            echo '<td align="right">'.number_format($monthlypayment, 2)."</td>";
                                            echo "<td>overdue</td>";
                                            echo "</tr>"; 
                                            $grandTotal = $grandTotal + $monthlypayment;
                                        }

                                    }
                                  

                                    
                                  }     

                                  
                                  break;

                                    default:

                                  //Overdue 
                                  $date1=date_create($row['startPay']);
                                  $date2=date_create($dateNow);
                                  $diff=date_diff($date1,$date2);
                                  $diff2 =  $diff->format("%m");
                                  //$diff2 = $diff2 + 1;

                                  $nextPay = $row['startPay'];
                                  for ($x=0; $x<=$diff2; $x++){
                                    $nextPay = strtotime($nextPay);
                                    $displayYear = date('Y', $nextPay);
                                    $displayMonth = date('M', $nextPay);

                                    $dateMonth = date('m', $nextPay);
                                    $dateYear = date('Y', $nextPay);
                                    $nextPay= date('Y-m-d', strtotime("+1 month", $nextPay));
                                    

                                    if ((date('m')!=$dateMonth) || (date('Y')!=$dateYear)){
                                      $sqlPay = "select * from loan_tbl_payment where refno='$refno' and MONTH(paymonth)='$dateMonth' and YEAR(paymonth)='$dateYear' and isDelete='0'";
                                      $sqlPay = stripslashes($sqlPay);
                                       $resPay = $loan->generateSQL($sqlPay);
                                         $rwCnt = $resPay != NULL ? count($resPay) : 0;

                                        if ($rwCnt>0){
                                          $balanceAmount = $monthlypayment;
                                         
                                        foreach($resPay as $rp){
                                          $balanceAmount = $balanceAmount - $rp['amount'];
                                        }
                                          if ($balanceAmount>0){
                                            echo '<tr class="danger">';
                                              echo "<td>".$displayID."</td>";
                                              echo "<td>".$loanDate."</td>";
                                              echo "<td>".$idno."</td>";
                                              echo "<td>".$displayName."</td>";
                                              echo "<td>".$displayMonth." ".$displayYear."</td>";
                                              echo '<td align="right">'.number_format($balanceAmount, 2)."</td>";
                                              echo "<td>overdue</td>";
                                              echo "</tr>"; 
                                              $grandTotal = $grandTotal + $balanceAmount;
                                          }

                                        } else {
                                          echo '<tr class="danger">';
                                            echo "<td>".$displayID."</td>";
                                            echo "<td>".$loanDate."</td>";
                                            echo "<td>".$idno."</td>";
                                            echo "<td>".$displayName."</td>";
                                            echo "<td>".$displayMonth." ".$displayYear."</td>";
                                            echo '<td align="right">'.number_format($monthlypayment, 2)."</td>";
                                            echo "<td>overdue</td>";
                                            echo "</tr>"; 
                                            $grandTotal = $grandTotal + $monthlypayment;
                                        }
                                    }
                                    
                                  }     

                                  //due month
                                  $dateMonth = date('m');
                                  $dateYear = date('Y');
                                  $dateMonth2 = date('M');

                                  $sqlPay = "select * from loan_tbl_payment where refno='$refno' and MONTH(paymonth)='$dateMonth' and YEAR(paymonth)='$dateYear' and isDelete='0'";
                                    $sqlPay = stripslashes($sqlPay);
                                    $resPay = $loan->generateSQL($sqlPay);
                                         $rwCnt = $resPay != NULL ? count($resPay) : 0;

                                      if ($rwCnt>0){
                                        $balanceAmount = $monthlypayment;
                                       
                                        foreach($resPay as $rp){
                                          $balanceAmount = $balanceAmount - $rp['amount'];
                                        }
                                        if ($balanceAmount>0){
                                          echo '<tr class="warning">';
                                            echo "<td>".$displayID."</td>";
                                            echo "<td>".$loanDate."</td>";
                                            echo "<td>".$idno."</td>";
                                            echo "<td>".$displayName."</td>";
                                            echo "<td>".$dateMonth2." ".$dateYear."</td>";
                                            echo '<td align="right">'.number_format($balanceAmount, 2)."</td>";
                                            echo "<td>overdue</td>";
                                            echo "</tr>"; 
                                            $grandTotal = $grandTotal + $balanceAmount;
                                        }

                                      } else {
                                        echo '<tr class="warning">';
                                          echo "<td>".$displayID."</td>";
                                          echo "<td>".$loanDate."</td>";
                                          echo "<td>".$idno."</td>";
                                          echo "<td>".$displayName."</td>";
                                          echo "<td>".$dateMonth2." ".$dateYear."</td>";
                                          echo '<td align="right">'.number_format($monthlypayment, 2)."</td>";
                                          echo "<td>due month</td>";
                                          echo "</tr>"; 

                                          $grandTotal = $grandTotal + $monthlypayment;
                                      }


                                  break;

                                       }
                                  ?>

                              <?php endforeach?>



                             <tfoot>
                             <?php 
                              echo "<tr>";
                            echo "<td>TOTAL</td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo '<td align="right">'.number_format($grandTotal, 2)."</td>";
                            echo "<td></td>";
                            echo "</tr>"; 

                            ?>

                          </tfoot>
                         

                          </table>
                        </div>
                      </div>


                    </div>
                </div>

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