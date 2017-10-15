
<h2>Нови епизоди</h2>

<hr>

<div class="slider1" style="visibility: hidden;">
    @foreach ($episodes as $episode)
        {{--TODO: Make the slider div bigger so it doesn't cut off part of the download options--}}
        <div class="slide">
            <section class="episode" title="Епизод {{ $episode->number }} - {{ $episode->name_bg }}">
                <div class="episode-banner-div">
                    <img class="episode-banner" src="{{ $episode->project->banner }}" alt="#">
                </div>

                <div class="episode-info-div">
                    <span class="episode-title">Епизод {{ $episode->number }} - {{ str_limit($episode->name_bg, $limit = 12, $end='...') }}</span>
                    <br>
                    <span class="project-title">
                            <a href="{{ route('view_project', $episode->project->slug) }}">{{ $episode->project->title }}</a>
                        </span>
                    <br>
                    <span class="episode-date"><strong>Дата:</strong> {{ $episode->created_at->format('d.m.y H:i') }}</span>
                    <div class="buttons">
                        @if($episode->stream_link)
                            <a href="{{ route('watch_episode_slug', [$episode->project->slug, $episode->number, $episode->slug]) }}" class="btn btn-primary btn-pressure small">Гледай</a>
                        @endif
                        <a target="_blank" class="btn btn-danger small download-button btn-pressure">Изтегли</a>
                            <div class="download-options" style="display: none;">
                                @include('main/downloadOptions')
                            </div>
                    </div>

                </div>
            </section>
        </div>
    @endforeach

</div>