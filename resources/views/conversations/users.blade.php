<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<div class="col-md-12 " style="overflow:scroll; height:400px;">

   
    <div class="list-group" >
     @foreach ($users as $user)
    <a href="{{ route('conversations.show', $user->id) }}" class="list-group-item list-group-item-action border-0">
						<div class="badge bg-success float-right">5</div>
						<div class="d-flex align-items-start">
							<img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
							<div class="flex-grow-1 ml-3">
							{{ $user->name }}
								<div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
							</div>
						</div>
					</a>
  @endforeach
    </div>
</div>
