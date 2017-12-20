$("#savepricebtn").click(function () {
    var scn = $("#scn").val();
    var man = $("#manuf").val();
    var model = $("#model").val();
    var price = $("#totalprice").attr("data-price");
    var curr = $("#dropdownMenuButton4").attr("data-idcurr");
    if (scn && man && model) {
        $("#savepricebtn").addClass("disabled");
        $.ajax({
            url: "/php/ajax.php?a=saveprice&scn=" + scn + "&man=" + man + "&model=" + model + "&price=" + price+ "&curr=" + curr,
            success: function (data) {
                alert("Price added");
                $("#savepricebtn").removeClass("disabled");
                location.reload();
            },
            error: function (data, err) {
                console.log(data + err);
            }
        });
    }
});

$("#saveQuoteBtn").click(function () {
    var data = "";
    var koji = $("#quoteDropdownButton").attr("data-koji");
    koji = parseInt(koji);
    data = data + "&quotetype=" + koji;
    koji -= 1;
    data = data + "&customer=" + $(".customer").attr("data-custid");
    data = data + "&priceid=" + pid;
    data = data + "&quteno=" + $(".quoteNum").val();
    data = data + "&datereq=" + $(".dateReq").val();
    data = data + "&validto=" + $(".dateValid").val();
    data = data + "&loginperson=" + $(".loginPerson").attr("data-loginpersonid");
    data = data + "&manufacturer=" + $(".manuf").eq(koji).children().eq(0).html();
    data = data + "&model=" + $(".model").eq(koji).children().eq(0).html();
    data = data + "&serviceplan=" + $(".splan").eq(koji).children().eq(0).html();
    data = data + "&totalprice=" + $(".tprice").eq(koji).children().eq(0).html();
    data = data + "&serialnumber=" + $(".snum").eq(koji).val();
    data = data + "&contractstart=" + $(".conS").eq(koji).val();
    data = data + "&contractend=" + $(".conE").eq(koji).val();
    data = data + "&discount=" + $(".disc").eq(koji).val();
    data = data + "&partnumber=" + $(".partNo").eq(koji).val();
    data = data + "&partdescription=" + $(".partDesc").eq(koji).val();
    data = data + "&quantity=" + $(".quant").eq(koji).val();

    //alert(data);
    //data = encodeURIComponent(data);

    $.ajax({
        url: "/php/ajax.php?a=savequote" + data,
        type: "POST",
        success: function (e) {
            alert(e);
            location.reload();
        }
    })
});

$("#customerSearchBtn").click(function () {
    var koji=$("#customerDropdownButton").attr("data-sel");
    var sta=$("#customerSearchBox").val();
    var data="/php/ajax.php?a=seaarch&koji="+koji+"&sta="+sta;
    $.ajax({
        url:data,
        type:"POST",
        success:function (e) {
            $(".results").html(e);
        }
    });
});

$("#saveprsn").click(function () {
    var pos=$(".contpeer");
    var i,s='';
    for(i=0;i<pos.length;i++)
        s=s+'&d'+i+"="+pos.eq(i).val();
    var cid=$(".namecompanije").attr("data-idcompaa");
    if($(".namecompanije").attr("data-updatee")=="true"){
        s+="&update="+$(".tab-pane.active").attr("data-cpidd");
    }
    $.ajax({
        url:"/php/ajax?a=inscontper&cid="+cid+s,
        success:function (e) {
            alert(e);
            location.reload();
        }
    });
});

$("#saveadresss").click(function () {
    var pos=$(".adrnju");
    var i,s='';
    for(i=0;i<pos.length;i++)
        s=s+'&d'+i+"="+pos.eq(i).val();
    var cid=$(".namecompanije").attr("data-idcompaa");
    if($(".namecompanije").attr("data-updateead")=="true"){
        s+="&update="+$(".adrd.tab-pane.active").attr("data-adid");
    }
    $.ajax({
        url:"/php/ajax?a=adrrnjuu&cid="+cid+s,
        success:function (e) {
            alert(e);
            location.reload();
        }
    });
});

$("#cuscalsav").click(function () {
    var pos = $(".calclass");
    var sta = $("#alertDropdownButton").attr("data-kojical");
    var sta2 = $("#callputt").attr("data-quid");
    var cid = $(".namecompanije").attr("data-idcompaa");
    var i, s = '';
    for (i = 0; i < pos.length; i++){
        var tmp;
        if(i==1)
            tmp=$("#toglasti").is(':checked');
        else tmp=pos.eq(i).val();
        s=s+'&d'+i+"="+tmp;
    }
    $.ajax({
        url:"/php/ajax?a=calll&cid="+cid+"&koojkal="+sta+"&quuiid="+sta2+s,
        success:function (e) {
            alert(e);
            location.reload();
        }
    });
});

$("#saveAll").click(function () {
    var pos=$(".ofiii");
    var name=$("#nameba").val();
    var i,s='';
    for(i=0;i<pos.length;i++)
        s=s+'&d'+i+"="+pos.eq(i).val();
    //var cid=$(".namecompanije").attr("data-idcompaa");
    var pos2=$(".newclaasad");
    //var i,s='';
    var j;
    for(j=i;j<pos2.length+i;j++)
        s=s+'&d'+j+"="+pos2.eq(j-i).val();
    //var cid=$(".namecompanije").attr("data-idcompaa");
    $.ajax({
        url:"/php/ajax?a=svenju&nae="+name+s,
        success:function (e) {
            //alert(e);
            //location.reload();
            var man=$(".manuffu");
            var mod=$(".modulufu");
            var ser=$(".serialfu");
            var v="";
            for(i=0;i<man.length;i++){
                v+="&dd"+i+"="+man.eq(i).val()+"&ddd"+i+"="+mod.eq(i).val()+"&dddd"+i+"="+ser.eq(i).val();
            }
            $.ajax({
                url:"/php/ajax?a=sveinstr"+v,
                success:function (ee){
                    alert(ee);
                    location.reload();
                }
            });
        }
    });
});

$("#adduserr").click(function () {
    var pos=$(".usinpt");
    var i,s='';
    for(i=0;i<pos.length;i++)
        s=s+'&d'+i+"="+pos.eq(i).val();
    $.ajax({
        url:"/php/ajax?a=adduseer"+s,
        success:function (e) {
            alert(e);
            location.reload();
        }
    });
});

$(".zadel").click(function () {
    var s=$(this).attr("data-zadelid");
    $.ajax({
        url:"/php/ajax?a=delone&zadeel="+s,
        success:function (e) {
            alert(e);
            location.reload();
        }
    });
});

$("#addsrvcr").click(function () {
    var pos=$(".usinpt2");
    var i,s='';
    for(i=0;i<pos.length;i++)
        s=s+'&d'+i+"="+pos.eq(i).val();
    $.ajax({
        url:"/php/ajax?a=addsrvc"+s,
        success:function (e) {
            alert(e);
            location.reload();
        }
    });
});

$(".zadel2").click(function () {
    var s=$(this).attr("data-zadelid");
    $.ajax({
        url:"/php/ajax?a=delonesrvc&zadeel="+s,
        success:function (e) {
            alert(e);
            location.reload();
        }
    });
});

$(".zadelcu2").click(function () {
    var s=$(this).attr("data-zadelidi");
    $.ajax({
        url:"/php/ajax?a=deloncusti&zadeel="+s,
        success:function (e) {
            alert(e);
            location.reload();
        }
    });
});

$("#saveinst").click(function () {
    var pos=$(".adrnjuinst");
    var i,s='';
    for(i=0;i<pos.length;i++)
        s=s+'&d'+i+"="+pos.eq(i).val();
    var cid=$(".namecompanije").attr("data-idcompaa");
    if($(".namecompanije").attr("data-updateeadins")=="true"){
        s+="&update="+$(".inins.tab-pane.active").attr("data-inst");
    }
    $.ajax({
        url:"/php/ajax?a=instnju&cid="+cid+s,
        success:function (e) {
            alert(e);
            location.reload();
        }
    });
});