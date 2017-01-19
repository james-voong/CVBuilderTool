<?php

    //bootstrap date picker - year and month
    function addMonthYearPicker($inputName, $inputValue, $tooltipName) {
        $line = '';
        $line .= '<div class="input-group date form_element_middle month_year_picker">';
        $line .= '<input type="text" class="form-control" id="" name="' . $inputName . '" value="' . $inputValue . '" data-toggle="tooltip" data-placement="right" title="' . $tooltipName . '">';
        $line .= '<span class="input-group-addon">';
        $line .= '<span class="glyphicon glyphicon-calendar"></span></span></div>';
            
        return $line;
    }

        
    //bootstrap date picker - year only
    function addYearPicker($inputName, $inputValue, $tooltipName) {
        $line = '';
        $line .= '<div class="input-group date form_element_middle year_picker">';
        $line .= '<input type="text" class="form-control" id="" name="' . $inputName . '" value="' . $inputValue . '" data-toggle="tooltip" data-placement="right" title="' . $tooltipName . '">';
        $line .= '<span class="input-group-addon">';
        $line .= '<span class="glyphicon glyphicon-calendar"></span></span></div>';
        
        return $line;
    } 

?>