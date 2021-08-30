<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Labo Center') }}</title>
   <meta name="title" content="Labo Center">
   <meta name="description" content="Bizning firma 2018-yildan buyon o'z faolyatini olib burmoqda. Shu vaqtga qadar
    2500dan ziyod mashinalarga xizmat ko'rsatgan.">
   <meta name="robots" content="index, follow">
   <meta name="google" content="nositelinkssearchbox"/>

   <!-- Open Graph / Facebook -->
   <meta property="og:type" content="website">
   <meta property="og:url" content="https://labo-center.uz">
   <meta property="og:title" content="Labo Center">
   <meta property="og:description" content="The only service center for damas car.">
   <meta name="image" property="og:image" content="https://labo-center.netlify.app/img/website-screenshot.jpg">
   <meta property="og:image:alt" content="Labo car"/>
   <meta name="author" content="Mirodil Kamilov, Ibragimov Ibrohim">
   <meta name="theme-color" content="#2f2f2f"/>

   <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/png">
   <link rel="apple-touch-icon" href="{{ asset('img/favicon.ico') }}">

   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">

   <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
<!--Nav begin-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top header">
   <div class="container">
      <a class="navbar-brand" href="#">
         <img src="/img/LOGO.png" alt="Labo Center in Uzbekistan logo" width="48" height="48"
              class="d-inline-block align-text-top">
         Labo Center
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <a class="nav-link" aria-current="#" href="#aboutUs">Biz haqimizda</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#prices">Xizmat turlari</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#example">Mahsulotlarimizdan namunalar</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#footer">Biz bilan bog'lanish</a>
            </li>
         </ul>
         <div class="application-btn-container">
            <button class="btn btn-outline-logo" data-bs-toggle="modal" data-bs-target="#applicationModal">
               Ariza qoldiring
            </button>
         </div>
      </div>
   </div>
</nav>
<!--Nav end-->

<!--Application modal begin-->
<div class="modal fade" id="applicationModal" aria-labelledby="applicationModalLabel" data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="applicationModalLabel">
               Arizangizni qoldiring va biz siz bilan albatta bog'lanamiz
            </h5>
            <button type="button" class="btn-close btn-close-white" aria-label="Close"
                    data-bs-dismiss="modal"></button>
         </div>
         <div class="modal-body">
            <form action="{{ route('applications.store') }}" method="post" id="application-form">
               @csrf
               <div class="mb-3">
                  <label for="name" class="form-label">Ism, familyangiz</label>
                  <input name="name" value="{{ old('name') }}" type="text"
                         class="form-control @error('name') is-invalid @enderror"
                         id="name" aria-describedby="name"
                         autofocus autocomplete="false">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
               <div class="mb-3">
                  <label for="phone-number" class="form-label">Telefon raqamingiz</label>
                  <input name="phone" value="{{ old('phone') ?? '+998 ' }}" type="text"
                         class="form-control @error('phone') is-invalid @enderror" id="phone-number"
                         aria-describedby="phone-number">
                  @error('phone')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
               <div class="mb-3">
                  <label for="message" class="form-label">Sizning xabaringiz</label>
                  <textarea name="message" value="" class="form-control @error('message') is-invalid @enderror"
                            id="message"
                            aria-describedby="message">{{ old('name') }}</textarea>
                  @error('message')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
            <button form="application-form" type="submit" class="btn btn-logo">Jo'natish
            </button>
            @push('prevent-application-form-submit')
               <script>
                   let clickBtn = 0;
                   $('#application-form').submit(function (e) {
                       ++clickBtn;
                       if (clickBtn > 1) {
                           e.preventDefault();
                       }
                   });
               </script>
            @endpush
         </div>
      </div>
   </div>
</div>

@if($errors->any())
   @push('show-application-modal')
      <script>
          var applicationModal = new bootstrap.Modal($('#applicationModal'), {
              keyboard: false
          });

          $(document).ready(function () {
              applicationModal.show();
          });
      </script>
   @endpush
@endif
<!--Modal end-->

@yield('content')

<!--Success modal begin-->
@php $hasError = session('error') !== null; @endphp
<div class="modal fade success-modal" id="successModal" aria-labelledby="successModalLabel" data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="btn-close btn-close-white" aria-label="Close"
                    data-bs-dismiss="modal"></button>
         </div>
         <div class="modal-body">
            <img src="{{ $hasError ? '/img/error.svg' : '/img/success.svg' }}" alt="success logo">
            <h5>{{ $hasError ? __(session('error')) : __(session('success')) }}</h5>
         </div>
         <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
         </div>
      </div>
   </div>
</div>
<!--Modal end-->


<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js"
        integrity="sha512-2fk3Q4NXPYAqIha0glLZ2nluueK43aNoxvijPf53+DgL7UW9mkN+uXc1aEmnZdkkZVvtJZltpRt+JqTWc3TS3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/ScrollTrigger.min.js"
        integrity="sha512-jNJOCd1PIjJoUa1XTDKaPdBLNUe4OJTrltKG+70O5ghYZ943nTRGIzjObwC2JtSm1fG7T06GbUApR2eirIU/jA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('js/custom.js') }}"></script>

@stack('show-application-modal')
@stack('prevent-application-form-submit')

@if(session('error') || session('success'))
   <script>
       var successModal = new bootstrap.Modal($('#successModal'), {
           keyboard: false
       });

       $(document).ready(function () {
           successModal.show();
       });
   </script>
@endif
</body>

</html>