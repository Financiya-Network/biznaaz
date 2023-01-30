<div class="dashboard-menu sticky">
    <div class="navbar navbar-default">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light navbar-me">
                <div class="nevicatio-menu">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ URL::to('users/dashboard') }}">Dashboard</a></li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::to('services/management') }}" class="nav-link dropdown-toggle"
                                    data-toggle="dropdown" aria-expanded="false">Selling <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('gigs/management') }}">Manage Gigs</a></li>
                                    <li><a href="{{ URL::to('gigs/create') }}">Create New Gig</a></li>
                                    <li><a href="{{ URL::to('gigs/myofferedgig') }}">My Offered Gigs</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::to('services/management') }}" class="nav-link dropdown-toggle"
                                    data-toggle="dropdown" aria-expanded="false">Buying <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('services/management') }}">Manage Requests</a></li>
                                    <li><a href="{{ URL::to('services/create-request') }}">Post Request</a></li>
                                    <li><a href="{{ URL::to('my-saved-gigs') }}">My Saved Gigs</a></li>
                                    <li><a href="{{ URL::to('gigs/offeredgig') }}">Offered Gigs</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::to('buyer-requests') }}" class="nav-link dropdown-toggle"
                                    data-toggle="dropdown" aria-expanded="false">Buyer Requests <b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('buyer-requests') }}">Active Requests</a></li>
                                    <li><a href="{{ URL::to('services/offers-sent') }}">Offers Sent</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::to('selling-orders') }}" class="nav-link dropdown-toggle"
                                    data-toggle="dropdown" aria-expanded="false">Orders <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('selling-orders') }}">Selling Orders</a></li>
                                    <li><a href="{{ URL::to('buying-orders') }}">Buying Orders</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::to('earnings') }}" class="nav-link dropdown-toggle"
                                    data-toggle="dropdown" aria-expanded="false">Earnings <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('earnings') }}">Earnings</a></li>
                                    <li><a href="{{ URL::to('payments/history') }}">PayPal History</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">Contacts <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('buyer-contacts') }}">Buyer Contacts</a></li>
                                    <li><a href="{{ URL::to('seller-contacts') }}">Seller Contacts</a></li>
                                </ul>
                            </li>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ URL::to('users/notifications') }}">Notifications</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ URL::to('users/settings') }}">Settings</a></li>
                        </ul>
                    </div>
                </div>

            </nav>
        </div>
    </div>
</div>
<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 5) {
            $(".navbar-me").addClass("fixed-me");
        } else {
            $(".navbar-me").removeClass("fixed-me");
        }
    });
</script>
