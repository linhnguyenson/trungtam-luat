<?php

$slider_data = ot_get_option( 'home_slider' );
	
if(!empty($slider_data)){ ?>

	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php $i=0;?>
			<?php foreach ($slider_data as $key => $value) {?>

				<div class="item <?php echo $i==0?' active':''; ?>">
					<div class="item-inner" style="background-image:url('<?php echo $value['slider_img']; ?>')">
						<img class="img-full" src="<?php echo get_template_directory_uri();?>/skins/img/thumb-2x1.png" alt="...">						
					</div>
					<div class="carousel-caption">
						<div class="caption-title">
							<h2><?php echo $value['title'];?></h2>
						</div>
						<div class="caption-des">
							<p><?php echo $value['slider_des'];?></p>
						</div>
					</div>
				</div>
					
				<?php $i++; ?>
			<?php } //end foreach ?>

			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php for ($j=0; $j < $i; $j++) { ?>
					<li data-target="#carousel-example-generic" data-slide-to="<?php echo $j; ?>" <?php echo $j==0?'class="active"':''; ?>></li>
				<?php }?> 
			    
			</ol>
		</div>
	</div>

<?php }//end if ?>