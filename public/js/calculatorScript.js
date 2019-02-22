


		function getDailyWattHr() {

    var theForm = document.forms["calculatorform"];
    var monthlyWattHr = theForm.elements["averageEnergyUse"];
    var dailyWattHr = 0;
    if (averageEnergyUse.value != "") {
        dailyWattHr = parseInt(((averageEnergyUse.value) / 30) * 1.1);
    }
    return dailyWattHr;
}


function getAvgSunHrs() {

    var theForm = document.forms["calculatorform"];
    var sunHr = theForm.elements["averageSun"];
    var avgSunHr = 0;
    if (averageSun.value != "") {
        avgSunHr = parseInt(averageSun.value);
    }
    return avgSunHr;
}


var systemVoltage = new Array();
systemVoltage["12"] = 12;
systemVoltage["24"] = 24;
systemVoltage["48"] = 48;


function getSytemVoltage() {
    var sysVoltage = 0;
    var theForm = document.forms["calculatorform"];
    var selectedVoltage = theForm.elements["battery"];
    sysVoltage = systemVoltage[selectedVoltage.value];
    return sysVoltage;
}
var daysOfAutonomy = new Array();
daysOfAutonomy["1"] = 1;
daysOfAutonomy["2"] = 2;
daysOfAutonomy["3"] = 3;
daysOfAutonomy["4"] = 4;
daysOfAutonomy["5"] = 45;


function getDaysOfAutonomy() {
    var autonomyDays = 0;
    var theForm = document.forms["calculatorform"];
    var selectedDays = theForm.elements["autonomy"];
    autonomyDays = daysOfAutonomy[selectedDays.value];
    return autonomyDays;
}
	//1.2 to cover energy loss			
function totalDailyRequirement(){
	var totalDailyReq = 0;
	var totalDailyReq = getDailyWattHr()*1.2;
	return totalDailyReq; 
}	
// current inamps
function totalPvCurrent(){
	var totalCurrent = 0;
	var totalCurrent = totalDailyRequirement()/getDaysOfAutonomy()
	return totalCurrent; 
}	

function batteryCapacity(){
	var minBatCapacity = 0;
	var minBatCapacity = (totalPvCurrent()*2)/getSytemVoltage();
	return minBatCapacity;
}	

function calculateTotal(){
	var totalWattsPerDay = totalDailyRequirement();
	var divobj = document.getElementById('wattDay');
	divobj.style.display  ='block';
	divobj.innerHTML  = "Total Watt Hours Per Day: "+ totalWattsPerDay;
}

function hideTotal()
{
    var divobj = document.getElementById('wattDay');
    divobj.style.display='none';
}
