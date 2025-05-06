@extends('master')

@section('title', 'Mentor | UBeasiswa')

@section('content')
  <section class="mentor-section">
    <!-- Meet Our Mentors -->
    <div class="meet-our-mentors">
      <h2>🎓Meet Our <strong>Mentors🎓</strong></h2>
      <div class="mentors-container">
        <!-- Mentor 1 -->
        <div class="mentor-item">
          <div class="mentor-name">Kipli Kacang Panjang</div>
          <div class="mentor-role">Teknik Pertanian, <br>Universitas Brawijaya</div>
          <img src="/images/kipli-kacang-panjang.png" alt="Kipli Kacang Panjang" class="mentor-image">
          <div class="mentor-awardee">
            <span class="award-title">Awardee of</span><br>
            <span class="award-name">Beasiswa Djarum</span>
          </div>
        </div>
        <!-- Mentor 2 -->
        <div class="mentor-item">
          <div class="mentor-name">Alukar Mulet</div>
          <div class="mentor-role">Sastra Jawa Kuno, <br>Universitas Indonesia</div>
          <img src="/images/alukar-mulet.png" alt="Alukar Mulet" class="mentor-image">
          <div class="mentor-awardee">
            <span class="award-title">Awardee of</span><br>
            <span class="award-name">Beasiswa Tanopto</span>
          </div>
        </div>
        <!-- Mentor 3 -->
        <div class="mentor-item">
          <div class="mentor-name">Skibidi Toilet</div>
          <div class="mentor-role">Bahasa Tubuh, <br>Institut Teknologi Sepuluh Nopember</div>
          <img src="/images/skibidi-toilet.png" alt="Skibidi Toilet" class="mentor-image">
          <div class="mentor-awardee">
            <span class="award-title">Awardee of</span><br>
            <span class="award-name">Beasiswa BCA</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Tertarik Jadi Mentor? -->
    <div class="become-a-mentor">
      <h2>Tertarik Jadi Mentor?</h2>
      <p>Jadilah bagian dari komunitas mentor kami dan bantu generasi berikutnya meraih impian mereka.</p>
      <a href="/join-mentor" class="btn-apply">Daftar Sekarang</a>
    </div>
  </section>
@endsection
