<footer class="ui footer grey inverted basic padded segment">
    <div class="ui grey inverted basic padded segment">
        <div class="ui stackable equal width divided padded relaxed center aligned grid container">
            <div class="column">
                <h3 class="ui header" style="color: #fff">Get Notified About New Jobs</h3>
                <p>
                    Want to know when new jobs are posted? You will be notified about new jobs right in your inbox. Don't worry, we hate spam as much as you do.
                </p>

                <newsletter-form></newsletter-form>
            </div>
            <div class="column">
                <h3 class="ui header" style="color: #fff">Want To Hire Talented Nigerian Developers</h3>
                <p>
                    Get your job across the fast and ever growing community of talented Nigerian developers and designers.
                </p>
                <a class="ui primary button" href="{{ route('post_job') }}">Post a Job</a>
            </div>
        </div>
    </div>

    <div class="ui divider"></div>

    <div class="ui stackable three column grid container footerBar">
        <div class="six wide column">
            <div class="ui small horizontal list">
                <a class="item" href="{{ url('/about') }}">About</a>
                <a class="item" href="{{ url('/pricing') }}">Pricing</a>
                <a class="item" href="https://blog.naijadevs.ng">Blog</a>
                <a class="item" href="{{ url('/terms') }}">Terms</a>
                <a class="item" href="{{ url('/privacy') }}">Privacy</a>
            </div>
        </div>
        <div class="five wide column">
            <div class="social_links" style="text-align: center;">
                <a class="ui circular twitter icon button" href="https://twitter.com/naijadevs_ng" target="_blank">
                  <i class="twitter icon"></i>
                </a>
                <a class="ui circular facebook icon button" href="https://facebook.com/naijadevs" target="_blank">
                  <i class="facebook f icon"></i>
                </a>
                {{-- <a class="ui circular linkedin icon button" href="https://linkedin.com/company-beta/11207772" target="_blank">
                  <i class="linkedin icon"></i>
                </a> --}}
            </div>
        </div>
        <div class="five wide column">
            <div class="ui small horizontal list">
                <div class="item">
                    © 2017 Naijadevs. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</footer>