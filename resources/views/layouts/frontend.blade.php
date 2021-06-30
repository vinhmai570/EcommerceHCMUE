<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" />
    @include('frontend.components.styles')
    <title>Home</title>
</head>
<body>
    @include('frontend.components.header')
    @include('frontend.components.content')
    @include('frontend.components.footer')
    @include('frontend.components.scripts')
    @include('frontend.components.live_chat')
</body>
</html>
