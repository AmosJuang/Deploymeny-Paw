@extends('../master')

@section('title', 'Home | UBeasiswa')

@section('content')

<!-- 1. Section Selamat Datang dengan Maskot -->
<section class="mascot-welcome" id="welcome">
    <div class="container">
        <!-- Konten sebelah kiri -->
        <div class="left-content">
            <p>Discover <span class="highlight">the path</span> to your dream</p>
            <h1>Scholarship</h1>
            <!-- Tombol scroll ke section selanjutnya -->
            <a onclick="scrollToNextSection()">Lihat Selengkapnya</a>
        </div>
        <!-- Gambar Maskot dan Dekorasi -->
        <img src="/images/Home1.png" alt="Mascot" class="mascot-image">
        <img src="/images/Home2.png" alt="Dekor" class="dekor-image">
    </div>
</section>

<!-- 2. Section Mengapa Memilih UBeasiswa -->
<section class="why-choose">
    <div class="why-title">
        <h2>Mengapa Harus UBeasiswa? 🤔</h2>
    </div>
    <div class="why-body">
        <ul class="reasons">
            <li>
                🌟 Terpercaya & Berpengalaman
                <p>Kami telah membantu ribuan siswa meraih beasiswa impian mereka.</p>
            </li>
            <li>
                🎓 Mentor Profesional
                <p>Dibimbing oleh para ahli yang berpengalaman di bidangnya.</p>
            </li>
            <li>
                🌐 Jaringan Global
                <p>Terhubung dengan komunitas dan peluang dari seluruh dunia.</p>
            </li>
            <li>
                📈 Peluang Karir Profesional yang Luas
                <p>Persiapkan karirmu sejak dini dengan bimbingan terbaik milik kami.</p>
            </li>
        </ul>
    </div>
</section>

<!-- 3. Section Program Unggulan -->
<section class="our-program">
  <div class="container">
    <h2>Program Kami</h2>

    <!-- Kotak Highlight Program -->
    <div class="program-highlight-box">
        <div class="highlight-content">
            <!-- Gambar program -->
            <img id="highlight-image" src="/images/highlight1.png" alt="Highlight">

            <!-- Overlay teks di atas gambar -->
            <div class="highlight-overlay">
                <div id="highlight-text" class="highlight-text">Scholarship Fair 2025</div>
                <div id="highlight-desc" class="highlight-desc">
                    Bergabung dalam acara tahunan yang mempertemukan kamu dengan berbagai penyedia beasiswa global.
                </div>
                <!-- Tombol untuk menuju halaman program -->
                <a class="highlight-btn" href="program">Yuk Intip Keseruannya >></a>
            </div>
        </div>
    </div>
</section>

<!-- 4. Section Dampak & Statistik -->
<section class="impact-map" id="impact-map">
    <div class="container">
        <h2>Maju Bersama UBeasiswa!</h2>

        <div class="map-wrapper">
            <!-- Gambar peta -->
            <img src="/images/indonesia-map.png" alt="Peta Indonesia" class="country-map">

            <!-- Statistik dampak UBeasiswa -->
            <div class="counter-overlay">
                <div class="counter-box">
                    <div class="counter-number" data-target="3000">0</div>
                    <div class="counter-label">Peserta</div>
                </div>
                <div class="counter-box">
                    <div class="counter-number" data-target="90">0</div>
                    <div class="counter-label">Universitas</div>
                </div>
                <div class="counter-box">
                    <div class="counter-number" data-target="55">0</div>
                    <div class="counter-label">Kota/Kabupaten</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script scroll ke section program -->
<script>
  function scrollToNextSection() {
    const nextSection = document.querySelector('.our-program');
    if (nextSection) {
      nextSection.scrollIntoView({ behavior: 'smooth' });
    }
  }
</script>

@endsection
