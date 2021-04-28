let articleContent = document.getElementById("articleContent");
let btnArticle = document.getElementById("addArticle");
let editToggle = false;
let textarea = document.createElement("textarea");
let content = articleContent.innerHTML;
let idArticle = document.getElementById("articleDiv").dataset.id;

try {
        btnArticle.addEventListener("click", function() {
            if (!editToggle) {
                let style = window.getComputedStyle(articleContent, null);
                let height = style.getPropertyValue("height");
                let width = style.getPropertyValue("width");

                textarea.style.height = height;
                textarea.style.width = width;
                textarea.value = content;

                articleContent.parentNode.replaceChild(textarea, articleContent);
                editToggle = true;
            } else {
                articleContent.innerHTML = textarea.value;
                content = textarea.value;
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "../../api/articles/post.php?id=" + idArticle);
                xhr.send(JSON.stringify({"content": content}));
                textarea.parentNode.replaceChild(articleContent, textarea);
                editToggle = false;
            }
        })

}
catch(e){}