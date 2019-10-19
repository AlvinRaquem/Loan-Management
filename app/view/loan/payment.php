<?php 

include __DIR__.'../../includes/header.php';
use controller\loancontroller;
$loancontroller = new loancontroller;

$displayID = '';
if($loan['type']=='Personal'){
  $displayID = "PL". $loan['refno']."-".date("y", strtotime($loan['dateloan']));
}elseif($loan['type']=='Motorcycle'){
  $displayID = "ML".$loan['refno']."-".date("y", strtotime($loan['dateloan']));;
}else{
  $displayID ="OL".$loan['refno']."-".date("y", strtotime($loan['dateloan']));;
}

?>



<section class="content-header">
	<h1>
		<span class="fa fa-edit"></span>
	  APPLICATION NO: <?= $displayID; ?>
	</h1>

</section>

<section class="content">
		<div class="panel panel-default">
   <div  class="panel-body">

       <?php
      if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
      }

      $_SESSION['message'] = '';


    ?>
    
    <form class="form-horizontal" method="POST" action="addpayment">
          <div class="panel panel-primary">
              <div class="panel-heading">
                <?php
                  echo $loan['refno']." - ". $loan['fullname']; 
                ?> 
              </div>
                  <div class="panel-body">
                    <input type="hidden" name="refno" value="<?php echo $loan['refno'];?>">
                    <input type="hidden" name="idno" value="<?php echo $loan['idno'];?>">

                      <div class="col-lg-12">
                        <table class="table table-bordered table-condensed table-striped">
                            <tr>
                              <th><h5>LOAN DATE:</h5></th>
                              <td><h5><?php echo $loan['dateloan']; ?></h5></td>
                              <input type="hidden" name="loanType" value="<?php echo $displayID; ?>">
                              <th><h5>START PAY:</h5></th>
                              <td><h5>
                                <?php //echo date('M',$loan['startPay'])." ". date('Y',$loan['startPay']); 
                                    echo $loan['startPay'];
                                ?></h5></td>
                            </tr>
                        </table>
                      </div>


                      <div class="col-lg-12">
                        <table class="table table-bordered table-condensed table-striped">
                            <tr>
                              <th><h5>LOAN TYPE:</h5></th>
                              <td><h5><?php echo $loan['type']; ?></h5></td>
                              <input type="hidden" name="loanType" value="<?php echo $displayID; ?>">
                              <th><h5>PURPOSE:</h5></th>
                              <td><h5><?php echo $loan['purpose']; ?></h5></td>
                            </tr>
                        </table>
                      </div>
                     
                     <div class="col-lg-12">
                        <table class="table table-bordered">
                            <tr>
                              <th>Loan Amount</th>
                              <th>Term Month(s)</th>
                              <th>Interest Rate (%)</th>
                              <th>Interest Income</th>
                              <th>Monthly Payment</th>
                              <th>Total Amount</th>
                              <th>Balance</th>
                            </tr>
                            <tr>


                              <td align="center"><?= number_format($loan['loanAmount'],2);?></td>
                              <td align="center"><?= $loan['termMonth'];?></td>
                              <td align="center"><?= $loan['interest'];?></td>
                              <td align="center"><?= number_format($loan['interestIncome'], 2);?></td>
                              <td align="center"><?= number_format($loan['montlyPayment'], 2);?></td>
                              <td align="center"><?= number_format($loan['ttlAmount'], 2);?></td>
                              <td align="center"><?= number_format($loan['balance'], 2);?></td>
                            </tr>
                        </table>
                      </div>
                      <input type="hidden" name="txtBalance" value="<?php echo $loan['balance']; ?>">

                      <div class="col-lg-12">
                        
                        <div class="form-group">
                           <div class="col-md-3">
                            <label>OR DATE</label>
                            <input type="date" name="ordate" class="form-control" value="<?php echo date('Y-m-d',time());?>" required>
                          </div>
                                
                          <div class="col-md-3">
                            <label>OR NUMBER</label>
                            <input type="text" name="ornumber" class="form-control" required>
                          </div>

                          <div class="col-md-3">
                            <label>LESS AMOUNT</label>
                            <input type="number"  step="0.01"name="oramount" class="form-control" required>
                          </div>
                          <div class="col-md-3">
                            <label>BANK</label>
                            <input type="text" name="bank" class="form-control" required>
                          </div>

                        </div>

                        <div class="form-group">
                          <div class="col-md-3">
                            <label>PAY MONTH</label>
                            <input type="date" name="paymonth" class="form-control" required>  
                          </div>
                          <div class="col-md-3">
                            <label>PARTICULARS</label>
                            <input type="text" name="particular" class="form-control" >
                          </div>


                          <div class="col-md-6">
                            <label>REMARKS</label>
                            <input type="text" name="remark" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-3">
                            <label>PRINCIPAL</label>
                            <input type="number" step="0.01" name="principal" id="principal" class="form-control" >
                          </div>
                          <div class="col-md-3">
                            <label>INTEREST</label>
                            <input type="number" step="0.01" name="interest" id="interest" class="form-control">
                          </div>
                          <div class="col-md-3">
                            <label>DST</label>
                            <input type="number" step="0.01" name="dst" id="dst" class="form-control">
                          </div>
                          <div class="col-md-3">
                            <label>INSURANCE</label>
                            <input type="number" step="0.01" name="insurance" id="insurance" class="form-control">
                          </div>
                        </div>

                          <div class="form-group">
                          <div class="col-md-3">
                            <label>OTHERS PENALTY</label>
                            <input type="number" step="0.01" name="penalty" id="penalty" class="form-control" >
                          </div>
                          <div class="col-md-8">
                            <div class="col-lg-12">
                            </div>
                            <h3><label>TOTAL : </label>
                            <label id="labelAmount"></label></h3>
                            <input type="hidden" name="total" id="total" class="form-control" readonly>
                          </div>
                        </div>


                        <!--  <input type="hidden" name="principal1" value="<?php echo $loan['loanAmount']; ?>" />
                                    <input type="hidden" name="interest" value="<?php echo $loan['interest']; ?>" /> -->

                <button style="margin: 15pt 10pt 0pt 10pt" class="btn btn-primary pull-right" type="submit" name="submit"><span class="fa fa-check"></span> SAVE</button>
              


                      </div>

                    </div>
                </div>
</form>

                        <!--# -->
                <div class="panel panel-primary">
                <div class="panel-heading">PAYMENT HISTORY</div>
                    <div class="panel-body">
                      <div class="table-responsive">
                          <table class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th><h5>#</h5></th>
                                      <th><h5>RecordID</h5></th>
                                      <th><h5>OR DATE</h5></th>
                                      <th><h5>OR Number</h5></th>
                                      <th><h5>Amount</h5></th>
                                      <th><h5>Bank</h5></th>
                                      <th><h5>Pay Month</h5></th>
                                      <th><h5>Remarks</h5></th>
                                      <th><h5>Principal</h5></th>
                                      <th><h5>Interest</h5></th>
                                      <th><h5>DST</h5></th>
                                      <th><h5>Insurance</h5></th>
                                      <th><h5>Other Penalty</h5></th>
                                      <th><h5>Total</h5></th>
                                      <th><h5>Created by</h5></th>
                                      <th><h5>Created Date</h5></th> 
                                      <th></th>     
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                    $ttlpayment = 0;

                    $ttl_amount = 0; 
                    $ttl_principal = 0; 
                    $ttl_interest = 0; 
                    $ttl_dst = 0; 
                    $ttl_insurance = 0; 
                    $ttl_penalty = 0; 
                    $ttl_total = 0; 

                    $ii = 1;

                    $paymentdata = $loancontroller->getPayments($loan['refno'],'0');

                    ?>

                    <?php foreach($paymentdata as $payment):?>
                        <tr>
                          <td><?= $ii++;?></td>
                          <td><?= $payment['payid'];?></td>
                          <td><?= $payment['ordate'];?></td>
                          <td><?= $payment['ornumber'];?></td>
                           <td align="right"><?= number_format($payment['amount'],2);?></td>
                            <td><?= $payment['bank'];?></td>
                            <?php
                              $strMonth = strtotime($payment['paymonth']);
                              $strMonth = date('M', $strMonth);

                              $strYr = date('Y', strtotime($payment['paymonth']));

                            ?>

                          <td><?= $strMonth." ".$strYr;?></td>
                          <td><?= $payment['particulars']." ".$payment['remarks'];?></td>
                          <td align="right"><?= number_format($payment['principal'],2);?></td>
                          <td align="right"><?= number_format($payment['interest'],2);?></td>
                          <td align="right"><?= number_format($payment['dst'],2);?></td>
                          <td align="right"><?= number_format($payment['insurance'],2);?></td>
                          <td align="right"><?= number_format($payment['penalty'],2);?></td>
                          <td align="right"><?= number_format($payment['total'],2);?></td>
                          <td><?= $payment['created'];?></td>
                          <td><?= $payment['createdDate'];?></td>
                          <td><button data-id="<?= $payment['payid'];?>" data-loanid="<?= $payment['refno'];?>" data-amount="<?= $payment['amount'];?>" class='btn btn-danger removepayment'><span class='fa fa-times'></span></button></td>

                          <?php

                        $ttlpayment = $ttlpayment + $payment['amount'];

                        $ttl_amount = $ttl_amount + $payment['amount']; 
                        $ttl_principal = $ttl_principal + $payment['principal']; 
                        $ttl_interest = $ttl_interest + $payment['interest']; 
                        $ttl_dst = $ttl_dst + $payment['dst']; 
                        $ttl_insurance = $ttl_insurance + $payment['insurance']; 
                        $ttl_penalty = $ttl_penalty + $payment['penalty']; 
                        $ttl_total = $ttl_total + $payment['total'];  

                        ?>
                      </tr>

                    <?php endforeach?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td></td><td></td><td></td><td></td>
                          <td align="right"><strong><?= number_format($ttl_amount,2);?></strong></td>
                            <td></td><td></td><td></td>
                            <td align="right"><strong><?= number_format($ttl_principal,2);?></strong></td>
                            <td align="right"><strong><?= number_format($ttl_interest,2);?></strong></td>
                            <td align="right"><strong><?= number_format($ttl_dst,2);?></strong></td>
                            <td align="right"><strong><?= number_format($ttl_insurance,2);?></strong></td>
                            <td align="right"><strong><?= number_format($ttl_penalty,2);?></strong></td>
                            <td align="right"><strong><?= number_format($ttl_total,2);?></strong></td>
                            <td></td><td></td><td></td>
                        </tr>
                      </tfoot>


                
                            </table>
                        
                    </div>
          </div>
        </div>

            <div class="panel panel-danger">
          <div class="panel-heading">
              DELETED PAYMENT HISTORY
          </div>
          <div class="panel-body">
                  <div class="table-responsive">

                            <table class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th><h5>#</h5></th>
                                      <th><h5>RecordID</h5></th>
                                      <th><h5>OR DATE</h5></th>
                                      <th><h5>OR Number</h5></th>
                                      <th><h5>Amount</h5></th>
                                      <th><h5>Bank</h5></th>
                                      <th><h5>Pay Month</h5></th>
                                      <th><h5>Remarks</h5></th>
                                      <th><h5>Principal</h5></th>
                                      <th><h5>Interest</h5></th>
                                      <th><h5>DST</h5></th>
                                      <th><h5>Insurance</h5></th>
                                      <th><h5>Other Penalty</h5></th>
                                      <th><h5>Total</h5></th>
                                      <th><h5>Created by</h5></th>
                                      <th><h5>Created Date</h5></th> 
                                      <th><h5>Reason</h5></th>  
                                      <th><h5>Last ModifiedBy</h5></th>   
                                      <th><h5>Last ModifiedDate</h5></th>      
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                    $ttlpayment = 0;

                    $ttl_amount = 0; 
                    $ttl_principal = 0; 
                    $ttl_interest = 0; 
                    $ttl_dst = 0; 
                    $ttl_insurance = 0; 
                    $ttl_penalty = 0; 
                    $ttl_total = 0; 

                    $ii = 1;

                    $paymentdata = $loancontroller->getPayments($loan['refno'],'1');

                    ?>

                    <?php foreach($paymentdata as $payment):?>
                        <tr>
                          <td><?= $ii++;?></td>
                          <td><?= $payment['payid'];?></td>
                          <td><?= $payment['ordate'];?></td>
                          <td><?= $payment['ornumber'];?></td>
                           <td align="right"><?= number_format($payment['amount'],2);?></td>
                            <td><?= $payment['bank'];?></td>
                            <?php
                              $strMonth = strtotime($payment['paymonth']);
                              $strMonth = date('M', $strMonth);

                              $strYr = date('Y', strtotime($payment['paymonth']));

                            ?>

                          <td><?= $strMonth." ".$strYr;?></td>
                          <td><?= $payment['particulars']." ".$payment['remarks'];?></td>
                          <td align="right"><?= number_format($payment['principal'],2);?></td>
                          <td align="right"><?= number_format($payment['interest'],2);?></td>
                          <td align="right"><?= number_format($payment['dst'],2);?></td>
                          <td align="right"><?= number_format($payment['insurance'],2);?></td>
                          <td align="right"><?= number_format($payment['penalty'],2);?></td>
                          <td align="right"><?= number_format($payment['total'],2);?></td>
                          <td><?= $payment['created'];?></td>
                          <td><?= $payment['createdDate'];?></td>
                          <td><?= $payment['reason'];?></td>
                          <td><?= $payment['LastModifiedby'];?></td>
                          <td><?= $payment['LastModifiedDate'];?></td>

                          <?php

                        $ttlpayment = $ttlpayment + $payment['amount'];

                        $ttl_amount = $ttl_amount + $payment['amount']; 
                        $ttl_principal = $ttl_principal + $payment['principal']; 
                        $ttl_interest = $ttl_interest + $payment['interest']; 
                        $ttl_dst = $ttl_dst + $payment['dst']; 
                        $ttl_insurance = $ttl_insurance + $payment['insurance']; 
                        $ttl_penalty = $ttl_penalty + $payment['penalty']; 
                        $ttl_total = $ttl_total + $payment['total'];  

                        ?>
                      </tr>

                    <?php endforeach?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td></td><td></td><td></td><td></td>
                          <td align="right"><strong><?= number_format($ttl_amount,2);?></strong></td>
                            <td></td><td></td><td></td>
                            <td align="right"><strong><?= number_format($ttl_amount,2);?></strong></td>
                            <td align="right"><strong><?= number_format($ttl_principal,2);?></strong></td>
                            <td align="right"><strong><?= number_format($ttl_interest,2);?></strong></td>
                            <td align="right"><strong><?= number_format($ttl_dst,2);?></strong></td>
                            <td align="right"><strong><?= number_format($ttl_penalty,2);?></strong></td>
                            <td align="right"><strong><?= number_format($ttl_total,2);?></strong></td>
                            <td></td><td></td><td></td>
                        </tr>
                      </tfoot>


                
                            </table>



                    </div>
          </div>

        </div>
                


   </div>
</div>

</section>
</div>




<?php include __DIR__.'../../includes/footer.php';?>

<script>
  
  $("#loanList").dataTable({
    lengthMenu: [[100,200,500,-1],['100','200','500','All']],
  });

</script>


<script type="text/javascript">

$(document).on('click','.removepayment',function(){
    var loanid = $(this).data('loanid');
    var amount = $(this).data('amount');
    var refno = $(this).data('id');
    var balance = "<?= $loan['balance'];?>";
    var reason = prompt("Are you sure want to delete this? Why?", "");


    if (reason == null || reason == ""){
     
    } else {
       $.ajax({
              url: 'removepayment',
              type: 'POST',
              data: '&refno='+refno+'&amount='+amount+'&loanid='+loanid+'&reason='+reason+'&balance='+balance,
              success: function(x){
                 window.location.href= './payment?RefNo='+loanid+'';
              }
             }) 

    }
 
});



 function currencyFormat(num) {
          return  num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }



function sumtotal(){

 var a = document.getElementById("principal").value; 
 var b = document.getElementById("interest").value;
 var c = document.getElementById("dst").value;  
 var d = document.getElementById("insurance").value; 
 var e = document.getElementById("penalty").value; 

 var sumall; 
 var totalall;

 if (a=="") {a = 0; } 
 if (b=="") {b = 0; } 
 if (c=="") {c = 0; } 
 if (d=="") {d = 0; } 
 if (e=="") {e = 0; } 


 sumall = parseFloat(a) + parseFloat(b) + parseFloat(c) + parseFloat(d) + parseFloat(e);


 
 return sumall;

}

$(document).on('keyup','#principal',function(){
    
    document.getElementById("total").setAttribute('value', sumtotal()); 
    document.getElementById("labelAmount").innerHTML = currencyFormat(parseFloat(sumtotal())); 
})

$(document).on('keyup','#interest',function(){
    
    document.getElementById("labelAmount").innerHTML = currencyFormat(parseFloat(sumtotal())); 
    document.getElementById("total").setAttribute('value', sumtotal()); 
})

$(document).on('keyup','#dst',function(){
   
   document.getElementById("labelAmount").innerHTML = currencyFormat(parseFloat(sumtotal())); 
   document.getElementById("total").setAttribute('value', sumtotal()); 

})

$(document).on('keyup','#insurance',function(){
    
    document.getElementById("labelAmount").innerHTML = currencyFormat(parseFloat(sumtotal())); 
    document.getElementById("total").setAttribute('value', sumtotal()); 
})

$(document).on('keyup','#penalty',function(){
    document.getElementById("labelAmount").innerHTML = currencyFormat(parseFloat(sumtotal())); 
    document.getElementById("total").setAttribute('value', sumtotal()); 
})

</script>


</body>
</html>