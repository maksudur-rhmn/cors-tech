// Tooltip init
$(document).ready(function () {
	$('[data-toggle="tooltip"]').tooltip();
});

// Chart JS
// Bar chart init
window.onload = function () {
	CanvasJS.addColorSet("customShades", [
		//colorSet Array
		"#888B99",
		"#9CADFD",
	]);

	var chart = new CanvasJS.Chart("chartContainer", {
		backgroundColor: "#0D132F",
		colorSet: "customShades",

		title: {
			text: "Weeks",
			fontColor: "#fff",
		},

		axisY: {
			tickColor: "transparent",
			labelFontSize: 0,
			labelFontColor: "transparent",
			lineColor: "transparent",
			gridColor: "transparent",
		},

		axisX: {
			labelFontSize: 12,
			labelFontColor: "white",
			lineColor: "transparent",
			gridColor: "transparent",
		},
		data: [
			{
				type: "column",
				dataPoints: [
					{ x: 1, y: 71 },
					{ x: 2, y: 55 },
					{ x: 3, y: 50 },
					{ x: 4, y: 65 },
					{ x: 5, y: 95 },
					{ x: 6, y: 68 },
					{ x: 7, y: 28 },
					{ x: 8, y: 34 },
					{ x: 9, y: 14 },
				],
			},
		],
	});

	chart.render();
};

// Apex Chart => Area Chart

var options = {
	series: [
		{
			name: "STOCK ABC",
			data: series.monthDataSeries1.prices,
		},
	],
	colors: ["#4F80FC"],
	chart: {
		type: "area",
		height: 350,
		toolbar: {
			show: false,
		},
		zoom: {
			enabled: false,
		},
	},
	markers: {
		size: 0,
	},
	fill: {
		type: "gradient",
		gradient: {
			shadeIntensity: 1,
			opacityFrom: 0.5,
			opacityTo: 0.9,
			stops: [0, 90, 100],
		},
	},
	dataLabels: {
		enabled: false,
	},
	stroke: {
		curve: "smooth",
	},

	// title: {
	// 	text: "Fundamental Analysis of Stocks",
	// 	align: "left",
	// },
	// subtitle: {
	// 	text: "Price Movements",
	// 	align: "left",
	// },
	labels: series.monthDataSeries1.dates,
	xaxis: {
		// labels: {
		// 	show: false,
		// },
		type: "datetime",
		// axisBorder: {
		// 	show: false,
		// },
		// axisTicks: {
		// 	show: false,
		// },
	},
	// xaxis: {
	// 	categories: ["01 Jan", "02 Jan", "03 Jan", "04 Jan", "05 Jan", "06 Jan", "07 Jan"],
	// },
	grid: {
		show: false,
	},

	yaxis: {
		// opposite: true,
		labels: {
			show: false,
		},
		axisBorder: {
			show: false,
		},
		axisTicks: {
			show: false,
		},
	},
	// legend: {
	// 	horizontalAlign: "left",
	// },
};

var generateDayWiseTimeSeries = function (baseval, count, yrange) {
	var i = 0;
	var series = [];
	while (i < count) {
		var x = baseval;
		var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

		series.push([x, y]);
		baseval += 86400000;
		i++;
	}
	return series;
};

var stackOptions = {
	series: [
		{
			name: "South",
			data: generateDayWiseTimeSeries(new Date("11 Feb 2017 GMT").getTime(), 20, {
				min: 10,
				max: 60,
			}),
		},
		{
			name: "North",
			data: generateDayWiseTimeSeries(new Date("11 Feb 2017 GMT").getTime(), 20, {
				min: 10,
				max: 20,
			}),
		},
	],
	grid: {
		show: false,
	},
	fill: {
		type: "gradient",
		gradient: {
			shadeIntensity: 1,
			opacityFrom: 0.5,
			opacityTo: 0.9,
			stops: [0, 90, 100],
		},
	},
	chart: {
		type: "area",
		height: 300,
		stacked: true,
		toolbar: {
			show: false,
		},
		zoom: {
			enabled: false,
		},
		events: {
			selection: function (chart, e) {
				console.log(new Date(e.xaxis.min));
			},
		},
	},

	colors: ["#008FFB", "#000"],
	dataLabels: {
		enabled: false,
	},
	stroke: {
		curve: "smooth",
	},
	legend: {
		position: "top",
		horizontalAlign: "left",
	},
	xaxis: {
		type: "datetime",
		labels: {
			show: false,
		},
		axisBorder: {
			show: false,
		},
		axisTicks: {
			show: false,
		},
	},
	yaxis: {
		labels: {
			show: false,
		},
		axisBorder: {
			show: false,
		},
		axisTicks: {
			show: false,
		},
	},
};

// chart init
var newsChart = new ApexCharts(document.querySelector(".stacked-chart"), stackOptions);
newsChart.render();

var chartSales = new ApexCharts(document.querySelector(".sales-chart"), options);
chartSales.render();

var chartProfile = new ApexCharts(document.querySelector(".profile-visit-chart"), options);
chartProfile.render();

var generalSales = new ApexCharts(document.querySelector(".general-sales-chart"), options);
generalSales.render();

// Quantity Button
const quantityBox = document.querySelectorAll(".quantity-button-box");
const dec = document.querySelectorAll(".btn-dec");
const inc = document.querySelectorAll(".btn-inc");

// event listeners for box and buttons
quantityBox.forEach((box) => box.addEventListener("click", quantityClick));
dec.forEach((btn) => btn.addEventListener("click", (e) => e.preventDefault()));
inc.forEach((btn) => btn.addEventListener("click", (e) => e.preventDefault()));

function quantityClick(e) {
	const target = e.target;
	const buttonBox = e.target.closest(".quantity-button-box");
	const input = buttonBox.querySelector(".quantity-input");

	if (target.closest(".btn-dec")) {
		input.value--;
	}

	if (target.closest(".btn-inc")) {
		input.value++;
	}
}
