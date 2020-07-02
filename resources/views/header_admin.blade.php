<!--Header-part-->

<div id="header">
    <h1 ><a href="" style="color: white; ">HTBook</a></h1>
  </div>
  <!--close-Header-part--> 
  
  
  <!--top-Header-menu-->
  <div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
      <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome Admin</span></a>
        <ul class="dropdown-menu">
          @if (Auth::check())
            <li><a href="#"><i class="icon-user"></i>{{Auth::user()->fullname}}</a></li>
            <li class="divider"></li>
            <li><a href="{{route('dangxuat')}}"><i class="icon-key"></i> Đăng Xuất</a></li>
          @endif
        </ul>
      </li>
      <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Tin Nhắn</span> <span class="label label-important">5</span></a>
        <ul class="dropdown-menu">
          <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
          <li class="divider"></li>
          <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
          <li class="divider"></li>
          <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
          <li class="divider"></li>
          <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
        </ul>
      </li>
      <li class=""><a href="{{route('dangxuat')}}"><i class="icon icon-share-alt"></i> <span class="text">Đăng Xuất</span></a></li>
    </ul>
  </div>
  <!--close-top-Header-menu-->
  <!--start-top-serch-->
  <!--close-top-serch-->
  