$(document).ready(function() {
    t = document.title,
    d = "！！！发红包啦~ | " + t;
    $(window).blur(function() {
        document.title = d
    }).focus(function() {
        document.title = t
    });

$("html,body").click(function(e) {
    var jzg = new Array("富强","民主","文明","和谐","自由","平等","公正","法治","爱国","敬业","诚信","友善");
    var n = Math.floor(Math.random() * jzg.length);
    var $i = $("<b/>").text(gcd[n]);
    var x = e.pageX
      , y = e.pageY;
    $i.css({
        "z-index": 99999,
        "top": y - 20,
        "left": x,
        "position": "absolute",
        "color": "red"
    });
    $("body").append($i);
    $i.animate({
        "top": y - 180,
        "opacity": 0
    }, 1500, function() {
        $i.remove()
    });
    e.stopPropagation()
});
});