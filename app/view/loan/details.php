<?php 
include __DIR__.'../../includes/header.php';
use controller\loancontroller;
$loancontroller = new loancontroller;

$displayID = '';
if($loan[0]['type']=='Personal'){
  $displayID = "PL". $loan[0]['refno']."-".date("y", strtotime($loan[0]['dateloan']));
}elseif($loan[0]['type']=='Motorcycle'){
  $displayID = "ML".$loan[0]['refno']."-".date("y", strtotime($loan[0]['dateloan']));;
}else{
  $displayID ="OL".$loan[0]['refno']."-".date("y", strtotime($loan[0]['dateloan']));;
}

?>



<section class="content-header">
	<h1>
		<span class="fa fa-info"></span>
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

        <form role="form" method="POST" action="updateloan">
  <div class="row">
    <div class="col col-md-12">
         
                    <input type="hidden" name="txtidno" value="<?=$_GET['loanID'];?>">
                    <div class="form-group">
                      <div class="col col-md-4">
                                <label>Loan Date</label>
                                <input type="date" name="txtLoanDate" class="form-control" value="<?= $loan[0]['dateloan'];?>" placeholder="" required>
                            </div>
                    </div>
                    <div class="form-group">
                      <div class="col col-md-4">
                                <label>Type of Loan</label>
                                <select class="form-control" name="typeloan" required>
                                  <option><?= $loan[0]['type'];?></option>
                                  <option>Personal</option>
                                  <option>Motorcycle</option>
                                  
                                </select>
                                <!--
                                <input type="text" name="typeOthers" class="form-control" placeholder="if others type here" value = "<?php echo $typeOthers; ?>"> -->
                            </div>
                    </div>
                    <div class="form-group">
                      <div class="col col-md-4">
                                <label>Purpose</label>
                                <input type="text" name="txtPurpose" class="form-control" placeholder="" value="<?= $loan[0]['purpose'];?>" required>
                            </div>
                    </div>
                    <div class="form-group">
                      <div class="col col-md-12">
                                <label></label>
                            </div>
                    </div>
                    <div class="form-group">
                      <div class="col col-md-4">
                                <label>Amount</label>
                                <input type="number" step="0.01" name="txtAmount" class="form-control" id="loan_amount" placeholder=""  value="<?= $loan[0]['loanAmount'];?>" required>
                            </div>
                            <div class="col col-md-2">
                                <label>Term Month(s) </label>
                                <input type="number" name="txtTerms" class="form-control" id="loan_terms" placeholder="" value="<?= $loan[0]['termMonth'];?>" required>
                            </div>
                             <div class="col col-md-2">
                                <label>Interest (%) </label>
                                <input type="number" name="txtInterest" step="0.01" class="form-control" id="loan_interest" value="<?= $loan[0]['interest'];?>" placeholder="" required>
                            </div>
                            <div class="col col-md-4">
                                <label>Payment </label>
                               <select class="form-control" name="txtPayment" required>
                                  <option><?= $loan[0]['payment'];?>
                                  <option>Salary Deduction</option>
                                  <option>Post Dated Checks</option>
                         <option>Cash Payment</option>
                                </select>
                            </div>
                            <div class="col col-md-4">
                                <label>Start Payment </label>
                                <input type="date" name="startPay" class="form-control" value="<?= $loan[0]['startPay'];?>">
                            </div>

                            <div class="col col-md-2">
                                <label>Total Amount:</label>
                                <!--<input type="date" name="duedate" id="duedate">-->
                                <label class="form-control" id="label_totalamount"></label>

                                <button class="btn btn-primary pull-left hidden" type="button" id="showAddModal"><span class="fa fa-plus"></span> View Computation</button>
                            </div>

                             <div class="form-group">
                              <div class="col-md-12">
                                <label></label>
                              </div>
                            </div>


                            <div class="form-group">
                              <div class="col-md-12">
                                <label>REQUIREMENTS</label>
                              </div>
                            </div>
                              <div class="form-group">
                                  <div class="col-md-12">
                                  <table class="table table-bordered table-striped table-condensed">
                                            <thead>
                                              <tr>
                                                <th>#</th>
                                                <th>Requirement</th>
                                                <th>Status</th>
                                                <th>Image</th>
                                                <th>Date Submitted</th>
                                                <th>Upload</th>
                                         
                                             </tr>

                                            </thead>

                                            <tbody>
                                              <?php $x=1;?>
                                                <?php foreach($requirements as $requirement):?>
                                                  <?php 

                                                  $data = $loancontroller->checkstatusRequirement($loan[0]['refno'],$requirement['idno']);
                                                  $countdata = $data != NULL ? count($data) : 0;
                                                  ?>
                                                  <tr>
                                                      <td><?= $x++;?></td>
                                                      <td><?php echo $requirement['requirement'];?></td>
                                                     
                                                      <?php if($countdata==0):?>
                                                       <td><span class="text-danger">PENDING</span></td>
                                                       <td>
                                                      
                                                       </td>
                                                       <td></td>
                                                       <td>
                                                        <a href="javascript:void(0)" class="showUploadModal" data-des="<?= $requirement['requirement'];?>" data-loan="<?= $loan[0]['refno'];?>" data-req="<?= $requirement['idno'];?>">Upload</a>
                                                       </td>
                                                    <?php else:?>
                                                         <td><span class="text-success">DONE</span></td>
                                                        <td>

                                                          <a href="javascript:void(0)" data-img="<?= $data['img'];?>" class="viewimage">view image</a>
                                                         
                                                        </td>
                                                        <td><?php echo $data['DateSubmitted'];?></td>
                                                        <td><a style="color: maroon;" class="removereq" href="javascript:void(0)" data-img="<?= $data['img'];?>"  data-loan="<?= $loan[0]['refno'];?>" data-req="<?= $requirement['idno'];?>">REMOVE</a>
                                                        </td>
                                                    <?php endif?>
                                                  </tr>
                                                <?php endforeach?>
                                            </tbody>
                                  </table>
                                </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-10">
                                <label>Remarks / Findings</label>
                                <input type="text" name="txtDocsReq" class="form-control" value="<?= $loan[0]['requirementRemarks'];?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-2">
                                <label>Result</label>
                                <select class="form-control" name="txtDocResult">
                                  <option><?= $loan[0]['requirementResult'];?></option>
                                  <option>COMPLETE</option>
                                  <option>INCOMPLETE</option>
                                </select>
                              </div>
                            </div> 



                             <div class="form-group">
                                <div class="col-md-12">

                                
                            </div>
         
                             <div class="form-group">
                              <div class="col-md-12">
                                <label></label>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <label>CREDIT INVESTIGATION REPORT</label>
                              </div>
                            </div>
                            <div>
                       
                            </div>
                                
                            </div>

                            <div class="form-group">
                              <div class="col-md-10">
                                <label>Remarks / Findings</label>
                                <input type="text" name="txtciRemarks" class="form-control" value="<?= $loan[0]['ciRemarks'];?>">
                              </div>
                            </div>
                             <div class="form-group">
                              <div class="col-md-2">
                                <label>Result</label>
                                <select class="form-control" name="txtciResult">
                                    <option><?= $loan[0]['ciResult'];?></option>
                                        <option>PENDING</option>
                                  <option>PASSED</option>
                                  <option>FAILED</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <label></label>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <label>CHECK DETAILS</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-4">
                                <label>CHECK No</label>
                                <input type="text" name="txtVoucherNo" class="form-control"  value="<?= $loan[0]['voucherNo'];?>">
                              </div>
                            </div>
                             <div class="form-group">
                              <div class="col-md-4">
                                <label>Booking No</label>
                                <input type="text" name="txtVoucherBook" class="form-control"   value="<?= $loan[0]['bookingNo'];?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-4">
                                <label>Amount Released</label>
                                <input type="number" name="txtAmountReleased" step="0.01" class="form-control"  value="<?= $loan[0]['amountReleased'];?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-4">
                                <label>Date Released</label>
                                <input type="date" name="dateReleased" class="form-control"  value="<?= $loan[0]['dateReleased'];?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-4">
                                <label>Status</label>
                                <select class="form-control" name="voucherStatus">
                                   <option><?= $loan[0]['voucherStatus'];?></option>
                                  <option>PENDING</option>
                                  <option>ON-HOLD</option>
                                  <option>RELEASED</option>
                                </select>
                              </div>
                            </div> 
                            <div class="modal-footer">
                      
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right"> Update Loan</button>  
                              </div> 
                            </div>
                            
                    </div>
                  </div>
    
        </div>
    </div>
    </form>


   </div>

<div class="panel panel-default">
  <div class="panel-header"></div>
  <div class="panel-body">
        <div id="myDivPrint">
                    <center><strong style="font-size: 16pt;">Loan Computation</strong></center><hr/>
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td style="background:#F9F9F9;"><strong>LOAN AMOUNT</strong></td>
                            <td style="background:white;">  <label id="label_amount">000.00</label>
                                <input type="hidden" name="p_loanAmount" id="p_loanAmount" /></td>

                           <td style="background:#F9F9F9;"><strong>TERM</strong></td>
                           <td style="background:white;"><label id="label_term">000.00</label> <label> Months</label>
                          <input type="hidden" name="p_term" id="p_terms" /></td>
                        </tr>

                            <tr>
                            <td style="background:#F9F9F9;"><strong>INTEREST RATE</strong></td>
                            <td style="background:white;"> <label id="label_rate">000.00</label><label>% per month</label>
                                <input type="hidden" name="p_interest" id="p_interest" /></td>

                           <td style="background:#F9F9F9;"><strong>INTEREST INCOME</strong></td>
                           <td style="background:white;"> <label id="label_income">000.00</label></td>
                        </tr>


                          <tr>
                            <td style="background:#F9F9F9;"><strong>MONTHLY PAYMENT</strong></td>
                            <td style="background:white;"><label id="label_monthly">000.00</label></td>
                        </tr>

                    </table>


                  
                    <div class="form-group">
                      <table class="table table-bordered table-hover" id="tableCompute">
                        <thead>
                          <tr>
                            <th>PERIOD</th>
                            <th>MONTHLY PAYMENTS</th>
                            <th>INTEREST RATE p.m</th>
                            <th>INTEREST</th>
                            <th>PRINCIPAL REDUCTION</th>
                            <th>OUTSTANDING BALANCE</th>
                          </tr>
                        </thead>
                        <tbody id="tbodyCompute">
                          
                        </tbody>
                      </table>
                    </div>
            <div class="col-md-12">
                             
                        </div>  
                      </div>
                           <button type="button" onclick="printContent('myDivPrint')" id="Print" name="Print" class="btn btn-primary pull-right"> Print</button> 
                                <a href="loan_list"><button type="button" class="btn btn-default pull-left">Close</button> </a>
  </div>

    


   </div>
</div>

<div id="uploadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload <span id="reqdes" style="color: green;font-weight: bold;"></span> Requirement</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal" action="uploadRequirement" method="POST" enctype="multipart/form-data">
    
                <div class="form-group">
                  <label class="col-lg-2 control-label">File</label>
                  <div class="col-lg-10">
                    <input type="hidden" name="txtloanID" id="txtLoanID">
                    <input type="hidden" name="txtReqID" id="txtReqID">
                    <input type="file" name="imgfile" class="form-control" accept=".png,.jpg" required>
                    <span class="errormessage" id="requirementerror"></span>
                  </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary pull-right">Upload</button>
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </form>
      </div>
    </div>

  </div>
</div>


<div id="imgModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" style="text-align: center;">
           
             <img id="imgview" style="height: 700px;width: 800px;">



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</section>
</div>




<?php include __DIR__.'../../includes/footer.php';?>
<script type="text/javascript">
 // function calcularIMC(){
    //var modalContent = document.getElementById('tablebody');
    //modalContent.innerHTML = "<tr><td>sdfs</td><td>sdfsd</td>"; 

  //}

  $(document).on('click','.viewimage',function(){
    let img = $(this).data('img');
    $("#imgview").attr("src","public/documents_Uploads/"+img);
    $('#imgModal').modal('show');
  });

  $(document).on('click','.removereq',function(){
    let loanid = $(this).data('loan');
    let reqid = $(this).data('req');
    let img = $(this).data('img');

    if(confirm("Are you sure you want to remove this?")){
        $.ajax({
          url: 'removeReqLoan',
          type: 'POST',
          data: '&loanid='+loanid+'&reqid='+reqid+'&img='+img,
          success:function(res){
         
             window.location.href = window.location.href;
          }
        })
    }
  });


  $(document).on('click','.showUploadModal',function(){
    $('#reqdes').text($(this).data('des'));
    $("#txtLoanID").val($(this).data('loan'));
    $("#txtReqID").val($(this).data('req'));
    $('#uploadModal').modal('show');

  });

  function currencyFormat(num) {
                return  num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }


  function printContent(el){
    var restorepage = $('body').html();
    var printcontent = $('#' + el).clone();
    $('body').empty().html(printcontent);
    window.print();
    $('body').html(restorepage);
  }

  function computeLoan(){
           // $('#AddModal').modal('show');
        var lamount = document.getElementById("loan_amount").value; 
        var lterms = document.getElementById("loan_terms").value; 
        var linterest = document.getElementById("loan_interest").value; 
        
        var table = document.getElementById('tableCompute');
        //var mytablebody = document.getElementById('tbodyCompute');
        
        document.getElementById('label_amount').innerHTML = currencyFormat(parseFloat(lamount)); 
        document.getElementById('label_term').innerHTML = lterms; 
        document.getElementById('label_rate').innerHTML = linterest; 

        $("#tableCompute tbody tr").remove(); 

        var percent;
        var lincome;
        var lmonthly;
        var lmonthly2;
        var permonth;
        var permonth2;
        var perbalance;
        var itemno;
        var ttlMontly;
        var ttlInterest;
        var ttlPrincipal;

        percent = (linterest / 100);
        lincome = (lamount * percent * lterms);
        lmonthly = parseFloat(lamount) + parseFloat(lincome);
        lmonthly2 = (lmonthly / lterms);
        permonth2 = ( parseFloat(lamount) / lterms);

        document.getElementById('label_income').innerHTML = currencyFormat(parseFloat(lincome)); 
        document.getElementById('label_monthly').innerHTML = currencyFormat(parseFloat(lmonthly2)); 

        
        var i;
        var tabledata = "";

        tabledata = "<tr>" + 
                        "<td></td>" + "<td></td>" + "<td></td>" + 
                        "<td></td>" + "<td></td>" + "<td>" + currencyFormat(parseFloat(lamount)) + "</td></tr>";

        perbalance = parseFloat(lamount);
        ttlMontly = 0;
        ttlInterest = 0; 
        ttlPrincipal = 0; 

        for (i = 0; i < lterms; i++) { 
            permonth = parseFloat(lincome) / lterms;
            itemno = parseFloat(i) + parseFloat(1);
            perbalance = parseFloat(perbalance) - parseFloat(permonth2);
            tabledata = tabledata + "<tr>" + 
                    "<td>" + itemno  + "</td>" + 
                    "<td>" +  currencyFormat(parseFloat(lmonthly2)) + "</td>" + 
                    "<td>" + linterest  +"% </td>" + 
                    "<td>" +  currencyFormat(parseFloat(permonth)) + "</td>" + 
                    "<td>" +  currencyFormat(parseFloat(permonth2)) + "</td>" + 
                    "<td>" +  currencyFormat(parseFloat(perbalance)) + "</td>" + 
                    "</tr>";
            ttlMontly = parseFloat(ttlMontly) + parseFloat(lmonthly2);
            ttlInterest = parseFloat(ttlInterest) + parseFloat(permonth);
            ttlPrincipal = parseFloat(ttlPrincipal) + parseFloat(permonth2);
        }

        tabledata = tabledata + "<tr>" + 
                    "<td></td>" + 
                    "<td>" +  currencyFormat(parseFloat(ttlMontly)) + "</td>" + 
                    "<td></td>" + 
                    "<td>" +  currencyFormat(parseFloat(ttlInterest)) + "</td>" + 
                    "<td>" +  currencyFormat(parseFloat(ttlPrincipal)) + "</td>" + 
                    "<td></td>" + 
                    "</tr>";

        $('#tableCompute tbody').append(tabledata);
        document.getElementById('label_totalamount').innerHTML = currencyFormat(parseFloat(ttlMontly));
  }

  $(document).on('keyup','#loan_amount,#loan_terms,#loan_interest',function(){
     computeLoan();
  })


  $(document).on('click','#showAddModal',function(){

      computeLoan();
    })

  $(document).ready(function(){
    computeLoan();
  })


</script>
</body>
</html>