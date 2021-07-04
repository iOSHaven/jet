@php

$allowed = [
    "class",
    "style",
    "id",
];

$used = array_merge(
    [
        "href"
    ],
    $allowed
);
@endphp


<a href="{{
    route($attributes->get("href"), $attributes->except($used))
    }}" {{ $attributes->only($allowed) }}>
    {{ $slot }}
</a>
