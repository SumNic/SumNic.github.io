var hP = window.innerHeight -120;
    var wP = window.innerWidth - 20;
    
    var hP_S = hP / wP;

    console.log(hP, wP);
    
    if (hP_S > 1, wP < 500) {
        var win = "width:" + wP + "px";
        document.getElementById('logo').setAttribute("style", win);
        console.log(wP, win);

    } else if (hP_S < 1, hP < 500) {
        var win = "height:" + (hP) + "px";
        document.getElementById('logo').setAttribute("style", win);
        console.log(hP, win);
    }