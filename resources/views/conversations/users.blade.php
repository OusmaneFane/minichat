<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<div class="col-md-3">

    <div class="list-group">
        @foreach ($users as $user)
          <a class="list-group-item" href="{{ route('conversations.show', $user->id) }}"><i class="bi bi-person-circle"></i> {{ $user->name }}</a>
        @endforeach
    </div>

</div>
