	$(document).ready(function(){
	$.ajax({
		url : "http://localhost/project/gym-final/php/gender_api.php",
		type : "json",
		success : function(data){
			console.log(data);
			var total = data[0].total;
			var male = data[1].male;
			var female = data[2].female;
			var other = data[3].other;

				var ctx = $("#gender").get(0).getContext("2d");

				//pie chart data
				//sum of values = 360
				var data = [
					{
						value: (male*(360/100)),
						color: "lightgreen",
						highlight: "yellowgreen",
						label: "Male User"
					},
					{
						value: (female*(360/100)),
						color: "cornflowerblue",
						highlight: "lightskyblue",
						label: "Female User"
					},
					{
						value: (other*(360/100)),
						color: "orange",
						highlight: "darkorange",
						label: "Other User"
					}

				];

				//draw
				var piechart = new Chart(ctx).Pie(data);
				document.getElementById("total").innerHTML = total;
				document.getElementById("male").innerHTML = male;
				document.getElementById("female").innerHTML = female;
				document.getElementById("other").innerHTML = other;
		},
		error : function(data) {

		}
	});
	
				
});