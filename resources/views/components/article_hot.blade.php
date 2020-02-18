@if(isset($articleHot))
    @foreach($articleHot as $hot)
        <div class="arricle_hot_item">
            <div class="article_img">
                <a href="">
                    <img src="{{ pare_url_file($hot->a_avatar) }}" style="max-height: 200px;">
                </a>
            </div>
            <div class="article_info">
                <h3>{{ $hot->a_name }}</h3>
                <p>{{ $hot->a_description }}</p>
            </div>
        </div>
    @endforeach
@endif
