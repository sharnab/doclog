"use strict";
// Class definition
var KTGoogleChartsDemo = function() {

    // Private functions

    var main = function() {
        // GOOGLE CHARTS INIT
        google.load('visualization', '1', {
            packages: ['corechart', 'bar', 'line']
        });

        google.setOnLoadCallback(function() {
            KTGoogleChartsDemo.runDemos();
        });
    }

    var demoColumnCharts = function() {
        // COLUMN CHART
        var data = new google.visualization.DataTable();
        data.addColumn('timeofday', 'Time of Day');
        data.addColumn('number', 'Motivation Level');
        data.addColumn('number', 'Energy Level');

        data.addRows([
            [{
                v: [8, 0, 0],
                f: '8 am'
            }, 1, .25],
            [{
                v: [9, 0, 0],
                f: '9 am'
            }, 2, .5],
            [{
                v: [10, 0, 0],
                f: '10 am'
            }, 3, 1],
            [{
                v: [11, 0, 0],
                f: '11 am'
            }, 4, 2.25],
            [{
                v: [12, 0, 0],
                f: '12 pm'
            }, 5, 2.25],
            [{
                v: [13, 0, 0],
                f: '1 pm'
            }, 6, 3],
            [{
                v: [14, 0, 0],
                f: '2 pm'
            }, 7, 4],
            [{
                v: [15, 0, 0],
                f: '3 pm'
            }, 8, 5.25],
            [{
                v: [16, 0, 0],
                f: '4 pm'
            }, 9, 7.5],
            [{
                v: [17, 0, 0],
                f: '5 pm'
            }, 10, 10],
        ]);

        var options = {
            title: 'Motivation and Energy Level Throughout the Day',
            focusTarget: 'category',
            hAxis: {
                title: 'Time of Day',
                format: 'h:mm a',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                },
            },
            vAxis: {
                title: 'Rating (scale of 1-10)'
            },
            colors: ['#6e4ff5', '#fe3995']
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('kt_gchart_1'));
        chart.draw(data, options);

        var chart = new google.visualization.ColumnChart(document.getElementById('kt_gchart_2'));
        chart.draw(data, options);
    }

    var demoPieCharts = function() {


        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Dhaka', 1000],
            ['Chittagong', 860],
            ['Sylhet', 650],
            ['Barishal', 458],
            ['Khulna', 850],
            ['Rajshahi', 480],
            ['Rangpur', 720]
        ]);
        var options = {

            colors: ['#6e4ff5', '#2abe81', '#0f4fc2', '#bd9b33','#a23c3c', '#8cacc6', '#c7d2e7','#4da74d']
        };

        var chart = new google.visualization.PieChart(document.getElementById('kt_gchart_3'));
        chart.draw(data, options);

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Male', 11],
            ['Female', 2],
            ['Others', 2]
        ]);

        var options = {
            // pieHole: 0.4,
            colors: ['#a23c3c', '#8cacc6', '#c7d2e7', '#4da74d']
        };

        var chart = new google.visualization.PieChart(document.getElementById('kt_gchart_4'));
        chart.draw(data, options);
    }

    var demoLineCharts = function() {
        // LINE CHART

        var data = google.visualization.arrayToDataTable([
            ['Month', 'Remittance'],
            ['Aug',    80],
            ['July',    60],
            ['June',    30],
            ['May',    25],
            ['Apr',    40],
            ['Mar',    50],
            ['Feb',    85],
            ['Jan',    82],
            ['Dec',    60],
            ['Nov',    70],
            ['Oct',    85],
            ['Sep',    70]
        ]);
        // var data = new google.visualization.DataTable();
        // data.addColumn('date', 'Month');
        // data.addColumn('number', "Remittance History");
        //
        // data.addRows([
        //     [new Date(2019, 0),  5.7],
        //     [new Date(2019, 1),  8.7],
        //     [new Date(2019, 2),   12],
        //     [new Date(2019, 3), 15.3],
        //     [new Date(2019, 4), 18.6],
        //     [new Date(2019, 5), 20.9],
        //     [new Date(2019, 6), 19.8],
        //     [new Date(2019, 7), 16.6],
        //     [new Date(2019, 8), 13.3],
        //     [new Date(2019, 9),  9.9],
        //     [new Date(2019, 10), 6.6],
        //     [new Date(2019, 11), 4.5]
        // ]);
        var options = {
            chart: {
                title: 'Remittance by month',
                subtitle: 'in millions of dollars (USD)'
            },
            colors: ['#3d1cce', '#f6aa33', '#fe3995']
        };

        var chart = new google.charts.Line(document.getElementById('kt_gchart_5'));
        chart.draw(data, options);
    }

    return {
        // public functions
        init: function() {
            main();
        },

        runDemos: function() {
           // demoColumnCharts();
            demoLineCharts();
            demoPieCharts();
        }
    };
}();

KTGoogleChartsDemo.init();
