// ambil element
const btn_pelamar = document.getElementById("pelamar");
const btn_perusahaan = document.getElementById("perusahaan");
const section_form_pelamar = document.getElementById("form-pelamar");
const section_form_perusahaan = document.getElementById("form-perusahaan");

// function aktifin pelamar
function showPelamar() {
  btn_pelamar.classList.add("bg-orange-500", "text-white");
  btn_perusahaan.classList.remove("bg-orange-500", "text-white");

  section_form_pelamar.classList.remove("hidden");
  section_form_perusahaan.classList.add("hidden");
}

// function aktifin perusahaan
function showPerusahaan() {
  btn_perusahaan.classList.add("bg-orange-500", "text-white");
  btn_pelamar.classList.remove("bg-orange-500", "text-white");

  section_form_perusahaan.classList.remove("hidden");
  section_form_pelamar.classList.add("hidden");
}

// event klik
btn_pelamar.addEventListener("click", showPelamar);
btn_perusahaan.addEventListener("click", showPerusahaan);


// ambil dari Laravel old input
const oldType = document.body.getAttribute("data-old-type");

// fallback kalau ga ada → pelamar
if (oldType === "perusahaan") {
  showPerusahaan();
} else {
  showPelamar();
}