var itemval="";
$(document).ready(function(){
	$('#user-add-modal').on('shown.bs.modal', function () {
		itemval = $('input#txtSearch').val();
		//alert('proc/modal-search-site.php?search-bank='+itemval);
		$('tbody#modal-table').load('proc/modal-search-site.php?search-bank='+itemval,function(){
		xTblRowCnt = $('tbody#modal-table >tr').length; //Count Rows :D
		for(x=0;x<=xSelectedIDs.length-1;x++){ 	//Auto Check of the Checkboxes :D
		$('#'+xSelectedIDs[x]).prop('checked',true);			
		}
		$('#TIDs').val(xSelectedIDs);	
	});
	});
	
	$('input#txtSearch').keyup(function () {
		itemval = $(this).val();
		//alert('proc/modal-search-site.php?search-bank='+itemval);
		$('tbody#modal-table').load('proc/modal-search-site.php?search-bank='+itemval,function(){
		xTblRowCnt = $('tbody#modal-table >tr').length; //Count Rows :D
		for(x=0;x<=xSelectedIDs.length-1;x++){ 	//Auto Check of the Checkboxes :D
		$('#'+xSelectedIDs[x]).prop('checked',true);			
		}
		$('#TIDs').val(xSelectedIDs);	
		//if($('input#txtSearch').val()!=""){highlightSearch("txtSearch","modal-table >tr >td:eq(1)");} //Added Highlight command to easily reconizable :D (02/22/16)
		});
	});

});

var xSelectedIDs=[];
function SelectID(ID){
	if($.inArray(ID,xSelectedIDs)!=-1){
		 xSelectedIDs.splice(xSelectedIDs.indexOf(ID), 1);
	} else {
	xSelectedIDs.push(ID);		
	}
	$('#TIDs').val(xSelectedIDs);
}