var showComment = document.getElementById("form");
var show_btn = document.getElementById("comment-btn");

show_btn.onclick = function(){
    if (showComment.style.display === "none") {
        showComment.style.display = "block";
    }else {
        showComment.style.display = "none";
    }
};