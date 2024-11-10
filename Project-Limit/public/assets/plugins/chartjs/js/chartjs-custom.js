$(function () {
	"use strict";
	var ctx = document.getElementById("chart2").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [],
			datasets: [{
				label: 'Berkas',
				data: [980],
				barPercentage: .5,
				backgroundColor: "#0d6efd"
			}, {
				label: 'Berkas Berkala',
				data: [1000],
				barPercentage: .5,
				backgroundColor: "#f41127"
			
			}, {
				label: 'Berkas Jabatan',
				data: [444],
				barPercentage: .5,
				backgroundColor: "#198754"
			
			}, {
				label: 'Berkas SKCPNS',
				data: [865],
				barPercentage: .5,
				backgroundColor: "#ffc107"
			
			}, {
				label: 'Berkas SKP',
				data: [290],
				barPercentage: .5,
				backgroundColor: "#0dcaf0"
			
			}, {
				label: 'Berkas Pegawai',
				data: [500],
				barPercentage: .5,
				backgroundColor: "#adb5bd"
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: true,
				labels: {
					fontColor: '#585757',
					boxWidth: 40
				}
			},
			tooltips: {
				enabled: true
			},
			scales: {
				xAxes: [{
					ticks: {
						beginAtZero: true,
						fontColor: '#585757'
					},
					gridLines: {
						display: true,
						color: "rgba(0, 0, 0, 0.07)"
					},
				}],
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontColor: '#585757',
						stepSize: 200 
					},
					gridLines: {
						display: true,
						color: "rgba(0, 0, 0, 0.07)"
					},
				}]
			},
			plugins: {
				datalabels: {
					formatter: function(value, context) {
						return value; // Menampilkan nilai berkas di bawah setiap bar
					},
					color: '#000000',
					align: 'center',
					anchor: 'center'
				}
			},
			// Menambahkan jumlah berkas di bawah setiap label
			afterDatasetsDraw: function(chart) {
				var ctx = chart.ctx;
	
				chart.data.datasets.forEach(function(dataset, i) {
					var meta = chart.getDatasetMeta(i);
					if (!meta.hidden) {
						meta.data.forEach(function(element, index) {
							// Tinggi teks
							var fontSize = 12;
							// Warna teks
							ctx.fillStyle = '#000000';
	
							var data = dataset.data[index];
							// Mendapatkan lebar teks
							var metrics = ctx.measureText(data);
							var x = element._model.x;
							var y = element._model.y + fontSize + 5;
							ctx.fillText(data, x - metrics.width / 2, y);
						});
					}
				});
			}
		}
	});
});