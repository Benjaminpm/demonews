@extends('layouts.app')

@section('content') dfsdfgfgdghdghf
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/news/create/') }}" class=""><span class="glyphicon glyphicon-link" aria-hidden="true">Create news</span></a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group row">                           
                    @foreach($newsd as $news_)                                
                        <div class="col-sm-3 mt-0 mb-1">
                            <div class="col-sm-12  border rounded-top shadow p-2 mb-1 bg-white rounded">
                                <div class="rounded-top bg-white">
                                    <a href="{{ url('/news/'.$news_->id.'/show') }}" class="" style="text-decoration:none">
                                    <div class="rounded-top bg-white">
                                        @if($news_->file)
                                            @php
                                                $extension = pathinfo($news_->file)['extension'];
                                            @endphp
                                            @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")
                                                <img class="card-img-top" src="images/{{ $news_->file }}" height="120" width="200" />
                                            @else
                                                <video width="400" style="width: 100%;
                                                    height: auto;" controls>
                                                    <source src="images/{{ $news_->file }}" type="video/mp4">
                                                    <source src="images/{{ $news_->file }}" type="video/mpeg">
                                                    <source src="images/{{ $news_->file }}" type="video/ogg">
                                                    <source src="images/{{ $news_->file }}" type="video/webm">
                                                    <source src="images/{{ $news_->file }}" type="video/3gp">
                                                    <source src="images/{{ $news_->file }}" type="video/mov">
                                                    <source src="images/{{ $news_->file }}" type="video/flv">
                                                    <source src="images/{{ $news_->file }}" type="video/avi">
                                                    <source src="images/{{ $news_->file }}" type="video/wmv">
                                                    <source src="images/{{ $news_->file }}" type="video/ts">
                                                    <source src="images/{{ $news_->file }}" type="video/MP4">
                                                    <source src="images/{{ $news_->file }}" type="video/MPEG">
                                                    <source src="images/{{ $news_->file }}" type="video/OGG">
                                                    <source src="images/{{ $news_->file }}" type="video/WEBM">
                                                    <source src="images/{{ $news_->file }}" type="video/3GP">
                                                    <source src="images/{{ $news_->file }}" type="video/MOV">
                                                    <source src="images/{{ $news_->file }}" type="video/FLV">
                                                    <source src="images/{{ $news_->file }}" type="video/AVI">
                                                    <source src="images/{{ $news_->file }}" type="video/WMV">
                                                    <source src="images/{{ $news_->file }}" type="video/TS">               
                                                    Your browser does not support HTML5 video.
                                                </video>                                               
                                            @endif
                                        @endif
                                        
                                    </div>
                                    <div><h6>{{ \Illuminate\Support\Str::limit($news_->title, 80, $end='...') }}</h6></div></a>
                                    <div><span>{{ $news_->type_id }}</span></div>
                                    <div><span>{{ $news_->created_at }}</span></div>
                                </div>
                                
                                @guest                            
                                    @if (Route::has('register'))                                
                                    @endif
                                    @else
                                    {!! Form::open(['route' => ['news.destroy', $news_->id], 'method' => 'DELETE']) !!}
                                        <div class="">
                                        <button type="submit" >
                                            <a href="{{ url('/news/'.$news_->id.'/destroy') }}">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true">Remove</span>
                                            </a>
                                        </button> || <a href="{{ url('/news/'.$news_->id.'/edit') }}">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                            </a>                                                
                                        </div>                                        
                                    {!! Form::close() !!}
                                @endguest
                            </div>                        
                        </div>                                                             
                    @endforeach                 
                    </div>                                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection