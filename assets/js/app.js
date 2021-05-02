//animation btn share
$(".btnShare").click(function(){
    $(".social.twitter").toggleClass("clicked");
    $(".social.facebook").toggleClass("clicked");
    $(".social.google").toggleClass("clicked");
    $(".social.youtube").toggleClass("clicked");
});

/** return the comments list
 */
 function getComment() {
     let xhr = new XMLHttpRequest();
     xhr.withCredentials = true;
     xhr.open('POST',`${this}/connect.php`);
     let form = new FromData();
     form.append('session', this.session);
     xhr.send(form);

     xhr.onreadystatechange = () =>{
         if(xhr.readyState === 4) {
             if(xhr.status === 401) {
                 document.getElementById('login').click();
             }
             else {
                 this.addCommentsItem(JSON.parse(xhr.responseText));
             }
         }
     }

}

/*
* Login users
 */

function login() {
    let email = document.getElementById('pseudo');
    let password = document.getElementById('password');
    let xhr = new XMLHttpRequest();
    let form = new FormData();

    //password will be sent in https context out of local use
    if(password.value.length > 0 && email.value.length > 0) {
        form.append('email', email.value);
        form.append('password', password.value);
        xhr.open('POST', `${this}/login.php`);
        xhr.send(form);
    }

    xhr.onreadystatechange = () => {
        if(xhr.readyState === 4 && xhr.status === 200) {
            //storing session
            this.session = JSON.parse(xhr.responseText).session;
            //start comments get timer
            window.setInterval(()=>getComment(),3000)
        }
    }

}