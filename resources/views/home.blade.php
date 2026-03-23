<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Event</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 min-h-screen font-sans">

    <main class="p-8">
        <div class="max-w-6xl mx-auto">
            <!-- Bagian Atas: Sapaan -->
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Hi, Selamat Datang! 👋</h1>
                    <p class="text-slate-500 mt-1">Ini adalah ringkasan data event yang Anda miliki.</p>
                </div>
                <div>
                    <a href="{{ route('event') }}"
                        class="bg-blue-600 text-white px-6 py-2.5 rounded-2xl font-semibold hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                        Lihat Halaman Event
                    </a>
                </div>
            </div>

            <!-- Barisan Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <!-- Total Event -->
                <div class="bg-white p-6 rounded-[2rem] border-4 border-slate-100 shadow-sm">
                    <div
                        class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-4 text-xl">
                        📅
                    </div>
                    <h3 class="text-slate-500 font-medium">Total Event</h3>
                    <p class="text-3xl font-bold text-slate-800 mt-1">{{ $totalEvents }}</p>
                </div>

                <!-- Total Pendaftar -->
                <div class="bg-white p-6 rounded-[2rem] border-4 border-slate-100 shadow-sm text-xl">
                    <div
                        class="w-12 h-12 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center mb-4">
                        👥
                    </div>
                    <h3 class="text-slate-500 font-medium">Pendaftar</h3>
                    <p class="text-3xl font-bold text-slate-800 mt-1">{{ $totalBookings }}</p>
                </div>

                <!-- Event Aktif -->
                <div class="bg-white p-6 rounded-[2rem] border-4 border-slate-100 shadow-sm text-xl">
                    <div
                        class="w-12 h-12 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-4">
                        ✅
                    </div>
                    <h3 class="text-slate-500 font-medium">Event Aktif</h3>
                    <p class="text-3xl font-bold text-slate-800 mt-1">{{ $availableEvents }}</p>
                </div>

                <!-- Total Kursi -->
                <div class="bg-white p-6 rounded-[2rem] border-4 border-slate-100 shadow-sm text-xl">
                    <div
                        class="w-12 h-12 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mb-4">
                        💺
                    </div>
                    <h3 class="text-slate-500 font-medium">Total Kursi</h3>
                    <p class="text-3xl font-bold text-slate-800 mt-1">{{ $totalSeats }}</p>
                </div>
            </div>

            <!-- Tabel Event Terbaru -->
            <div class="bg-white rounded-[2.5rem] border-4 border-slate-100 shadow-sm overflow-hidden">
                <div class="p-8 border-b border-slate-100 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-slate-800">Event Terbaru</h2>
                    <a href="{{ route('event') }}" class="text-blue-600 font-semibold hover:underline">
                        Lihat Semua
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50">
                                <th class="px-8 py-4 text-slate-500 font-semibold text-sm uppercase">Nama Event</th>
                                <th class="px-8 py-4 text-slate-500 font-semibold text-sm uppercase">Tanggal</th>
                                <th class="px-8 py-4 text-slate-500 font-semibold text-sm uppercase">Lokasi</th>
                                <th class="px-8 py-4 text-slate-500 font-semibold text-sm uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($latestEvents as $item)
                                <tr class="hover:bg-slate-50/50 transition duration-300">
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-3">
                                            @if($item->photo)
                                                <img src="{{ asset('storage/' . $item->photo) }}"
                                                    class="w-10 h-10 rounded-xl object-cover border border-slate-200">
                                            @else
                                                <div
                                                    class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-400 font-bold">
                                                    {{ substr($item->name_event, 0, 1) }}
                                                </div>
                                            @endif
                                            <span class="font-bold text-slate-700">{{ $item->name_event }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 text-slate-600">
                                        {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                                    </td>
                                    <td class="px-8 py-5 text-slate-600">{{ $item->location }}</td>
                                    <td class="px-8 py-5">
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide
                                                {{ $item->is_available ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ $item->is_available ? 'Aktif' : 'Selesai' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-10 text-center text-slate-400 italic">
                                        Belum ada event yang dibuat.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>

</html>