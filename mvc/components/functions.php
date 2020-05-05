<?php
if (! function_exists('render')) {
    function render($var)
    {
        echo htmlspecialchars($var, ENT_QUOTES);
    }
}


