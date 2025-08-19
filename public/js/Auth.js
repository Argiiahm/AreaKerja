
//regist
const btn_pelamar = document.getElementById("pelamar");
const btn_perusahaan = document.getElementById("perusahaan");
const section_form_pelamar = document.getElementById("form-pelamar");
const section_form_perusahaan = document.getElementById("form-perusahaan");

//regist
btn_pelamar.addEventListener("click", () => {
  btn_pelamar.classList.add("bg-orange-500");
  btn_perusahaan.classList.remove("bg-orange-500");
  btn_pelamar.classList.add("text-white");
  btn_perusahaan.classList.remove("text-white");
  section_form_pelamar.classList.remove("hidden");
  section_form_perusahaan.classList.add("hidden");
})

btn_perusahaan.addEventListener("click", () => {
      btn_pelamar.classList.remove("bg-orange-500");
      btn_perusahaan.classList.add("bg-orange-500");
      btn_pelamar.classList.remove("text-white");
  btn_perusahaan.classList.add("text-white");
    section_form_pelamar.classList.add("hidden");
  section_form_perusahaan.classList.remove   ("hidden");
})
