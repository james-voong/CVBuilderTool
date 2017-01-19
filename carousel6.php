<div class="item">
    <div id="slide6" class="wizard_content">
        <div class="form_fields">
            <div class="form_line_div">
                <h2 id="req">Personal Attributes</h2>
            </div>
            <div class="form_line_div">
                <p>Pick up to 6 attributes that best describe you to future employers</p>
            </div>

            <?php
            function loadQualities($value)
            {
                //checks load the qualities field from json and echo 'checked' if the field is checked previously
                //this function is to auto check quality boxes on load
                global $loadData; //use $loaData from global variable
                global $user_json; //use $user_json from global variable
                if ($loadData && isset($user_json['qualities'])) { //making sure user clicked edit cv and 'qualities' key existed in json file
                    foreach ($user_json['qualities'] as $qualityObj) { //loop through all qualities object
                        if ($value == $qualityObj['quality']) { //check if the box value equals the quality field
                            echo ' checked '; //echo to html
                        }
                    }
                }
            }

            ?>

            <div class="form_line_div">
                <div id="col1" class="form_element_left">
                    <div class="form_line_div attribute"><input class="checkboxOption" id="accurate" type="checkbox" <?php loadQualities('Accurate'); ?> name="quality" value="Accurate" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['accurate']; ?>"/><p id="quality_text">Accurate</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="accurateLong"><?php echo $tooltips_json['accurate']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="adaptable" type="checkbox" <?php loadQualities('Adaptable'); ?> name="quality" value="Adaptable" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['adaptable']; ?>"/><p id="quality_text">Adaptable</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="adaptableLong"><?php echo $tooltips_json['adaptable']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="alert" type="checkbox" <?php loadQualities('Alert'); ?> name="quality" value="Alert" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['alert']; ?>"/><p id="quality_text">Alert</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="alertLong"><?php echo $tooltips_json['alert']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="ambitious" type="checkbox" <?php loadQualities('Ambitious'); ?> name="quality" value="Ambitious" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['ambitious']; ?>"/><p id="quality_text">Ambitious</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="ambitiousLong"><?php echo $tooltips_json['ambitious']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="amiable" type="checkbox" <?php loadQualities('Amiable'); ?> name="quality" value="Amiable" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['amiable']; ?>"/><p id="quality_text">Amiable</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="amiableLong"><?php echo $tooltips_json['amiable']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="analytical" type="checkbox" <?php loadQualities('Analytical'); ?> name="quality" value="Analytical" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['analytical']; ?>"/><p id="quality_text">Analytical</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="analyticalLong"><?php echo $tooltips_json['analytical']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="articulate" type="checkbox" <?php loadQualities('Articulate'); ?> name="quality" value="Articulate" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['articulate']; ?>"/><p id="quality_text">Articulate</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="articulateLong"><?php echo $tooltips_json['articulate']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="assertive" type="checkbox" <?php loadQualities('Assertive'); ?> name="quality" value="Assertive" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['assertive']; ?>"/><p id="quality_text">Assertive</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="assertiveLong"><?php echo $tooltips_json['assertive']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="attentive" type="checkbox" <?php loadQualities('Attentive'); ?> name="quality" value="Attentive" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['attentive']; ?>"/><p id="quality_text">Attentive</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="attentiveLong"><?php echo $tooltips_json['attentive']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="broad-minded" type="checkbox" <?php loadQualities('Broad'); ?> name="quality" value="Broad-minded" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['broad-minded']; ?>"/><p id="quality_text">Broad-minded</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="broad-mindedLong"><?php echo $tooltips_json['broad-minded']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="businesslike" type="checkbox" <?php loadQualities('Businesslike'); ?> name="quality" value="Businesslike" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['businesslike']; ?>"/><p id="quality_text">Businesslike</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="businesslikeLong"><?php echo $tooltips_json['businesslike']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="calm" type="checkbox" <?php loadQualities('Calm'); ?> name="quality" value="Calm" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['calm']; ?>"/><p id="quality_text">Calm</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="calmLong"><?php echo $tooltips_json['calm']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="capable" type="checkbox" <?php loadQualities('Capable'); ?> name="quality" value="Capable" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['capable']; ?>"/><p id="quality_text">Capable</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="capableLong"><?php echo $tooltips_json['capable']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="careful" type="checkbox" <?php loadQualities('Careful'); ?> name="quality" value="Careful" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['careful']; ?>"/><p id="quality_text">Careful</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="carefulLong"><?php echo $tooltips_json['careful']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="competent" type="checkbox" <?php loadQualities('Competent'); ?> name="quality" value="Competent" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['competent']; ?>"/><p id="quality_text">Competent</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="competentLong"><?php echo $tooltips_json['competent']; ?></div>
                    </div>

                </div>

                <div id="col2" class="form_element_middle">
                    <div class="form_line_div attribute"><input class="checkboxOption" id="confident" type="checkbox" <?php loadQualities('Confident'); ?> name="quality" value="Confident" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['confident']; ?>"/><p id="quality_text">Confident</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="confidentLong"><?php echo $tooltips_json['confident']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="conscientious" type="checkbox" <?php loadQualities('Conscientious'); ?> name="quality" value="Conscientious" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['conscientious']; ?>"/><p id="quality_text">Conscientious</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="conscientiousLong"><?php echo $tooltips_json['conscientious']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="consistent" type="checkbox" <?php loadQualities('Consistent'); ?> name="quality" value="Consistent" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['consistent']; ?>"/><p id="quality_text">Consistent</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="consistentLong"><?php echo $tooltips_json['consistent']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="cooperative" type="checkbox" <?php loadQualities('Cooperative'); ?> name="quality" value="Cooperative" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['cooperative']; ?>"/><p id="quality_text">Cooperative</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="cooperativeLong"><?php echo $tooltips_json['cooperative']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="dedicated" type="checkbox" <?php loadQualities('Dedicated'); ?> name="quality" value="Dedicated" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['dedicated']; ?>"/><p id="quality_text">Dedicated</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="dedicatedLong"><?php echo $tooltips_json['dedicated']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="dependable" type="checkbox" <?php loadQualities('Dependable'); ?> name="quality" value="Dependable" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['dependable']; ?>"/><p id="quality_text">Dependable</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="dependableLong"><?php echo $tooltips_json['dependable']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="determined" type="checkbox" <?php loadQualities('Determined'); ?> name="quality" value="Determined" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['determined']; ?>"/><p id="quality_text">Determined</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="determinedLong"><?php echo $tooltips_json['determined']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="efficient" type="checkbox" <?php loadQualities('Efficient'); ?> name="quality" value="Efficient" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['efficient']; ?>"/><p id="quality_text">Efficient</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="efficientLong"><?php echo $tooltips_json['efficient']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="energetic" type="checkbox" <?php loadQualities('Energetic'); ?> name="quality" value="Energetic" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['energetic']; ?>"/><p id="quality_text">Energetic</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="energeticLong"><?php echo $tooltips_json['energetic']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="enterprising" type="checkbox" <?php loadQualities('Enterprising'); ?> name="quality" value="Enterprising" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['enterprising']; ?>"/><p id="quality_text">Enterprising</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="enterprisingLong"><?php echo $tooltips_json['enterprising']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="flexible" type="checkbox" <?php loadQualities('Flexible'); ?> name="quality" value="Flexible" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['flexible']; ?>"/><p id="quality_text">Flexible</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="flexibleLong"><?php echo $tooltips_json['flexible']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="hardworking" type="checkbox" <?php loadQualities('Hardworking'); ?> name="quality" value="Hardworking" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['hardworking']; ?>"/><p id="quality_text">Hardworking</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="hardworkingLong"><?php echo $tooltips_json['hardworking']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="honest" type="checkbox" <?php loadQualities('Honest'); ?> name="quality" value="Honest" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['honest']; ?>"/><p id="quality_text">Honest</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="honestLong"><?php echo $tooltips_json['honest']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="independent" type="checkbox" <?php loadQualities('Independent'); ?> name="quality" value="Independent" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['independent']; ?>"/><p id="quality_text">Independent</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="independentLong"><?php echo $tooltips_json['independent']; ?></div>
                    </div>

                </div>

                <div id="col3" class="form_element_right">

                    <div class="form_line_div attribute"><input class="checkboxOption" id="industrious" type="checkbox" <?php loadQualities('Industrious'); ?> name="quality" value="Industrious" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['industrious']; ?>"/><p id="quality_text">Industrious</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="industriousLong"><?php echo $tooltips_json['industrious']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="innovative" type="checkbox" <?php loadQualities('Innovative'); ?> name="quality" value="Innovative" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['innovative']; ?>"/><p id="quality_text">Innovative</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="innovativeLong"><?php echo $tooltips_json['innovative']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="motivated" type="checkbox" <?php loadQualities('Motivated'); ?> name="quality" value="Motivated" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['motivated']; ?>"/><p id="quality_text">Motivated</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="motivatedLong"><?php echo $tooltips_json['motivated']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="optimistic" type="checkbox" <?php loadQualities('Optimistic'); ?> name="quality" value="Optimistic" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['optimistic']; ?>"/><p id="quality_text">Optimistic</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="optimisticLong"><?php echo $tooltips_json['optimistic']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="organized" type="checkbox" <?php loadQualities('Organized'); ?> name="quality" value="Organized" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['organized']; ?>"/><p id="quality_text">Organized</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="organizedLong"><?php echo $tooltips_json['organized']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="patient" type="checkbox" <?php loadQualities('Patient'); ?> name="quality" value="Patient" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['patient']; ?>"/><p id="quality_text">Patient</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="patientLong"><?php echo $tooltips_json['patient']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="people-oriented" type="checkbox" <?php loadQualities('People-orientated'); ?> name="quality" value="People-orientated" data-toggle="tooltip"
                                                                data-placement="right" title="<?php echo $tooltips_json['people-oriented']; ?>"/><p id="quality_text">People-oriented</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="people-orientedLong"><?php echo $tooltips_json['people-oriented']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="persevering" type="checkbox" <?php loadQualities('Persevering'); ?> name="quality" value="Persevering" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['persevering']; ?>"/><p id="quality_text">Persevering</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="perseveringLong"><?php echo $tooltips_json['persevering']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="practical" type="checkbox" <?php loadQualities('Practical'); ?> name="quality" value="Practical" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['practical']; ?>"/><p id="quality_text">Practical</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="practicalLong"><?php echo $tooltips_json['practical']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="productive" type="checkbox" <?php loadQualities('Productive'); ?> name="quality" value="Productive" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['productive']; ?>"/><p id="quality_text">Productive</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="productiveLong"><?php echo $tooltips_json['productive']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="realistic" type="checkbox" <?php loadQualities('Realistic'); ?> name="quality" value="Realistic" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['realistic']; ?>"/><p id="quality_text">Realistic</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="realisticLong"><?php echo $tooltips_json['realistic']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="reliable" type="checkbox" <?php loadQualities('Reliable'); ?> name="quality" value="Reliable" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['reliable']; ?>"/><p id="quality_text">Reliable</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="reliableLong"><?php echo $tooltips_json['reliable']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="resourceful" type="checkbox" <?php loadQualities('Resourceful'); ?> name="quality" value="Resourceful" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['resourceful']; ?>"/><p id="quality_text">Resourceful</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="resourcefulLong"><?php echo $tooltips_json['resourceful']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="responsible" type="checkbox" <?php loadQualities('Responsible'); ?> name="quality" value="Responsible" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['responsible']; ?>"/><p id="quality_text">Responsible</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="responsibleLong"><?php echo $tooltips_json['responsible']; ?></div>
                    </div>

                    <div class="form_line_div attribute"><input class="checkboxOption" id="versatile" type="checkbox" <?php loadQualities('Versatile'); ?> name="quality" value="Versatile" data-toggle="tooltip" data-placement="right"
                                                                title="<?php echo $tooltips_json['versatile']; ?>"/><p id="quality_text">Versatile</p>
                    </div>
                    <div class="form_line_div attribute">
                        <div class="attribLong" id="versatileLong"><?php echo $tooltips_json['versatile']; ?></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="carousel_bottom_nav_bar">
            <button id="left_button" data-target="#wizard_pages" data-slide-to="4">Back</button>
            <button id="middle_button" name="submit" value="save" onclick="saveQualities(false);">Save & Exit</button>
            <button id="right_button" data-target="#wizard_pages" data-slide-to="6">Next</button>
        </div>
    </div>
</div>
