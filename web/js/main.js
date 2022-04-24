window.onload = () => {
    
    const icon = document.querySelector(".icon");
    const search = document.querySelector(".search");
    const clearSearch = document.getElementById("clearSearch");
    const inputSearch = document.getElementById("inputSearch");

    clearSearch.visibility = "hidden";

    icon.onclick = () => {
        search.classList.toggle("active");
    }

    clearSearch.onclick = () => {
        inputSearch.value = "";
    }

}