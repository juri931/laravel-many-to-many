<header>
    <div class="container d-flex justify-content-between">

        <ul class="nav">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.home') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="{{ route('home') }}">Vai al sito</a>
      </li>
    </ul>
    <ul class="nav">
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </li>
    </ul>
    </div>
</header>
