<?php
class View
{
    function generate($view_content, $template_view, $data = null)
    {
        include 'views/'.$template_view;
    }
}
?>