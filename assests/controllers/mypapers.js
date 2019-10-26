
$("#spin").css("display", "none");
$("#ok").css("display", "none");
$("#warn").css("display", "none");





$(".del").click(function () {
    var paperId = $(this).attr("id");

    var ajaxConfig = {
        url: "api/paperControl.php",
        method: "GET",
        data: {
            "paperId": paperId,
            "action": "delete"
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        if (res == 1) {
            alert("Paper successfully deleted.");
            location.reload(true);

        }
    })
});

$(".update").click(function () {

    var parent = $(this).parent().parent().parent().get(0).children;

    console.log(parent);
    var status=parent[1]["lastElementChild"]["innerHTML"];
    // console.log(status);
    var pageId=parent[1]["children"][3]["innerHTML"];
    // console.log(pageId);
    var paperId = $(this).attr("id");

    var ajaxConfig = {
        url: "api/paperControl.php",
        method: "GET",
        dataType:"json",
        data: {
            "paperId": paperId,
            "action": "getUpdate"
        }
    };

    $.ajax(ajaxConfig).done(function (res) {
        var paperId=res["paperId"];
        var paperTitle=res["paperTitle"];
        var paperDes=res["paperDes"];
        $("#paperId").val(paperId);
        $("#papertitle").val(paperTitle);
        $("#message-text").val(paperDes);
        $("#pageId").val(pageId);
        if (status==1)
        {
            $('#online').prop('checked', true)

        }
        else {
            $('#offline').prop('checked', true)

        }
    })


    var ajaxConfig2 = {
        url: "api/paperControl.php",
        method: "GET",
        dataType:"json",
        data: {
            "paperId": paperId,
            "action": "getTags"
        }
    };

    $.ajax(ajaxConfig2).done(function (res) {
        $("#papertags").val("");

        for (var x of res)
        {
            var val=$("#papertags").val();

            $('#papertags').val(val+x[2]+" /");

        }

    })

    // location.reload(true);

});

$("#updateDetails").click(function () {
    $("#spin").css("display", "block");
    var paperId=$("#paperId").val();
    var paperTitle=$("#papertitle").val();
    var paperDes=$("#message-text").val();
    var tags=$("#papertagsinput").val();
    var pageId=$("#pageId").val();
    var status=$('input[name=status]:checked').val();



    var ajaxConfig={
        url: "api/paperControl.php",
        method: "POST",
        data: {
            "paperId": paperId,
            "paperTitle":paperTitle,
            "paperDes":paperDes,
            "tags":tags,
            "pageId":pageId,
            "status":status,
            "action": "update"
        }
    }
    
    $.ajax(ajaxConfig).done(function (res) {
        console.log(typeof(res));
        console.log(res);
        if (res=="1")
        {
            console.log("updsted");
            $("#spin").css("display", "none");
            $("#ok").css("display", "block");
            $("#ok").fadeOut(5000);


        }
        else

        {
            $("#spin").css("display", "none");
            $("#warn").css("display", "block");
        }
    })
});
$("#nop").click(function () {
    location.reload(true);
});



