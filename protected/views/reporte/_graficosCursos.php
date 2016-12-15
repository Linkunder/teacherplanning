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
				<?php 
				for ($i = 0; $i < count($graficoAlumnosCurso) ; $i++) {
					?>
					
					['<?php echo $graficoAlumnosCurso[$i]['nombre'];?>', <?php echo $graficoAlumnosCurso[$i]['cantidad'];?>],
					<?php
					} //Fin Foreach
					?>
					]
				}]
    });//Fin grafico 
	});

	$(function () {
		$('#containerCursos2').highcharts({
			chart: {
				type: 'bar'
			},
			title: {
				text: 'Cursos por institución'
			},
			subtitle: {
				text: 'TeacherPlanning'
			},
			xAxis: {
				categories: [
				<?php 
				for ($i = 0; $i < count($graficoCursoInstitucion) ; $i++) {
					?>

					['<?php echo $graficoCursoInstitucion[$i]['institucion']; ?>'],
					<?php
				}
				?>

				],
				title: {
					text: null
				}
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Cursos ',
					align: 'high'
				},
				labels: {
					overflow: 'justify'
				}
			},
			tooltip: {
				valueSuffix: ' Cursos'
			},
			plotOptions: {
				bar: {
					dataLabels: {
						enabled: true
					}
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -40,
				y: 100,
				floating: true,
				borderWidth: 1,
				backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
				shadow: true
			},
			credits: {
				enabled: false
			},
			series: [{
				name: 'Numero Cursos',
				data: [
				<?php 
				for ($i = 0; $i < count($graficoCursoInstitucion); $i++) {
					?>

					[<?php echo $graficoCursoInstitucion[$i]['cantidad']; ?>],
					<?php
				}
				?>


				]
			}]
		});

	});
	
	$(function () {

		 $('#containerCursos3').highcharts({ //Comentarios
		 	chart: {
		 		type: 'bar'
		 	},
		 	title: {
		 		text: 'Evaluaciones por curso'
		 	},
		 	subtitle: {
		 		text: 'TeacherPlanning'
		 	},
		 	xAxis: {
		 		categories: [
				<?php 
				for ($i = 0; $i < count($cursoEvaluacion); $i++) {
					?>

		 			['<?php echo $cursoEvaluacion[$i]['nombre'];?>'],
		 			<?php
		 		}
		 		?>

		 		],
		 		title: {
		 			text: null
		 		}
		 	},
		 	yAxis: {
		 		min: 0,
		 		title: {
		 			text: 'Evaluaciones ',
		 			align: 'high'
		 		},
		 		labels: {
		 			overflow: 'justify'
		 		}
		 	},
		 	tooltip: {
		 		valueSuffix: ''
		 	},
		 	plotOptions: {
		 		bar: {
		 			dataLabels: {
		 				enabled: true
		 			}
		 		}
		 	},
		 	legend: {
		 		layout: 'vertical',
		 		align: 'right',
		 		verticalAlign: 'top',
		 		x: -40,
		 		y: 100,
		 		floating: true,
		 		borderWidth: 1,
		 		backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
		 		shadow: true
		 	},

		 	credits: {
		 		enabled: false
		 	},
		 	series: [{
		 		name: 'Evaluaciones',
		 		data: [
				<?php 
				for ($i = 0; $i < count($cursoEvaluacion); $i++) {
					?>

		 			[<?php echo $cursoEvaluacion[$i]['partidos'] ?>],
		 			<?php
		 		}
		 		?>


		 		]
		 	}]
		 });

		});


	</script>

	<div id="containerCursos1" class="block center" style="margin: 0 auto">
	</div>
</br>
<div id="containerCursos2" class="block center" style="margin: 0 auto">
</div>
<div id="containerCursos3" class="block center" style="margin: 0 auto">
</div>
</br>

