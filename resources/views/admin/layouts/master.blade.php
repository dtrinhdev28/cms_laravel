@include('admin.partials.header')

@include('admin.partials.navbar')

<main id="main" class="main">
    @include('admin.partials.breadcrumb')
    @include($template)
</main>

@include('admin.partials.footer')
  