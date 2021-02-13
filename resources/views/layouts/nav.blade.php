<div class="blog-masthead" style="margin-bottom: 0rem; padding:0%; margin:0%">
  <div class="container">
    <nav class="nav blog-nav" style="margin-bottom: 0rem; padding:0%; margin:0%">
      <a class="nav-link active" href="/homepage">Asosiy sahifa</a>
      <a class="nav-link" href="#">yangiliklar</a>
      <a class="nav-link" href="#">o`quv markazlari</a>
      <a class="nav-link" href="#">sayt haqida</a>
      @guest
        <a class="nav-link" href="/login">Kirish</a>
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