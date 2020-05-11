<section>
    <div class="main-area">
        <div class="container-fluid">
            <div class="row">
                <div class="sidebar">
                    <div class="main-menu-area">
                        <div class="main-menu">
                            <nav>
                                <div id="accordionExample">
                                    <ul>
                                        <li class="{{ Request::is('admin/settings/create') ? 'active' : '' }}">
                                            <a href="{{ route('admin.settings.create') }}">
                                                <span class="flaticon-menu"></span> {{ __('Basic settings') }}
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                                            <a href="{{ route('admin.settings.index') }}">
                                                <span class="flaticon-settings"></span> {{ __('Site settings') }}
                                            </a>
                                        </li>
                                          <li class="{{ Request::is('admin/script') ? 'active' : '' }}">
                                            <a href="{{ route('admin.script.index') }}">
                                                <span class="flaticon-file"></span> {{ __('Custom Css Jss') }}
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('admin/seo') ? 'active' : '' }}">
                                            <a href="{{ route('admin.seo.index') }}">
                                                <span class="flaticon-writing"></span> {{ __('Seo') }}
                                            </a>
                                        </li>
                                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                        document.getElementById('logout-bar').submit();"><span class="flaticon-logout"></span> {{ __('Logout') }}</a></li>
                                        <form id="logout-bar" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                     </nav>
               </div>
         </div>
 </div>
