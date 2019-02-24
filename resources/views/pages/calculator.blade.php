@extends('layouts.apps')
@section('title','Solar Calculator')
@section('content')
<div class="energyUse">
	<div class="container-fluid">
		<h3>Enter Details About your Energy Use</h3>
		<form action="/location" method="POST" id="calculatorform" >
			{{ csrf_field() }}
			<fieldset>
				<legend>Energy Consumption</legend>
				<table>
					<tr>
						<td><label >Average Monthly Energy Use</label></td>
						<td><input  type="number"  name="averageEnergyUse" id="averageEnergyUse" onchange="calculateTotal()"/></td></tr>
						<tr><td><label >Sun Hours Per Day</label></td>
						<td><input  type="number"  name="averageSun" id="averageSun" min="1" max="20"  onchange="calculateTotal()" /></td></tr>
						<tr>
							<td><label >Days of Autonomy</label></td>
							<td>
								<select  id="autonomy" name='autonomy'
									onchange="calculateTotal()">
									<option value="None">Days of Autonomy</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label >Battery Bank Capacity</label></td>
							<td>
								<select  id="battery" name='battery'
									onchange="calculateTotal()">
									<option value="12" default>12</option>
									<option value="24">24</option>
									<option value="48">48</option>
								</select>
							</td>
						</tr>
						<tr><td><label >Location</label></td><td><input class="" type="text" placeholder="Enter your Location" name="location" aria-label=""><input type="submit" class="Calculate"></td></tr>
					</table>
					<div class="results" id="wattDay"></div>
					<div class="results" id="ampPerDay"></div>
					<div class="results" id="batteries"></div>
					<div class="results" id="pvCapacity"></div>
					<div class="results" id="inverterSize"></div>
					
				</fieldset>
			</form>
		</div>
	</div>

	@endsection