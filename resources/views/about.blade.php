@extends('app')
@section('content')
    <div id="about" style="width:90%;margin:auto;margin-bottom:100px;padding-top:120px">
        <h2 class="text-center" style="margin-bottom:25px;margin-top:25px">ABOUT ORRIN PARFUME</h2>
        <div style="display:flex;align-items: center;">
            <p style="margin-right:100px">Orrin Parfume brand parfum lokal asal Surabaya yang didirikan pada akhir tahun
                2021. Misi utama Orrin Parfume adalah menyediakan parfum berkualitas tinggi dengan menggunakan bahan-bahan
                terbaik dan harga yang terjangkau.

                Kualitas merupakan pijakan utama yang dipegang teguh oleh Orrin Parfume. Dengan berbekal pengetahuan
                mendalam tentang industri parfum dan pemahaman yang kuat tentang preferensi dan kebutuhan konsumen, Orrin
                Parfume memilih hanya menggunakan bahan-bahan parfum pilihan terbaik. Semua bahan yang digunakan dipilih
                dengan cermat untuk memastikan aroma yang eksklusif, memikat, dan tahan lama.</p>
            <img style="width:800px;height:479.57px;border-radius:10px" src="{{ asset('/about.webp') }}" alt="">
        </div>
    </div>
@endsection
