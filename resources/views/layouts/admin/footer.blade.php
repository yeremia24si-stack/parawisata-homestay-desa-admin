{{-- ===================== --}}
{{-- DEVELOPER FOOTER --}}
{{-- ===================== --}}

<style>
    .developer-section {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        padding: 70px 0 50px;
        margin-top: 60px;
        color: #fff;
        border-radius: 50px 50px 0 0;
        position: relative;
        overflow: hidden;
    }

    .developer-section::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255,255,255,0.12) 1px, transparent 1px);
        background-size: 28px 28px;
        opacity: .25;
    }

    .developer-container {
        max-width: 1100px;
        margin: auto;
        padding: 0 20px;
        position: relative;
        z-index: 2;
    }

    .developer-title {
        text-align: center;
        margin-bottom: 45px;
    }

    .developer-title h2 {
        font-size: 30px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .developer-title p {
        opacity: .9;
        font-size: 13px;
    }

    .developer-card {
        background: #fff;
        border-radius: 28px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0,0,0,.18);
        display: grid;
        grid-template-columns: 240px 1fr;
        gap: 35px;
        align-items: center;
    }

    .developer-photo {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 24px;
        border: 5px solid #f8fafc;
        box-shadow: 0 15px 30px rgba(79,70,229,.35);
        margin-bottom: 12px;
    }

    .developer-role {
        display: inline-block;
        padding: 7px 18px;
        border-radius: 25px;
        background: linear-gradient(135deg,#4f46e5,#7c3aed);
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .developer-info {
        color: #1e293b;
    }

    .developer-name {
        font-size: 28px;
        font-weight: 800;
        background: linear-gradient(135deg,#4f46e5,#7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .developer-subtitle {
        font-size: 14px;
        font-weight: 600;
        color: #64748b;
        margin-bottom: 25px;
    }

    .developer-details {
        display: grid;
        grid-template-columns: repeat(2,1fr);
        gap: 18px;
        margin-bottom: 28px;
    }

    .detail-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
    }

    .detail-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: linear-gradient(135deg,#4f46e5,#7c3aed);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .detail-label {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        color: #94a3b8;
    }

    .detail-value {
        font-size: 13px;
        font-weight: 600;
        color: #1e293b;
    }

    .developer-social {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .social-link {
        padding: 10px 16px;
        border-radius: 10px;
        color: #fff;
        font-weight: 600;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        transition: .3s;
    }

    .social-link:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,.2);
    }

    .linkedin { background:#0a66c2; }
    .github { background:#24292e; }
    .instagram { background:linear-gradient(45deg,#833ab4,#fd1d1d,#fcb045); }
    .email { background:#ea4335; }
    .whatsapp { background:#25d366; }

    .copyright-text {
        text-align: center;
        margin-top: 40px;
        font-size: 12px;
        opacity: .9;
    }

    /* RESPONSIVE */
    @media(max-width:992px){
        .developer-card{
            grid-template-columns:1fr;
            text-align:center;
            padding: 30px;
        }
        .developer-details{
            grid-template-columns:1fr;
        }
        .developer-social{
            justify-content:center;
        }
    }

    @media(max-width:576px){
        .developer-section{
            padding: 55px 0 40px;
            border-radius: 35px 35px 0 0;
        }
        .developer-photo{
            width: 150px;
            height: 150px;
        }
        .developer-name{
            font-size: 24px;
        }
    }
</style>

<div class="developer-section">
    <div class="developer-container">

        <div class="developer-title">
            <h2>Pengembang Sistem</h2>
            <p>Dibuat untuk Sistem Bina Desa – Pariwisata Homestay</p>
        </div>

        <div class="developer-card">
            <div class="text-center">
                <img src="{{ asset('assets-admin/images/faces/2.jpg') }}"
                     class="developer-photo"
                     alt="Foto Pengembang">
                <br>
                <span class="developer-role">Mahasiswa</span>
            </div>

            <div class="developer-info">
                <h3 class="developer-name">Yeremia Zai</h3>
                <p class="developer-subtitle">Developer & Web Designer</p>

                <div class="developer-details">
                    <div class="detail-item">
                        <div class="detail-icon"><i class="bi bi-person-badge-fill"></i></div>
                        <div>
                            <div class="detail-label">NIM</div>
                            <div class="detail-value">2457301154</div>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon"><i class="bi bi-mortarboard-fill"></i></div>
                        <div>
                            <div class="detail-label">Program Studi</div>
                            <div class="detail-value">Sistem Informasi</div>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon"><i class="bi bi-building"></i></div>
                        <div>
                            <div class="detail-label">Universitas</div>
                            <div class="detail-value">Politeknik Caltex Riau</div>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon"><i class="bi bi-calendar-check"></i></div>
                        <div>
                            <div class="detail-label">Angkatan</div>
                            <div class="detail-value">2024</div>
                        </div>
                    </div>
                </div>

                <div class="developer-social">
                    <a href="#" class="social-link linkedin"><i class="bi bi-linkedin"></i>LinkedIn</a>
                    <a href="#" class="social-link github"><i class="bi bi-github"></i>GitHub</a>
                    <a href="#" class="social-link instagram"><i class="bi bi-instagram"></i>Instagram</a>
                    <a href="mailto:email@gmail.com" class="social-link email"><i class="bi bi-envelope-fill"></i>Email</a>
                    <a href="#" class="social-link whatsapp"><i class="bi bi-whatsapp"></i>WhatsApp</a>
                </div>
            </div>
        </div>

        <div class="copyright-text">
            © 2025 Sistem Bina Desa – Pariwisata Homestay<br>
            Developed by <strong>Yeremia Zai</strong>
        </div>

    </div>
</div>
