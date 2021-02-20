<div class="blog-masthead" style="margin-bottom: 0rem; padding:0%; margin:0%">
  <div class="container">
    <nav class="nav blog-nav" style="margin-bottom: 0rem; padding:0%; margin:0%">
      <a class="nav-link active" href="/homepage">Home page</a>
      <a class="nav-link" href="#">News</a>
      <a class="nav-link" href="#">Edu centers</a>
      <a class="nav-link" href="#">About the site</a>
      @guest
        <a class="nav-link" href="/login">Log in</a>
      @endguest
      @auth
        @if (auth()->user()->roleName() == 'admin' )
          <a class="nav-link" href="/report"> Report</a>
        @endif
        <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
        <a class="nav-link" href="/logout"> Log out</a>
      @endauth
    </nav>
  </div>
</div>