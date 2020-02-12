<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/Profile')}}">Profile <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('SignOut') }}"  onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
SignOut
</a>

<form id="logout-form" action="{{ route('SignOut') }}" method="POST" style="display: none;">
@csrf
</form>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/Help')}}">Help</a>
        </li>
      </ul>
    </div>
  </nav>