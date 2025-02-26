document.querySelectorAll("img").forEach(function(e){
    e.addEventListener("click", function(){
        e.classList.toggle("zoom");
    })
})