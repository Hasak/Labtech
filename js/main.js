$(document).ready(function () {
    $("title").append(' &ndash; Labtech Support');
});



var pr = $(".prices");

function update() {
    var i, price;
    price = parseFloat($(".addNewService").attr("data-price"));
    for (i = 0; i < pr.length; i++){
        if (pr[i].checked){
            var tt=pr.eq(i).attr("data-priceid");
            price += parseFloat($("[data-pride="+tt+"]").val());
        }
    }
    $("#totalprice").html(price.toFixed(2)).attr("data-price", price);
}

pr.change(function () {
    update();
});

$(".maononumb").on("keydown, keyup, change, click",function () {
    update();
});

$(".serviceTypeSelect").on("click", function () {
    var prr = $(this).attr("data-price");
    $("#onajbutton").attr("data-price", prr);
    //$("#totalprice").html(formatter.format(prr));
    update();
});
var pid;
$(".pricered").click(function () {
    pid = $(this).attr("data-id");
    var scn = $(this).attr("data-scn");
    var man = $(this).attr("data-man");
    var mod = $(this).attr("data-mod");
    var price = $(this).attr("data-price");
    var curen = $(this).attr("data-curenc");

    //$("#quoteDropdownButton").attr("data-pid",pid);
    var toman = $(".manuf");
    var toscn = $(".splan")
    var toprice = $(".price");
    var totprice = $(".tprice");
    var tomod = $(".model");

    var i;
    for (i = 0; i < 4; i++) {
        toman.eq(i).children().eq(0).html(man);
        tomod.eq(i).children().eq(0).html(mod);
        toscn.eq(i).children().eq(0).html(scn);
        toprice.eq(i).children().eq(0).html(parseFloat(price).toFixed(2)+" "+curen).attr("data-prv", price);
        totprice.eq(i).children().eq(0).html("<span class='totaa'>"+parseFloat(price).toFixed(2)+"</span> "+curen);
    }
    $('#pricemodal').modal('hide');
});

$(document).on("blur change keydown keyup keypressed",".disc", function () {
    var all = $(".disc");
    var ova=$(this).val();
    if(ova==='-')
        ova="";
    all.val(ova);
    var p = $(".price").eq(0).children().attr("data-prv");
    var tp = $(".totaa");
    var i;
    var t;
    if (ova === "")
        t = 0;
    else t = ova;
    for (i = 0; i < 4; i++) {
        var g=p * (1 - parseFloat(t) / 100);
        if(g<0)
            g=0;
        tp.eq(i).html(g.toFixed(2));
    }
});

$("#addperson").click(function () {
    var pos=$(".contpeer");
    var i;
    $(".namecompanije").attr("data-updatee","false");
    for(i=0;i<pos.length;i++)
        pos.eq(i).val("");
    $(".contactEdit").slideDown();
});

$("#addaddressbtn").click(function () {
    var pos=$(".adrnju");
    var i;
    $(".namecompanije").attr("data-updateead","false");
    for(i=0;i<pos.length;i++)
        pos.eq(i).val("");
    $(".newadd").slideDown(function () {
        $(".newaddd").show();
    });
});

$("#remperson").click(function () {
    $(".contactEdit").slideUp();
});

$("#remaddressbtn").click(function () {
    $(".newaddd").hide();
    $(".newadd").slideUp();
});

$(".searchdd").click(function () {
    var val=$(this).attr("data-val");
    $("#customerDropdownButton").attr("data-sel",val).html($(this).html());
});

$(document).on("click","#logouter",function(){
    window.location.href='login?lout=true';
});

$(".svecon").click(function () {
    var t=$(this);
    var card=$(".selectedConwPreviewCard");
    card.slideUp(function () {
        card.find(".daatee").html(t.attr("data-datte"));
        card.find(".card-title").html(t.attr("data-whatof"));
        card.find(".card-text").html(t.attr("data-conv"));
    });
    card.slideDown();
});

$("#toglasti").on("change",function () {
    if(this.checked){
        $("#datatogg").prop("disabled",false);
    }
    else $("#datatogg").prop("disabled",true);
});

$(".quotered").click(function () {
    $("#callputt").attr("data-quid",$(this).attr("data-quoid")).html("Selected Quote Number: <span class='bld'>"+$(this).attr("data-qunum")+"</span>");
    $('#callmodal').modal('hide');
});

$("#updaterr").click(function () {
    var i;
    var iz=$(".active .uupdat");
    var u=$(".contpeer");
    //var cpid=$(".cpid").attr("data-cpid");
    $("#addperson").click();
    $(".namecompanije").attr("data-updatee","true");
    for(i=0;i<u.length;i++)
        u.eq(i).val(iz.eq(i).html());
});

$("#addrchanger").click(function () {
    var i;
    var iz=$(".adrd.active .izadr");
    var u=$(".adrnju");
    $("#addaddressbtn").click();
    $(".namecompanije").attr("data-updateead","true");
    for(i=0;i<u.length;i++)
        u.eq(i).val(iz.eq(i).html());
});


$(".curclik").click(function () {
    $("#dropdownMenuButton4").attr("data-idcurr",$(this).attr("data-idcur")).html($(this).html());
});

$("#adderinsta").click(function () {
    var sta=$(".kojiporedu").last();
    var koji=sta.attr("data-kojione");
    sta=sta.html();
    koji++;
    $(".instporedu").append("<div class=\"kojiporedu\" data-kojione=\""+koji+"\">"+sta+"</div>");
    $(".instsss").html("Instruments information");
});

$("#addinstbtn").click(function () {
    var pos=$(".adrnjuinst");
    var i;
    $(".namecompanije").attr("data-updateeadins","false");
    for(i=0;i<pos.length;i++)
        pos.eq(i).val("");
    $(".newins").slideDown(function () {
        $(".newinss").show();
    });
});

$("#reminstbtn").click(function () {
    $(".newinss").hide();
    $(".newins").slideUp();
});

$("#instrchanger").click(function () {
    var i;
    var iz=$(".inins.active .izinst");
    var u=$(".adrnjuinst");
    $("#addinstbtn").click();
    $(".namecompanije").attr("data-updateeadins","true");
    for(i=0;i<u.length;i++)
        u.eq(i).val(iz.eq(i).html());
});