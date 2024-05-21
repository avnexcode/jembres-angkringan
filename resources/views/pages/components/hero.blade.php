<div class="px-2">
    {{-- <div class="carousel w-full">
        <div id="item1" class="carousel-item w-full">
            <img src="{{ asset('images/angkringan.jpg') }}" class="w-full object-cover" />
        </div>
        <div id="item2" class="carousel-item w-full">
            <img src="{{ asset('images/menu1.jpg') }}" class="w-full object-cover" />
        </div>
        <div id="item3" class="carousel-item w-full">
            <img src="{{ asset('images/kelompok1.jpg') }}" class="w-full object-cover" />
        </div>
        <div id="item4" class="carousel-item w-full">
            <img src="{{ asset('images/kelompok2.jpg') }}" class="w-full object-cover" />
        </div>
    </div>
    <div class="flex justify-center w-full py-2 gap-2">
        <a href="#item1" class="btn btn-xs">1</a>
        <a href="#item2" class="btn btn-xs">2</a>
        <a href="#item3" class="btn btn-xs">3</a>
        <a href="#item4" class="btn btn-xs">4</a>
    </div> --}}
    <div class="carousel w-full h-[60vh]">
        <div id="slide1" class="carousel-item relative w-full">
            <img src="{{asset('images/angkringan.jpg')}}" class="w-full object-cover" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide4" class="btn btn-circle">❮</a>
                <a href="#slide2" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide2" class="carousel-item relative w-full">
            <img src="{{asset('images/menu1.jpg')}}" class="w-full object-cover" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide1" class="btn btn-circle">❮</a>
                <a href="#slide3" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide3" class="carousel-item relative w-full">
            <img src="{{asset('images/kelompok1.jpg')}}" class="w-full object-cover" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide2" class="btn btn-circle">❮</a>
                <a href="#slide4" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide4" class="carousel-item relative w-full">
            <img src="{{asset('images/kelompok2.jpg')}}" class="w-full object-cover" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide3" class="btn btn-circle">❮</a>
                <a href="#slide1" class="btn btn-circle">❯</a>
            </div>
        </div>
    </div>
</div>
