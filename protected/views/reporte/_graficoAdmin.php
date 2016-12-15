<style type="text/css">
	${demo.css}
</style>
<script type="text/javascript">
	$(function () {
		$('#containerAdmin').highcharts({
			chart: {
				type: 'pie',
				options3d: {
					enabled: true,
					alpha: 45,
					beta: 0

				}
			},
			title: {
				text: 'De pago v/s Gratis'
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
				for ($i = 0; $i < count($itsFree) ; $i++) {
					?>
					
					['<?php if($itsFree[$i]['itsfree']==0){ echo "Gratis";}else{ echo "De Pago";}  ?>', <?php echo $itsFree[$i]['Cantidad'];?>],
					<?php
					} //Fin Foreach
					?>
					]
				}]
    });//Fin grafico 
	});
	</script>
				</br>
	        <?php echo "Total usuarios Gratis	: ".$itsFree[0]['Cantidad'];?>
            <?php echo "Total usuarios De Pago	: ".$itsFree[1]['Cantidad'];?>
	<div id="containerAdmin" class="block center" style="margin: 0 auto">
	</div>
</br>


