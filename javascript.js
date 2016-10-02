var reader = new FileReader ();
var txt0 = "Позитив";
var txt1 = "Негатив";
function upload() {
    reader.readAsDataURL(document.querySelector("#inp").files[0]);
}
reader.onload = function () {
    var cv = document.getElementById("cnv");
    var ctx = cv.getContext("2d");
    var im = new Image();
    im.src = reader.result;
        if(im.width>800){
            cv.width = 800;
            cv.height = im.height*(800/im.width);
        }
        ctx.drawImage(im, 0, 0, cv.width, cv.height);
    document.getElementById("button").value = txt1;
}
function negative(){
    var v = document.getElementById("button");
    var cv = document.getElementById("cnv");
    var ctx = cv.getContext("2d");
    var neg;
    neg = ctx.getImageData(0, 0, cv.width, cv.height);
    var pix = neg.data;
    for (var i = 0; i<pix.length; i+=2) {
        pix[i] = 255 - pix[i];
        pix[++i] = 255 - pix[i];
        pix[++i] = 255 - pix[i];
    }
    ctx.putImageData(neg, 0, 0);
    if (v.value==txt1)
        v.value = txt0;
    else 
        v.value = txt1;
}
function link1() {
    var aud = document.getElementById("aud");
    aud.src = "Mrr.mp3";
    aud.play();
}
function link2() {
    var aud = document.getElementById("aud");
    aud.src = "Dikobraz.mp3";
    aud.play();
}