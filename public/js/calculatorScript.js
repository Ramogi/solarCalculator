
$(function(){

	
var loadCalc=(function(){

	var addRow, html, rowCount, tableBody, tableRow, totalWatts,hrs,qty,watts;
		addRow=$("#addRow");
		rowCount=$("#loadTable tbody tr").length + 1;
		tableBody=$("#loadTable tbody");





	function formHtml(){

		html = '<tr id="row_'+ rowCount +'" bgcolor="#e4e4e4" align="center" class="inputRow">';
		html += '<td>';
		html +=	'<input type="text" name="appliance[]" id="appliance_'+ rowCount +'" class="appliance form-control input-md"/>';
		html += '</td>';
		html += '<td>';
		html +=	'<input type="number" name="quantity[]" id="quantity_'+ rowCount +'" value=""class="numbersOnly form-control input-md"/>';
		html += '</td>';
		html += '<td>';
		html +=	'<input type="number" name="acwatts[]" id="acwatts_'+ rowCount +'" value="" class="numbersOnly form-control input-md"/>';
		html += '</td>';
		html += '<td>';
		html += '<input type="number" name="hours[]" id="hours_'+ rowCount +'" value=""class="hours form-control input-md"/>';
		html += '</td>';
		html += '<td>';
		html += '<input type="text" name="total[]" id="total_'+ rowCount +'" value="0" class="form-control input-md"/>';							
		html += '</td>';
		html += '<td bgcolor="#e4e4e4" class="x-spot" id="delete_'+ rowCount +'">';
		html += '<input class="x btn-danger form-control input-md" type="button" name="sysLoss" Value="X"/>';									
		html += '</td>';
		html += '<tr>';
		rowCount++;	
		return html;															
								
	}


	function getId(element){

		var id, idArr;
		id = element.attr('id');
		idArr = id.split("_");
		return idArr[idArr.length-1];
	}


		

	function addNewRow(){

		tableBody.append(formHtml());
	}

	function deleteRow(){

		var currentEle, rowNo;
		currentEle = $(this);
		rowNo = getId(currentEle);
		$("row_"+rowNo).remove();
	}

	


	function registerEvents(){
		addRow.on("click", addNewRow);
		$(document).on("click",'.x-spot',deleteRow);
	}


	function init(){
		registerEvents();

	}

	

	return{
		init: init
	};


	
})();




$(document).ready(function(){
	loadCalc.init();

	

});

});


