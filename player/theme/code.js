$(document).ready(function(){
    $("#player .buttonMenu").on("click", function(){
        if($("#player .menuPlayer").hasClass("minimized")){
            $("#player .menuPlayer").animate({"margin-right":"67px"}, 250, function(){
                $("#player .menuPlayer").removeClass("minimized");
            });
        }else {
            $("#player .menuPlayer li.selected").animate({"margin-right":"-95px"}, 250);
            $("#player .menuPlayer").addClass("minimized").animate({"margin-right":"-412px"}, 250, function(){
                $("#player .menuPlayer").addClass("minimized");
                $("#player .menuPlayer .selected").css("margin-right", "-4px");
            });
        }
    });

    $("#player .menuPlayer li").on("click", function(){
        $("#player .menuPlayer li").removeClass("selected");
        $(this).addClass("selected");
        var namePlayer = $(this).attr("data-player");
        var curLang =  $(this).attr("data-lang");
        var curId =  $(this).attr("data-playerid");
        $("#player .butPlayFilm .textPlay div").text("Assistir no "+namePlayer);
        $("#player .butPlayFilm").attr("data-lang", curLang).attr("svid", curId);
        $("#player .msgSelPlayer").hide();
        $("#player .butPlayFilm").css("display", "table");
    });

    $("#player .langSelect").on("click", function(){
        $("#player .menuPlayer li").removeClass("selected");
        if($(this).hasClass("dub")){
            $("#player .optionsDub").hide();
            $("#player .optionsLeg").show();
        }
        else{
            $("#player .optionsLeg").hide();
            $("#player .optionsDub").show();
        }
        $(this).toggleClass("dub");
        $("#player .butPlayFilm").hide();
        $("#player .msgSelPlayer").show();
    });
});
