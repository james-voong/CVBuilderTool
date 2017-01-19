$(function () {
    updateGlyphicons();
});

function updateGlyphicons() {
    $('.month_year_picker').datepicker({
        format: "MM yyyy",
        startView: 2,
        minViewMode: 1,
        maxViewMode: 3,
        autoclose: true
    });
    
    $('.year_picker').datepicker({
        format: "yyyy",
        startView: 2,
        minViewMode: 2,
        maxViewMode: 3,
        autoclose: true
    });
}