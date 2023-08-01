<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap-grid.min.css" integrity="sha512-LLxZHu50SXdFJdAzHmDJAoLaozhTB4BYZPoN+xdTRjiPmPhI+1mEJXdoHHiDWmd/jj/9x10pkd8mYGG9sqfPPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-usVBAd66/NpVNfBge19gws2j6JZinnca12rAe2l+d+QkLU9fiG02O1X8Q6hepIpr/EYKZvKx/I9WsnujJuOmBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap-reboot.min.css" integrity="sha512-3qb5bclFXm56+XgqPRuD93Wxs84ZiFvfS0/yOxd66bMCw9jmW8ajv8F6fQPC968CV3sx0uWGjz3HHcXv6oWKMg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap-utilities.min.css" integrity="sha512-RedJTewoAggJO3Tss7j9iJUd0Pd03mq1fSEwYdk+pWkbqqSyfKtZmTywz92E0Fiq8bxxID2mPjCJPUn+YmlKrA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-light bg-light p-2">
    <a class="navbar-brand">THE BLOGGER</a>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn-sm btn-primary">Logout</button>
    </form>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js" integrity="sha512-72WD92hLs7T5FAXn3vkNZflWG6pglUDDpm87TeQmfSg8KnrymL2G30R7as4FmTwhgu9H7eSzDCX3mjitSecKnw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js" integrity="sha512-a6ctI6w1kg3J4dSjknHj3aWLEbjitAXAjLDRUxo2wyYmDFRcz2RJuQr5M3Kt8O/TtUSp8n2rAyaXYy1sjoKmrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script></body>
</html>
