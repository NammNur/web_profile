// Javascript simple – bisa kamu kembangkan
console.log("Jersey Store Loaded!");

// Menunggu hingga HTML selesai dimuat
document.addEventListener("DOMContentLoaded", () => {

    /* =========================
       INTERAKSI PRODUCT CARD
    ========================== */
    const cards = document.querySelectorAll(".product-card");

    cards.forEach(card => {

        // Hover effect
        card.addEventListener("mouseenter", () => {
            card.style.transform = "scale(1.03)";
            card.style.transition = "0.2s ease";
            card.style.boxShadow = "0 4px 12px rgba(0,0,0,0.2)";
        });

        card.addEventListener("mouseleave", () => {
            card.style.transform = "scale(1)";
            card.style.boxShadow = "none";
        });

        // Klik card (hindari klik button di dalamnya)
        card.addEventListener("click", (e) => {
            if (e.target.closest("button")) return;

            const titleEl = card.querySelector("h4");
            if (!titleEl) return;

            const title = titleEl.innerText;
            alert("Kamu memilih: " + title);

            // contoh redirect jika mau
            // window.location.href = "/produk";
        });
    });


    /* =========================
       BUTTON SHOP (PER KATEGORI)
    ========================== */
    const shopBtns = document.querySelectorAll(".shop-btn");

    shopBtns.forEach(btn => {
        btn.addEventListener("click", (e) => {
            e.stopPropagation(); // hentikan event card

            const kategori = btn.dataset.kategori;
            if (!kategori) return;

            window.location.href = `/produk?kategori=${kategori}`;
        });
    });


    /* =========================
       BUTTON MORE (SIMPLE REDIRECT)
    ========================== */
    const btnMore = document.querySelector(".btn-more");

    if (btnMore) {
        btnMore.addEventListener("click", (e) => {
            e.stopPropagation(); // supaya tidak ikut klik card

            const url = btnMore.dataset.url;
            if (!url) return;

            window.location.href = url;
        });
    }

});
