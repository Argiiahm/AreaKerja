//Kandidat
const btn_kandidat = document.getElementById("btn_kandidat");
const btn_non_kandidat = document.getElementById("btn_non_kandidat");
const btn_calon_kandidat = document.getElementById("btn_calon_kandidat");

const table_kandidat = document.getElementById("table_kandidat");
const table_non_kandidat = document.getElementById("table_non_kandidat");
const table_calon_kandidat = document.getElementById("table_calon_kandidat");

if (btn_kandidat && table_kandidat) {
    btn_kandidat.addEventListener("click", () => {
        table_kandidat.classList.remove("hidden");
        btn_kandidat.classList.add("bg-gray-700", "text-white");

        table_non_kandidat.classList.add("hidden");
        btn_non_kandidat.classList.remove("bg-gray-700", "text-white");

        table_calon_kandidat.classList.add("hidden");
        btn_calon_kandidat.classList.remove("bg-gray-700", "text-white");
    });
}

if (btn_non_kandidat && table_non_kandidat) {
    btn_non_kandidat.addEventListener("click", () => {
        table_kandidat.classList.add("hidden");
        btn_kandidat.classList.remove("bg-gray-700", "text-white");

        table_non_kandidat.classList.remove("hidden");
        btn_non_kandidat.classList.add("bg-gray-700", "text-white");

        table_calon_kandidat.classList.add("hidden");
        btn_calon_kandidat.classList.remove("bg-gray-700", "text-white");
    });
}

if (btn_calon_kandidat && table_calon_kandidat) {
    btn_calon_kandidat.addEventListener("click", () => {
        table_kandidat.classList.add("hidden");
        btn_kandidat.classList.remove("bg-gray-700", "text-white");

        table_non_kandidat.classList.add("hidden");
        btn_non_kandidat.classList.remove("bg-gray-700", "text-white");

        table_calon_kandidat.classList.remove("hidden");
        btn_calon_kandidat.classList.add("bg-gray-700", "text-white");
    });
}


//Perushaan
const btn_perusahaan = document.getElementById("btn_perusahaan");
const btn_recruitment = document.getElementById("btn_recruitment");
const btn_talent_hunter = document.getElementById("btn_talent_hunter");

const table_perusahaan = document.getElementById("table_perusahaan");
const table_recruitment = document.getElementById("table_recruitment");
const table_talent_hunter = document.getElementById("table_talent_hunter");

if (btn_perusahaan && table_perusahaan) {
    btn_perusahaan.addEventListener("click", () => {
        table_perusahaan.classList.remove("hidden");
        btn_perusahaan.classList.add("bg-gray-700", "text-white");
        
        table_recruitment.classList.add("hidden");
        btn_recruitment.classList.remove("bg-gray-700", "text-white");

        table_talent_hunter.classList.add("hidden");
        btn_talent_hunter.classList.remove("bg-gray-700", "text-white");
    });
}

if (btn_recruitment && table_recruitment) {
    btn_recruitment.addEventListener("click", () => {
        table_perusahaan.classList.add("hidden");
        btn_perusahaan.classList.remove("bg-gray-700", "text-white");

        table_recruitment.classList.remove("hidden");
        btn_recruitment.classList.add("bg-gray-700", "text-white");

        table_talent_hunter.classList.add("hidden");
        btn_talent_hunter.classList.remove("bg-gray-700", "text-white");
    });
}

if (btn_talent_hunter && table_talent_hunter) {
    btn_talent_hunter.addEventListener("click", () => {
        table_perusahaan.classList.add("hidden");
        btn_perusahaan.classList.remove("bg-gray-700", "text-white");

        table_recruitment.classList.add("hidden");
        btn_recruitment.classList.remove("bg-gray-700", "text-white");

        table_talent_hunter.classList.remove("hidden");
        btn_talent_hunter.classList.add("bg-gray-700", "text-white");
    });
}
