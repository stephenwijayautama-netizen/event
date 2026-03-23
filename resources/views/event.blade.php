<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100">
    <div class="flex justify-center items-center min-h-screen py-10">
        <div class="w-[550px] bg-[#2563eb] rounded-[3rem] border-8 border-white shadow-2xl overflow-hidden pb-10">

            <!-- Header -->
            <div class="pt-12 px-10">
                <h1 class="text-white text-4xl font-bold tracking-tight">Daftar Event</h1>
                <p class="text-blue-100 text-lg mt-2 font-medium opacity-90">
                    Pilih event yang menarik untuk Anda ikuti
                </p>
            </div>

            <!-- Event List -->
            <div class="mt-8 px-6 space-y-4 max-h-[500px] overflow-y-auto custom-scrollbar">

                @forelse ($event as $item)
                    <div
                        class="bg-white/10 backdrop-blur-md rounded-3xl p-4 border border-white/20 flex items-center gap-4 hover:bg-white/20 transition-all cursor-pointer group">

                        <!-- Photo -->
                        <div class="w-24 h-24 rounded-2xl overflow-hidden flex-shrink-0 border-2 border-white/30">
                            @if($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name_event }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div
                                    class="w-full h-full bg-blue-400 flex items-center justify-center text-white font-bold text-xl">
                                    {{($item->name_event) }}
                                </div>
                            @endif
                        </div>

                        <!-- Detail -->
                        <div class="flex-grow">
                            <h2 class="text-white text-xl font-bold line-clamp-1">
                                {{ $item->name_event }}
                            </h2>

                            <div class="mt-1 space-y-0.5 text-blue-100 text-sm opacity-80">

                                <!-- Date -->
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $item->date }}
                                </div>

                                <!-- Location -->
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $item->location }}
                                </div>

                            </div>
                        </div>

                        <!-- Action -->
                        <a href="{{ route('daftar', ['event_id' => $item->id]) }}"
                            class="bg-white text-blue-600 p-2.5 rounded-full hover:scale-110 transition-transform shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>

                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-white/60 font-medium italic">
                            Belum ada event tersedia saat ini.
                        </p>
                    </div>
                @endforelse

            </div>

            <!-- Footer -->
            <div
                class="mt-8 px-10 pt-6 border-t border-white/10 flex justify-between items-center text-white/50 text-sm">
                <span>Total: {{ $event->count() }} Event</span>
                <span>© 2024 Event App</span>
            </div>

        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.4);
        }
    </style>

</body>

</html>