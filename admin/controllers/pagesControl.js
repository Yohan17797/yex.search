$(document).ajaxStart(function () {
    $("#msg").removeClass("d-none");
});

$(document).ajaxComplete(function () {
    $("#msg").addClass("d-none");
});


getAll();

function getAll() {

    var ajaxConfig={
        url:"api/pagesService.php",
        method: "GET",
        dataType:"json",
        data:{
            "action":"getAll"
        }
    }

    $.ajax(ajaxConfig).done(function (res) {
        // console.log(res);

        for (var i of res)
        {
            var paperId=i[1];
            var pageId=i[0];
            var status=i[4];
            var fileType=i[3];
            var path=i[2];
            // var pathh="+<a href="+webApp/+path+">Show</a>";
            var row = "<tr>" +
                "<td>" + paperId + "</td>"
                + "<td>" + pageId + "</td>"
                + "<td>" + status + "</td>"
                + "<td>" + fileType + "</td>"
                + "<td><a href='\\webapp/"+path+"' target='_self'>Show</a> </td>";
            "</tr>";
            $("#papers-table").append(row);
            getElementBtClick();
        }
    })


}

function getElementBtClick() {
    $("#papers-table tr").off("click");
    $("#papers-table tr").on("click", function () {
        var pageid = $($(this).children()[1]).text();
        var paperid = $($(this).children()[0]).text();
        var status = $($(this).children()[2]).text();
        console.log(typeof(status));
        console.log(status);
        $("#paperid").val(paperid);
        $("#pageid").val(pageid);

        if (status=="1")
        {
            $('#online').prop('checked', true)
        }
        if (status==0)
        {
            $('#offline').prop('checked', true)
        }

        // $("#description").val(des);
        // $("#author").val(authName);
        $('#exampleModalCenter').modal("show");
    })
}

$("#delete").click(function () {
    var pageid = $("#pageid").val();


    var ajaxConfig = {
        url: "api/pagesService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "delete",
            "pageid": pageid
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        if (res == "1") {
            $("#ok").text("Page deleted successfully...");
            $("#ok").removeClass("d-none");
            $("#ok").fadeOut(2000);
            window.setTimeout(function () {
                location.reload()
            }, 2000)
        } else {
            $("#prob").text("Something went wrong.");
            $("#prob").removeClass("d-none");
            $("#prob").fadeOut(5000);
        }
    });
});

$("#update").click(function () {
    var status = $('input[name="status"]:checked').val();
    var pageid = $("#pageid").val();

    var ajaxConfig = {
        url: "api/pagesService.php",
        method: "GET",
        dataType: "json",
        data: {
            "action": "changeStatus",
            "status": status,
            "pageid": pageid
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        console.log(res);
        if (res == "1") {
            $("#ok").text("Status Updated successfully...");
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

$("#paperSearch").click(function () {
    var userName = $("#paper-key").val();
    getPapersbyUserId(userName);
});

function getPapersbyUserId(id) {
    var ajaxConfig = {
        url: "api/pagesService.php",
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
            var status=i[4];
            var type = i[3];
            var path = i[2];


            var row = "<tr>" +
                "<td>" + paperId + "</td>"
                + "<td>" + pageid + "</td>"
                + "<td>" + status + "</td>"
                + "<td>" + type + "</td>"
                + "<td><a href='\\webapp/"+path+"' target='_self'>Show</a></td>";
            "</tr>";

            $("#papers-table").append(row);
            getElementBtClick();
        }

    })
}


