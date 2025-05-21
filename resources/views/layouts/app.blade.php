<!DOCTYPE html>
<html lang="en">
<head>
        @livewireStyles

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbershop Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fb;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: #1a1a2e;
            color: white;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white;
            text-decoration: none;
        }

        .sidebar-menu {
            padding: 20px 0;
            list-style: none;
            margin-left: 0;
            padding-left: 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: #3a86ff;
        }

        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Main content styles */
        .main-wrapper {
            margin-left: 250px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        .main-content {
            padding: 30px;
        }

        /* Header styles */
        .main-header {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .toggle-sidebar {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #1a1a2e;
        }

        /* Card styles */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 15px 20px;
            border-radius: 10px 10px 0 0 !important;
        }

        .card-body {
            padding: 20px;
        }

        /* Button styles */
        .btn {
            border-radius: 5px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: #3a86ff;
            border-color: #3a86ff;
        }

        .btn-primary:hover {
            background-color: #2a75f0;
            border-color: #2a75f0;
        }

        /* Table styles */
        .table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .table th {
            font-weight: 600;
            color: #495057;
            border-bottom-width: 1px;
        }

        .table td {
            vertical-align: middle;
        }

        /* Badge styles */
        .badge {
            padding: 6px 10px;
            font-weight: 500;
            border-radius: 30px;
        }

        /* Avatar styles */
        .avatar-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }

        /* Service icon styles */
        .service-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        /* Footer styles */
        .footer {
            background-color: white;
            color: #6c757d;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }

            .sidebar.active {
                margin-left: 0;
            }

            .main-wrapper {
                margin-left: 0;
            }

            .main-wrapper.active {
                margin-left: 250px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        <a href="/" class="sidebar-brand">
            <i class="fas fa-cut"></i>Capodopera
        </a>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Meniu Principal
            </a>
        </li>
        <li>
            <a href="/rezervari" class="{{ request()->is('reservations*') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i> Rezervari
            </a>
        </li>
        <li>
            <a href="/servicii" class="{{ request()->is('services*') ? 'active' : '' }}">
                <i class="fas fa-list-alt"></i> Servicii
            </a>
        </li>
        <li>
            <a href="/clienti" class="{{ request()->is('clients*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Clienti
            </a>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-wrapper">
    <header class="main-header">
        <button class="toggle-sidebar" id="toggle-sidebar">
            <i class="fas fa-bars"></i>
        </button>
        <div>
            <span class="fw-bold">Bine ai venit</span>
        </div>
    </header>

    <div class="main-content">
        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Capodopera</p>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle sidebar on mobile
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('active');
        document.querySelector('.main-wrapper').classList.toggle('active');
    });
</script>
@yield('scripts')
@livewireScripts
</body>
</html>

