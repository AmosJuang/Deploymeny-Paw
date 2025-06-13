<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<header class="site-header">
    <div class="header-container">
        <div class="logo">
            <span class="logo-text">UB<span class="easiswa">easiswa</span></span>
        </div>
        <nav class="main-nav">
            <div class="nav-left">
                <ul class="nav-links">
                    <li><a href="home">Home</a></li>
                    <li><a href="program">Program</a></li>
                    <li><a href="mentor">Mentor</a></li>
                    <li><a href="beasiswa">Beasiswa</a></li>
                </ul>
            </div>
            <div class="nav-right">
                @auth
                    <div class="notification-wrapper">
                        <div class="notification-bell">
                            <i class="fas fa-bell"></i>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="notification-count">{{ auth()->user()->unreadNotifications->count() }}</span>
                            @endif
                        </div>
                        <div class="notification-dropdown">
                            <div class="notification-header">
                                <h4>Notifikasi</h4>
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <button type="button" class="clear-notifications" onclick="clearAllNotifications()">
                                        Clear All
                                    </button>
                                @endif
                            </div>
                            <div class="notification-list">
                                @forelse(auth()->user()->unreadNotifications as $notification)
                                    <div class="notification-item">
                                        {{ $notification->data['message'] }}
                                        <small>{{ $notification->created_at->diffForHumans() }}</small>
                                    </div>
                                @empty
                                    <p class="no-notifications">Tidak ada notifikasi baru</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('reports.index') }}" class="nav-link" style="margin-right: 15px;">
                        <i class="fas fa-chart-bar"></i> Reports
                    </a>

                    <div class="profile-menu">
                        <a href="#" class="profile-icon">
                            <div class="default-avatar">
                                <span>{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile') }}">Profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="logout-btn">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a class="btn login" href="login">Login</a>
                    <a class="btn register" href="register">Register</a>
                @endif
            </div>
        </nav>
    </div>
</header>

<style>
    .profile-menu { position: relative; display: inline-block; }
    .default-avatar { width: 40px; height: 40px; border-radius: 50%; background-color: #3C1E86; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 18px; cursor: pointer; }
    .dropdown-menu { display: none; position: absolute; right: 0; top: 50px; background: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; list-style: none; padding: 10px 0; z-index: 1000; min-width: 150px; }
    .dropdown-menu.show { display: block; }
    .dropdown-menu li { padding: 0; }
    .dropdown-menu li a, .dropdown-menu li button { padding: 10px 20px; text-decoration: none; color: #333; display: block; width: 100%; text-align: left; background: none; border: none; cursor: pointer; }
    .dropdown-menu li a:hover, .dropdown-menu li button:hover { background: #f5f5f5; }
    .notification-wrapper { position: relative; display: inline-block; margin-right: 20px; }
    .notification-bell { cursor: pointer; padding: 10px; }
    .notification-count { position: absolute; top: -5px; right: -10px; background: #e63946; color: #fff; border-radius: 50%; padding: 2px 6px; font-size: 12px; }
    .notification-dropdown { position: absolute; right: 0; top: 100%; background: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 5px; width: 300px; z-index: 1000; display: none; }
    .notification-dropdown.show { display: block; }
    .notification-item { padding: 10px 20px; color: #333; cursor: pointer; }
    .notification-item:hover { background: #f5f5f5; }
    .notification-header { display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; border-bottom: 1px solid #f0f0f0; }
    .clear-notifications { background: none; border: none; color: #007bff; cursor: pointer; font-size: 14px; }
    .clear-notifications:hover { text-decoration: underline; }
    .no-notifications { padding: 10px 20px; color: #999; text-align: center; font-size: 14px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const profileIcon = document.querySelector('.profile-icon');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    const notificationBell = document.querySelector('.notification-bell');
    const notificationDropdown = document.querySelector('.notification-dropdown');

    profileIcon.addEventListener('click', function(e) {
        e.preventDefault();
        dropdownMenu.classList.toggle('show');
        notificationDropdown.classList.remove('show');
    });

    notificationBell.addEventListener('click', function(e) {
        e.preventDefault();
        notificationDropdown.classList.toggle('show');
        dropdownMenu.classList.remove('show');
    });

    document.addEventListener('click', function(e) {
        if (!profileIcon.contains(e.target) && !dropdownMenu.contains(e.target) &&
            !notificationBell.contains(e.target) && !notificationDropdown.contains(e.target)) {
            dropdownMenu.classList.remove('show');
            notificationDropdown.classList.remove('show');
        }
    });
});

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
            const countBadge = document.querySelector('.notification-count');
            if (countBadge) countBadge.remove();
            const clearBtn = document.querySelector('.clear-notifications');
            if (clearBtn) clearBtn.remove();
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Gagal membersihkan notifikasi');
    });
}
</script>
</body>
</html>
