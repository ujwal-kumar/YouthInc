$(document).ready(function(){
        setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
});

function ProgramTotalExpenses(id1,id2,id3)
{
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;


    if ($(id1).text() !="" && $(id1).text().indexOf("$") != 0)
    {
        $(id1).text("$" + $(id1).text());
    }
    else
    {
        $(id1).text($(id1).text());
    }
    if ($(id2).text() !="" && $(id2).text().indexOf("$") != 0) {
        $(id2).text("$" + $(id2).text());
    }
    else {
        $(id2).text($(id2).text());
    }
    if ($(id3).text() != "" && $(id3).text().indexOf("$") != 0) {
        $(id3).text("$" + parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")));
    }
    else {
        $(id3).text(parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - parseInt(($(id2).text() == "") ? 0 : $(id2).text().replace("$", "")));
    }

    if ($(id3).text() != "" && $(id3).text().indexOf("$") != 0) {
        $(id3).text("$" + $(id3).text().replace("-", ""));
    }
    else {
        $(id3).text($(id3).text().replace("-", ""));
    }
    $(id3).css("color", "black");





}