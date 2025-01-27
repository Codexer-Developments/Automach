<ul class="navigation clearfix">
    <li class="{{ request()->routeIs('home') ? 'current' : '' }}"><a href="{{ route('home') }}">Home</a></li>
    <li class="{{ request()->routeIs('about') ? 'current' : '' }}"><a href="{{ route('about') }}">About Us</a></li>
    <li class="{{ request()->routeIs('shop') ? 'current' : '' }}"><a href="{{ route('shop') }}">Shop</a></li>
    <li class="{{ request()->routeIs('faq') ? 'current' : '' }}"><a href="{{ route('faq') }}" >Faq's</a></li>
    <li class="{{ request()->routeIs('contact') ? 'current' : '' }}"><a href="{{ route('contact') }}">Contact Us</a></li>
</ul>