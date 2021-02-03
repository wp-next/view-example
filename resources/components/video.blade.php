@props([
    'mp4',
    'poster' => null,
    'webm' => null
])

<video
    poster="{{ $poster }}"
    class="backgroundVideo objectFitCover ab100"
    autoplay="true"
    loop="true"
    muted="true"
    playsinline="true"
    disableRemotePlayback="true"
>
    @if ($webm)
        <source
            src="{{ $webm }}"
            type="video/webm"
        >
    @endif

    <source
        src="{{ $mp4 }}"
        type="video/mp4"
    >
</video>
