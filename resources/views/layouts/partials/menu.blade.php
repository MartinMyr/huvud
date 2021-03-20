<div id="side-menu">
    <div class="minimize"></div>
    <div class="profile">
        <div class="img"></div>
        <div class="info">
            <span>{{$user->name}}</span>
            <span>{{$user->email}}</span>
        </div>
    </div>

    <div class="menu-items">
        <div class="item">
            <a href="">Ny registrering</a>
        </div>
        <div class="item">
            <a href="">Översikt</a>
        </div>
        <div class="item">
            <a href="{{ url('/logout') }}">Logga ut</a>
        </div>
    </div>
</div>
