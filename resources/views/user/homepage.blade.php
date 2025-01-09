@extends('user.navbar')

@section('container')
    <!-- Banner Slider -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://d2v6npc8wmnkqk.cloudfront.net/storage/tinymce/fk3yZnI0oN3jxuGyJcONzvB18qejKobYLDE1USnM.jpg"
                    alt="Banner 1" class="w-full h-[600px] object-cover">
            </div>
            <div class="swiper-slide">
                <img src="https://d2v6npc8wmnkqk.cloudfront.net/storage/tinymce/fk3yZnI0oN3jxuGyJcONzvB18qejKobYLDE1USnM.jpg"
                    alt="Banner 2" class="w-full h-[600px] object-cover">
            </div>
            <div class="swiper-slide">
                <img src="https://d2v6npc8wmnkqk.cloudfront.net/storage/tinymce/fk3yZnI0oN3jxuGyJcONzvB18qejKobYLDE1USnM.jpg"
                    alt="Banner 3" class="w-full h-[600px] object-cover">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Trending Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($barangs as $barang)
                <div class="bg-white p-6 rounded-lg shadow-md overflow-hidden relative">
                    @if ($barang->discount)
                        <span
                            class="absolute top-4 left-4 bg-red-600 p-2 text-white font-semibold rounded-full">{{ $barang->discount }}%</span>
                    @endif
                    <img src="http://127.0.0.1:8000{{ $barang->image_url }}" alt="Product {{ $barang->id }}"
                        class="w-full h-48 rounded-md object-contain bg-gray-100">
                    <div class="pt-2">
                        <h3 class="text-lg font-semibold">{{ $barang->name }}</h3>
                        @if ($barang->discount)
                            <div class="flex gap-3">
                                <p class="text-gray-600 mt-2 font-semibold">
                                    Rp{{ $barang->price - ($barang->price * $barang->discount) / 100 }}</p>
                                <p class="text-gray-600 mt-2 line-through">Rp{{ $barang->price }}</p>
                            </div>
                        @else
                            <p class="text-gray-600 mt-2">Rp{{ $barang->price }}</p>
                        @endif
                        <a href="{{ url('/product/' . $barang->id) }}">
                            <button
                                class="mt-4 w-full border-2 border-gray-500 text-gray-600 py-2 rounded-md hover:bg-gray-600 hover:text-white hover:font-semibold transition duration-300">Detail</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center w-full">
            <a href="/product">
                <button class="mt-10 w-fit px-8 bg-blue-600 text-white py-2 rounded-md">
                    Lihat semua
                </button>
            </a>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div>
            <h2 class="text-2xl font-bold mb-6">Kata mereka</h2>

        </div>
    </div>
    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            loop: true,
        });
    </script>
@endsection
