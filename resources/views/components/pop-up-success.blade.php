<div class="confirmation-overlay">
    <div class="success-message">
        <div class="header">
            <h1>Berhasil</h1>
        </div>
        <div class="content-popup">
            <div class="check-icon">
                <img src="https://media.istockphoto.com/id/1416145560/id/vektor/lingkaran-hijau-dengan-centang-hijau-ikon-stiker-ok-datar-ikon-tanda-centang-hijau-centang.jpg?s=612x612&w=0&k=20&c=nQy3ESeeOYBMc2vbC_o1vfpxdFdsF4xWceJFd8_sLc0="
                    alt="Check Icon" />
            </div>
            <div class="message">
                Jangan lupa ambil bukunya di :
            </div>
            <div class="address">
                567 Willow Park Avenue Graha Candi Residence, Blok C2<br>
                Kecamatan Singosari<br>
                Kota Malang,<br>
                Jawa Timur 65141 Indonesia
            </div>
            <div class="footer-container">
                <div class="timer" id="pickup-timer">
                    Batas waktu pengambilan <span>{{ $pickupTime }}</span>
                </div>
                <div class="footer">
                    <button onclick="window.location.href = '{{ url('/pinjaman') }}'">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
