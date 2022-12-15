<div>
  
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
  
    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif
  
    <table class="table table-bordered mt-5">
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Title</th>
                <th>Body</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr class="text-center">
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>
                <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
            @foreach($users as $user)
            @if($user['gender'] == 'male')
            <div class="text-center col-sm-3 male card-body bg-danger">
                <img width="89" src="/images/male.png" class="" alt="">
                <p>My name is ->{{ $user->name }} My last name is->{{ $user->lname }}</p>
            </div>
            <div class="text-center col-sm-3 male card-body bg-info">
                <p>{{ $user->name }}</p>
                <p>{{ $user->lname }}</p>
            </div>
            <div class="text-center col-sm-3 male card-body bg-info">
                <p>{{ $user->name }}</p>
                <p>{{ $user->lname }}</p>
            </div>
            @endif

            @if($user['gender'] == 'female')
            <div class="text-center col female col bg-warning">
                <p>{{$user->name}}</p>
                <p>{{$user->lname}}</p>
            </div>
            @endif

            @endforeach
    </div>
</div>


<style>
    .img{
    }
</style>