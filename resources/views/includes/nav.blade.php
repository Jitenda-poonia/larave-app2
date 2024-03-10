<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="{{asset('assets/img/user.png')}}" class="img-thumbnail" />

                    <div class="inner-text">
                        Jhon Deo Alex
                    <br />
                        <small>Last Login : 2 Weeks Ago </small>
                    </div>
                </div>

            </li>


            <li>
                <a class="active-menu" href="index.html"><i class="fa fa-dashboard "></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop "></i> Manage User<span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('user.create')}}"><i class="fa fa-user"></i>Add User</a>
                    </li>
                    <li>
                        <a href="{{route('user.index')}}"><i class="fa fa-users "></i>User List</a>
                    </li>
                    
                   
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop "></i> Manage Page<span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('page.create')}}"><i class="fa fa-user"></i>Add page</a>
                    </li>
                    <li>
                        <a href="{{route('page.index')}}"><i class="fa fa-users "></i> Page List</a>
                    </li>
                    
                   
                </ul>
            </li>
            
                

        </ul>

    </div>

</nav>