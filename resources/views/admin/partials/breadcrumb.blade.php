<div class="pagetitle">
    <h1>{{ isset($config) ? $config['title_heading'] : '' }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
            <li class="breadcrumb-item">{{ isset($config) ? $config['subtitle'] : '' }}</li>
            <li class="breadcrumb-item active">	{{ isset($config) ? $config['title_heading'] : '' }}
            </li>
        </ol>
    </nav>
</div><!-- End Page Title -->
