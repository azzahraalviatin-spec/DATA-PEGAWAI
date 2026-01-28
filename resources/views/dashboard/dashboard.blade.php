@extends('layouts.admin')


@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Dashboard</h4>

  <!-- CARD STATISTIK -->
<div class="row g-3 mb-4">

<div class="col-md-3">
    <div class="card shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h6 class="text-muted mb-1">Total Pegawai</h6>
                <h3 class="mb-0">{{ $totalPegawai }}</h3>
            </div>
            <div class="fs-1 text-primary">
                <i class="bi bi-people-fill"></i>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h6 class="text-muted mb-1">Laki-laki</h6>
                <h3 class="mb-0">{{ $laki }}</h3>
            </div>
            <div class="fs-1 text-info">
                <i class="bi bi-gender-male"></i>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h6 class="text-muted mb-1">Perempuan</h6>
                <h3 class="mb-0">{{ $perempuan }}</h3>
            </div>
            <div class="fs-1 text-danger">
                <i class="bi bi-gender-female"></i>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h6 class="text-muted mb-1">Pegawai Aktif</h6>
                <h3 class="mb-0">{{ $pegawaiAktif }}</h3>
            </div>
            <div class="fs-1 text-success">
                <i class="bi bi-check-circle-fill"></i>
            </div>
        </div>
    </div>
</div>

</div>


    <!-- GRAFIK -->
    <div class="card mt-4 p-4">
        <h5 class="mb-3">Grafik Pegawai per Jabatan</h5>
        <canvas id="jabatanChart"></canvas>
    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('jabatanChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($jabatanLabels),
        datasets: [{
            label: 'Jumlah Pegawai',
            data: @json($jabatanJumlah),
            backgroundColor: 'rgba(13, 110, 253, 0.7)'
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection
