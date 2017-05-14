<h2>Последно от блога</h2>
<hr>
<section class="row text-center">
    @foreach ($posts as $post)

        <article class="blog-post">

            <a href="{{ route('view_post_slug', [$post->id, $post->slug]) }}" title="{{ $post->title }}">
                <img class="blog-banner" src="{{ $post->image }}" />
                <h3 class="red text-left">{{ str_limit($post->title, $limit = 18, $end='...') }}</h3>
            </a>

            <p class="text-left"> {{ str_limit($post->content, $limit = 150, $end='...') }} </p>
            {{--<a class="pull-right red" href="{{ route('view_post_slug', [$post->id, $post->slug]) }}" title="{{ $post->title }}">--}}
                {{--Прочети още</a><br><br>--}}

             <div class="pull-left">
                 <img class="author img-circle" src="{{ $post->owner->avatar }}">
                 <a class="author">{{ $post->owner->name }}</a>
              </div>

            <div class="date pull-right">
                {{ $post->created_at->format('d M Y') }}
            </div>
        </article>

    @endforeach

    <br>
    <div class="text-center">
        <a class="btn btn-danger btn-pressure btn-sensitive" href="{{ route('view_posts') }}">Виж всички</a>
    </div>
</section>