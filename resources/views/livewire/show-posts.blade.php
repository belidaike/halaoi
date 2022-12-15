<div class="container">
    <div class="row d-flex justify-content-around">
        @foreach($users as $user)
        @if($user['gender'] == 'male')
        <div class="text-center col-sm-3 male card-body mt-3 border">
            <img width="89" src="/images/male.png" class="" alt="">
            <p><h5>{{ $user->name }} {{ $user->lname }}</h5></p>
        </div>
        @endif

        @if($user['gender'] == 'female')
        <div class="text-center col-sm-3 card-body female mt-3 ">
            <img width="89" src="/images/female.png" class="" alt="">
            <p><h5 >{{ $user->name }} {{ $user->lname }}</h5></p>
           
        </div>
        @endif

      
    
        @endforeach
    </div>
</div>
<style>
    .male{
        background-color: rgb(31, 31, 212);
        border-radius: 2em;
    }
    .female{
        background-color: #eb4b95;
        border-radius: 2em;
    }
    h5{
        background-color: white;
        border-radius: 2em;
    }
</style>