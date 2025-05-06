@extends('../master')

@section('title', 'Home | UBeasiswa')

@section('content')

<section class="mascot-welcome" id="welcome">
    <div class="container">
        <div class="left-content">
            <p>Discover <span class="highlight">the path</span> to your dream</p>
            <h1>Scholarship</h1>
            <a onclick="scrollToNextSection()">Lihat Selengkapnya</a>            </div>
        <img src="/images/Home1.png" alt="Mascot" class="mascot-image">
        <img src="/images/Home2.png" alt="Dekor" class="dekor-image">
    </div>
</section>


<!-- 2. Why Choose Us Section -->
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


<!-- 3. Our Program Section -->
<section class="our-program">
  <div class="container">
    <h2>Program Kami</h2>

    <!-- Program Highlight Slider -->
    <div class="program-highlight-box">
  <div class="highlight-content">
    <img id="highlight-image" src="/images/highlight1.png" alt="Highlight">

    <div class="highlight-overlay">
      <div id="highlight-text" class="highlight-text">Scholarship Fair 2025</div>
      <div id="highlight-desc" class="highlight-desc">Bergabung dalam acara tahunan yang mempertemukan kamu dengan berbagai penyedia beasiswa global.</div>
      <a class="highlight-btn" href="program">Yuk Intip Keseruannya >></a>
    </div>
  </div>
</div>


<!-- 4. Country Map & Counter -->
<section class="impact-map" id="impact-map">
    <div class="container">
        <h2>Maju Bersama UBeasiswa!</h2>
        <div class="map-wrapper">
            <img src="/images/indonesia-map.png" alt="Peta Indonesia" class="country-map">
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

<script>
  function scrollToNextSection() {
    const nextSection = document.querySelector('.our-program'); // or whatever section you're scrolling to
    if (nextSection) {
      nextSection.scrollIntoView({ behavior: 'smooth' });
    }
  }
</script>

@endsection
