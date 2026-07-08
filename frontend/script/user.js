const currentPage = window.location.pathname.split("/").pop();

document.querySelectorAll(".nav-items a").forEach((link) => {
  if (link.getAttribute("href") === currentPage) {
    link.parentElement.classList.add("nav-background");
  }
});

function goToPage() {
  console.log("count");
  window.location.href = "../../Auth/logout.php";
}

document.addEventListener("DOMContentLoaded", function () {
  let calendarEl = document.getElementById("calendar");

  let calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
    },
    events: "../../includes/event.php",
  });

  calendar.render();
});
