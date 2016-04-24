<div class="pure-g">	
	@unless (Auth::check())
    <div class="pure-u-md-1-6"><a href="/auth/login" class="pure-menu-link">Login</a></div>
    @endunless
    <div class="pure-u-md-1-6"><a href="http://twtter.io/" class="pure-menu-link">Twitter</a></div>
    <div class="pure-u-md-1-6"><a href="http://github.com/" class="pure-menu-link">GitHub</a></div>
</div>