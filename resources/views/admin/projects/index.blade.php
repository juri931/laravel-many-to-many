@extends('layouts.admin')

@section('content')
    <h2>Progetti</h2>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif

    <div class="my-4">
        <form action="{{ route('admin.projects.store') }}" method="POST" class="d-flex">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Nuovo Progetto" name="name">
            <button class="btn btn-outline-success" type="submit">Invia</button>
        </form>
    </div>

    <table class="table crud-table">
        <thead>
            <tr class="text-center">
                <th scope="col">Progetti</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Tecnologia</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($project as $project)
                <tr>
                    <td>
                        <form
                            action="{{ route('admin.projects.update', $project) }}"
                            method="POST"
                            id="form-edit-{{ $project->id }}">
                            @csrf
                            @method('PUT')
                            <input type="text" value="{{ $project->name }}" name="name">
                        </form>
                    </td>

                    <td>{{ $project->type->name }}</td>

                    <td class="technology">
                        @forelse ($project->technologies as $technology)
                            <li>{{ $technology->name }}</li>
                        @empty
                            <li>Nessuna tecnologia</li>
                        @endforelse
                    </td>


                    <td class="d-flex gap-1">
                        <a
                            class="btn btn-success"
                            href="{{ route('admin.projects.show', $project) }}">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <form
                            action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                            onsubmit="return confirm('Sicuro di voler eliminare il progetto {{ $project->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function submitForm(id) {
            const form = document.getElementById(`form-edit-${id}`);
            form.submit();
        }
    </script>
@endsection
