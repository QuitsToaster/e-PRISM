@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
    }
    .text-gradient-primary {
        background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .hover-card-effect {
        transition: all 0.3s ease;
    }
    .hover-card-effect:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    .border-gradient-card {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
    }
</style>

<!-- Header -->
<div class="bg-white rounded-xl p-6 mb-6 shadow-sm border">
    <h1 class="text-2xl font-semibold text-gradient-primary">Admin Dashboard</h1>
    <p class="text-sm text-gray-600 mt-1">Overview of system submissions</p>
</div>

{{-- SUMMARY CARDS --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">

    <a href="{{ route('admin.researches') }}"
       class="bg-white rounded-xl p-6 hover-card-effect border-gradient-card block">
        <p class="text-xs font-semibold text-gradient-primary mb-2">RESEARCHES</p>
        <p class="text-3xl font-bold text-gray-800">{{ $researches->count() }}</p>
        <p class="text-xs text-gray-500 mt-1">Click to view all submitted researches</p>
    </a>

    <a href="{{ route('admin.proponents') }}"
       class="bg-white rounded-xl p-6 hover-card-effect border-gradient-card block">
        <p class="text-xs font-semibold text-gradient-primary mb-2">PROPONENTS</p>
        <p class="text-3xl font-bold text-gray-800">{{ $totalProponents ?? 0 }}</p>
        <p class="text-xs text-gray-500 mt-1">Click to view all proponents</p>
    </a>

    <!-- <div class="bg-white rounded-xl p-6 border-gradient-card">
        <p class="text-xs font-semibold text-gradient-primary mb-2">ATTACHMENTS</p>
        <p class="text-3xl font-bold text-gray-800">{{ $totalAttachments ?? 0 }}</p>
        <p class="text-xs text-gray-500 mt-1">Total uploaded files</p>
    </div> -->

</div>

{{-- CHART SECTION --}}
<div class="bg-white rounded-xl p-6 shadow-sm border">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-sm font-semibold text-gradient-primary">
            Submissions Overview (Last 30 Days)
        </h2>
    </div>

    <canvas id="submissionChart" height="100"></canvas>

</div>

<script>
    const ctx = document.getElementById('submissionChart').getContext('2d');

    const submissionChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Submitted Researches',
                data: @json($chartValues),
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                pointRadius: 4,
                pointBackgroundColor: '#1a1a1a'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>

@endsection