@if(isset($articles))
    @foreach($articles as $article)
        <div class="article">
            <div class="article_avatar">
                <a href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}">
                    <img src="{{ pare_url_file($article->a_avatar) }}" alt="">
                </a>
            </div>
            <div class="article_info">
                <h2><a href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}">{{ $article->a_name }}</a></h2>
                <p>{{ $article->a_description }}</p>
                <p>Admin <span>{{ $article->created_at }}</span></p>
            </div>
        </div>
    @endforeach
    {!! $articles->links() !!}
@endif 