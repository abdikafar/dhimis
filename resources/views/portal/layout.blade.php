<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dhimis Shop Portal</title>
    <style>
        :root { --bg:#0f1115; --card:#191c24; --ink:#eef1f6; --muted:#9aa3b2; --brand:#7c5cff; --line:#272b36; --danger:#ff5c7c; }
        * { box-sizing: border-box; }
        body { margin:0; background:var(--bg); color:var(--ink); font:15px/1.5 -apple-system,Segoe UI,Roboto,sans-serif; }
        header { display:flex; align-items:center; justify-content:space-between; padding:16px 22px; border-bottom:1px solid var(--line); }
        header .brand { font-weight:700; font-size:18px; }
        header .brand span { color:var(--brand); }
        main { max-width:900px; margin:0 auto; padding:24px 18px; }
        a { color:var(--brand); text-decoration:none; }
        .btn { display:inline-block; background:var(--brand); color:#fff; border:none; padding:10px 16px; border-radius:10px; font-weight:600; cursor:pointer; font-size:14px; }
        .btn.ghost { background:transparent; border:1px solid var(--line); color:var(--ink); }
        .btn.danger { background:var(--danger); }
        .card { background:var(--card); border:1px solid var(--line); border-radius:14px; padding:16px; }
        table { width:100%; border-collapse:collapse; }
        th, td { text-align:left; padding:12px 10px; border-bottom:1px solid var(--line); }
        th { color:var(--muted); font-size:12px; text-transform:uppercase; letter-spacing:.04em; }
        .tag { background:#232733; color:var(--muted); padding:2px 8px; border-radius:999px; font-size:12px; }
        .off { color:#58d6a0; font-weight:700; }
        label { display:block; margin:14px 0 6px; color:var(--muted); font-size:13px; }
        input { width:100%; padding:11px 12px; border-radius:10px; border:1px solid var(--line); background:#11141b; color:var(--ink); font-size:15px; }
        .row { display:flex; gap:14px; }
        .row > div { flex:1; }
        .status { background:#17301f; border:1px solid #275c3b; color:#8ff0bc; padding:10px 14px; border-radius:10px; margin-bottom:16px; }
        .error { color:var(--danger); font-size:13px; margin-top:6px; }
        .actions { display:flex; gap:8px; }
        .muted { color:var(--muted); }
        .top { display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; }
    </style>
</head>
<body>
    <header>
        <div class="brand">Dhimis <span>Shop Portal</span></div>
        @if(session('portal_authed'))
            <form method="POST" action="{{ route('portal.logout') }}">
                @csrf
                <button class="btn ghost" type="submit">Log out</button>
            </form>
        @endif
    </header>
    <main>
        @if(session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
