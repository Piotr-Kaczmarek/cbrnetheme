<?php
namespace Cbrne_Theme;

// add page claim
if (!empty(get_field('page-claim'))) {
            printf('<span aria-hidden="true" class="page-claim-wrapper full-opacity">%s</span>', cbrne_get_image_tag(get_field('page-claim')));
}
