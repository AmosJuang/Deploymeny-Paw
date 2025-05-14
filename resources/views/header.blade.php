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
                @if(Auth::check())
                    <!-- Jika  sudah login -->
                    <div class="profile-menu">
                        <a href="#" class="profile-icon">
                            <img src="/images/profile-icon.png" alt="Profile" />
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="profile">Profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="logout-btn">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Jika belum login -->
                    <a class="btn login" href="login">Login</a>
                    <a class="btn register" href="register">Register</a>
                @endif
            </div>
        </nav>
    </div>
</header>

<style>
    .profile-menu {
        position: relative;
        display: inline-block;
    }

    .profile-icon img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        list-style: none;
        padding: 10px 0;
        z-index: 1000;
    }

    .profile-menu:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu li {
        padding: 10px 20px;
    }

    .dropdown-menu li a,
    .dropdown-menu li button {
        text-decoration: none;
        color: #333;
        display: block;
        width: 100%;
        text-align: left;
        background: none;
        border: none;
        cursor: pointer;
    }

    .dropdown-menu li button:hover,
    .dropdown-menu li a:hover {
        background-color: #f5f5f5;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileIcon = document.querySelector('.profile-icon');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        profileIcon.addEventListener('click', function (e) {
            e.preventDefault();
            dropdownMenu.classList.toggle('show');
        });

        // Tutup dropdown jika pengguna mengklik di luar menu
        document.addEventListener('click', function (e) {
            if (!profileIcon.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>