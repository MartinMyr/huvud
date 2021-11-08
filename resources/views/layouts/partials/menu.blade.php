<div id="side-menu">
    <div class="minimize"></div>
    <div class="profile">
        <a href="{{route('profile')}}">
            @if(isset($user->profile_img))
                <div
                    class="img"
                    style="background:url({{url('/images/'.$user->profile_img)}})"
                ></div>
            @elseif(empty($data->coverphoto) || $data->coverphoto == null)
                <div class="img"></div>
            @endif


        </a>
        <div class="info">
            <span>{{$user->name}}</span>
            <span>{{$user->email}}</span>
        </div>
    </div>

    <div class="menu-items">
        <div class="item">
            <a href="{{route('register')}}">Ny registrering</a>
        </div>
        <div class="item">
            <a href="{{route('dashboard')}}">Översikt</a>
        </div>
        <div class="item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</div>
