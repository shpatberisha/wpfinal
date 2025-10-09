<?php /* Fixed post_type value from 'cars' to 'carsallon' */ ?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s">
        <input type="hidden" name="post_type" value="carsallon">
        <input type="submit" id="searchsubmit" value="Search Cars">
    </div>
</form>
