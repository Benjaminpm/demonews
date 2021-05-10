@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/create') }}" class=""><span class="glyphicon glyphicon-link" aria-hidden="true">Create news</span></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group row">                           
                    @foreach($news as $news1_)
                        @php
                            $prueba1 = strlen($news1_->file);                                    
                        @endphp
                        @if($loop->first)
                            @php
                                $id=$news1_->id;
                            @endphp                

                                <div class="col-sm-6 rounded-top p-2 mb-2">                   
                                    <div class="rounded-top">
                                        <div class="rounded-top">                                                                                            
                                            
                                                @if(empty($news1_->id))
                                                    <p>No hay noticias en bd, por favor publica una. <a href="{{ route('create') }}">Aquí</a></p>
                                                @else                                                                                  
                                                    <a href="{{ url('/news/'.Crypt::encryptString($news1_->id).'/show') }}" class="" style="text-decoration:none">                        
                                                        @if($prueba1 == 11)
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" width="226" height="158" src="https://www.youtube.com/embed/{{ $news1_->file }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                            </div>

                                                            @elseif($prueba1 > 11)
                                                                @php
                                                                    $extension = pathinfo($news1_->file)['extension'];
                                                                @endphp
                                                                @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")
                                                                    <img class="card-img-top" src="images/{{ $news1_->file }}" width="150" height="" />                                                                           
                                                                    @elseif($extension=="mp4" || $extension == "mpeg" || $extension == "ogg" || $extension == "webm" || $extension == "3gp" || $extension == "mov" || $extension == "flv" || $extension == "avi" || $extension == "avi"|| $extension == "wmv" || $extension == "ts" || $extension == "MP4" || $extension == "MPEG" || $extension == "OGG" || $extension == "WEBM"|| $extension == "3GP" || $extension == "MOV"|| $extension == "FLV" || $extension == "AVI" || $extension == "WMV" || $extension == "TS")
                                                                    <!-- <a href="{{ url('/news/'.Crypt::encryptString($news1_->id).'/show') }}" class="" style="text-decoration:none"> -->
                                                                    <video width="400" style="width: 100%;
                                                                                    height: auto;" controls="active">
                                                                        <source src="images/{{ $news1_->file }}" type="video/mp4">
                                                                        <source src="images/{{ $news1_->file }}" type="video/mpeg">
                                                                        <source src="images/{{ $news1_->file }}" type="video/ogg">
                                                                        <source src="images/{{ $news1_->file }}" type="video/webm">
                                                                        <source src="images/{{ $news1_->file }}" type="video/3gp">
                                                                        <source src="images/{{ $news1_->file }}" type="video/mov">
                                                                        <source src="images/{{ $news1_->file }}" type="video/flv">
                                                                        <source src="images/{{ $news1_->file }}" type="video/avi">
                                                                        <source src="images/{{ $news1_->file }}" type="video/wmv">
                                                                        <source src="images/{{ $news1_->file }}" type="video/ts">
                                                                        <source src="images/{{ $news1_->file }}" type="video/MP4">
                                                                        <source src="images/{{ $news1_->file }}" type="video/MPEG">
                                                                        <source src="images/{{ $news1_->file }}" type="video/OGG">
                                                                        <source src="images/{{ $news1_->file }}" type="video/WEBM">
                                                                        <source src="images/{{ $news1_->file }}" type="video/3GP">
                                                                        <source src="images/{{ $news1_->file }}" type="video/MOV">
                                                                        <source src="images/{{ $news1_->file }}" type="video/FLV">
                                                                        <source src="images/{{ $news1_->file }}" type="video/AVI">
                                                                        <source src="images/{{ $news1_->file }}" type="video/WMV">
                                                                        <source src="images/{{ $news1_->file }}" type="video/TS">               
                                                                        Your browser does not support HTML5 video.
                                                                    </video>                                     
                                                            @endif                                             
                                                        @endif
                                                        <div class="align-self-center">
                                                            <h2 class="text-white bg-dark">{{ \Illuminate\Support\Str::limit($news1_->title, 50, $end='...') }}</h2>     
                                                        </div>                                                                               
                                                    </a>                                                
                                                @endif                                                                     
                                                                                                    
                                        </div>
                                    </div>
                                    @guest                            
                                        @if (Route::has('register'))                                
                                        @endif
                                        @if(empty($id))
                                            <h3>Be the first to post news.111 <a href="{{ route('create') }}">Login here</a></h3>                               
                                        @else                             
                                            
                                        @endif                        
                                    @endguest                
                                    @auth                            
                                        @if (Route::has('register'))                                
                                        @endif
                                        @if(empty($id))
                                            <h3>Be the first to post news. <a href="{{ route('create') }}">Here</a></h3>                                
                                        @else
                                            {!! Form::open(['route' => ['news.destroy', $id], 'method' => 'DELETE']) !!}
                                                <div class="">
                                                    <button type="submit" class="btn btn-danger btn-xs">
                                                        <a href="{{ url('/news/'.Crypt::encryptString($id).'/destroy') }}">
                                                            <span class="glyphicon glyphicon-remove" aria-hidden="true">Remove</span>
                                                        </a>
                                                    </button><!-- Crypt::encrypt($news1_->id) -->
                                                    <a href="{{ url('/news/'.Crypt::encryptString($id).'/edit') }}" class="btn btn-info btn-xs">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                                    </a>
                                                </div><br />
                                            {!! Form::close() !!}
                                        @endif                        
                                    @endauth
                                </div>                           

                        @endif

                        <div class="col-sm-3 mt-0 mb-1">
                            <div class="col-sm-12  border rounded-top shadow p-2 mb-1 bg-white rounded">
                                <div class="rounded-top bg-white">
                                    <a href="{{ url('/news/'.Crypt::encryptString($news1_->id).'/show') }}" class="text-secondary" style="text-decoration:none">
                                    <div class="rounded-top bg-white">
                                        @if($prueba1 == 11)                                                                                        
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" width="226" height="158" src="https://www.youtube.com/embed/{{ $news1_->file }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>                                                    
                                            @elseif($prueba1 > 11)
                                                @php
                                                    $extension = pathinfo($news1_->file)['extension'];
                                                @endphp
                                                @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")
                                                    <img class="card-img-top" src="images/{{ $news1_->file }}" height="" width="400" style="width: 100%;
                                                        height: auto;" />
                                                @elseif($extension=="mp4" || $extension == "mpeg" || $extension == "ogg" || $extension == "webm" || $extension == "3gp" || $extension == "mov" || $extension == "flv" || $extension == "avi" || $extension == "avi"|| $extension == "wmv" || $extension == "ts" || $extension == "MP4" || $extension == "MPEG" || $extension == "OGG" || $extension == "WEBM"|| $extension == "3GP" || $extension == "MOV"|| $extension == "FLV" || $extension == "AVI" || $extension == "WMV" || $extension == "TS")
                                                    
                                                    <video width="400" style="width: 100%;
                                                        height: auto;" controls>
                                                        <source src="images/{{ $news1_->file }}" type="video/mp4">
                                                        <source src="images/{{ $news1_->file }}" type="video/mpeg">
                                                        <source src="images/{{ $news1_->file }}" type="video/ogg">
                                                        <source src="images/{{ $news1_->file }}" type="video/webm">
                                                        <source src="images/{{ $news1_->file }}" type="video/3gp">
                                                        <source src="images/{{ $news1_->file }}" type="video/mov">
                                                        <source src="images/{{ $news1_->file }}" type="video/flv">
                                                        <source src="images/{{ $news1_->file }}" type="video/avi">
                                                        <source src="images/{{ $news1_->file }}" type="video/wmv">
                                                        <source src="images/{{ $news1_->file }}" type="video/ts">
                                                        <source src="images/{{ $news1_->file }}" type="video/MP4">
                                                        <source src="images/{{ $news1_->file }}" type="video/MPEG">
                                                        <source src="images/{{ $news1_->file }}" type="video/OGG">
                                                        <source src="images/{{ $news1_->file }}" type="video/WEBM">
                                                        <source src="images/{{ $news1_->file }}" type="video/3GP">
                                                        <source src="images/{{ $news1_->file }}" type="video/MOV">
                                                        <source src="images/{{ $news1_->file }}" type="video/FLV">
                                                        <source src="images/{{ $news1_->file }}" type="video/AVI">
                                                        <source src="images/{{ $news1_->file }}" type="video/WMV">
                                                        <source src="images/{{ $news1_->file }}" type="video/TS">               
                                                        Your browser does not support HTML5 video.
                                                    </video>                                                                                            
                                                @endif
                                        @endif                               
                                    </div>
                                    <div><h6>{{ \Illuminate\Support\Str::limit($news1_->title, 80, $end='...') }}</h6></div></a>
                                    <div><span class="text-secondary">{{ $news1_->type_id }}</span></div>
                                    <div><span class="text-secondary">{{ \Carbon\Carbon::parse($news1_->created_at)->diffForHumans() }}</span></div>
                                </div>
                                
                                @guest                            
                                    @if (Route::has('register'))                                
                                    @endif
                                    @else
                                    {!! Form::open(['route' => ['news.destroy', $news1_->id], 'method' => 'DELETE']) !!}
                                        <div class="">
                                        <button type="submit" >
                                            <a href="{{ url('/news/'.Crypt::encryptString($news1_->id).'/destroy') }}">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true">Remove</span>
                                            </a>
                                        </button> || <a href="{{ url('/news/'.Crypt::encryptString($news1_->id).'/edit') }}">
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