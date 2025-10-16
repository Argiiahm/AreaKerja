// title header
let title = document.getElementById("title");

//Data Pelamar Super Admin
let selectKategori = document.getElementById("kategori_select");
let btnAdd = document.getElementById("btnAdd");

let kandidat_table = document.getElementById("kandidat");
let non_kandidat_table = document.getElementById("non_kandidat");
let calon_pelamar_table = document.getElementById("calon_kandidat");

if (selectKategori) {
    selectKategori.addEventListener("change", () => {
        let val = selectKategori.value;

        btnAdd.href = "/dashboard/superadmin/pelamar/add/" + val;

        if (val === "kandidat") {   
            kandidat_table.classList.remove("hidden");
            non_kandidat_table.classList.add("hidden");
            calon_pelamar_table.classList.add("hidden");

            title.innerHTML = "Data Kandidat";
        } else if (val === "non_kandidat") {
            kandidat_table.classList.add("hidden");
            non_kandidat_table.classList.remove("hidden");
            calon_pelamar_table.classList.add("hidden");

            title.innerHTML = "Data Non Kandidat";
        } else if (val === "calon_kandidat") {
            kandidat_table.classList.add("hidden");
            non_kandidat_table.classList.add("hidden");
            calon_pelamar_table.classList.remove("hidden");

            title.innerHTML = "Data Calon Pelamar";
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
let table_panggilan = document.getElementById("table_panggilan");

if (selectKategoriPerusahaan) {
    selectKategoriPerusahaan.addEventListener("change", () => {
        let values = selectKategoriPerusahaan.value;

        btnAddPerusahaan.href =
            "/dashboard/superadmin/perusahaan/add/" + values;

        if (values === "perusahaan") {
            perusahaan_table.classList.remove("hidden");
            recruitment_table.classList.add("hidden");
            talent_hunter_table.classList.add("hidden");
            table_panggilan.classList.add("hidden");

            title.innerHTML = "Data Perusahaan";
        } else if (values === "recruitment") {
            perusahaan_table.classList.add("hidden");
            recruitment_table.classList.remove("hidden");
            talent_hunter_table.classList.add("hidden");

            title.innerHTML = "Data Recruitment";
        } else if (values === "talent_hunter") {
            perusahaan_table.classList.add("hidden");
            recruitment_table.classList.add("hidden");
            talent_hunter_table.classList.remove("hidden");

            title.innerHTML = "Data Talent Hunter";
        } else if (values === "panggilan") {
            perusahaan_table.classList.add("hidden");
            recruitment_table.classList.add("hidden");
            talent_hunter_table.classList.add("hidden");
            table_panggilan.classList.remove("hidden");

            title.innerHTML = "Data Request Panggilan";
        }
    });
}
// Finance Super Admin
let kategori_select_finance = document.getElementById(
    "kategori_select_finance"
);

let paket_harga_table = document.getElementById("paket_harga_table");
let riwayat_table = document.getElementById("riwayat_table");
let laporan_table = document.getElementById("laporan_table");

if (kategori_select_finance) {
    kategori_select_finance.addEventListener("change", () => {
        let valu = kategori_select_finance.value;

        if (valu === "paket_harga") {
            paket_harga_table.classList.remove("hidden");
            riwayat_table.classList.add("hidden");
            laporan_table.classList.add("hidden");

            title.innerHTML = "Paket Harga";
        } else if (valu === "riwayat") {
            paket_harga_table.classList.add("hidden");
            riwayat_table.classList.remove("hidden");
            laporan_table.classList.add("hidden");

            title.innerHTML = "Riwayat";
        } else if (valu === "laporan") {
            paket_harga_table.classList.add("hidden");
            riwayat_table.classList.add("hidden");
            laporan_table.classList.remove("hidden");

            title.innerHTML = "Laporan";
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
