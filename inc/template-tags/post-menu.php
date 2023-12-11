<?php
    // this is to restrict sidebar only to one category
?>
<div id="post-menu" class="post-menu-wrapper">
<span class="post-menu-title"><?=__('Table of Contents');?></span><button class="accordion-button"></button>
    <div id="post-menu-accordion" class="accordion">
        <?php
        // get all H2 elements from content
        // build menu with links to H2
        preg_match_all('@<h2.*?>(.*?)<\/h2>@', $the_content, $matches);
        $tag = $matches[1];
        printf('<ul id="menu-post-%s" class="post-menu">', get_the_ID());
        foreach ($tag as $header) {
            printf('<li class="menu-link"><a href="#%s">%s</a></li>', string_to_id($header), string_remove_number($header));
        }
        printf('</ul>');
        ?>
    </div>
</div> 
<script>
var acc = document.getElementsByClassName("accordion-button");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    cName = 'visible';
    if (panel.classList.contains(cName)){
        panel.classList.remove(cName);    
    } else {
        panel.classList.add(cName);    
    }

  });
}
</script>