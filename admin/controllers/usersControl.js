$(document).ajaxStart(function () {
    $("#msg").removeClass("d-none");
});

$(document).ajaxComplete(function () {
    $("#msg").addClass("d-none");
});

$(document).ajaxStart(function () {
    $("#msgtmp").removeClass("d-none");
});

$(document).ajaxComplete(function () {
    $("#msgtmp").addClass("d-none");
});


getAll();
getAllTemp();

function getAllTemp() {
    var ajaxConfig = {
        url: "api/userService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "getAllTemp"
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        console.log(res);

        for (var i of res)
        {
            var username=i[0];
            var name=i[1];
            var email=i[3];

            var row="<tr>" +
                "<td>"+username+"</td>" +"<td>"+name+"</td>"+"<td>"+email+"</td>"
            "</tr>";

            $("#tempUsers-table").append(row);
            getElementBtClickTemp();
        }


    })
}

function getElementBtClickTemp() {
    $("#tempUsers-table tr").off("click");
    $("#tempUsers-table tr").on("click", function () {
        var username = $($(this).children()[0]).text();
        var name = $($(this).children()[1]).text();
        var email = $($(this).children()[2]).text();
        $("#usernametmp").val(username);
        $("#nametmp").val(name);
        $("#emailtmp").val(email);
        $('#exampleModalCenterTmp').modal("show");
    })
}

$("#activate").click(function () {
    var username=$("#usernametmp").val();
    var ajax={
        url:"api/userService.php",
        method:"GET",
        data:{
            "userName":username,
            "action":"activateUser"
        }
    }

    $.ajax(ajax).done(function (res) {
        console.log(res);
        if (res==1)
        {
            $("#oktmp").text("User Activated Successfully...");
            $("#oktmp").removeClass("d-none");
            $("#oktmp").fadeOut(3000);
            window.setTimeout(function () {
                location.reload()
            }, 3000)
        }
        else {
            $("#probtmp").text("Something went wrong.");
            $("#probtmp").removeClass("d-none");
            $("#probtmp").fadeOut(5000);
        }
    })
});
$("#deleteTmp").click(function () {
    var username = $("#usernametmp").val();


    var ajaxConfig = {
        url: "api/userService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "deleteTmp",
            "username": username
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        if (res == "1") {
            $("#oktmp").text("Tempory User deleted successfully...");
            $("#oktmp").removeClass("d-none");
            $("#oktmp").fadeOut(5000);
            window.setTimeout(function () {
                location.reload()
            }, 5000)
        } else {
            $("#probtmp").text("Something went wrong.");
            $("#probtmp").removeClass("d-none");
            $("#probtmp").fadeOut(5000);
        }
    });
});






function getAll() {
    var ajaxConfig = {
        url: "api/userService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "getAll"
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        console.log(res);

        for (var i of res)
        {
            var username=i[0];
            var name=i[1];
            var email=i[3];

            var row="<tr>" +
                "<td>"+username+"</td>" +"<td>"+name+"</td>"+"<td>"+email+"</td>"
            "</tr>";

            $("#users-table").append(row);
            getElementBtClick();
        }


    })
}


function getElementBtClick() {
    $("#users-table tr").off("click");
    $("#users-table tr").on("click", function () {
        var username = $($(this).children()[0]).text();
        var name = $($(this).children()[1]).text();
        var email = $($(this).children()[2]).text();
        $("#username").val(username);
        $("#name").val(name);
        $("#email").val(email);
        $('#exampleModalCenter').modal("show");
    })
}

$("#update").click(function () {
    var username = $("#username").val();
    var name = $("#name").val();
    var email= $("#email").val();
    ;

    var ajaxConfig = {
        url: "api/userService.php",
        method: "POST",
        dataType: "json",
        data: {
            "action": "update",
            "username": username,
            "name": name,
            "email": email
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        if (res == "1") {
            $("#ok").text("Details Updated successfully...");
            $("#ok").removeClass("d-none");
            $("#ok").fadeOut(3000);
            window.setTimeout(function () {
                location.reload()
            }, 3000)
        } else {
            $("#prob").text("Something went wrong.");
            $("#prob").removeClass("d-none");
            $("#prob").fadeOut(5000);
        }


    })


});

$("#delete").click(function () {
    var username = $("#username").val();


    var ajaxConfig = {
        url: "api/userService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "delete",
            "username": username
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        if (res == "1") {
            $("#ok").text("User deleted successfully...");
            $("#ok").removeClass("d-none");
            $("#ok").fadeOut(5000);
            window.setTimeout(function () {
                location.reload()
            }, 5000)
        } else {
            $("#prob").text("Something went wrong.");
            $("#prob").removeClass("d-none");
            $("#prob").fadeOut(5000);
        }
    });
});

$("#reset").click(function () {
    var username = $("#username").val();
    var ajaxConfig = {
        url: "api/userService.php",
        method: "POST",
        dataType: "json",
        data: {
            "action": "reset",
            "username": username
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        if (res == "1") {
            $("#ok").text("Password reset successfully...");
            $("#ok").removeClass("d-none");
            $("#ok").fadeOut(3000);
            window.setTimeout(function () {
                location.reload()
            }, 5000)
        } else {
            $("#prob").text("Something went wrong.");
            $("#prob").removeClass("d-none");
            $("#prob").fadeOut(5000);
        }
    });

})


$("#paperSearch").click(function () {
    var userName = $("#paper-key").val();
    getUsersbyUserId(userName);
});

function getUsersbyUserId(id) {
    var ajaxConfig = {
        url: "api/userService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "isHave",
            "username": id
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        $("#users-table").empty();
        var username=res["userName"];
        var name=res["name"];
        var email=res["email"];

        var row="<tr>" +
            "<td>"+username+"</td>" +"<td>"+name+"</td>"+"<td>"+email+"</td>"
        "</tr>";

        $("#users-table").append(row);
        getElementBtClick();

    })
}