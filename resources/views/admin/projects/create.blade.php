@extends('layouts.admin')

@section('content')

<h1>Form creazione progetto</h1>
<form action="{{route('admin.projects.store')}}" method="POST">

@endsection
