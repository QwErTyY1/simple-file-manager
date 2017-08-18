$(document).ready(function () {

    var get_content = $(".get_content");
    var rout = "";
    var level = 0;
    var path = "";
    var modalFile = $("#seeFileModal");

    var base_url = window.location.origin;


 get_content.on("click", ".goBtn", function (e) {
     e.preventDefault();

     rout = $(this).attr("data-rout");

    path += rout+"/";

     get_content.find(".wdaBack").remove();
     $.post("home/getAjaxResponse",{rout:path},function (data) {
         level++;
         var dataS = $(data).find('.table-container');
         get_content.html(dataS)
             .prepend("<button class='wdaBack' >"+path+"</button>");
     });


 });

    get_content.on("dblclick",".seeFiles", function (e) {

        var contMod   = modalFile.find(".contentModal");
        contMod.text("");
        var full_path = path+$(this).text();
        var data_type = $(this).attr("data-type");

        if (data_type !== undefined){
            contMod.append("<img src='"+base_url+'/UserContent/'+full_path+"' style='width:auto'>");
        } else {
            $.post("home/readFile",{path_file:full_path}, function (data) {

                if (data.status === "string"){
                    contMod.append(data.string);
                }
            },"json");
        }
        modalFile.arcticmodal();
    });

    get_content.on("click", ".wdaBack", function (e) {

        e.preventDefault();

        var blockCount = path.split("/").length-1;

        strDel = path.split("/",blockCount);

        strDel.splice(strDel.indexOf(strDel[blockCount-1]));

        if (blockCount ==1 || blockCount == ""){
                strDel[0] = "";
        } else {
            strDel[0] +="/";
        }
        path = "";
        for(var str = 0; str<strDel.length; str++){
            path += strDel[str];
            if (path[path.length-1] !== "/"){
                path += "/";
            }
        }
        var last_char = path[path.length-1];

        if (last_char === undefined){
            path = "";
        }

        get_content.find(".wdaBack").remove();

        $.post("home/getAjaxResponse",{rout:path},function (data) {
            level--;
            var dataS = $(data).find('.table-container');
            get_content.html(dataS)
                .prepend("<button class='wdaBack'>"+path+"</button>");

        });

 });



});
