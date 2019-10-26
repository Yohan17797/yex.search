$("#update-details").prop('disabled', true);
$("#email-err").css("display", "none");
$("#suc").css("display", "none");
$("#update-password").prop("disabled", true);
$("#n-password").prop("disabled", true);
$("#r-n-password").prop("disabled", true);


$("#name").keyup(function (e) {
    $("#update-details").prop('disabled', false);

    var name = $("#name").val();
    if (/^[a-zA-Z. ]{5,30}$/.test(name)) {
        $("#name").css({
            "background": "#fcfff5",
            "border-color": "#2c662d",
            "color": "#2c662d",

            "-webkit-box-shadow": "none",
            "box-shadow": "none"
        });
        if (e.code == "Enter") {
            $("#email").focus();
        }
    } else {
        $("#name").css({
            "background": "#fff6f6",
            "border-color": "#e0b4b4",
            "color": "#9f3a38",

            "-webkit-box-shadow": "none",
            "box-shadow": "none"
        });
    }

    var email = $("#email").val();
    var nameplaceholder = $("#name").attr('placeholder');
    var name1 = $("#name").val();

    var emailplace = $("#email").attr('placeholder');
    if (name1 == nameplaceholder && email == emailplace) {
        $("#head").text("It seems no need update!");
        $("#email-err").css("display", "block");
        $("#update-details").prop('disabled', true);
    } else {
        $("#email-err").css("display", "none");
        $("#update-details").prop('disabled', false);
    }
});

$("#email").keyup(function (e) {
    var placeholder = $("#email").attr('placeholder');
    var nameplaceholder = $("#name").attr('placeholder');
    var name1 = $("#name").val();


    var name = $("#email").val();
    if (placeholder == name && nameplaceholder == name1) {
        $("#update-details").prop('disabled', true);
        $("#head").text("It seems no need update!");
        $("#email-err").css("display", "block");
    } else {
        $("#update-details").prop('disabled', false);
        $("#email-err").css("display", "none");

    }

    if (placeholder == name) {
        $("#email").css({
            "background": "#fcfff5",
            "border-color": "#2c662d",
            "color": "#2c662d",

            "-webkit-box-shadow": "none",
            "box-shadow": "none"
        });
    }

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(name)) {
        var ajaxConfig = {
            url: "api/signUpControl.php",
            method: "GET",
            dataType: "json",
            data: {
                "email": name,
                action: "email"
            }
        };

        $.ajax(ajaxConfig).done(function (res) {
            // console.log(res["name"]);
            if (res != null) {
                $("#email-err").css("display", "none");

                $("#email-err").css("display", "block");
                $("#email").css({
                    "background": "#fff6f6",
                    "border-color": "#e0b4b4",
                    "color": "#9f3a38",

                    "-webkit-box-shadow": "none",
                    "box-shadow": "none"
                });
            } else {
                $("#email-err").css("display", "none");
                $("#email").css({
                    "background": "#fcfff5",
                    "border-color": "#2c662d",
                    "color": "#2c662d",

                    "-webkit-box-shadow": "none",
                    "box-shadow": "none"
                });
                if (e.code = "Enter") {
                    $("#username").focus();

                }
            }


        });
    } else {
        $("#email").css({
            "background": "#fff6f6",
            "border-color": "#e0b4b4",
            "color": "#9f3a38",

            "-webkit-box-shadow": "none",
            "box-shadow": "none"
        });
    }
});

$("#update-details").click(function () {
    var name = $("#name").val();
    var email = $("#email").val();
    var username = $("#uname").attr("placeholder");
    var ajax = {
        url: "api/accountControl.php",
        method: "POST",
        data: {
            "username": username,
            "email": email,
            "name": name,
            "action": "update"
        }
    };

    $.ajax(ajax).done(function (res) {
        if (res == "1") {
            $("#suc").css("display", "block");

            $("#suc").fadeOut(3000);
            setTimeout("window.location='account.php'", 3000);
        }
    })
});

$("#current-password").keyup(function (e) {

    var cPass = $("#current-password").val();
    var username = $("#uname").attr("placeholder");

    if (/^[a-zA-Z0-9!@#$%^&*()_+=]{5,50}$/.test(cPass)) {

        var ajax = {
            url: "api/accountControl.php",
            method: "POST",
            data: {
                "pass": cPass,
                "userName": username,
                "action": "checkP"
            }
        };

        $.ajax(ajax).done(function (res) {
            if (res == "1") {
                $("#current-password").css({
                    "background": "#fcfff5",
                    "border-color": "#2c662d",
                    "color": "#2c662d",

                    "-webkit-box-shadow": "none",
                    "box-shadow": "none"
                });

                $("#n-password").prop("disabled", false);
                // $("#r-n-password").prop("disabled",false);

                if (e.code == "Enter") {
                    $("#n-password").focus();
                }

                $("#n-password").keyup(function (e) {

                    $("#n-password").css({
                        "background": "#fff6f6",
                        "border-color": "#e0b4b4",
                        "color": "#9f3a38",

                        "-webkit-box-shadow": "none",
                        "box-shadow": "none"
                    });
                    $("#r-n-password").css({
                        "background": "#fff6f6",
                        "border-color": "#e0b4b4",
                        "color": "#9f3a38",

                        "-webkit-box-shadow": "none",
                        "box-shadow": "none"
                    });

                    var nPassword = $("#n-password").val();
                    // var RNPassowrd = $("#r-n-password").val();

                    if (/^[a-zA-Z0-9!@#$%^&*()_+=]{5,50}$/.test(nPassword)) {

                        $("#n-password").css({
                            "background": "#fcfff5",
                            "border-color": "#2c662d",
                            "color": "#2c662d",

                            "-webkit-box-shadow": "none",
                            "box-shadow": "none"
                        });
                        $("#r-n-password").prop("disabled", false);

                        if (e.code == "Enter") {
                            $("#r-n-password").focus();

                        }


                        $("#r-n-password").keyup(function (e) {
                            var nPassword = $("#n-password").val();
                            var RNPassowrd = $("#r-n-password").val();

                            if (nPassword==RNPassowrd)
                            {
                                $("#r-n-password").css({
                                    "background": "#fcfff5",
                                    "border-color": "#2c662d",
                                    "color": "#2c662d",

                                    "-webkit-box-shadow": "none",
                                    "box-shadow": "none"
                                });
                                $("#update-password").prop("disabled",false);
                            }
                            else {
                                $("#update-password").prop("disabled",true);
                                $("#r-n-password").css({
                                    "background": "#fff6f6",
                                    "border-color": "#e0b4b4",
                                    "color": "#9f3a38",

                                    "-webkit-box-shadow": "none",
                                    "box-shadow": "none"
                                });

                            }
                        });


                    } else {
                        $("#n-password").css({
                            "background": "#fff6f6",
                            "border-color": "#e0b4b4",
                            "color": "#9f3a38",

                            "-webkit-box-shadow": "none",
                            "box-shadow": "none"
                        });

                    }
                });


            } else {
                $("#n-password").prop("disabled", true);
                $("#r-n-password").prop("disabled", true);
                $("#current-password").css({
                    "background": "#fff6f6",
                    "border-color": "#e0b4b4",
                    "color": "#9f3a38",

                    "-webkit-box-shadow": "none",
                    "box-shadow": "none"
                });
            }
        });


    } else {
        $("#update-password").prop("disabled", true);
        $("#current-password").css({
            "background": "#fff6f6",
            "border-color": "#e0b4b4",
            "color": "#9f3a38",

            "-webkit-box-shadow": "none",
            "box-shadow": "none"
        });


    }


});

$("#update-password").click(function () {

    var username=$("#uname").attr("placeholder");
    var newpassword=$("#r-n-password").val();

    var ajax={
        url:"api/accountControl.php",
        method:"POST",
        data:{
            "username":username,
            "newpassword":newpassword,
            "action":"changePassword"
        }
    };

    $.ajax(ajax).done(function () {
        location.reload(true);
    });

})
