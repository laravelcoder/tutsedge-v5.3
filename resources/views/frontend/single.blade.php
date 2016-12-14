@extends('layouts.app')

@section('title')
{{ $lesson->title }}
@endsection

@section('meta')
<meta name="description" content="{{ $lesson->description }}">
@endsection

@section('banner')
<div class="banner z-depth-1">
    <div class="banner-cont">
        <h1>{{ $lesson->title }}</h1>
        <h3>{{ $lesson->description }}</h3>
        <p class="post-info">{{ $lesson->author }} | {{ date("d M, Y",strtotime($lesson->created_at)) }} | <a href="#comments">Comments</a></p>
        <div>
            <div class="row">
                <div class="col hide-on-small-only m12 l4">
                    <a href="{{ url('/auth/github') }}"><button class="btn github center-align"><i class="fa fa-github-square"></i> Register with Github</button></a>
                </div>
                <div class="col hide-on-small-only m12 l4">
                    <a href="{{ url('/auth/twitter') }}"><button class="btn twitter"><i class="fa fa-twitter-square"></i> Register with Twiter</button></a>
                </div>
                <div class="col hide-on-small-only m12 l4">
                    <a href="{{ url('/auth/facebook') }}"><button class="btn facebook"><i class="fa fa-facebook-square"></i> Register with Facebook</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content') 

<div class="content">
    <div class="row">

        <div class="col s12 m12 l9">
            <div class="post-body z-depth-1 post-content">
                @if(count($lesson->tags) > 0)
                    @foreach($lesson->tags as $tag) 
                    <a href="{{ url('/') }}/tag/{{$tag->name}}">
                        <div class="chip">
                            {{ $tag->name }}
                        </div>
                    </a>
                    @endforeach
                @endif


                {!! Markdown::parse($lesson->body) !!}     

                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- article ad -->
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-6782067367590597"
                    data-ad-slot="5293007688"
                    data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script> 

            </div><!-- .post-body -->

            <div id="comments" class="comment-container ">
                <div class="comments z-depth-1">
                <div id="disqus_thread"></div>
                <script>
                /**
                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
            
                var disqus_config = function () {
                    this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = '<?php echo $lesson->slug ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = '//tutorialedgenet.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
                <div class="clear"></div>
            </div>
        </div><!-- .col s9 -->
        
        <div class="sidebar  col s12 m12 l3"><!-- .sidebar -->
            
           <div class="sidebar z-depth-1">
                <div class="related-posts">
                    <h2>Related Posts</h2>
                    @foreach ($articles as $article)
                    <div class="post">
                        <div class="post-image">
                            <img src="{{ asset('/uploads/') }}/{{ $article->image_path }}" alt="{{ $article->description }}">
                        </div>
                        <div class="post-link">
                            <a href="{{ url('/') }}/{{ $article->slug }}"><h3>{{ $article->title }}</h3></a>
                            <p>{{ $article->description }}</p>
                            <div class="tags">
                                @foreach($article->tags as $tag)
                                <a href="{{ url('/') }}/tag/{{ $tag->name }}">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- article ad -->
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-6782067367590597"
                    data-ad-slot="5293007688"
                    data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>

                <div class="clear"></div>

            </div>
            
        </div><!-- end of sidebar-->
        
    </div>
</div>


@endsection