/*const btn = querySelector('#btnInfo');
btn.addEventListener("click", function (e) {
    const div = document.createElement('div');
    let forms = document.createElement('form');
    //display form (name,firstname,pseudo/email,password, + content article(title,content)
    btn.appendChild(div);
    div.appendChild(forms);
})*/
$(".btnShare").click(function(){
    $(".social.twitter").toggleClass("clicked");
    $(".social.facebook").toggleClass("clicked");
    $(".social.google").toggleClass("clicked");
    $(".social.youtube").toggleClass("clicked");
})