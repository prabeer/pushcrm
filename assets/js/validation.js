function isValidEmailAddress(e) {
    var F = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return F.test(e)
}

$("form").submit(function (e) {
    var F = $(".required-value"),
            u = "";
    F.filter(function (F) {
        var r = $(this).val();
        r = r.replace(/\W+/g, ""), r.length <= 0 && ($(this).css("border", "2px solid red"), u = "The following fields are mandatory", e.preventDefault())
    });
    var r = $("input.required-value:checkbox");
    r.filter(function (F) {
        $(this).is(":checked") || ($(this).css("border", "2px solid red"), u.length ? u += " ,Please check the mandatory checkbox" : u = "Please check the mandatory checkbox", e.preventDefault())
    });
    var t = $("input.password");
    t.filter(function (F) {
        var r = $(this).val();
        r = r.replace("/[\x00-聙-每]/", ""), r.length > 7 && r.length <= 32 || ($(this).css("border", "2px solid red"), u.length ? u += " ,Password format is invalid" : u = "Password format is invalid", e.preventDefault())
    });
    var t = $(".description-value");
    t.filter(function (F) {
        var r = $(this).val();
        r = r.replace(/\W+/g, ""), r.length > 60 && r.length <= 2500 || ($(this).css("border", "2px solid red"), u.length ? u += " ,Description must be between 60 to 3000 characters" : u = ",Description must be between 60 to 400 characters", e.preventDefault())
    });
    var t = $(".title-value");
    t.filter(function (F) {
        var r = $(this).val();
        r = r.replace(/\W+/g, ""), r.length > 10 && r.length <= 400 || ($(this).css("border", "2px solid red"), u.length ? u += " ,Title must be between 10 to 400 characters" : u = "Title must be between 10 to 400 characters", e.preventDefault())
    });
    var t = $(".address-value");
    t.filter(function (F) {
        var r = $(this).val();
        r = r.replace(/\W+/g, ""), r.length > 10 && r.length <= 950 || ($(this).css("border", "2px solid red"), u.length ? u += " ,Address must be between 10 to 1000 characters" : u = "Address must be between 10 to 1000 characters", e.preventDefault())
    });
    var d = $(".required-email");
    d.filter(function (F) {
        isValidEmailAddress($(this).val()) || ($(this).css("border", "2px solid red"), u.length ? u += " , Invalid Email" : u = "Invalid Email", e.preventDefault())
    });
    var a = $(".image-verify");
    a.filter(function (F) {
        var r = a.val();
        if ("" != r) {
            var t = this.files[0],
                    d = t.size / 1024;
            if (d > 500)
                u = "file too large", alert(u), e.preventDefault();
            else {
                var i = r.replace(/^.*\./, "");
                if (i = i.toUpperCase(), -1 !== $.inArray(i, ["JPG", "PNG", "GIF", "JPEG"]))
                    return;
                u = "Invalid file extension", alert(u), e.preventDefault()
            }
        }
    })
    var er = 0;
    if (u.length)
    {
        $("div.error").addClass("alert alert-danger").text(u)
        e.preventDefault()
        er = 1;
    }

}), $(".numbers").keydown(function (e) {
    -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 86]) || e.keyCode >= 35 && e.keyCode <= 39 || (e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault()
}), $(".alphanumeric").keydown(function (e) {
    -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 32]) || 65 == e.keyCode && e.ctrlKey === !0 || 67 == e.keyCode && e.ctrlKey === !0 || 88 == e.keyCode && e.ctrlKey === !0 || e.keyCode >= 35 && e.keyCode <= 39 || ((e.keyCode < 48 || e.keyCode > 90) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault(), e.shiftKey === !0 && (e.keyCode < 58 || e.keyCode > 90) && e.preventDefault())
}), $(".para").keydown(function (e) {
    -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 32, 188, 107, 109, 59, 61]) || 65 == e.keyCode && e.ctrlKey === !0 || 67 == e.keyCode && e.ctrlKey === !0 || 88 == e.keyCode && e.ctrlKey === !0 || 173 == e.keyCode && e.shiftKey === !0 || 59 == e.keyCode && e.shiftKey === !0 || 61 == e.keyCode && e.shiftKey === !0 || e.keyCode >= 35 && e.keyCode <= 39 || ((e.keyCode < 48 || e.keyCode > 90) && (e.keyCode < 96 || e.keyCode > 105) && e.preventDefault(), e.shiftKey === !0 && (e.keyCode < 58 || e.keyCode > 90) && e.preventDefault())
})
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


