<?php
$address = get_theme_mod("address", __("Manchester 21, Zurich, CH", "techub"));
$address_url = get_theme_mod("address_url", __("#", "techub"));
$email_address = get_theme_mod("email_address", __("techubinfo@mail.com", "techub"));
$topbar_background_color = get_theme_mod("topbar_background_color", __("#212e44", "techub"));
$topbar = get_theme_mod("topbar-switch", false);

// Main Header 
$header_search_switch = get_theme_mod("header_search_switch", false);
$right_header_section = get_theme_mod("right_header_section", false);
$header_button_text = get_theme_mod("header_button_text", __("Get a Quete", "techub"));
$header_button_url = get_theme_mod("header_button_url", __("#", "techub"));

$right_col = empty($right_header_section) || (empty($header_search_switch) && empty($header_button_text)) ? "10 text-end" : "6";
?>




<!-- header area start -->

<header>
         <div class="header__area">
            <div class="header__bottom-9 header__sticky" id="header-sticky">
               <div class="container">
                  <div class="mega-menu-wrapper p-relative">
                     <div class="row align-items-center">
                        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-4 col-sm-5 col-8">
                           <div class="logo">
                              <a href="<?php echo esc_url(home_url('/')); ?>">
                              <?php techub_header_logo() ?>
                              </a>
                           </div>
                        </div>
                        <div class="col-xxl-7 col-xl-7 col-lg-8 d-none d-lg-block">
                           <div class="main-menu main-menu-9 main-menu-ff-space">
                              <nav id="mobile-menu">
                              <?php techub_header_menu(); ?>
                              </nav>
                              <!-- for wp -->
                              <div class="header__hamburger ml-50 d-none">
                                 <button type="button" class="hamburger-btn offcanvas-open-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-8 col-sm-7 col-4">
                           <div class="header__bottom-right-8 d-flex justify-content-end align-items-center">
                              <div class="header__hamburger ml-50">
                                 <button type="button"  class="hamburger-btn-8 hamburger-btn-8-black offcanvas-open-btn">Menu</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
<!-- header area end -->

<!-- back to top start -->
<div class="back-to-top-wrapper">
    <button id="back_to_top" type="button" class="back-to-top-btn">
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</div>
<!-- back to top end -->


<?php
echo get_template_part("template-parts/headers/header-search");
echo get_template_part("template-parts/headers/offcanvas");
?>