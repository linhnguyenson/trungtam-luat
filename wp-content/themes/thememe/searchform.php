<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
		<input type="search" class="search-field form-control input-sm" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		<span class="input-group-btn">
			<input type="submit" class="search-submit btn btn-primary btn-sm" value="<?php echo esc_attr_x( 'Go!', 'submit button' ) ?>" />
		 </span>
	</div>
</form>
