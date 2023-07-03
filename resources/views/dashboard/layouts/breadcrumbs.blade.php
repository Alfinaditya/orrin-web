
<?php
$url = request()->getPathInfo();
$items = explode('/', $url);
unset($items[0]);

?>


<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='30px' height='30px' %3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">

    <ol class=" breadcrumb">
        @foreach($items as $i)
        @if($i == count($items))
        <li class="breadcrumb-item active" aria-current="page">{{ Str::ucfirst($i) }}</li>
        @else
        <li class="breadcrumb-item"><a href="/{{ $i }}">{{ Str::ucfirst($i) }}</a></li>

        @endif
        @endforeach
    </ol>
</nav>
