  <!-- Start Search Popup Section -->
  <div class="search-popup">
      <button class="close-search style-two"><span class="flaticon-multiply"><i class="far fa-times-circle"></i></span></button>
      <button class="close-search"><i class="fa-light fa-arrow-up"></i></button>
      <form action="/" method="get">
          <div class="form-group">
              <input type="search" name="s" value="<?php the_search_query();?>" id="search" placeholder="<?php echo esc_attr("Search Here");?>">
              <button type="submit"><i class="fal fa-search"></i></button>
          </div>
      </form>
  </div>
  <!-- Start Search Popup Section -->