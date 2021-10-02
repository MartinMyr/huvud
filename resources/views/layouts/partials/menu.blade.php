<div id="side-menu">
    <div class="minimize"></div>
    <div class="profile">
        <a href="/profile">
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
            <a href="/register">Ny registrering</a>
        </div>
        <div class="item">
            <a href="/dashboard">Översikt</a>
        </div>
        <div class="item">
            <a href="{{ url('/logout') }}">Logga ut</a>
        </div>
    </div>
</div>
