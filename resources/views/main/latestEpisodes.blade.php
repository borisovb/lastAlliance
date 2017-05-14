
<h2>Последни епизоди</h2>

<hr>

<div class="slider1">
    @foreach ($episodes as $episode)
        <div class="slide">
            <section class="episode" title="Епизод {{ $episode->number }} - {{ $episode->name_bg }}">
                <div class="episode-banner-div">
                    <img class="episode-banner" src="{{ $episode->project->banner }}" alt="#">
                </div>

                <div class="episode-info-div">
                    <span class="episode-title">Епизод {{ $episode->number }} - {{ str_limit($episode->name_bg, $limit = 13, $end='...') }}</span>
                    <br>
                    <span class="project-title">
                            <a href="{{ route('view_project', $episode->project->slug) }}">{{ $episode->project->title }}</a>
                        </span>
                    <br>
                    <span class="episode-date"><strong>Дата:</strong> {{ $episode->created_at->format('d.m.y H:i') }}</span>
                    <div class="buttons">
                        <a target="_blank" href="{{ $episode->download_link }}" class="btn btn-danger btn-pressure small">Изтегли</a>
                        @if($episode->stream_link)
                            <a href="{{ route('watch_episode_slug', [$episode->project->slug, $episode->number, $episode->slug]) }}" class="btn btn-primary btn-pressure small">Гледай</a>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    @endforeach

</div>