<?php
    $extensions = get_loaded_extensions();

    foreach($extensions as $extension) {
        echo $extension;
        echo ' (', implode(', ', get_extension_funcs($extension)), ')<br />';
    }
?>