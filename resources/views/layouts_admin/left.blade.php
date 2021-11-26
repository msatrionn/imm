<div class="az-content-left az-content-left-components">
    <div class="component-item">
        <label>Dashboard</label>
        <nav class="nav flex-column">
            <a href="{{ route('dashboard') }}" class="nav-link ">Dashboard</a>
        </nav>
        <label>User</label>
        <nav class="nav flex-column">
            <a href="{{ route('user.index') }}" class="nav-link ">Data User</a>
        </nav>
        <label>Calon</label>
        <nav class="nav flex-column">
            <a href="{{ route('calon.index') }}" class="nav-link">Data Calon</a>
        </nav>

        <label>Pemilihan</label>
        <nav class="nav flex-column">
            <a href="{{ route('pemilihan.index') }}" class="nav-link">Data Pemilihan</a>
        </nav>
        <label>Data Pemilihan</label>
        <nav class="nav flex-column">
            <a href="{{ route('chart') }}" class="nav-link">Grafik Pemilihan</a>
        </nav>




    </div><!-- component-item -->
</div><!-- az-content-left -->
