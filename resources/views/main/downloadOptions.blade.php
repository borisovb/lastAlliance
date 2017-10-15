 @if(!strlen($episode->download_720p) < 3)
    <a target="_blank" href="{{ $episode->download_720p }}">720p</a>
    @else
        <span class="inactive">720p</span>
    @endif
    |
    @if(!strlen($episode->download_1080p) < 3)
    <a target="_blank" href="{{ $episode->download_1080p }}">1080p</a>
    @else
        <span class="inactive">1080p</span>
    @endif