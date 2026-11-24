$(document).ready(function () {
  // Mengembalikan fungsi klik semua menu (Beranda, Tentang Saya, Proyek, Teknologi, Pengalaman, Biodata)
  $(".nav-menu").on("click", function (e) {
    e.preventDefault();
    var tujuan = $(this).data("page");

    $(".halaman").hide();
    $("#page-" + tujuan).show();

    // Tandai teks menu yang sedang dibuka
    $(".nav-menu").removeClass("fw-bold text-decoration-underline");
    $('.nav-menu[data-page="' + tujuan + '"]').addClass(
      "fw-bold text-decoration-underline",
    );
  });

  // Filter kategori proyek
  $(".btn-filter").on("click", function () {
    var filter = $(this).data("filter");

    $(".btn-filter")
      .removeClass("btn-dark")
      .addClass("btn-link text-black text-decoration-none");
    $(this)
      .removeClass("btn-link text-black text-decoration-none")
      .addClass("btn-dark");

    if (filter === "all") {
      $(".item-project").show();
    } else {
      $(".item-project").hide();
      $('.item-project[data-category="' + filter + '"]').show();
    }
  });

  // Tombol hiasan (LinkedIn, Instagram, GitHub, CV) hanya bisa dipencet tanpa aksi
  $(".tombol-hiasan").on("click", function (e) {
    e.preventDefault();
  });
});
