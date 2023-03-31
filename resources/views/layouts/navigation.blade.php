<nav class="navbar" role="navigation" aria-label="main navigation">
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ route('posts.index') }}">
                Posts
            </a>
        </div>

        <div class="navbar-start">
            <a class="navbar-item" href="{{ route('comments.data') }}">
                Comment data
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
