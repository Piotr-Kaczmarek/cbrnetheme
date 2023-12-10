<?php
?>
<div id="alert-bar" class="alert-bar <?=(!empty(get_option('cbrne_alert_bar_onoff'))) ? 'visible': 'hide-completely'?>">
        <div class="alert-bar-wrapper">
          <div>
              <div class="title"><h1><?=sanitize_text_field(get_option('cbrne_alert_bar_title'));?></h1></div>
              <?php
                // hide if subtitle is empty
                if (!empty(get_option('cbrne_alert_bar_subtitle'))) {
                    ?>
                <div class="sub-title"><h2><?=sanitize_text_field(get_option('cbrne_alert_bar_subtitle'));?></h2></div>
                    <?php
                }
                // hide if textarea is empty
                if (!empty(get_option('cbrne_alert_bar_message'))) {
                    ?>
                    <div class="text"><p><?=sanitize_text_field(get_option('cbrne_alert_bar_message'));?></p></div>
                    <?php
                }
                ?>
            </div>
            <div>
            <?php
            // hide button if empty
            if (!empty(get_option('cbrne_alert_bar_button_link'))) {
                $button_text = sanitize_text_field(get_option('cbrne_alert_bar_button_text'));
                $button_text = empty($button_text) ? __('Read more...') : $button_text;
                ?>
              <div class="alert-button wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button" id="alert-button" href="<?=sanitize_text_field(get_option('cbrne_alert_bar_button_link'));?>"><?=$button_text;?></a></div>
                <?php
            }
            ?>
            </div>
        </div>          
    </div>