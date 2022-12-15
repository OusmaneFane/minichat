@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

@section('content')
<div class="container">
    <div class="row">
        @include('conversations.users', ['users' =>$users])
        <div class="col-md-9">
            <div class="card">
                <div class="card-header ">{{ $user->name }}</div>
                <div class="card-body conversations">
                    @foreach ($messages as $message )
                        <div class="row">
                            <div class="div col-md-10">
                                @if($message->from_id == $current_user->id)
                                    <p >
                                        {{-- <strong style="color: red">{{ $current_user->name }}</strong><br> --}}
                                        <strong style="color: red">moi</strong><br>

                                        {{ $message->content }}
                                    </p>
                                @else
                                    <p>
                                        <strong style="color: blue">{{ $user->name }}</strong><br>
                                        {{ $message->content }}
                                    </p>
                                @endif

                            </div>
                        </div>
                    @endforeach
                    <form action="" method="post">
                        @csrf
                      <div class="form-group">
                            <textarea name="content" placeholder="Ecrivez votre message"
                            class="form-control"></textarea>
                      </div class="mt-2">
                         <button class="btn btn-success mt-2" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
