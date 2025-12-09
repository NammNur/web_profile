<footer class="footer">
    <div class="footer-container">

        <!-- Brand / Company -->
        <div class="footer-section">
            <h3>SKL ANDI JAYA</h3>
            <p>Solusi terbaik untuk kebutuhan seragam, konveksi, jersey, bordir, dan percetakan.</p>
        </div>

        <!-- Social Media -->
        <div class="footer-section">
            <h4>Ikuti Kami</h4>
            <div class="social-icons">

                <a href="https://www.instagram.com/skl_jersey?igsh=dHV3bWRhMGo0Zm9t" target="_blank" class="icon ig">
                    <img src="{{ asset('asset/img/ig.png') }}" alt="Instagram">
                    Instagram
                </a>

                <a href="https://wa.me/6287773627999" target="_blank" class="icon wa">
                    <img src="{{ asset('asset/img/WA.png') }}" alt="WhatsApp">
                    WhatsApp
                </a>

                <a href="https://www.facebook.com/skl.andijaya.37/?utm_source=chatgpt.com" target="_blank" class="icon fb">
                    <img src="{{ asset('asset/img/fb.png') }}" alt="Facebook">
                    Facebook
                </a>

                <a href="https://tiktok.com" target="_blank" class="icon tt">
                    <img src="{{ asset('asset/img/tiktok.png') }}" alt="TikTok">
                    TikTok
                </a>

            </div>
        </div>

        <!-- Contact information -->
        <div class="footer-section">
            <h4>Kontak</h4>
            <p>Email: skl.andijaya@gmail.com</p>
            <p>Phone: +62 812-3456-7890</p>
            <p>Alamat: Jl. Ki Gedeng Luragung, Kuningan, Jawa Barat</p>
        </div>

    </div>

    <div class="footer-bottom">
        © {{ date('Y') }} SKL Andi Jaya — All Rights Reserved.
    </div>
</footer>

<script src="{{ asset('asset/js/script.js') }}"></script>

<style>
.footer {
    margin-top: 50px;
    background-color: #ffffff;
    color: #333;
    padding: 40px 20px 20px;
    font-family: Arial, sans-serif;
}

.footer-container {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: space-between;
    max-width: 1200px;
    margin: auto;
}

.footer-section {
    flex: 1;
    min-width: 250px;
}

.footer h3 {
    font-size: 22px;
    margin-bottom: 10px;
    color: #333;
}

.footer-section h4 {
    margin-bottom: 15px;
    font-size: 18px;
    color: #333;
}

.social-icons {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.social-icons .icon {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #064935;
    padding: 8px 12px;
    border-radius: 8px;
    color: #ffffff;
    text-decoration: none;
    transition: 0.3s;
}

.social-icons .icon img {
    width: 20px;
}

.social-icons .icon:hover {
    background: #333;
}

.footer-bottom {
    text-align: center;
    padding-top: 20px;
    margin-top: 20px;
    border-top: 1px solid #333;
    font-size: 14px;
}
</style>
