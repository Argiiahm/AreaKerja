
const btn_kandidat = document.getElementById("btn_kandidat");
const btn_non_kandidat = document.getElementById("btn_non_kandidat");
const btn_calon_kandidat = document.getElementById("btn_calon_kandidat");

const table_kandidat = document.getElementById("table_kandidat");
const table_non_kandidat = document.getElementById("table_non_kandidat");
const table_calon_kandidat = document.getElementById("table_calon_kandidat");

btn_kandidat.addEventListener("click", () => {
    table_kandidat.classList.remove("hidden");
    btn_kandidat.classList.add("bg-gray-700");
    btn_kandidat.classList.add("text-white");
    
    table_non_kandidat.classList.add("hidden");
    btn_non_kandidat.classList.remove("bg-gray-700");
    btn_non_kandidat.classList.remove("text-white");

    table_calon_kandidat.classList.add("hidden");
    btn_calon_kandidat.classList.remove("bg-gray-700");
    btn_calon_kandidat.classList.remove("text-white");
});

btn_non_kandidat.addEventListener("click", () => {
    table_kandidat.classList.add("hidden");
    btn_kandidat.classList.remove("bg-gray-700");
    btn_kandidat.classList.remove("text-white");

    table_non_kandidat.classList.remove("hidden");
    btn_non_kandidat.classList.add("bg-gray-700");
    btn_non_kandidat.classList.add("text-white");
    
    table_calon_kandidat.classList.add("hidden");
    btn_calon_kandidat.classList.remove("bg-gray-700");
    btn_calon_kandidat.classList.remove("text-white");
});

btn_calon_kandidat.addEventListener("click", () => {
    table_kandidat.classList.add("hidden");
    btn_kandidat.classList.remove("bg-gray-700");
    btn_kandidat.classList.remove("text-white");

    table_non_kandidat.classList.add("hidden");
    btn_non_kandidat.classList.remove("bg-gray-700");
    btn_non_kandidat.classList.remove("text-white");

    table_calon_kandidat.classList.remove("hidden");
    btn_calon_kandidat.classList.add("bg-gray-700");
    btn_calon_kandidat.classList.add("text-white");
});
