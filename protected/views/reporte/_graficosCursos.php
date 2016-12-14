<style type="text/css">
${demo.css}
 </style>
 <script type="text/javascript">
$(function () {
        $('#containerCursos1').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0

            }
        },
        title: {
            text: 'Alumnos por Curso'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                size:'100%',
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Cantidad',
            data: [

                ['Cloud', 30],
                ['Matematica', 2]

            ]
        }]
    });//Fin grafico hombre/mujer
});
</script>

    <div id="containerCursos1" class="block center" style="margin: 0 auto">
    </div>
    </br>