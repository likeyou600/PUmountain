function toggle($id) {
    $("#show" + $id).slideToggle();
    $("#picshow" + $id).hide();
};

function togglepic($id) {
    $("#picshow" + $id).slideToggle();
    $("#show" + $id).hide();
};

$(document).ready(function () {
    $(".hide").hide();
    $(".pichide").hide();
});