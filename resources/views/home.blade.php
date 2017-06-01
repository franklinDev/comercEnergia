@extends('app')

@section('content')
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-7">

            <!-- Title -->
            <h1>Panorama Comerc</h1>
            <hr>

            @if(!empty($feeds))
                @foreach($feeds as $f)

                    <!-- Comment -->
                        <div class="media">
                            <div class="media-body">
                               <h4 class="media-heading">{{$f['title']}}
                                    <small>{{$f['pubDate']}}</small>
                                </h4>
                                {!! $f['description'] !!}
                            </div>
                        </div>

                @endforeach
            @else
                <p>Não foi encontrado nenhum feed de notícia.</p>
            @endif

        </div>
        <br>
        <br>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-5">
            <!-- Side Widget Well -->
            <div class="well">
                <div id="cont_db50f3cf5c1d52ce772f5c268b9b2b06"><script type="text/javascript" async src="https://www.tempo.pt/wid_loader/db50f3cf5c1d52ce772f5c268b9b2b06"></script></div>
            </div>
        </div>

    </div>
    <!-- /.row -->

    <hr>

</div>
@endsection