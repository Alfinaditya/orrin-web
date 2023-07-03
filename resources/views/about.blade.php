@extends('app')
@section('content')
    <div id="about" style="width:90%;margin:auto;margin-bottom:100px;padding-top:120px">
        <h2 class="text-center" style="margin-bottom:25px;margin-top:25px">ABOUT ORRIN PARFUME</h2>
        <div style="display:flex;align-items: center;">
            <p style="margin-right:100px">Orrin Parfume brand parfum lokal asal Surabaya yang didirikan pada akhir tahun
                2021. Misi utama Orrin Parfume adalah menyediakan parfum berkualitas tinggi dengan menggunakan bahan-bahan
                terbaik dan harga yang terjangkau.
                <br><br>
                Kualitas merupakan pijakan utama yang dipegang teguh oleh Orrin Parfume. Dengan berbekal pengetahuan
                mendalam tentang industri parfum dan pemahaman yang kuat tentang preferensi dan kebutuhan konsumen, Orrin
                Parfume memilih hanya menggunakan bahan-bahan parfum pilihan terbaik. Semua bahan yang digunakan dipilih
                dengan cermat untuk memastikan aroma yang eksklusif, memikat, dan tahan lama.
            </p>
            <img style="width:800px;height:479.57px;border-radius:8px" src="{{ asset('/about1.webp') }}" alt="">
        </div>
        <div style="display:flex;align-items: center;margin-top:80px">
            <img style="width:800px;height:479.57px;border-radius:8px" src="{{ asset('/about2.webp') }}" alt="">
            <div style="margin-left:100px">
                <h1>SEGERA HADIR!</h1>
                <p>"Bomshell" Aroma menggoda yang membuat semua orang tergila-gila. Segera hadir, campuran menakjubkan ini
                    akan memikatmu dengan daya tarik misterius dan pesona yang memabukkan.
                    </br></br>Bersiaplah untuk terhanyut oleh kekuatan ledakan bahan rahasia kami, karena Bomshell akan
                    membawa Anda dalam perjalanan olfaktori yang tak terlupakan. Tunggu peluncuran yang akan mengguncang
                    dunia.
                </p>
            </div>
        </div>
    </div>
@endsection
