<form id="search" role="search" method="get" class="card-panel tropa  center-align search-form form-inline" action="<?= esc_url(home_url('/')); ?>">
	<div class="input-field ">
	  <i class="material-icons prefix">search</i>
      <input id="icon_prefix" type="text" value="<?= get_search_query(); ?>" name="s" class="search-field form-control validate" required>
  	  <label for="icon_prefix"><?php _e('Search for:', 'latuta-business'); ?></label>
	</div>
      <button type="submit" class="search-submit hide"><?php _e('Search', 'latuta-business'); ?></button>
</form>
