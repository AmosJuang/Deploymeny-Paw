<!-- CSRF token untuk fetch/AJAX -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<header>
    <!-- Logo -->
    <a href="/" class="logo">UBeasiswa</a>

    <!-- Navigasi umum -->
    <nav>
        <ul>
            <li><a href="/">Beranda</a></li>
            <li><a href="/layanan">Layanan</a></li>
            <li><a href="/kontak">Kontak</a></li>
        </ul>
    </nav>

    <!-- Area kanan (icon + auth) -->
    <div class="header-right">
        @auth
            <!-- Bell icon -->
            <div class="notification-container">
                <a href="#" id="notification-bell">
                    <img src="{{ asset('icons/bell.svg') }}" alt="Notifikasi">
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="notification-count">{{ auth()->user()->unreadNotifications->count() }}</span>
                    @endif
                </a>

                <!-- Dropdown notifikasi -->
                <div class="notification-dropdown" id="notification-dropdown">
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <ul class="notification-list">
                            @foreach(auth()->user()->unreadNotifications as $notification)
                                <li>{{ $notification->data['message'] ?? 'Notifikasi' }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="clear-notifications" onclick="clearAllNotifications()">Clear All</button>
                    @else
                        <p class="no-notifications">Tidak ada notifikasi baru</p>
                    @endif
                </div>
            </div>

            <!-- Avatar + dropdown -->
            <div class="profile-container">
                <a href="#" id="profile-icon">
                    <div class="avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                </a>

                <!-- Dropdown profil -->
                <div class="dropdown-menu" id="dropdown-menu">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>
        @else
            <!-- Jika belum login -->
            <a class="btn login" href="login">Login</a>
            <a class="btn register" href="register">Register</a>
        @endauth
    </div>
</header>
/* Dropdown profil default tersembunyi */
.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    z-index: 10;
    padding: 10px;
    border: 1px solid #ccc;
}

/* Tampilkan dropdown */
.dropdown-menu.show {
    display: block;
}

/* Notifikasi default tersembunyi */
.notification-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    right: 30px;
    background: white;
    z-index: 10;
    padding: 10px;
    border: 1px solid #ccc;
    width: 250px;
}

/* Tampilkan notifikasi */
.notification-dropdown.show {
    display: block;
}

/* Badge angka notifikasi */
.notification-count {
    position: absolute;
    top: -5px;
    right: -10px;
    background: red;
    color: white;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 12px;
}

/* Avatar user */
.avatar {
    background: #007bff;
    color: white;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Tombol logout */
.logout-btn {
    background: none;
    border: none;
    color: red;
    cursor: pointer;
    padding: 5px 0;
    text-align: left;
    width: 100%;
}
document.addEventListener('DOMContentLoaded', function () {
    const profileIcon = document.getElementById('profile-icon');
    const dropdownMenu = document.getElementById('dropdown-menu');
    const notificationBell = document.getElementById('notification-bell');
    const notificationDropdown = document.getElementById('notification-dropdown');

    // Toggle dropdown user
    if (profileIcon && dropdownMenu) {
        profileIcon.addEventListener('click', function (e) {
            e.preventDefault();
            dropdownMenu.classList.toggle('show');
            notificationDropdown?.classList.remove('show');
        });
    }

    // Toggle dropdown notifikasi
    if (notificationBell && notificationDropdown) {
        notificationBell.addEventListener('click', function (e) {
            e.preventDefault();
            notificationDropdown.classList.toggle('show');
            dropdownMenu?.classList.remove('show');
        });
    }

    // Klik luar menutup dropdown
    document.addEventListener('click', function (e) {
        if (!profileIcon?.contains(e.target) &&
            !dropdownMenu?.contains(e.target) &&
            !notificationBell?.contains(e.target) &&
            !notificationDropdown?.contains(e.target)) {
            dropdownMenu?.classList.remove('show');
            notificationDropdown?.classList.remove('show');
        }
    });
});

// Hapus semua notifikasi via fetch
function clearAllNotifications() {
    fetch('{{ route("notifications.clear") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.querySelector('.notification-list').innerHTML = '<p class="no-notifications">Tidak ada notifikasi baru</p>';
            document.querySelector('.notification-count')?.remove();
            document.querySelector('.clear-notifications')?.remove();
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Gagal membersihkan notifikasi');
    });
}
