@extends('main.base')

@section('content')
<script>
$(document).ready(function(){
  $('.slider1').bxSlider({
    slideWidth: 230,
    minSlides: 2,
    maxSlides: 4,
    slideMargin: 5,
	pager: false
  });
});
</script>

        <h2>Последни епизоди</h2>
        <hr>
        <div class="slider1">
            @foreach ($episodes as $episode)
               <div class="slide">
                <div class="episode" title="Епизод {{ $episode->number }} - {{ $episode->name_bg }}">
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
                        <span class="episode-date"><strong>Дата:</strong> {{ $episode->created_at }}</span>
                        <div class="buttons">
                            <a target="_blank" href="{{ $episode->download_link }}" class="btn btn-danger btn-pressure small">Изтегли</a>
                            @if($episode->stream_link)
                                <a href="{{ route('watch_episode_slug', [$episode->project->slug, $episode->number, $episode->slug]) }}" class="btn btn-primary btn-pressure small">Гледай</a>
                            @endif
                        </div>
                    </div>
                </div>
                </div>
            @endforeach

        </div>

    <h2>Последни новини</h2>
    <hr>
    <section class="row">

   @foreach ($posts as $post)

    <article class="blog-post">
           <img class="blog-banner" src="{{ $post->image }}" />
       <h3>{{ str_limit($post->title, $limit = 18, $end='...') }}</h3>
       <p>{{ str_limit($post->content, $limit = 150, $end='...') }}
       </p>
       <div class="col-xs-4 col-md-4">
       <img src="{{ $post->owner->avatar }}" class="author">
       </div>
        <div class="col-xs-8 col-md-8">
        <p class="author">{{ $post->owner->name }}
        {{ $post->created_at->format('d M Y') }}</p>
        </div>
    </article>

    @endforeach
    <br>
   <div class="text-center">
            <button class="btn btn-danger btn-pressure btn-sensitive">Виж всички</button>
        </div>

    </section>



@endsection
