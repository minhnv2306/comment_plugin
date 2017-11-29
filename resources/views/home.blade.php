@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    {{-- <form method="POST" action="http://localhost/comment/public/comments/store">  --}}
      {{ csrf_field() }}
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <label for="comment"> {{ trans('message.link')}}</label>
                <input id="url" type="text" class="form-control" name="url" placeholder="URL" value="{{$url}}">
            </div>

            <div class="panel-body" id="body">
                @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                 </div>
                @endif

                <h2> {{ trans('message.comment') }}</h2>
              
                @include('comment.show')
            </div>
            <div class="panel-body">
                <!-- Left-aligned media object -->
                <div class="media">
                    <div class="media-left">
                        <img src={{ config('app.avatar')}} class="media-object" style="width:60px">
                    </div>
                    <div class="media-body">
                        <textarea class="form-control" rows="2" name="content" id="content"></textarea>
                    </div>
                </div>
                <br>
                <div style="float: right;">
                    <button class="btn btn-primary" id="addcomment"> {{ trans('message.comment') }}</button>
                </div>

            </div>
        </div>
      </div>
{{--  </form> --}}
</div>
</div>

<script type="text/javascript" src="js/addcomment.js"></script>
<script type="text/javascript" src="js/viewurl.js"></script>

@endsection
