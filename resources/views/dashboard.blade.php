<x-app-layout>
    <!-- 🌪️ Bản đồ thời tiết Windy -->
    <div class="relative w-full h-[70vh] rounded-2xl overflow-hidden shadow-xl mt-4 border border-white/10">
        <iframe
            class="w-full h-full"
            src="https://embed.windy.com/embed2.html?lat=15.5&lon=108.0&zoom=5&level=surface&overlay=wind&menu=&message=true&marker=&calendar=&pressure=true&type=map&location=coordinates"
            frameborder="0"
        ></iframe>

        <div class="absolute bottom-4 left-4 bg-black/50 text-white text-sm px-3 py-1.5 rounded-lg backdrop-blur-md border border-white/10">
            <span>🌀 Nguồn dữ liệu: Windy (Cập nhật theo thời gian thực)</span>
        </div>
    </div>

    <!-- 🌐 Nội dung Dashboard -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 dark:bg-gray-900/40 overflow-hidden shadow-lg sm:rounded-2xl border border-white/10 backdrop-blur-lg">
                <div class="p-8 space-y-10 text-slate-200">

                    {{-- 🛡️ Trạng thái an toàn --}}
                    <div class="bg-gradient-to-br from-sky-900/30 to-sky-700/10 border border-sky-500/20 rounded-2xl p-6 shadow-lg hover:shadow-sky-500/20 transition-all duration-300">
                        <div class="flex justify-between items-center flex-wrap gap-6">
                            <div class="flex items-center gap-4">
                                <div class="p-3 bg-sky-500/20 rounded-xl border border-sky-400/30">
                                    <svg class="w-9 h-9 text-sky-400 drop-shadow-[0_0_10px_#38bdf8]" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-semibold text-sky-400">Bạn đang an toàn</h2>
                                    <p class="text-slate-300 mt-1">Không có cảnh báo khẩn cấp trong bán kính 10km.</p>
                                    <p class="text-xs text-slate-500 mt-1">Cập nhật: 2 phút trước</p>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <a href="/alerts"
                                   class="px-5 py-2 rounded-lg bg-white/10 hover:bg-white/20 border border-white/20 text-slate-100 backdrop-blur-sm transition-all duration-300">
                                   Xem cảnh báo
                                </a>
                                <button
                                   class="px-5 py-2 rounded-lg bg-sky-500 hover:bg-sky-400 text-white shadow-[0_0_12px_rgba(56,189,248,0.5)] transition-all duration-300">
                                   Gửi SOS
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- ⚡ Hành động nhanh --}}
                    <div class="bg-white/10 dark:bg-white/5 backdrop-blur-xl border border-white/20 p-6 rounded-2xl shadow-lg">
                        <h4 class="text-sm font-semibold mb-4 text-slate-300 uppercase tracking-wider">Hành động nhanh</h4>
                        <div class="flex flex-wrap gap-3">
                            <button
                                class="flex items-center gap-2 px-4 py-3 rounded-xl bg-sky-500/30 hover:bg-sky-500/40 border border-sky-400/20 text-white font-medium shadow-[0_0_15px_rgba(56,189,248,0.25)] transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M12 3v18" />
                                </svg>
                                Báo cáo nhanh
                            </button>

                            <button
                                class="flex items-center gap-2 px-4 py-3 rounded-xl bg-emerald-500/30 hover:bg-emerald-500/40 border border-emerald-400/20 text-white font-medium shadow-[0_0_15px_rgba(16,185,129,0.25)] transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 20h9" />
                                </svg>
                                Hỗ trợ khẩn cấp
                            </button>

                            <button
                                class="flex items-center gap-2 px-4 py-3 rounded-xl bg-indigo-500/30 hover:bg-indigo-500/40 border border-indigo-400/20 text-white font-medium shadow-[0_0_15px_rgba(99,102,241,0.25)] transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m7-7v14" />
                                </svg>
                                Gửi vị trí
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
