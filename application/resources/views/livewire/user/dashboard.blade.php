<div class="space-y-6">
    <!-- Header -->
    <div class="glassmorphism rounded-2xl p-6 shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
            <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                </path>
            </svg>
            Dashboard
        </h1>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Products Card -->
        <div class="glassmorphism rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Produk</p>
                    <h3 class="text-4xl font-bold text-gray-900 mt-2">{{ $totalProducts }}</h3>
                    <p class="text-sm text-gray-500 mt-2">Produk yang dijual</p>
                </div>
                <div class="bg-gradient-to-br from-amber-500 to-amber-600 p-4 rounded-xl shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-200">
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Aktif
                </span>
            </div>
        </div>

        <!-- Total Clicks Card -->
        <div class="glassmorphism rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Klik</p>
                    <h3 class="text-4xl font-bold text-gray-900 mt-2">{{ array_sum($clickStats['data']) }}</h3>
                    <p class="text-sm text-gray-500 mt-2">Link diklik minggu ini</p>
                </div>
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-xl shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-200">
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    +12% dari minggu lalu
                </span>
            </div>
        </div>

        <!-- Total Views Card -->
        <div class="glassmorphism rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Lihat</p>
                    <h3 class="text-4xl font-bold text-gray-900 mt-2">{{ array_sum($viewStats['data']) }}</h3>
                    <p class="text-sm text-gray-500 mt-2">Link dilihat minggu ini</p>
                </div>
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-4 rounded-xl shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-200">
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-purple-100 text-purple-800">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    +8% dari minggu lalu
                </span>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Clicks Chart -->
        <div class="glassmorphism rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Klik Link</h3>
                    <p class="text-sm text-gray-600 mt-1">7 hari terakhir</p>
                </div>
                <div class="glassmorphism p-3 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="glassmorphism rounded-xl p-4">
                <canvas id="clicksChart" height="250"></canvas>
            </div>
        </div>

        <!-- Views Chart -->
        <div class="glassmorphism rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Lihat Link</h3>
                    <p class="text-sm text-gray-600 mt-1">7 hari terakhir</p>
                </div>
                <div class="glassmorphism p-3 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="glassmorphism rounded-xl p-4">
                <canvas id="viewsChart" height="250"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        function initCharts() {
            // Clicks Chart
            const clicksCtx = document.getElementById('clicksChart');
            if (clicksCtx) {
                // Destroy existing chart if it exists
                if (window.clicksChartInstance) {
                    window.clicksChartInstance.destroy();
                }

                window.clicksChartInstance = new Chart(clicksCtx, {
                    type: 'line',
                    data: {
                        labels: @json($clickStats['labels']),
                        datasets: [{
                            label: 'Jumlah Klik',
                            data: @json($clickStats['data']),
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            borderColor: 'rgba(59, 130, 246, 1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 7,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                cornerRadius: 8,
                                titleFont: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    size: 13
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    font: {
                                        size: 12
                                    }
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                ticks: {
                                    font: {
                                        size: 12
                                    }
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            // Views Chart
            const viewsCtx = document.getElementById('viewsChart');
            if (viewsCtx) {
                // Destroy existing chart if it exists
                if (window.viewsChartInstance) {
                    window.viewsChartInstance.destroy();
                }

                window.viewsChartInstance = new Chart(viewsCtx, {
                    type: 'line',
                    data: {
                        labels: @json($viewStats['labels']),
                        datasets: [{
                            label: 'Jumlah Lihat',
                            data: @json($viewStats['data']),
                            backgroundColor: 'rgba(168, 85, 247, 0.1)',
                            borderColor: 'rgba(168, 85, 247, 1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: 'rgba(168, 85, 247, 1)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 7,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                cornerRadius: 8,
                                titleFont: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    size: 13
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    font: {
                                        size: 12
                                    }
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                ticks: {
                                    font: {
                                        size: 12
                                    }
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }
        }

        // Initialize charts on page load
        document.addEventListener('DOMContentLoaded', initCharts);

        // Re-initialize charts on Livewire navigation
        document.addEventListener('livewire:navigated', initCharts);
    </script>
</div>
