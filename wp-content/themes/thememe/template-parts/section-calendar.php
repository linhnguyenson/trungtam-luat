<div class="inside-full-height box-content box-content-has-footer">
	<div class="tab-custom">
		<ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#doanhnghiep" aria-controls="doanhnghiep" role="tab" data-toggle="tab">Khóa học Cơ quan doanh nghiệp</a></li>
		    <li role="presentation"><a href="#sinhvien" aria-controls="sinhvien" role="tab" data-toggle="tab">Khóa học Sinh viên</a></li>  
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="doanhnghiep">
		    	<div class="box-content-body">
		        	<?php echo do_shortcode("[eventlist slug='co-quan-doanh-nghiep' /]") ?>
		        </div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="sinhvien">
		    	<div class="box-content-body">
		        	<?php echo do_shortcode("[eventlist slug='sinh-vien' /]") ?>
		        </div>
		    </div>
		</div>
	</div>
	<div class="content-footer text-right">					
		<a href="/khoa-hoc/" class="readmore"><span><i class="fa fa-bars"></i></span> Xem tất cả</a>							
	</div>
</div>