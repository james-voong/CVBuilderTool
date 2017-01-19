<div class="item">
    <div id="slide8" class="wizard_content">
        <div class="form_fields">
            <div class="form_line_div">
                <h2 id="req">Referees</h2>
            </div>

            <div class="form_line_div">
                <p>You MUST always ask your referees for permission and let them know what jobs you are applying for before you put them on your CV. Referees can be your teacher, coach, mentor or supervisor at previous employment or volunteering roles, but don't use family.</p>
            </div>

            <div id="refereesDiv">

                <?php
                //auto populate all referees fields on loading of page
                $refereesTracker = 0;
                if ($loadData) {
                    //load and populate referee fields
                    foreach ($user_json['referees'] as $refereeObj) {
                        echo '<div id="referees_' . $refereesTracker . '">';
                        echo '<div class="form_line_div"><label class="form_element_left">Name</label><input class="form_element_middle" name="referees[' . $refereesTracker . '][refName]" type="text" value="' . $refereeObj['refName'] . '" data-toggle="tooltip" data-placement="right" title="' . $tooltips_json['refName'] . '" placeholder="' . $examples_json['refName'] .'"/></div>';
                        echo '<div class="form_line_div"><label class="form_element_left">Position</label><input class="form_element_middle" name="referees[' . $refereesTracker . '][refPosition]" type="text" value="' . $refereeObj['refPosition'] . '" data-toggle="tooltip" data-placement="right" title="' . $tooltips_json['refPosition'] . '" placeholder="' . $examples_json['refPos'] .'"/></div>';
                        echo '<div class="form_line_div"><label class="form_element_left">Email</label><input class="form_element_middle" name="referees[' . $refereesTracker . '][refEmail]" type="text" value="' . $refereeObj['refEmail'] . '" data-toggle="tooltip" data-placement="right" title="' . $tooltips_json['refEmail'] . '" placeholder="' . $examples_json['refEmail'] .'"/></div>';
                        echo '<div class="form_line_div"><label class="form_element_left">Number</label><input class="form_element_middle" name="referees[' . $refereesTracker . '][refNum]" type="text" value="' . $refereeObj['refNum'] . '" data-toggle="tooltip" data-placement="right" title="' . $tooltips_json['refNum'] . '" placeholder="' . $examples_json['refNum'] .'" /></div><br></div>';
                        ++$refereesTracker;
                    }
                    --$refereesTracker;
                } else {
                    //load empty referee fields
                    echo '<div id="referees_' . $refereesTracker . '">';
                    echo '<div class="form_line_div"><label class="form_element_left">Name</label><input class="form_element_middle" name="referees[' . $refereesTracker . '][refName]" type="text" value="" data-toggle="tooltip" data-placement="right" title="' . $tooltips_json['refName'] . '" placeholder="' . $examples_json['refName'] .'" /></div>';
                    echo '<div class="form_line_div"><label class="form_element_left">Position</label><input class="form_element_middle" name="referees[' . $refereesTracker . '][refPosition]" type="text" value="" data-toggle="tooltip" data-placement="right" title="' . $tooltips_json['refPosition'] . '" placeholder="' . $examples_json['refPos'] .'"/></div>';
                    echo '<div class="form_line_div"><label class="form_element_left">Email</label><input class="form_element_middle" name="referees[' . $refereesTracker . '][refEmail]" type="text" value="" data-toggle="tooltip" data-placement="right" title="' . $tooltips_json['refEmail'] . '" placeholder="' . $examples_json['refEmail'] .'" /></div>';
                    echo '<div class="form_line_div"><label class="form_element_left">Number</label><input class="form_element_middle" name="referees[' . $refereesTracker . '][refNum]" type="text" value="" data-toggle="tooltip" data-placement="right" title="' . $tooltips_json['refNum'] . '" placeholder="' . $examples_json['refNum'] .'" /></div><br></div>';
                }
                echo '<script>var refereesTracker = ' . $refereesTracker . ';</script>'; //variable for javascript
                ?>
            </div>
            <div class="form_line_div">
                <input type="button" id="more_fields_referees" onclick="addReferees();" value="Add Another Referee"/>
                <input type="button" id="remove_fields_referees" onclick="removeReferees();" value="Remove Last Referee"/>
            </div>
            <br>
        </div>
        <div class="carousel_bottom_nav_bar">
            <button id="left_button" data-target="#wizard_pages" data-slide-to="6">Back</button>
            <button id="middle_button" name="submit" value="save" onclick="saveQualities(false);">Save & Exit</button>
            <button id="right_button" name="submit" value="finish" onclick="saveQualities(true);">Finish</button>
        </div>
    </div>
</div>
