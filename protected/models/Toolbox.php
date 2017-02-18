<?php

class Toolbox
{
    public static function generateDisplayId($length)
    {
        $display_id = '';
        for($i = 0; $i < $length; $i++)
        {
            switch(rand(0,2))
            {
                case 0: $display_id .= chr(rand(65,90)); break; // Uppercase
                case 1: $display_id .= chr(rand(97,122)); break; // Lowercase
                case 2: $display_id .= rand(0,9); break; // Numbers
            }
        }
        return $display_id;
    }
}
