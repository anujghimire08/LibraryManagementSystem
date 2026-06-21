const currentPage = window.location.pathname.split("/").pop();

document.querySelectorAll(".nav-items a").forEach(link => {
    if (link.getAttribute("href") === currentPage) {
        link.parentElement.classList.add("nav-background");
    }
});

// notification icon
let bell = document.getElementById("bell");
bell.addEventListener("mouseenter",()=>{
    bell.classList.toggle("fa-regular");
    bell.classList.toggle("fa-solid")
});
bell.addEventListener("mouseleave",()=>{
    bell.classList.toggle("fa-regular");
    bell.classList.toggle("fa-solid")
});