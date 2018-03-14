$(document).ready(function () {
    Highcharts.setOptions({
        global: {
            useUTC: false
        }
    });

    //Live Chart :))
    Highcharts.chart('container', {
        chart: {
            type: 'spline',
            animation: Highcharts.svg, // don't animate in old IE
            marginRight: 10,
            events: {
                load: function () {

                    // set up the updating of the chart each second
                    var series = this.series[0];
                    setInterval(function () {
                        var x = (new Date()).getTime(), // current time
                            y = Math.random();
                        series.addPoint([x, y], true, true);
                    }, 1000);
                }
            }
        },
        title: {
            text: 'Live random data'
        },
        xAxis: {
            title: {
                text: 'Time'
            },
            type: 'datetime',
            tickPixelInterval: 150
        },
        yAxis: {
            title: {
                text: 'Value'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                    Highcharts.numberFormat(this.y, 2);
            }
        },
        legend: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        series: [{
            name: 'Random data',
            data: (function () {
                // generate an array of random data
                var data = [],
                    time = (new Date()).getTime(),
                    i;

                for (i = -19; i <= 0; i += 1) {
                    data.push({
                        x: time + i * 1000,
                        y: Math.random()
                    });
                }
                return data;
            }())
        }]
    });

    // //Pie Chart :))
    // Highcharts.chart('container2', {
    //     chart: {
    //         plotBackgroundColor: null,
    //         plotBorderWidth: null,
    //         plotShadow: false,
    //         type: 'pie'
    //     },
    //     title: {
    //         text: 'Browser market shares January, 2015 to May, 2015'
    //     },
    //     tooltip: {
    //         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    //     },
    //     plotOptions: {
    //         pie: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             dataLabels: {
    //                 enabled: true,
    //                 format: '<b>{point.name}</b>: {point.percentage:.1f} %',
    //                 style: {
    //                     color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
    //                 }
    //             }
    //         }
    //     },
    //     series: [{
    //         name: 'Brands',
    //         colorByPoint: true,
    //         data: [{
    //             name: 'Microsoft Internet Explorer',
    //             y: 56.33
    //         }, {
    //             name: 'Chrome',
    //             y: 24.03,
    //             sliced: true,
    //             selected: true
    //         }, {
    //             name: 'Firefox',
    //             y: 10.38
    //         }, {
    //             name: 'Safari',
    //             y: 4.77
    //         }, {
    //             name: 'Opera',
    //             y: 0.91
    //         }, {
    //             name: 'Proprietary or Undetectable',
    //             y: 0.2
    //         }]
    //     }]
    // });

    // //Histogram Chart
    // Highcharts.chart('container3', {
    //     chart: {
    //         type: 'column'
    //     },
    //     title: {
    //         text: 'Highcharts Histogram'
    //     },
    //     xAxis: {
    //         gridLineWidth: 1
    //     },
    //     yAxis: [{
    //         title: {
    //             text: 'Histogram Count'
    //         }
    //     }, {
    //         opposite: true,
    //         title: {
    //             text: 'Y value'
    //         }
    //     }],
    //     series: [{
    //         name: 'Histogram',
    //         type: 'column',
    //         data: histogram(data, 10),
    //         pointPadding: 0,
    //         groupPadding: 0,
    //         pointPlacement: 'between'
    //     }, {
    //         name: 'XY data',
    //         type: 'scatter',
    //         data: data,
    //         yAxis: 1,
    //         marker: {
    //             radius: 1.5
    //         }
    //     }]
    // });
});

