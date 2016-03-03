<form class="pull-right search-form" role="search">
	<div class="form-group">
		<input 
			type="text" 
			class="form-control" 
			action="<?php echo esc_url( home_url( '/' ) ); ?>" 
			placeholder="Cerca..."
			value="<?php echo get_search_query(); ?>" name="s" id="s">
	</div>
	<button type="submit" class="btn btn-theme">Go</button>
</form>  