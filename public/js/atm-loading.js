var xTargetBank;
var xText;
$(document).ready(function(){
	
	//$('#div-date').show();
	$('#div_sites').hide();
	//$('#div_search').hide();
	$('#div_next').hide();
	//$('tbody#item-sites').html("<tr></tr>");
	
	Initialize();
	
});

var xTblRowCnt;var xRD='';
function Initialize(){
	$('button#btnSites').click(function() {
		var xDate = $('#txtLoad').val();
		xRD = $('#txtRequest').val();
		var itemval = $(this).val();
		xTargetBank = itemval;
		$('#div_bank').hide();
		$('#btnReselect').show();
		$('#lblBank').text(itemval.toUpperCase());
		$('input#txtBank').val(itemval.toUpperCase());
		$('#div_sites').show();
		$('#div_next').show();
        $('tbody#item-sites').load('proc/search-site-exec.php?search-bank='+encodeURIComponent(xTargetBank)+'&search-tid='+encodeURIComponent(xSearchTID)+'&RD='+encodeURIComponent(xRD),function(){
		xTblRowCnt = $('tbody#item-sites >tr').length; //Count Rows :D
		});
		$('#txtLoad').val(xDate);
	});
	
	$('#txtSearchItem').on({
   	 keyup: function(e)
	 {e.keyCode==13 ? PopulateTids() : '';}
	});	

}

function PopulateTids(){
	 xSearchTID = $('#txtSearchItem').val();
     $('tbody#item-sites').load('proc/search-site-exec.php?search-bank='+encodeURIComponent(xTargetBank)+'&search-tid='+encodeURIComponent(xSearchTID)+'&RD='+encodeURIComponent(xRD),function(){
 		xTblRowCnt = $('tbody#item-sites >tr').length; //Count Rows :D
		for(x=0;x<=xSelectedIDs.length-1;x++){ 	//Auto Check of the Checkboxes :D
		$('#'+xSelectedIDs[x]).prop('checked',true);			
		}
		$('#TIDs').val(xSelectedIDs);
		//if($('#txtSearchItem').val()!=""){highlightSearch("txtSearchItem","item-sites");} //Added Highlight command to easily reconizable :D (02/22/16)
	 });
}

function ValidateDates(){
if($('#txtRequest').val()!='' && $('#txtLoad').val()!='' && $('#txtWithdraw').val()!=''){
	$('#div_bank').fadeIn();
	xRD = $('#txtRequest').val();
	PopulateTids();
}
}

var xSelectedIDs=[];
function SelectID(ID){

	if($.inArray(ID,xSelectedIDs)!=-1){
		 xSelectedIDs.splice(xSelectedIDs.indexOf(ID), 1);
	} else {
	xSelectedIDs.push(ID);		
	}
	$('#TIDs').val(xSelectedIDs);
}