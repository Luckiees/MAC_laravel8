<html>
    <head>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-salce=1">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
        <title>laravel</title>
    </head>
    <body>
    	<h2>게시판 입니다</h2>
        <hr>
    	@yield('content')
        
    </body>
</html>