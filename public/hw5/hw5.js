$(function () {
    $("#show1").hide();
    $("#show2").hide();
    $("#show3").hide();
    $("#show4").hide();
    $("#btn1").click(function () {
        $("#show1").slideToggle();
        $("#show2").hide();
        $("#show3").hide();
        $("#show4").hide();
    });
    $("#btn2").click(function () {
        $("#show2").slideToggle();
        $("#show1").hide();
        $("#show3").hide();
        $("#show4").hide();
    });
    $("#btn3").click(function () {
        $("#show3").slideToggle();
        $("#show1").hide();
        $("#show2").hide();
        $("#show4").hide();
    });
    $("#btn4").click(function () {
        $("#show4").slideToggle();
        $("#show1").hide();
        $("#show2").hide();
        $("#show3").hide();
    });
  
    
});

$(function () {
    $('input[type="number"]').each(function (index, all) {
        $(this).attr("value", $.cookie(all.id));
    });

    $("#allavg").click(function () {
        let sum = 0,
            count = 0;

        $('input[type="number"]').each(function (index, all) {
            if (all.value != "") {
                sum += parseInt(all.value);
                count++;
            }
        });
        if (count != 16) {
            $("#answer").html("成績輸入不完整");
        } else {
            $("#answer").html("總平均:" + sum / count);
        }
    });

    $("#eachavg").click(function () {
        let score1 = 0,
            c1 = 0,
            score2 = 0,
            c2 = 0,
            score3 = 0,
            c3 = 0,
            score4 = 0,
            c4 = 0;
        $('input[type="number"]').each(function (i, all) {
            if (i <= 3) {
                score1 += parseInt(all.value);
                if (all.value != "") {
                    c1++;
                }
            }
            if (i >= 4 && i <= 7) {
                score2 += parseInt(all.value);
                if (all.value != "") {
                    c2++;
                }
            }
            if (i >= 8 && i <= 11) {
                score3 += parseInt(all.value);
                if (all.value != "") {
                    c3++;
                }
            }
            if (i >= 12 && i <= 15) {
                score4 += parseInt(all.value);
                if (all.value != "") {
                    c4++;
                }
            }
        });
        var i = 1;

        if (c1 != 4) {
            score1 = "成績輸入不完整";
        } else {
            score1 /= 4;
        }
        if (c2 != 4) {
            score2 = "成績輸入不完整";
        } else {
            score2 /= 4;
        }
        if (c3 != 4) {
            score3 = "成績輸入不完整";
        } else {
            score3 /= 4;
        }
        if (c4 != 4) {
            score4 = "成績輸入不完整";
        } else {
            score4 /= 4;
        }

        $("#answer").html(
            "1081學期平均" +
                score1 +
                "<br>" +
                "1082學期平均" +
                score2 +
                "<br>" +
                "1091學期平均" +
                score3 +
                "<br>" +
                "1092學期平均" +
                score4 +
                "<br>"
        );
    });
    $("#high_low_score").click(function () {
        var score = [];
        $('input[type="number"]').each(function (i, all) {
            score[i] = parseInt(all.value);
        });
        score.sort();
        $("#answer").html("最高"+score[15]+"<br>"+"最低"+score[0]);
    });

    $("#store").click(function () {
        store();
        $("#answer").html("儲存成功");
    });
    function store() {
        $('input[type="number"]').each(function (index, all) {
            $.cookie(all.id, all.value);
        });
    }
});
