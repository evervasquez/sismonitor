/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Comment
 */
function drawn_bar_(id_,data_,titulo_,subtitulo_,xText,yText) 
{
		$('#'+id_).html('');
		chart = new Highcharts.Chart({
					chart: {
						renderTo: id_,
						defaultSeriesType: 'column',
                                                width:850,
                                                height:450
					},
					title: {
						text: titulo_
					},
					subtitle: {
						text:subtitulo_
					},
					xAxis: {
						categories:data_.columns
					},
					yAxis: {
						min: 0,
						title: {
							text: yText
						}
					},
					legend: {
						layout: 'vertical',
						backgroundColor: '#FFFFFF',
						verticalAlign: 'bottom',
						shadow: true
                                                
					},
					tooltip: {
						formatter: function() {
							return ''+
								this.x +': '+ this.y +' ';
						}
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
            series: data_.columnas,
            marginBottom:400});

	
        
}


function drawn_pie_()
{
    chart_ = new Highcharts.Chart({
        chart_: {
            renderTo: 'container',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Alternativas'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            percentageDecimals: 1
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Distribucion de preguntas',
            data: [
                ['Firefox',   45.0],
                ['IE',       26.8],
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        }]
    });

}