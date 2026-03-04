@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    /* Prevent horizontal scroll */
    body {
        overflow-x: hidden;
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
    }

    .text-gradient-primary {
        background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .bg-gradient-header {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(26, 26, 26, 0.1) 100%);
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

<!-- Main Wrapper (prevents overflow) -->
<div class="max-w-7xl mx-auto px-4 overflow-x-hidden">

    <!-- Header -->
    <div class="bg-gradient-header rounded-xl p-6 mb-6 border border-gray-100 shadow-sm w-full">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between w-full">
            <div class="w-full">
                <div class="flex items-center gap-2 mb-1">
                    <h1 class="text-2xl font-semibold text-gradient-primary">
                        Admin Dashboard
                    </h1>
                </div>
                <p class="text-sm text-gray-600 break-words">
                    Welcome back, {{ Auth::user()->name }}!
                    Here's an overview of the latest submissions and statistics.
                </p>
            </div>
        </div>
    </div>

    {{-- SUMMARY CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8 w-full">

        <a href="{{ route('admin.researches') }}"
           class="bg-white rounded-xl p-6 hover-card-effect border-gradient-card block w-full">
            <p class="text-xs font-semibold text-gradient-primary mb-2">
                RESEARCHES
            </p>
            <p class="text-3xl font-bold text-gray-800">
                {{ $researches->count() }}
            </p>
            <p class="text-xs text-gray-500 mt-1">
                Click to view all submitted researches
            </p>
        </a>

        <a href="{{ route('admin.proponents') }}"
           class="bg-white rounded-xl p-6 hover-card-effect border-gradient-card block w-full">
            <p class="text-xs font-semibold text-gradient-primary mb-2">
                PROPONENTS
            </p>
            <p class="text-3xl font-bold text-gray-800">
                {{ $totalProponents ?? 0 }}
            </p>
            <p class="text-xs text-gray-500 mt-1">
                Click to view all proponents
            </p>
        </a>

    </div>

    {{-- CHART SECTION --}}
    <div class="bg-white rounded-xl p-6 shadow-sm border w-full overflow-hidden">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-sm font-semibold text-gradient-primary">
                Submissions Overview (Last 30 Days)
            </h2>
        </div>

        <!-- Chart container fix -->
        <div class="w-full overflow-x-hidden">
            <canvas id="submissionChart" class="w-full"></canvas>
        </div>

    </div>

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
            maintainAspectRatio: false,
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