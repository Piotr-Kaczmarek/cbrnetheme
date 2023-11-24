<?php
/**
 * Language switcher header content.
 *
 * @package cbrnetheme
 */

namespace Cbrne_Theme;

?>

<div class="language-switcher nav-menu">

<?php
if (function_exists('the_msls')) {
        the_msls();
}
?>

</div>