<?php 

include __DIR__.'../../includes/header.php';
use controller\loancontroller;
$loancontroller = new loancontroller;
?>



<section class="content-header">
	<h1>
		<span class="fa fa-edit"></span>
	   Loan List(s)
	</h1>

</section>

<section class="content">
		<div class="panel panel-default">
   <div  class="panel-body">

     
         <div class="table-responsive">
          <table class="table table-bordered table-striped table-condensed" id="loanList">
              <thead>
                <tr>
                    <th>RefNo <i class="fa fa-sort"></i></th>
                    <th>Date Loan<i class="fa fa-sort"></i></th>
                    <th>Id no <i class="fa fa-sort"></th>
                    <th>Name <i class="fa fa-sort"></i></th>
                    <th>Employer <i class="fa fa-sort"></i></th>
                    <th>Business <i class="fa fa-sort"></i></th>
                    <th>Type <i class="fa fa-sort"></i></th>
                    <th>Payment<i class="fa fa-sort"></i></th>
                    <th>Loan Amount<i class="fa fa-sort"></i></th>
                    <th>Total Amount <i class="fa fa-sort"></i></th>
                    <th>Monthly <i class="fa fa-sort"></i></th>
                    <th>Document  <i class="fa fa-sort"></i></th>
                    <th>CI <i class="fa fa-sort"></i></th>
                    <th>Check Voucher <i class="fa fa-sort"></i></th>
                    <th>Rem Balance <i class="fa fa-sort"></i></th>
<!--                     <th></th> -->
                    <th>Status <i class="fa fa-sort"></th>

                </tr>
              </thead>

              <tbody>
                  <?php foreach($loans as $loan):?>
                    <?php
                   
                        $paymentDisplay = $loancontroller->paymentdata($loan['refno'],$loan['balance'],date('m', strtotime($loan['startPay'])),$loan['status']);

                          if ($loan['requirementResult']=="COMPLETE"){
                            $requirementResultclass = "text-success";
                          }else{
                             $requirementResultclass = "text-danger";
                          }

                          if ($loan['ciResult']=="PASSED"){
                            $ciResultclass = "text-success";
                          }else{
                            $ciResultclass = "text-danger";
                          }

                         if ($loan['voucherStatus']=="RELEASED"){
                          $voucherStatusclass = "text-success";
                         }else{
                          $voucherStatusclass = "text-danger";
                         }

                         $loanprefix = "";
                         $loansuffix = "-".date("y", strtotime($loan['dateloan']));

                         switch($loan['type']){
                          case 'Personal' :
                              $loanprefix = 'PL';
                              break;
                          case 'Motorcycle' :
                              $loanprefix = 'ML';
                              break;
                          default: 
                              $loanprefix ='OL';
                              break;
                         }

                    ?>


                      <tr class="<?= $paymentDisplay[0];?>">
                      <td>
                        <select class="form-control" onchange="getAction(this,<?=urlencode($loan['refno']);?>)">
                            <option disabled selected><?= $loanprefix.$loan['refno'].$loansuffix;?></option>
                            <option value="1">Details</option>
                              <?php if($loan['status']==1):?>
                            <option value="2">Payment</option>
                          <?php endif?>
                        </select>

                       <!--  <a href="loanDetails?loanID=<?=urlencode($loan['refno']);?>"><?= $loanprefix.$loan['refno'].$loansuffix;?></a></td> -->
                      <td><?= $loan['dateloan'];?></td>
                      <td><?= $loan['idno'];?></td>
                      <td><?= $loan['surname'].", ".$loan['firstname']." ".$loan['middlename'];?></td>
                      <td><?= $loan['employerName'];?></td>
                      <td><?= $loan['selfBusinessName'];?></td>
                      <td><?= $loan['type'];?></td>
                      <td><?= $loan['payment'];?></td>
                      <td align="right"><?= number_format($loan['loanAmount'], 2);?></td>
                      <td align="right"><?= number_format($loan['ttlAmount'], 2);?></td>
                      <td align="right"><?= number_format($loan['montlyPayment'], 2);?></td>
                      <td><p class="<?= $requirementResultclass;?>"><?= $loan['requirementResult'];?></p></td>
                      <td><p class="<?= $ciResultclass;?>"><?= $loan['ciResult'];?></p></td>
                      <td><p class="<?= $voucherStatusclass;?>"><?= $loan['voucherStatus'];?></p></td>
                      <?php if($loan['status']==1):?>
                       <td align="right"><?= number_format($loan['balance'], 2);?></td>
                     <!--  <td><a href="payment?RefNo=<?= urlencode($loan['refno']);?>">payment</a></td> -->
                      <?php else:?>
                      <td></td>
                     <!--  <td></td> -->
                      <?php endif?>
                      <td><?= $paymentDisplay[1];?></td>

                    </tr>
                  <?php endforeach?>
              </tbody>


          </table>


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
	
	
  function getAction(e,refno){
    let action = e.value;

    if(e.value == 1){
      window.location.href = "loanDetails?loanID="+refno;
    }else{
      window.location.href = "payment?RefNo="+refno;
    }
  }


</script>

</body>
</html>
