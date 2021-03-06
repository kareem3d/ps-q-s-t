<!DOCTYPE HTML>
<html xmlns:ng="http://angularjs.org" id="ng-app" ng-app="qbrando">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>Qbrando | Online shop for luxury in Qatar</title>
    <link href='http://fonts.googleapis.com/css?family=Frijole' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('app/css/welcome.css') }}"/>

    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>

    <script src="{{ URL::asset('app/lib/respond.min.js') }}"></script>

    <!--[if lte IE 8]>
    <script src="{{ URL::asset('app/lib/json/json2.js') }}"></script>
    <![endif]-->

    <!--[if lte IE 8]>
    <script>
        document.createElement('cart-btn');
        document.createElement('buy-now-btn');
    </script>
    <![endif]-->

    @if($environment == 'production')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-29205808-4', 'qbrando.com');
        ga('send', 'pageview');

    </script>
    @endif

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=577875652285919";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    @yield('head')

</head>
<body ng-controller="MainController" ng-init="
cart.init('{{ $itemCookieKey }}', '{{ $giftCookieKey }}');
price.init('{{ $appCurrency }}');
@if($massOffer)
massOffer.init('{{ $massOffer->getClean('title') }}', '{{ $massOffer->getClean('description') }}', '{{ $massOffer->to_date }}', {{ $massOffer->start_quantity ?: 0 }}, {{ $massOffer->getStartPrice()->value() ?: 0 }}, {{ $massOffer->discount_percentage ?: 0 }}, {{ $massOffer->gifts_per_product ?: 0 }}, {{ $massOffer->getMaxGiftPrice()->value() ?: 0 }})
@endif
">


<div class="large-container">

    <div id='cssmenu'>
        <ul>
            <li><a href="{{ URL::route('home') }}"><span>Home</span></a></li>
            @foreach($categories as $category)
            <li class='has-sub'><a href="{{ URL::category($category) }}"><span>{{ $category->name }}</span></a>
                <ul>
                    @foreach($category->brands as $brand)
                    <li><a href='{{ URL::categoryAndBrand($category, $brand) }}'><span>{{ $brand->name }}</span></a></li>
                    @endforeach
                </ul>
            </li>
            @endforeach
            <li class="the-right">
                Contact us at {{ $contactUs->getMobileNumber() }}
            </li>
        </ul>
    </div>

    <div class="book-container" ng-controller="WelcomeController">


        <div class="left-page">

            <a href="{{ URL::route('home') }}"><div class="lp-logo"></div></a>
            <div class="lp-limitedoffer" ng-cloak>
                <h2>Limited offer</h2>
                <h3>Buy two get one for <b>free</b></h3>
                <p><span>@{{ timer.days }}</span> Days,
                    <span>@{{ timer.hours }}</span> Hours,
                    <span>@{{ timer.minutes }}</span> Minutes and
                    <span>@{{ timer.seconds }}</span> Seconds left</p>
            </div>

            <div class="lp-categories">
                <div class="lpc-category">
                    <div class="circle-image">
                        <a href="{{ URL::route('category', 'watches') }}"><img src="{{ URL::asset('app/img/products/watch.jpg') }}" alt=""/></a>
                    </div>
                    <h2><a href="{{ URL::route('category', 'watches') }}">Watches</a></h2>
                </div>
                <div class="lpc-category">
                    <div class="circle-image">
                        <a href="{{ URL::route('category', 'sunglasses') }}"><img src="{{ URL::asset('app/img/products/sunglass.jpg') }}" alt=""/></a>
                    </div>
                    <h2><a href="{{ URL::route('category', 'sunglasses') }}">Sunglasses</a></h2>
                </div>
            </div>
        </div>


        <div class="right-page">
            @include('partials.products.grid')
        </div>



    </div>

    @include('partials.static.footer')
</div>

@if($environment == 'production')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.12/angular.min.js"></script>
@else
<script src="{{ URL::asset('app/lib/jquery.min.js') }}"></script>
<script src="{{ URL::asset('app/lib/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('app/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ URL::asset('app/lib/angular/angular.min.js') }}"></script>
<script src="{{ URL::asset('app/lib/angular/angular-resource.min.js') }}"></script>
@endif

<script>
    var appCurrency = '{{ $appCurrency }}';
</script>

<script src="{{ URL::asset('app/js/app.js') }}"></script>
<script src="{{ URL::asset('app/js/services.js') }}"></script>
<script src="{{ URL::asset('app/js/controllers.js') }}"></script>
<script src="{{ URL::asset('app/js/filters.js') }}"></script>
<script src="{{ URL::asset('app/js/directives.js') }}"></script>

<script src="{{ URL::asset('app/lib/zoom/zoomsl-3.0.min.js') }}"></script>

@yield('scripts')

</body>
</html>