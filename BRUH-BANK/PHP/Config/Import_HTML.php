<?php

    class HtmlGenerator
    {
        static function ReadHTML($path)
        {
	        $html = fopen($path, 'r');
	        echo fread($html, filesize($path));
        }
    }
    

?>