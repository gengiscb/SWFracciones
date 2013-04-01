$(document).ready(function() {
    var options = {
        chart: {
            renderTo: 'grafico',
            type: 'line',
            marginRight: 130,
            marginBottom: 25
        },
        title: {
            text: 'Avance Acumulado',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'AA'
            },

            allowDecimals: false,
            min : 0,
            plotLines: [{
                value: 1,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            formatter: function() {
                return '<b>'+ this.series.name +'</b><br/>'+
                this.x +': '+ this.y;
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -10,
            y: 100,
            borderWidth: 0
        },
        series: []
    }
    $.getJSON("ControladorReportes.php"+parametro_prof_id, function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        chart = new Highcharts.Chart(options);
    });

});