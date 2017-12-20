$(document).ready(function () {
    var svecon=$(".svecon");
    var i;
    for(i=0;i<svecon.length;i++){
        svecon.eq(i).find(".ccoonnvv").html(svecon.eq(i).attr("data-conv").substr(0,40)+"...");
    }
});