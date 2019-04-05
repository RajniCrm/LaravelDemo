<?php

class Helpers
{
    //

    public static function sample_function()
    {
        // WE CAN PUT ANY FILE INSITE THIS URL'S EG. base_path('filname.php')
        $folder_path = base_path(); 
        $app_folder_path = app_path(); // WE CAN USE ROOT FOLDERNAME_path() FOR GETTING FOLDER PATH EG. public_path('css/style.css')
        
        return view('helpers');
    }
}
