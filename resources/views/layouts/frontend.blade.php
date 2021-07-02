<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" />
    @include('frontend.components.styles')
    <title>Home</title>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60dc7fd8315d7b0012983500&product=sticky-share-buttons" async="async"></script>
</head>
<body>
    @include('frontend.components.header')
    @include('frontend.components.content')
    @include('frontend.components.share_this')
    @include('frontend.components.footer')
    @include('frontend.components.scripts')
    @include('frontend.components.live_chat')
</body>
</html>
