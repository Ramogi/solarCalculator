

//calculates watt hours per day, given the watt hours per Month
// 30=nr of days/Month, 0.85=inverter efficiency 85%
	function getDailyWattHr() {

    var theForm = document.forms["calculatorform"];
    var monthlyWattHr = theForm.elements["averageEnergyUse"];
    var dailyWattHr = 0;
    if (averageEnergyUse.value != "") {
        dailyWattHr = parseInt(((averageEnergyUse.value) / 30*0.85));
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
	// Total energy req/day in Watt-hrs		
function totalDailyRequirement(){
	var totalDailyReq = 0;
	totalDailyReq = getDailyWattHr()*1.2;
	return totalDailyReq; 
}	
// current amp-hour demand per day
function totalPvCurrent(){
	var totalCurrent = 0;
	var totalCurrent = totalDailyRequirement()/getSytemVoltage();
	return totalCurrent; 
}	
// Required Pv Array output/Day in Watt-Hours
//0.85 battery efficieny
function pvArrayOutput(){
	var totalPvOutput = 0;
	totalPvOutput = totalPvCurrent()*0.85
return totalPvOutput;
}

// 0.8 Allowed Batt discharge level
function batteryCapacity(){
	var minBatCapacity = 0;
	var minBatCapacity = (totalPvCurrent()*getDaysOfAutonomy())/0.8;
	return minBatCapacity;
}	

function calculateTotal(){
	var totalWattsPerDay = Math.round(totalDailyRequirement());
	var totalAmpHrPerDay = Math.round(totalPvCurrent());

	var divobj = document.getElementById('wattDay');
	divobj.style.display  ='block';
	divobj.innerHTML  = "Total Energy Demand Per Day: "+ totalWattsPerDay +" watt-hours" ;

	var ampObj = document.getElementById('ampPerDay');
	ampObj.style.display  ='block';
	ampObj.innerHTML  = "Total amp-hour Demand Per Day: "+ totalAmpHrPerDay +" amp-hours" ;

	var batObj = document.getElementById('batteries');
	batObj.style.display  ='block';
	batObj.innerHTML  = "Required Battery Capacity: " + Math.round(batteryCapacity()) + " amp-hours";

	var pvObj = document.getElementById('pvCapacity');
	pvObj.style.display  ='block';
	pvObj.innerHTML  = "Required PV Array Output Per Day: " + Math.round(pvArrayOutput()) + " watt-hours";
}

function hideTotal()
{
    var divobj = document.getElementById('wattDay');
    divobj.style.display='none';

    var ampObj = document.getElementById('ampPerDay');
	ampObj.style.display  ='none';

	var batObj = document.getElementById('batteries');
	batObj.style.display  ='none';

	var pvObj = document.getElementById('pvCapacity');
	pvObj.style.display  ='none';
}
