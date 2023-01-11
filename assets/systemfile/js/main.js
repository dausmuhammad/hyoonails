app.Main = {
	controller: "Controller_main/",
	init: function () {
        var file = this;
		file.barChartSalesHarian();
		file.barChartSalesBulanan();
        file.barChartSalesTahunan();
	},
	barChartSalesHarian: function () {
        $.ajax({
            url: app.base_url + this.controller + "getLaporanHarian",
            success: function (response) {
                try {
                    let dataChart = [];
                    let arrayDataChart = [];
                    var labels = [];
                    let arrayLabels = [];
                    $.each(response, function () {
                        arrayDataChart.push([
                            this['total_penjualan']
                        ])
                    });
                    $.each(response, function () {
                        arrayLabels.push([
                            this['order_date']
                        ])
                    });

                    for (let i = 0; i < arrayDataChart.length; i++) {
                        dataChart = dataChart.concat(arrayDataChart[i]);
                        labels = labels.concat(arrayLabels[i]);
                    }
                    var areaChartData = {
                        labels: labels,
                        datasets: [
                            {
                                label: 'SALES MINGGUAN',
                                backgroundColor: 'rgba(60,141,188,0.9)',
                                borderColor: 'rgba(60,141,188,0.8)',
                                pointRadius: false,
                                pointColor: '#3b8bba',
                                pointStrokeColor: 'rgba(60,141,188,1)',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgba(60,141,188,1)',
                                data: dataChart
                            }
                        ]
                    }

                    var barChartCanvas = $('#barChart').get(0).getContext('2d')
                    var barChartData = $.extend(true, {}, areaChartData)
                    var temp0 = areaChartData.datasets[0]
                    barChartData.datasets[0] = temp0

                    var barChartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        datasetFill: false
                    }

                    new Chart(barChartCanvas, {
                        type: 'bar',
                        data: barChartData,
                        options: barChartOptions
                    })
                } catch (e) {
                    toastr.error(e.message);
                }
            },
            error: function (response) {
                console.log(response);
            }
        })

    },
	barChartSalesBulanan: function () {
        $.ajax({
            url: app.base_url + this.controller + "getLaporanBulanan",
            success: function (response) {
                try {
                    console.log(response);
                    console.log(Object.keys(response));
                    let dataChart = [];
                    let arrayDataChart = [];
                    var labels = [];
                    var month = ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DES'];
                    let arrayLabels = [];
                    $.each(response, function () {
                        arrayDataChart.push([
                            this['total_penjualan']
                        ])
                    });
                    $.each(response, function () {
                        arrayLabels.push([
                           month[parseInt(this['bulan'] - 1)] + " " + this['tahun']
                        ])
                    });
                    console.log(arrayDataChart);
					console.log(arrayLabels);
                    for (let i = 0; i < arrayDataChart.length; i++) {
                        dataChart = dataChart.concat(arrayDataChart[i]);
                        labels = labels.concat(arrayLabels[i]);
                    }
                    console.log(dataChart);
                    var areaChartData = {
                        labels: labels,
                        datasets: [
                            {
                                label: 'SALES BULANAN',
                                backgroundColor: 'rgba(60,141,188,0.9)',
                                borderColor: 'rgba(60,141,188,0.8)',
                                pointRadius: false,
                                pointColor: '#3b8bba',
                                pointStrokeColor: 'rgba(60,141,188,1)',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgba(60,141,188,1)',
                                data: dataChart
                            }
                        ]
                    }

                    var barChartCanvas = $('#barChartBulanan').get(0).getContext('2d')
                    var barChartData = $.extend(true, {}, areaChartData)
                    var temp0 = areaChartData.datasets[0]
                    barChartData.datasets[0] = temp0

                    var barChartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        datasetFill: false
                    }

                    new Chart(barChartCanvas, {
                        type: 'bar',
                        data: barChartData,
                        options: barChartOptions
                    })
                } catch (e) {
                    toastr.error(e.message);
                }
            },
            error: function (response) {
                console.log(response);
            }
        })

    },
    barChartSalesTahunan: function () {
        $.ajax({
            url: app.base_url + this.controller + "getLaporanTahunan",
            success: function (response) {
                try {
                    console.log(response);
                    console.log(Object.keys(response));
                    let dataChart = [];
                    let arrayDataChart = [];
                    var labels = [];
                    let arrayLabels = [];
                    $.each(response, function () {
                        arrayDataChart.push([
                            this['total_penjualan']
                        ])
                    });
                    $.each(response, function () {
                        arrayLabels.push([
                           this['tahun']
                        ])
                    });
                    console.log(arrayDataChart);
					console.log(arrayLabels);
                    for (let i = 0; i < arrayDataChart.length; i++) {
                        dataChart = dataChart.concat(arrayDataChart[i]);
                        labels = labels.concat(arrayLabels[i]);
                    }
                    console.log(dataChart);
                    var areaChartData = {
                        labels: labels,
                        datasets: [
                            {
                                label: 'SALES TAHUNAN',
                                backgroundColor: 'rgba(60,141,188,0.9)',
                                borderColor: 'rgba(60,141,188,0.8)',
                                pointRadius: false,
                                pointColor: '#3b8bba',
                                pointStrokeColor: 'rgba(60,141,188,1)',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgba(60,141,188,1)',
                                data: dataChart
                            }
                        ]
                    }

                    var barChartCanvas = $('#barChartTahunan').get(0).getContext('2d')
                    var barChartData = $.extend(true, {}, areaChartData)
                    var temp0 = areaChartData.datasets[0]
                    barChartData.datasets[0] = temp0

                    var barChartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        datasetFill: false
                    }

                    new Chart(barChartCanvas, {
                        type: 'bar',
                        data: barChartData,
                        options: barChartOptions
                    })
                } catch (e) {
                    toastr.error(e.message);
                }
            },
            error: function (response) {
                console.log(response);
            }
        })

    }
}

$(document).ready(function () {
	app.Main.init();
})
