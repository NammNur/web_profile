// Javascript simple – bisa kamu kembangkan
console.log("Jersey Store Loaded!");

// Menunggu hingga HTML selesai dimuat
document.addEventListener("DOMContentLoaded", () => {

    const cards = document.querySelectorAll(".product-card");

    // Tambah interaksi hover & click untuk setiap card
    cards.forEach(card => {

        // Animasi hover (membesarkan sedikit)
        card.addEventListener("mouseenter", () => {
            card.style.transform = "scale(1.03)";
            card.style.transition = "0.2s ease";
            card.style.boxShadow = "0 4px 12px rgba(0,0,0,0.2)";
        });

        card.addEventListener("mouseleave", () => {
            card.style.transform = "scale(1)";
            card.style.boxShadow = "none";
        });

        // Event klik pada card
        card.addEventListener("click", () => {

            // Ambil judul produk (teks pertama dari card)
            const title = card.querySelector("h4").innerText;

            alert("Kamu memilih: " + title);

            // Redirect ke halaman detail (opsional)
            // Bisa kamu ubah sesuai kebutuhan Laravel
            // window.location.href = "/produk/" + title.replace(/\s+/g, "-").toLowerCase();
        });

    });

    // Tombol "Shop Now"
    const shopBtn = document.querySelector(".shop-btn");
    if (shopBtn) {
        shopBtn.addEventListener("click", () => {
            alert("Menuju katalog produk...");
            // window.location.href = "/katalog";
        });
    }

});
