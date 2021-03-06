$(document).ready(function(){
	$.ajax({
		url : "http://localhost/project/gym-final/php/income_api.php",
		type : "json",
		success : function(data){
			console.log(data);
			var date = [];
			var value = [];

			for(var i in data) {
				date.push(data[i].date);
				value.push(data[i].value);
			}

			var chartdata = {
				labels: date,
				datasets: [
					{
						label: "Income",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: value
					}
				]
			};

			var ctx = $("#income_by_month");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});