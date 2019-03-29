<br>
<?php $controller = class_basename(\Route::current()->controller); ?>

<li class="nav-item start <?php if ($controller == "DashboardController") echo 'active';?>">
    <a href="{{ url('/cwadmin/dashboard') }}" class="nav-link nav-toggle">
        <i class="icon-home">
        </i>
        <span class="title">
			Dashboard
		</span>
        <span class="selected">
		</span>
    </a>
</li>

<li class="nav-item start <?php if ($controller == "CustomerController") echo 'active'; ?>">
    <a href="{{ url('/cwadmin/users') }}" class="nav-link nav-toggle">
        <i class="icon-users">
        </i>
        <span class="title">
			Users
		</span>
        <span class="selected">
		</span>
    </a>
</li>

<li class="nav-item start <?php if ($controller == "CategoryController") echo 'active'; ?>">
    <a href="{{ url('/cwadmin/categories') }}" class="nav-link nav-toggle">
        <i class="icon-list">
        </i>
        <span class="title">
			Categories
		</span>
        <span class="selected">
		</span>
    </a>
</li>

<li class="nav-item start <?php if ($controller == "ProduceController") echo 'active'; ?>">
    <a href="{{ url('/cwadmin/produce') }}" class="nav-link nav-toggle">
        <i class="fa fa-stack-overflow">
        </i>
        <span class="title">
			Produce
		</span>
        <span class="selected">
		</span>
    </a>
</li>

<li class="nav-item start <?php if ($controller == "NotificationsController") echo 'active'; ?>">
    <a href="{{ url('/cwadmin/notifications') }}" class="nav-link nav-toggle">
        <i class="icon-bell">
        </i>
        <span class="title">
			Notifications
		</span>
        <span class="selected">
		</span>
    </a>
</li>

<li class="nav-item start <?php if ($controller == "VideosController") echo 'active'; ?>">
    <a href="{{ url('/cwadmin/videos') }}" class="nav-link nav-toggle">
        <i class="fa fa-youtube-play">
        </i>
        <span class="title">
			Videos
		</span>
        <span class="selected">
		</span>
    </a>
</li>

<li class="nav-item start <?php if ($controller == "ContentsController") echo 'active'; ?>">
    <a href="{{ url('/cwadmin/contents') }}" class="nav-link nav-toggle">
        <i class="fa fa-indent">
        </i>
        <span class="title">
			Contents
		</span>
        <span class="selected">
		</span>
    </a>
</li>

<li class="nav-item start <?php if ($controller == "ProfileController")
    echo 'active';?>">
    <a href="{{ url('/cwadmin/profile')}}" class="nav-link nav-toggle">
        <i class="icon-user">
        </i>
        <span class="title">
			Profile
		</span>
        <span class="selected">
		</span>
    </a>
</li>

<li class="nav-item start">
    <a href="{{ url('/cwadmin/logout')}}" class="nav-link nav-toggle">
        <i class="fa fa-sign-out">
        </i>
        <span class="title">
			Logout
		</span>
        <span class="selected">
		</span>
    </a>
</li>







