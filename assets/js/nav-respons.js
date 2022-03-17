let checkbox = document.getElementById("active")
let nav_bar_items =  document.querySelectorAll(".exit")


nav_bar_items.forEach((elem) => {
    elem.addEventListener("click", (ev) => {
        if (checkbox.checked === true){
            checkbox.checked = false
        }
    })
})