<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale()==='ar' ? 'rtl' : 'ltr' }}">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>@yield('title', config('app.name'))</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><style>body{background:#f8fafc}.hero{background:linear-gradient(135deg,#0f766e,#134e4a);color:#fff}.menu-card{height:100%}.price{font-weight:700}.brand-dot{width:10px;height:10px;border-radius:50%;display:inline-block;background:#0f766e}</style></head>
<body>
<nav class="navbar navbar-expand-lg bg-white border-bottom"><div class="container"><a class="navbar-brand fw-bold" href="{{ route('home') }}"><span class="brand-dot me-2"></span>Laravel Digital Menu</a><form method="post" action="{{ route('locale.switch') }}" class="ms-auto">@csrf<input type="hidden" name="locale" value="{{ app()->getLocale()==='ar' ? 'en' : 'ar' }}"><button class="btn btn-outline-secondary btn-sm">{{ app()->getLocale()==='ar' ? 'English' : 'العربية' }}</button></form></div></nav>
@yield('content')
<footer class="py-4 text-center text-secondary small">Open-source Laravel Digital Menu · Built by Aya Aljaidi</footer>
</body></html>