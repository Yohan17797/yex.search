getAll();

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

        for (var i of res) {
            var username = i[0];
            var name = i[1];
            var email = i[3];

            var row = "<tr>" +
                "<td>" + username + "</td>" + "<td>" + name + "</td>" + "<td>" + email + "</td>";
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

$("#send").click(function () {
    var to = $("#username").val();
    var from = $("#messagefrom").val();
    var msg = $("#textarea").val();
    var d = new Date();
    var date = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();

    var ajax={
        url:"api/messageService.php",
        method:"POST",
        data: {
            "to":to,
            "from":from,
            "msg":msg,
            "date":date,
            "action":"send"
        }
    }

    $.ajax(ajax).done(function (res) {
        console.log(res);
        if (res == "1") {
            $("#ok").text("Message send successfully...");
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

// $("#delete").click(function () {
//     var username = $("#username").val();
//
//
//     var ajaxConfig = {
//         url: "api/userService.php",
//         method: "GET",
//         dataType: "json",
//         data: {
//             "action": "delete",
//             "username": username
//         }
//     };
//
//     $.ajax(ajaxConfig).done(function (res) {
//         if (res == "1") {
//             $("#ok").text("User deleted successfully...");
//             $("#ok").removeClass("d-none");
//             $("#ok").fadeOut(5000);
//             window.setTimeout(function () {
//                 location.reload()
//             }, 5000)
//         } else {
//             $("#prob").text("Something went wrong.");
//             $("#prob").removeClass("d-none");
//             $("#prob").fadeOut(5000);
//         }
//     });
// });
//
// $("#reset").click(function () {
//     var username = $("#username").val();
//     var ajaxConfig = {
//         url: "api/userService.php",
//         method: "POST",
//         dataType: "json",
//         data: {
//             "action": "reset",
//             "username": username
//         }
//     };
//
//     $.ajax(ajaxConfig).done(function (res) {
//         if (res == "1") {
//             $("#ok").text("Password reset successfully...");
//             $("#ok").removeClass("d-none");
//             $("#ok").fadeOut(3000);
//             window.setTimeout(function () {
//                 location.reload()
//             }, 5000)
//         } else {
//             $("#prob").text("Something went wrong.");
//             $("#prob").removeClass("d-none");
//             $("#prob").fadeOut(5000);
//         }
//     });
//
// })


