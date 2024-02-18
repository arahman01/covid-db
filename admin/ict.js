	
window.onload = function () {
	
	var chart1 = new CanvasJS.Chart("chartContainer01", {
			animationEnabled: true,
			theme: "dark2", // "light1", "light2", "dark1", "dark2"
			title:{
				fontSize: 20,
				text: "Daily new covid-19 cases in islamabad"
			},
			axisY: {
				title: ""
			},
			data: [{        
				type: "column",  
				
				color: "#607d8b",
				
				
				dataPoints: [      
					{ y: 37, label: "May 7,2020" },
					{ y: 37, label: "May 8,2020" },
					{ y: 51, label: "May 9,2020" },
					{ y: 51, label: "May 10,2020" },
					{ y: 32, label: "May 11,2020" },
					{ y: 32, label: "May 12,2020" },
					{ y: 38, label: "May 14,2020" },
					{ y: 38, label: "May 15,2020" },
					{ y: 38, label: "May 16,2020" },
					{ y: 38, label: "May 17,2020" },
					{ y: 37, label: "May 18,2020" },
					{ y: 37, label: "May 19,2020" },
					{ y: 43, label: "May 20,2020" },
					{ y: 63, label: "May 21,2020" },
					{ y: 42, label: "May 22,2020" },
					{ y: 45, label: "May 23,2020" },
					{ y: 82, label: "May 24,2020" },
					{ y: 82, label: "May 25,2020" },
					{ y: 250, label: "May 26,2020" },
					{ y: 104, label: "May 27,2020" },
					{ y: 321, label: "May 28,2020" },
					{ y: 21, label: "May 29,2020" },
					{ y: 298, label: "May 30,2020" },
					{ y: 91, label: "May 31,2020" },
					{ y: 91, label: "june 1,2020" },
					{ y: 91, label: "june 2,2020" },
					{ y: 215, label: "june 3,2020" },
				]
			}]
		});
		
		
		chart1.render();
		
		var chart2 = new CanvasJS.Chart("chartContainer02", {
			animationEnabled: true,
			theme: "dark2", // "light1", "light2", "dark1", "dark2"
			title:{
				fontSize: 20,
				text: "Daily new covid-19 deaths in islamabad"
			},
			axisY: {
				title: ""
			},
			data: [{        
				type: "column",  
				
				color: "#660000",
				
				dataPoints: [      
					{ y: 37, label: "May 7,2020" },
					{ y: 0, label: "May 8,2020" },
					{ y: 51, label: "May 9,2020" },
					{ y: 0, label: "May 10,2020" },
					{ y: 32, label: "May 11,2020" },
					{ y: 0, label: "May 12,2020" },
					{ y: 38, label: "May 14,2020" },
					{ y: 38, label: "May 15,2020" },
					{ y: 38, label: "May 16,2020" },
					{ y: 38, label: "May 17,2020" },
					{ y: 37, label: "May 18,2020" },
					{ y: 37, label: "May 19,2020" },
					{ y: 43, label: "May 20,2020" },
					{ y: 63, label: "May 21,2020" },
					{ y: 42, label: "May 22,2020" },
					{ y: 45, label: "May 23,2020" },
					{ y: 82, label: "May 24,2020" },
					{ y: 82, label: "May 25,2020" },
					{ y: 250, label: "May 26,2020" },
					{ y: 104, label: "May 27,2020" },
					{ y: 321, label: "May 28,2020" },
					{ y: 21, label: "May 29,2020" },
					{ y: 298, label: "May 30,2020" },
					{ y: 91, label: "May 31,2020" },
					{ y: 91, label: "june 1,2020" },
					{ y: 91, label: "june 2,2020" },
					{ y: 215, label: "june 3,2020" },
				]
			}]
		});
	chart2.render();
	

	
	
// 	var chart3 = new CanvasJS.Chart("chartContainer03", {
// 	animationEnabled: true,
// 	theme: "dark2",
// 	title:{
// 		text: "Simple Line Chart"
// 	},
// 	axisY:{
// 		includeZero: false
// 	},
// 	data: [{        
// 		type: "line",
//       	indexLabelFontSize: 16,
// 		dataPoints: [
// 			{ x: new Date(2017, 0, 3), y: 650 },
// 			{ x: new Date(2017, 0, 4), y: 700 },
// 			{ x: new Date(2017, 0, 5), y: 710 },
// 			{ x: new Date(2017, 0, 6), y: 658 },
// 			{ x: new Date(2017, 0, 7), y: 734 },
// 			{ x: new Date(2017, 0, 8), y: 963 },
// 			{ x: new Date(2017, 0, 9), y: 847 },
// 			{ x: new Date(2017, 0, 10), y: 853 },
// 			{ x: new Date(2017, 0, 11), y: 869 },
// 			{ x: new Date(2017, 0, 12), y: 943 },
// 			{ x: new Date(2017, 0, 13), y: 970 },
// 			{ x: new Date(2017, 0, 14), y: 869 },
// 			{ x: new Date(2017, 0, 15), y: 890 },
// 			{ x: new Date(2017, 0, 16), y: 930 }
// 		]
// 	}]
// });
// chart3.render();

}


$(document).ready(function () {
$.getJSON("x.php", function (result) {

	var chart3 = new CanvasJS.Chart("chartContainer", {animationEnabled: true,
		theme: "dark2",
		title:{
			text: "Simple Line Chart"
		},
		axisY:{
			includeZero: false
		},
		data: [
			{
						type: "line",
						  indexLabelFontSize: 16,
				dataPoints: result
			}
		]
	});

	chart3.render();
});
});