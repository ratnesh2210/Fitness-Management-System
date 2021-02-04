	$(document).ready(function(){
	$.ajax({
		url : "http://localhost/project/gym-final/php/member_api.php",
		type : "json",
		success : function(data){
			console.log(data);
			var total_1 = data[0].total;
			var starter = data[1].starter;
			var basic = data[2].basic;
			var pro = data[3].pro;
			var unlimited = data[4].unlimited;

				var ctx = $("#member").get(0).getContext("2d");

				//pie chart data
				//sum of values = 360
				var data = [
					{
						value: (starter*(360/100)),
						color: "lightgreen",
						highlight: "yellowgreen",
						label: "Starter"
					},
					{
						value: (basic*(360/100)),
						color: "cornflowerblue",
						highlight: "lightskyblue",
						label: "Basic"
					},
					{
						value: (pro*(360/100)),
						color: "orange",
						highlight: "darkorange",
						label: "Pro"
					}
					,
					{
						value: (unlimited*(360/100)),
						color: "#009933",
						highlight: "#004d1a",
						label: "Unlimited"
					}

				];

				//draw
				var piechart = new Chart(ctx).Pie(data);
				document.getElementById("total1").innerHTML = total_1;
				document.getElementById("starter").innerHTML = starter;
				document.getElementById("basic").innerHTML = basic;
				document.getElementById("pro").innerHTML = pro;
				document.getElementById("unlimited").innerHTML = unlimited;
		},
		error : function(data) {

		}
	});
	
				
});