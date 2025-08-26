//Data Pelamar Super Admin
let selectKategori = document.getElementById("kategori_select");
let btnAdd = document.getElementById("btnAdd");

let kandidat_table = document.getElementById("kandidat");
let non_kandidat_table = document.getElementById("non_kandidat");
let calon_kandidat_table = document.getElementById("calon_kandidat");

if (selectKategori) {
    selectKategori.addEventListener("change", () => {
        let val = selectKategori.value;

        btnAdd.href = "/dashboard/superadmin/pelamar/add/" + val;

        if (val === "kandidat") {
            kandidat_table.classList.remove("hidden");
            non_kandidat_table.classList.add("hidden");
            calon_kandidat_table.classList.add("hidden");
        } else if (val === "non_kandidat") {
            kandidat_table.classList.add("hidden");
            non_kandidat_table.classList.remove("hidden");
            calon_kandidat_table.classList.add("hidden");
        } else if (val === "calon_kandidat") {
            kandidat_table.classList.add("hidden");
            non_kandidat_table.classList.add("hidden");
            calon_kandidat_table.classList.remove("hidden");
        }
    });
}
// End Data Pelamar Super Admin

// Data Perusahaan Super Admin
let selectKategoriPerusahaan = document.getElementById(
    "kategori_select_perusahaan"
);
let btnAddPerusahaan = document.getElementById("btnAddPerusahaan");

let perusahaan_table = document.getElementById("perusahaan_table");
let recruitment_table = document.getElementById("recruitment_table");
let talent_hunter_table = document.getElementById("talent_hunter_table");

if (selectKategoriPerusahaan) {
    selectKategoriPerusahaan.addEventListener("change", () => {
        let values = selectKategoriPerusahaan.value;

        btnAddPerusahaan.href =
            "/dashboard/superadmin/perusahaan/add/" + values;

        if (values === "perusahaan") {
            perusahaan_table.classList.remove("hidden");
            recruitment_table.classList.add("hidden");
            talent_hunter_table.classList.add("hidden");
        } else if (values === "recruitment") {
            perusahaan_table.classList.add("hidden");
            recruitment_table.classList.remove("hidden");
            talent_hunter_table.classList.add("hidden");
        } else if (values === "talent_hunter") {
            perusahaan_table.classList.add("hidden");
            recruitment_table.classList.add("hidden");
            talent_hunter_table.classList.remove("hidden");
        }
    });
}

// Add Calon Kandidat (Upload Foto)
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
        const output = document.getElementById("preview");
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
