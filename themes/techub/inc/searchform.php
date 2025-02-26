<?php

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function techub_search_form($form)
{
    $form = '<div class="sidebar__widget-content">
        <div class="sidebar__search">
            <form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '">
                <div class="sidebar__search-input-2">
                    <input type="text" name="s" id="s" placeholder="Search here">
                    <button type="submit"><i class="far fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>';

    return $form;
}
add_filter('get_search_form', 'techub_search_form');
