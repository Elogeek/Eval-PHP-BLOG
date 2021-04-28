let btnSubmit = document.getElementById("btnComment");
let input = document.getElementById("commentComment");
let id = document.getElementById("articleDiv").dataset.id;
let divComment = document.getElementById("divComment");
let scroll = false;

btnSubmit.addEventListener("click", function(e){
    if(input.value.length > 0){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../../api/comment/post.php");
        xhr.onload = () => {
            scroll = false;
            input.value = "";
        }
        xhr.send(JSON.stringify({
            "articleId" : id,
            "content" : input.value,
        }));
    }
})

function load(){
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../../api/comment/get.php?id=" + id);
    xhr.send();
    xhr.onload = () => {
        divComment.innerHTML = "";
        let result = JSON.parse(xhr.responseText);
        for (let comment of result) {
            let html = `
                <div data-id="${comment["id"]}" class="comment">
                    <div class="commentAuthor">
                        ${comment["author"]} :
                    </div>
                    <div class="commentContent">
                           ${comment["content"]}
                    </div>
            `
            if (comment["admin"] === 1) {
                html += `<span class='close'><i class="fas fa-times"></i></span>`;
            }

            divComment.innerHTML += html + `</div>`;
        }
        let closes = document.getElementsByClassName("close");
        for (let close of closes) {
            close.addEventListener("click", function () {
                let id = close.parentNode.dataset.id;
                let xhr2 = new XMLHttpRequest();
                xhr2.open("POST", "../../api/comment/post.php?delete=true")
                xhr2.send(JSON.stringify({"id":id}));
            })
        }
    }
}

function timeOut(){
    setTimeout(() => {
        load();
        if(!scroll){
            document.body.scrollTop = document.body.scrollHeight;
            scroll = true;
        }

        timeOut();
    }, 1000);
}

load();
timeOut();

