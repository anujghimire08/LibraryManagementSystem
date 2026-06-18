let nav_btns = document.querySelectorAll(".nav-items");

console.log(nav_btns);

nav_btns.forEach((e,index)=>{
    e.addEventListener("click",()=>navbg(index))
});

function navbg(id){
    nav_btns.forEach((e,index)=>{
        if(id == index){
            e.classList.add('nav-background');
        }
        else{
            e.classList.remove('nav-background');
        }
    });
}

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