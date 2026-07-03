const currentPage = window.location.pathname.split("/").pop();

document.querySelectorAll(".nav-items a").forEach(link => {
    if (link.getAttribute("href") === currentPage) {
        link.parentElement.classList.add("nav-background");
    }
});


function goToPage() {
    window.location.href = "../../Auth/logout.php";
}