$(document).ajaxStart(function () {
    $("#msg").removeClass("d-none");
});

$(document).ajaxComplete(function () {
    $("#msg").addClass("d-none");
});


getAll();

function getAll() {

    var ajaxConfig={
        url:"api/tagService.php",
        method: "GET",
        dataType:"json",
        data:{
            "action":"getAll"
        }
    }

    $.ajax(ajaxConfig).done(function (res) {
        console.log(res);

        for (var i of res)
        {
            var paperId=i[1];
            var tagId=i[0];
            var tagName=i[2];

            var row = "<tr>" +
                "<td>" + paperId + "</td>"
                + "<td>" + tagId + "</td>"
                + "<td>" + tagName + "</td>"
            "</tr>";
            $("#papers-table").append(row);
            getElementBtClick();
        }
    })


}

function getElementBtClick() {
    $("#papers-table tr").off("click");
    $("#papers-table tr").on("click", function () {
        var tagid = $($(this).children()[1]).text();
        var paperid = $($(this).children()[0]).text();
        var tagName = $($(this).children()[2]).text();

        $("#paperid").val(paperid);
        $("#tagid").val(tagid);
        $("#tagname").val(tagName);

        $('#exampleModalCenter').modal("show");
    })
}

$("#delete").click(function () {
    var tagid = $("#tagid").val();


    var ajaxConfig = {
        url: "api/tagService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "delete",
            "tagid": tagid
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        if (res == "1") {
            $("#ok").text("Tag deleted successfully...");
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

$("#update").click(function () {
    var tagid = $("#tagid").val();
    var tagname = $("#tagname").val();

    var ajaxConfig = {
        url: "api/tagService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "update",
            "tagid": tagid,
            "tagname": tagname
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        if (res == "1") {
            $("#ok").text("Tag Updated successfully...");
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

$("#addnew").click(function () {
    var tags=$("#addnewtags").val();
    var paperid=$("#paperid").val();

    var ajaxConfig={
        url: "api/tagService.php",
        method: "POST",
        data: {
            "paperid": paperid,
            "tags":tags,
            "action": "addnewtags"
        }
    }

    $.ajax(ajaxConfig).done(function (res) {
        if (res == "1") {
            $("#ok").text("Tag Added successfully...");
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

})

$("#paperSearch").click(function () {
    var userName = $("#paper-key").val();
    getPapersbyUserId(userName);
});

function getPapersbyUserId(id) {
    var ajaxConfig = {
        url: "api/tagService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "getPapersbyUserId",
            "userId": id
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        $("#papers-table").empty();
        console.log(res);
        for (var i of res) {
            var paperId = i[1];
            var pageid = i[0];
            var tagname=i[2];

            var row = "<tr>" +
                "<td>" + paperId + "</td>"
                + "<td>" + pageid + "</td>"
                + "<td>" + tagname + "</td>"
            "</tr>";

            $("#papers-table").append(row);
            getElementBtClick();
        }

    })
}

