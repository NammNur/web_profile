@extends('layouts.admin')

@section('title', 'Admin manage Product')

@section('content')
    <div class="container">
        <!-- MAIN CONTENT -->
        <div class="content">

            <div class="title-bar">Produk Jersey</div>

            <!-- HEADER ATAS -->
            <div class="detail-wrap">

                <div class="header-box">
                    <img src="{{ asset('asset/img/jersey.png') }}" alt="">
                </div>

                <!-- EDIT JENIS -->
                <div class="detail-text">
                    <span class="edit-icon" onclick="openModal('Edit Jenis Produk')">✏️</span>
                    <b>Jenis Produk :</b><br>
                    1. Jersey Futsal<br>
                    2. Jersey Basket<br>
                    3. Jersey Voli
                </div>

                <!-- EDIT BAHAN -->
                <div class="detail-text">
                    <span class="edit-icon" onclick="openModal('Edit Bahan')">✏️</span>
                    <b>Bahan :</b><br>
                    1. Premium<br>
                    2. Standart
                </div>
            </div>

            <!-- EDIT TEMPLATE -->
            <div class="template-title">
                <span class="edit-icon" onclick="openModal('Edit Template Design')">✏️</span>
                Template Design
            </div>

            <!-- TEMPLATE GRID -->
            <div class="template-grid">
                <div class="template-box"></div>
                <div class="template-box"></div>
                <div class="template-box"></div>
                <div class="template-box"></div>

                <div class="template-box"></div>
                <div class="template-box"></div>
                <div class="template-box"></div>
                <div class="template-box"></div>
            </div>

            <div class="footer"></div>

        </div>

    </div>

    <!-- MODAL -->
    <div class="modal-overlay" id="modal">
        <div class="modal-box">
            <h3 id="modalTitle">Edit</h3>

            <textarea></textarea>

            <button class="modal-btn">Simpan Perubahan</button>
            <button class="modal-btn close-btn" onclick="closeModal()">Batal</button>
        </div>
    </div>

    <script>
        function openModal(title) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modal').style.display = "flex";
        }

        function closeModal() {
            document.getElementById('modal').style.display = "none";
        }
    </script>

    </body>

    </html>
