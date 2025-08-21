

const btn_umpan_lowongan = document.getElementById("umpan-lowongan");
const btn_pencarian_baru = document.getElementById("pencarian");
const section_umpan_lowongan = document.getElementById("section-umpan-lowongan");
const section_berdasarkan_pencarian = document.getElementById("berdasarkan-pencarian");


btn_umpan_lowongan.addEventListener("click", () => {
    btn_umpan_lowongan.classList.add("border-b-2");
    btn_pencarian_baru.classList.remove("border-b-2");
    section_umpan_lowongan.classList.remove("hidden");
    section_berdasarkan_pencarian.classList.add("hidden");
});

btn_pencarian_baru.addEventListener("click", () => {
    btn_umpan_lowongan.classList.remove("border-b-2");
    btn_pencarian_baru.classList.add("border-b-2");
    section_umpan_lowongan.classList.add("hidden");
    section_berdasarkan_pencarian.classList.remove("hidden");
});

