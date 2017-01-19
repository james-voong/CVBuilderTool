// Initialize Bootstrap functionality

// Initialize tooltip component
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

// Initialize popover component
$(function() {
    $('[data-toggle="popover"]').popover();
});


// Remove arrows from first and last page

$('#wizard_pages').on('slid.bs.carousel', '', function() {
    var $this = $(this);

    $this.children('.carousel-control').show();

    if ($('.carousel-inner .item:first').hasClass('active')) {
        $this.children('.left.carousel-control').hide();
    } else if ($('.carousel-inner .item:last').hasClass('active')) {

        $this.children('.right.carousel-control').hide();
    } else {
        $this.children('.carousel-control').show();

    }
});

// This function limits the number of personal attributes that can be selected
var qualitiesIndex = 0;
jQuery(function() {
    var max = 6;
    var checkboxes = jQuery('input[type="checkbox"]');

    checkboxes.change(function() {
        var current = checkboxes.filter(':checked').length;
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);

    });
});

/**The purpose of this variable is that it's a boolean to track which button was clicked
 This is for the purposes of whether to run validateForm() internal logic or not*/
var runValidation = false;

/**Variable to check the number of attributes currently selected*/
var qualitiesChecked = 0;

/**Validates the form for all required tags*/
function validateForm() {
    //If finish button was clicked
    if (runValidation) {
        //remove any red input borders
        var formInputs = document.getElementsByTagName('input');
        for (var i = 0; i < formInputs.length; i++) {
            formInputs[i].style.border = "";
        }

        if (!validateItem("firstName", "First Name", 0)) {
            return false;
        }
        if (!validateItem("lastName", "Last Name", 0)) {
            return false;
        }
        if (!validateItem("school", "School", 0)) {
            return false;
        }
        if (!validateItem("phoneNum", "Phone Number", 0)) {
            return false;
        }
        if (!validateItem("mail", "Email", 0) || !validateEmail("mail", 0)) {
            return false;
        }
        if (!validateItem("mail", "Email", 0)) {
            return false;
        }
        if (!validateItem("city", "City", 0)) {
            return false;
        }

        for (var i = 0; i <= educationTracker; i++) {
            if (!validateItem("education[" + i + "][schoolYear]", "Extra education years must be removed and/or all education years", 4)) {
                return false;
            }
        }

        if (qualitiesChecked == 0) {
            alert("Please select at least 1 personal attribute");
            $("#wizard_pages").carousel(5);
            return false;
        }

        for (var i = 0; i <= refereesTracker; i++) {
            console.log(i);
            if (!validateItem("referees[" + i + "][refName]", "Referee Name", 7)) {
                return false;
            }
            if (!validateItem("referees[" + i + "][refPosition]", "Referee Position", 7)) {
                return false;
            }
            if (!validateItem("referees[" + i + "][refEmail]", "Referee Email", 7) || !validateEmail("referees[" + i + "][refEmail]", 7)) {
                return false;
            }
            if (!validateItem("referees[" + i + "][refNum]", "Referee Contact Number", 7)) {
                return false;
            }
        }

    }
    return true;
}

/**Used by validateForm() for validating items*/
function validateItem(elementName, elementPrintName, carouselSlide) {
    var x = document.forms["myForm"][elementName].value;
    if (x == "") {
        alert(elementPrintName + " must be filled out");
        $("#wizard_pages").carousel(carouselSlide);
        document.forms["myForm"][elementName].style.borderColor = "red";
        document.forms["myForm"][elementName].select();
        return false;
    }
    document.forms["myForm"][elementName].style.borderColor = "";
    return true;
}

/**The boolean is true if finish was clicked and false if save was clicked
 The purpose of the boolean is to track which button was clicked*/
function saveQualities(finishClicked) {
    runValidation = finishClicked;

    $("input:checkbox[name=quality]:checked").each(function() {
        qualitiesChecked++;
        $(this).attr('name', 'qualities[' + qualitiesIndex + '][quality]');
        qualitiesIndex++;
    });
}

//This function is for validating email address formats
function validateEmail(elementName, carouselSlide) {
    var x = document.forms["myForm"][elementName].value;
    //Checks that the field contains an @ character
    if (x.includes("@")) {
        //Splits the string at the @ character
        var stringArray = x.split("@");
        if (stringArray.length == 2) {
            //Checks that the strings on either side of the @ are not empty
            if (stringArray[0].length > 0 && stringArray[1].length > 0) {
                return true;
            } else {
                alert("Valid email format must be used");
                document.forms["myForm"][elementName].style.borderColor = "red";
                document.forms["myForm"][elementName].select();
                return false;
            }
        } else {
            alert("Valid email format must be used");
            document.forms["myForm"][elementName].style.borderColor = "red";
            document.forms["myForm"][elementName].select();
            return false;
        }
    } else {
        alert("Valid email format must be used");
        document.forms["myForm"][elementName].style.borderColor = "red";
        document.forms["myForm"][elementName].select();
        return false;
    }
}



//Tooltips dropping down beneath selected characteristics
function displayCheckedDrop() {
    var m = $("input[class=checkboxOption]").length;

    for (i = 0; i < m; i++) {
        var attrib = $("input[class=checkboxOption]")[i];
        var attribLongID = attrib.id + "Long";
        var item = document.getElementById(attribLongID);
        item.style.display = "none";
    }

    var n = $("input:checked").length;
    for (i = 0; i < n; i++) {
        var attrib = $("input:checked")[i];
        var attribLongID = attrib.id + "Long";
        var item = document.getElementById(attribLongID);
        item.style.display = "block";
    }

}

displayCheckedDrop();
$("input[type=checkbox]").on("click", displayCheckedDrop);
