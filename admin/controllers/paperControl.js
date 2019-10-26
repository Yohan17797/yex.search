$(document).ajaxStart(function () {
    $("#msg").removeClass("d-none");
});

$(document).ajaxComplete(function () {
    $("#msg").addClass("d-none");
});

$("#transfer").prop("disabled", true);

getAll();

function getAll() {
    var ajaxConfig = {
        url: "api/paperService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "getAll"
        }
    };


    $.ajax(ajaxConfig).done(function (res) {
        // console.log(res);

        for (var i of res) {
            var paperId = i[1];
            var aUName = i[0];
            var title = i[2];
            var des = i[3];
            var path = i[5];
            var authName=i[4];
            var name = path.split("/");
            console.log(path);
            var row = "<tr>" +
                "<td>" + paperId + "</td>"
                + "<td>" + aUName + "</td>"
                + "<td>" + authName + "</td>"
                + "<td>" + title + "</td>"
                + "<td>" + des + "</td>"
            "</tr>";


            $("#papers-table").append(row);

            getElementBtClick();

        }


    });
    $("#papers-table").addClass("table-hover");


}

$("#paperSearch").click(function () {
    var userName = $("#paper-key").val();
    getPapersbyUserId(userName);
});

function getPapersbyUserId(id) {
    var ajaxConfig = {
        url: "api/paperService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "getPapersbyUserId",
            "userId": id
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        $("#papers-table").empty();
        for (var i of res) {
            var paperId = i[1];
            var aUName = i[0];
            var authName=i[4];
            var title = i[2];
            var des = i[3];
            var path = i[5];
            var name = path.split("/");


            var row = "<tr>" +
                "<td>" + paperId + "</td>"
                + "<td>" + aUName + "</td>"
                + "<td>" + authName + "</td>"
                + "<td>" + title + "</td>"
                + "<td>" + des + "</td>"
            "</tr>";

            $("#papers-table").append(row);
            getElementBtClick();
        }

    })
}

function getElementBtClick() {
    $("#papers-table tr").off("click");
    $("#papers-table tr").on("click", function () {
        var username = $($(this).children()[1]).text();
        var paperid = $($(this).children()[0]).text();
        var title = $($(this).children()[3]).text();
        var des = $($(this).children()[4]).text();
        var authName=$($(this).children()[2]).text();
        $("#username").val(username);
        $("#paperid").val(paperid);
        $("#title").val(title);
        $("#description").val(des);
        $("#author").val(authName);
        $('#exampleModalCenter').modal("show");
    })
}

$("#update").click(function () {
    var paperId = $("#paperid").val();
    var aUName = $("#username").val();
    var title = $("#title").val();
    var des = $("#description").val();

    var ajaxConfig = {
        url: "api/paperService.php",
        method: "POST",
        dataType: "json",
        data: {
            "action": "update",
            "paperId": paperId,
            "title": title,
            "des": des
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
    var paperId = $("#paperid").val();


    var ajaxConfig = {
        url: "api/paperService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "delete",
            "paperId": paperId
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        if (res == "1") {
            $("#ok").text("File deleted successfully...");
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

$("#username").keyup(function () {
    var val=$("#username").val();
    if (/^[a-zA-Z0-9_]{5,50}$/.test(val))
    {
        var ajax={
            url:"api/userService.php",
            method:"GET",
            dataType:"json",
            data:{
                "username":val,
                "action":"isHave"
            }
        }

        $.ajax(ajax).done(function (res) {
            // console.log(res);
            if (res==null)
            {
                $("#transfer").prop("disabled",true);
                $("#ok").addClass("d-none");
                console.log("nope");
                $("#username").css({
                    "background": "#fff6f6",
                    "border-color": "#e0b4b4",
                    "color": "#9f3a38",

                    "-webkit-box-shadow": "none",
                    "box-shadow": "none"
                });

            }
            else {
                $("#username").css({
                    "background": "#fcfff5",
                    "border-color": "#2c662d",
                    "color": "#2c662d",

                    "-webkit-box-shadow": "none",
                    "box-shadow": "none"
                });
                var auth=res["name"];
                $("#author").val(auth);
                $("#ok").text("Do you want to transfer file to "+res["name"]+"?");
                $("#ok").removeClass("d-none");
                $("#transfer").prop("disabled",false);

                console.log(res["name"]);
            }
        })
    }

})

$("#transfer").click(function () {

    var username=$("#username").val();
    var paperid=$("#paperid").val();
    var authname=$("#author").val();
    var title=$("#title").val();
    var des=$("#description").val();

    var ajaxConfig = {
        url: "api/paperService.php",
        method: "POST",
        dataType: "json",
        data: {
            "action": "transfer",
            "paperId": paperid,
            "username":username,
            "author":authname,
            "title":title,
            "des":des
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        if (res==1)
        {
            $("#ok").text("File successfully transferred.");
            $("#ok").removeClass("d-none");
            window.setTimeout(function () {
                location.reload()
            }, 5000);

        }
        else
        {
            $("#prob").text("Something went wrong!");
            $("#prob").removeClass("d-none");
        }
    })

})

$("#msgsend").click(function () {
    var to=$("#username").val();
    var paperid=$("#paperid").val();
    var msg=$("#description").val();
    var d = new Date();
    var date = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();

    var ajaxConfig = {
        url: "/webapp/admin/api/messageService.php",
        method: "POST",
        dataType: "json",
        data: {
            "action": "send",
            "from":"admin",
            "paperId": paperid,
            "to":to,
            "msg":msg,
            "date":date
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        if (res==1)
        {
            $("#ok").text("Message successfully sent.");
            $("#ok").removeClass("d-none");
            window.setTimeout(function () {
                location.reload()
            }, 5000);

        }
        else
        {
            $("#prob").text("Something went wrong!");
            $("#prob").removeClass("d-none");
        }
    })
})