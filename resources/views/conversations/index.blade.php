@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

@section('content')
<div class="container">
    @include('conversations.users', ['users' =>$users])

</div>
@endsection
