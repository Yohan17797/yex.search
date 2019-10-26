$("#email-err").css("display", "none");
$("#user-err").css("display", "none");
$("#spin").css("display", "none");
$("#congrats").css("display", "none");
$("#wrong").css("display", "none");


$(document).ajaxStart(function () {
    $("#spin").css("display", "block");
});

$(document).ajaxComplete(function () {
    $("#spin").css("display", "none");
});


signUpcontrol();

function signUpcontrol() {
    var a = 0;
    var b = 0;
    var c = 0;
    var d = 0;
    var e = 0;


    $("#register").prop('disabled', true);

    $("#name").focus();


    $("#name").keyup(function (e) {

        var name = $("#name").val();

        if (/^[a-zA-Z. ]{5,30}$/.test(name)) {
            $("#name").css({
                "background": "#fcfff5",
                "border-color": "#2c662d",
                "color": "#2c662d",

                "-webkit-box-shadow": "none",
                "box-shadow": "none"
            });
            a = 1;
            check();
            if (e.code == "Enter") {
                $("#email").focus();
            }
        }
        else {
            a = 0;
            check();
            $("#name").css({
                "background": "#fff6f6",
                "border-color": "#e0b4b4",
                "color": "#9f3a38",

                "-webkit-box-shadow": "none",
                "box-shadow": "none"
            });
        }
    });

    $("#username").keyup(function (e) {
        var name = $("#username").val();
        if (/^[a-zA-Z0-9_]{5,50}$/.test(name)) {

            var ajaxConfig = {
                url: "api/signUpControl.php",
                method: "GET",
                dataType: "json",
                data: {
                    "userName": name,
                    action: "userName"
                }
            };
            $.ajax(ajaxConfig).done(function (res) {
                console.log(res);
                if (res != null) {
                    $("#user-err").css("display", "none");
                    $("#user-err").css("display", "block");
                    $("#username").css({
                        "background": "#fff6f6",
                        "border-color": "#e0b4b4",
                        "color": "#9f3a38",

                        "-webkit-box-shadow": "none",
                        "box-shadow": "none"
                    });
                    b = 0;
                    check();
                } else {
                    $("#user-err").css("display", "none");
                    $("#username").css({
                        "background": "#fcfff5",
                        "border-color": "#2c662d",
                        "color": "#2c662d",

                        "-webkit-box-shadow": "none",
                        "box-shadow": "none"
                    });
                    b = 1;
                    check();
                    if (e.code == "Enter") {
                        $("#password").focus();
                    }
                }
            })
        } else {
            $("#username").css({
                "background": "#fff6f6",
                "border-color": "#e0b4b4",
                "color": "#9f3a38",

                "-webkit-box-shadow": "none",
                "box-shadow": "none"
            });

        }
    });

    $("#email").keyup(function (e) {

        var name = $("#email").val();

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
                    c = 0;
                    check();
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
                    c = 1;
                    check();
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

    $("#password").keyup(function (e) {
        $("#repeat-password").css({
            "background": "#fff6f6",
            "border-color": "#e0b4b4",
            "color": "#9f3a38",

            "-webkit-box-shadow": "none",
            "box-shadow": "none"
        });
        var cPass = $("#password").val();

        if (/^[a-zA-Z0-9!@#$%^&*()_+=]{5,50}$/.test(cPass)) {

            $("#password").css({
                "background": "#fcfff5",
                "border-color": "#2c662d",
                "color": "#2c662d",

                "-webkit-box-shadow": "none",
                "box-shadow": "none"
            });

            if (e.code == "Enter") {
                $("#repeat-password").focus();
            }
        }
        else {
            $("#password").css({
                "background": "#fff6f6",
                "border-color": "#e0b4b4",
                "color": "#9f3a38",

                "-webkit-box-shadow": "none",
                "box-shadow": "none"
            });
        }
    });


    $("#repeat-password").keyup(function (e) {
        var name = $("#repeat-password").val();
        var cPass = $("#password").val();

        if (name == cPass) {
            d = 1;
            check();

            $("#repeat-password").css({
                "background": "#fcfff5",
                "border-color": "#2c662d",
                "color": "#2c662d",

                "-webkit-box-shadow": "none",
                "box-shadow": "none"
            });
            if (e.code == "Enter") {
                reg();
            }


        } else {
            d = 0;
            check();
            $("#rpassword").css({
                "background": "#fff6f6",
                "border-color": "#e0b4b4",
                "color": "#9f3a38",

                "-webkit-box-shadow": "none",
                "box-shadow": "none"
            });
        }
    });

    function check() {
        if (a == 1 && b == 1 && c == 1 && d == 1) {
            $("#register").prop('disabled', false);


        } else {
            $("#register").prop('disabled', true);

        }
    }


}

function reg()
{
    var name = $("#name").val();
    var userName = $("#username").val();
    var email = $("#email").val().toLowerCase();
    var password = $("#password").val();
    var ajaxConfig = {
        url: "api/signUpControl.php",
        method: "POST",

        data: {
            "name": name,
            "userName": userName,
            "email": email,
            "password": password
        }
    };
    $.ajax(ajaxConfig).done(function (res) {

        if (res == "1") {
            $("#congrats").text("Welcome to Yex " + name + "!" +" Feel free to wait until admin approval.");
            $("#congrats").css("display", "block");
            // $("#congrats").fadeIn(3000);
        } else {

        }
    })
}

$("#register").click(function () {


    var name = $("#name").val();
    var userName = $("#username").val();
    var email = $("#email").val().toLowerCase();
    var password = $("#password").val();
    var ajaxConfig = {
        url: "api/signUpControl.php",
        method: "POST",

        data: {
            "name": name,
            "userName": userName,
            "email": email,
            "password": password
        }
    };
    $.ajax(ajaxConfig).done(function (res) {

        if (res == "1") {
            $("#congrats").text("Welcome to Yex " + name + "!" +" Feel free to wait until admin approval.");
            $("#congrats").css("display", "block");
            // $("#congrats").fadeIn(3000);
        } else {

        }
    })

});


