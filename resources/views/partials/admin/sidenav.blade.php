<div class="sidebar" data-color="green" data-image="/assets/img/sidebar-5.jpg">
	<div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}" class="simple-text">
                Farmties
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ route('commodities.index') }}">
                    <i class="pe-7s-paint-bucket"></i>
                    <p>Commodities</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders.index') }}">
                    <i class="pe-7s-cash"></i>
                    <p>Orders</p>
                </a>
            </li>
            <li>
                <a href="{{ route('services.index') }}">
                    <i class="pe-7s-settings"></i>
                    <p>Services</p>
                </a>
            </li>
            <li>
                <a href="{{ route('sliders.index') }}">
                    <i class="pe-7s-settings"></i>
                    <p>Sliders</p>
                </a>
            </li>
            <li>
                <a href="{{ route('regions.index') }}">
                    <i class="pe-7s-paint-bucket"></i>
                    <p>Regions</p>
                </a>
            </li>
            <li>
                <a href="{{ route('abbreviations.index') }}">
                    <i class="pe-7s-settings"></i>
                    <p>Abbreviations</p>
                </a>
            </li>
        </ul>
	</div>
</div>