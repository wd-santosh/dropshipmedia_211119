 <style type="text/css">
  span#userImg {
    font-size: 12px;
    margin-right: 0;
    margin-left: 7px;
}
</style>
 <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <span class="logo-mini"><b>CUSTO</b>MER</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Customer</b>Dashboard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
     <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Welcome:  
                <span id="userImg" class="glyphicon glyphicon-user"></span> 
              <span class="hidden-xs">&nbsp;&nbsp;{{ucfirst(Auth::user()->name)}}</span>
            </a>
            <ul class="dropdown-menu" style="width: 100%;">
                <div>
                  <a href="{{ route('logout') }}" class="btn btn-primary btn-flat" style="width: 100%;">Sign out</a>
                </div>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>