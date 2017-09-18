<div class="col-sm-3 offset-sm-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>@lang('layouts.about')</h4>
        <p>@lang('layouts.about_text')</p>
    </div>
    <div class="sidebar-module">
        <h4>@lang('layouts.archives')</h4>
        <ol class="list-unstyled">
            @foreach ($archives as $stats)
                <li>
                    <a href="/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
                        {{ $stats['month'] . ' ' . $stats['year'] }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
</div><!-- /.blog-sidebar -->