<header class="bg-dark">
    <div class="w-100 d-flex justify-content-between">

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
                <p class="nav-link text-white">{{ Auth::user()->name }}</p>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button style="font-size: .7rem" type="submit" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i></button>
                </form>
            </li>
        </ul>
    </div>
</header>
