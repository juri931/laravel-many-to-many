@extends('layouts.admin')

@section('content')

    <h1>Form creazione progetto</h1>

    <form action="{{route('admin.projects.store')}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group col-md-6">
                <label for="category">Categoria</label>
                <input type="text" class="form-control" name="category">
            </div>
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control dropdown dropdown-item-text" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary my-2">Invia</button>
        <button type="reset" class="btn btn-warning my-2">Reset</button>

    </form>


@endsection
