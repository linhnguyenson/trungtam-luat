<?php 
	$partners_data = ot_get_option( 'partner' );
	
	if(!empty($partners_data)){ ?>
	<div class="space-20"></div>
	<div class="box-content box-content-secondary">
		<div class="box-content-header">
			<h2 class="widget-title heading-title">Đối tác</h2>
		</div>
		<div class="box-content-body">
			<ul class="bx-partners">
				
				<?php foreach ($partners_data as $key => $value) {
				?>
				<li>
				<a href="<?php echo $value['partner_link']?>" title="<?php $value['title']?>" target="_blank"><img src="<?php echo $value['partner_image']?>"></a>

				</li>

				<?php } //end foreach ?>
			</ul>
		</div>
	</div>
<?php }//end if?>
