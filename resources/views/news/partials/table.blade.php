@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">
                    <a href="{{ url('/news/create/') }}" class=""><span class="glyphicon glyphicon-link" aria-hidden="true">Create news</span></a>                                                   
                </div> -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                          
                    <div class="form-group row">
                        <div class="col-sm-12 border rounded-top shadow p-2 mb-2 bg-white rounded">
                            <div class="row">                           
                                @foreach($news as $news_)
                                    @php
                                        $prueba1 = strlen($news_->file);                                    
                                    @endphp
                                    @if(!$loop->first)                                        
                                        @if($loop->iteration <=5)                              
                                            <div class="col-sm-3">
                                                <div class="row">
                                                    <div class="col-sm-5">                                   
                                                        <div class="rounded-top bg-white">
                                                            <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/show') }}" class="" style="text-decoration:none">
                                                            <div class="rounded-top bg-white">
                                                                @if($prueba1 == 11)
                                                                    <div class="embed-responsive embed-responsive-16by9">
                                                                        <iframe class="embed-responsive-item" width="226" height="158" src="https://www.youtube.com/embed/{{$news_->file}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                    </div>
                                                                    <!-- @php
                                                                        $prueba = strlen($news_->file);
                                                                        echo $prueba;
                                                                    @endphp -->                                                     
                                                                    @elseif($prueba1 > 11)
                                                                        @php
                                                                            $extension = pathinfo($news_->file)['extension'];
                                                                        @endphp
                                                                        @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")
                                                                        <img class="card-img-top" src="images/{{ $news_->file }}" height="" width="400" style="width: 100%;
                                                                            height: auto;" />
                                                                        @elseif($extension=="mp4" || $extension == "MP4" || $extension == "mpeg" || $extension == "MPEG" || $extension == "ogg" || $extension == "OGG" || $extension == "webm" || $extension == "WEBM"|| $extension == "3gp" || $extension == "3GP" || $extension == "mov" || $extension == "MOV" || $extension == "flv" || $extension == "FLV" || $extension == "avi" || $extension == "AVI" || $extension == "wmv" || $extension == "WMV" || $extension == "ts" || $extension == "TS")
                                                                        <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/show') }}" class="" style="text-decoration:none">
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
                                                            </a>                                                                                   
                                                        </div>                                                   
                                                        @guest                            
                                                            @if (Route::has('register'))                                
                                                            @endif
                                                            @else
                                                            {!! Form::open(['route' => ['news.destroy', $news_->id], 'method' => 'DELETE']) !!}
                                                                <div class="">
                                                                <button type="submit" >
                                                                    <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/destroy') }}">
                                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true">Remove</span>
                                                                    </a>
                                                                </button> || <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/edit') }}">
                                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                                                    </a>                                                
                                                                </div>                                        
                                                            {!! Form::close() !!}
                                                        @endguest
                                                    </div>                                                        
                                                    <div class="col-sm-7 border-right" style="text-decoration:none; font-size: 13px; line-height: 1.1666666667; color: #000;">
                                                        <div class="">
                                                            <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/show') }}" class="text-secondary" style="text-decoration:none; color: #000;">
                                                                <b>{{ $news_->type_id }}</b>
                                                            </a>                                                        
                                                        </div>
                                                        <div class="">
                                                            <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/show') }}" class="text-secondary" style="text-decoration:none; color: #000;">
                                                                {{ \Illuminate\Support\Str::limit($news_->title, 48, $end='... Ver Más') }}
                                                            </a>                 
                                                        </div>
                                                    </div>
                                                </div>                       
                                            </div>
                                        @endif                                        
                                    @endif                                                             
                                @endforeach
                            </div>                 
                        </div>

                        <div class="col-sm-8 rounded-top p-2 mb-2">                   
                            <div class="rounded-top">
                                <div class="rounded-top">                                                                                            
								    @foreach($news as $news2_)
								    	@if(empty($news2_->id))
										    <p>No hay noticias en bd, por favor publica una. <a href="{{ route('create') }}">Aquí</a></p>
										@else                                        
                                        @php
                                            $prueba2 = strlen($news2_->file);                                    
                                        @endphp
                                        	@if($loop->first)
                                            @php
                                                $id=$news2_->id;
                                            @endphp                                            
                                            <a href="{{ url('/news/'.Crypt::encryptString($news2_->id).'/show') }}" class="" style="text-decoration:none">                        
                                                @if($prueba2 == 11)
                                                	<h4><a href="{{ route('create') }}">Create new news..</a></h4>
                                                    <a href="{{ url('/news/'.Crypt::encryptString($news2_->id).'/show') }}" class="" style="text-decoration:none">                                
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" width="226" height="158" src="https://www.youtube.com/embed/{{ $news2_->file }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    </div>
                                                    </a>

                                                    @elseif($prueba2 > 11)
                                                        @php
                                                            $extension = pathinfo($news2_->file)['extension'];
                                                        @endphp
                                                        @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")
                                                        	<h4><a href="{{ route('create') }}">Create new news..</a></h4>
                                                            <a href="{{ url('/news/'.Crypt::encryptString($news2_->id).'/show') }}" class="" style="text-decoration:none">                          
                                                            <img class="card-img-top" src="images/{{ $news2_->file }}" width="150" height="" />
                                                            </a>                                                                           
                                                            @elseif($extension=="mp4" || $extension == "mpeg" || $extension == "ogg" || $extension == "webm" || $extension == "3gp" || $extension == "mov" || $extension == "flv" || $extension == "avi" || $extension == "avi"|| $extension == "wmv" || $extension == "ts" || $extension == "MP4" || $extension == "MPEG" || $extension == "OGG" || $extension == "WEBM"|| $extension == "3GP" || $extension == "MOV"|| $extension == "FLV" || $extension == "AVI" || $extension == "WMV" || $extension == "TS")
                                                            <!-- <a href="{{ url('/news/'.Crypt::encryptString($news2_->id).'/show') }}" class="" style="text-decoration:none"> -->
                                                            <h4><a href="{{ route('create') }}">Create new news..</a></h4>
                                                            <a href="{{ url('/news/'.Crypt::encryptString($news2_->id).'/show') }}" class="" style="text-decoration:none">                          
                                                            <video width="400" style="width: 100%;
                                                                            height: auto;" controls="active">
                                                                <source src="images/{{ $news2_->file }}" type="video/mp4">
                                                                <source src="images/{{ $news2_->file }}" type="video/mpeg">
                                                                <source src="images/{{ $news2_->file }}" type="video/ogg">
                                                                <source src="images/{{ $news2_->file }}" type="video/webm">
                                                                <source src="images/{{ $news2_->file }}" type="video/3gp">
                                                                <source src="images/{{ $news2_->file }}" type="video/mov">
                                                                <source src="images/{{ $news2_->file }}" type="video/flv">
                                                                <source src="images/{{ $news2_->file }}" type="video/avi">
                                                                <source src="images/{{ $news2_->file }}" type="video/wmv">
                                                                <source src="images/{{ $news2_->file }}" type="video/ts">
                                                                <source src="images/{{ $news2_->file }}" type="video/MP4">
                                                                <source src="images/{{ $news2_->file }}" type="video/MPEG">
                                                                <source src="images/{{ $news2_->file }}" type="video/OGG">
                                                                <source src="images/{{ $news2_->file }}" type="video/WEBM">
                                                                <source src="images/{{ $news2_->file }}" type="video/3GP">
                                                                <source src="images/{{ $news2_->file }}" type="video/MOV">
                                                                <source src="images/{{ $news2_->file }}" type="video/FLV">
                                                                <source src="images/{{ $news2_->file }}" type="video/AVI">
                                                                <source src="images/{{ $news2_->file }}" type="video/WMV">
                                                                <source src="images/{{ $news2_->file }}" type="video/TS">               
                                                                Your browser does not support HTML5 video.
                                                            </video>
                                                            </a>                                     
                                                    @endif                                             
                                                @endif
                                                <a href="{{ url('/news/'.Crypt::encryptString($news2_->id).'/show') }}" class="" style="text-decoration:none">
                                                <div class="align-self-center">
                                                    <h2 class="text-white bg-dark">{{ \Illuminate\Support\Str::limit($news2_->title, 50, $end='...') }}</h2>     
                                                </div>
                                                </a>                                                                               
                                            </a>
                                        @endif
                                        @endif                                                                     
                                    @endforeach								                           
                                </div>
                            </div>
                            @guest                            
                                @if (Route::has('register'))                                
                                @endif
                                @if(empty($id))
								    <h3>Be the first to post news. <a href="{{ route('create') }}">Login here</a></h3>								
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
                                            </button><!-- Crypt::encrypt($news2_->id) -->
                                            <a href="{{ url('/news/'.Crypt::encryptString($id).'/edit') }}" class="btn btn-info btn-xs">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                            </a>
                                        </div><br />
                                    {!! Form::close() !!}
                                @endif                        
                            @endauth
                        </div>                
                        <div class="col-sm-4 rounded-top p-2 mb-2 rounded">
                            <h6>Ultimas noticias..</h6>                  
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
                                <ol class="carousel-indicators">
                                @foreach( $news as $news_ )
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                                </ol>                                    
                                <div class="carousel-inner">
                                    @foreach( $news as $news_ )
                                        @php
                                            $prueba3 = strlen($news_->file);                                    
                                        @endphp                                                                               
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }} ">
                                                <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/show') }}" class="" style="text-decoration:none">                                               
                                                    @if($prueba3 == 11)                                                                                                 
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <iframe class="embed-responsive-item" width="113" height="158" src="https://www.youtube.com/embed/{{ $news_->file }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        </div>
                                                            @elseif($prueba3 > 11)
                                                            @php
                                                                $extension = pathinfo($news_->file)['extension'];
                                                            @endphp
                                                                @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")                                                        
                                                                    <img class="card-img-top" src="images/{{ $news_->file }}" height="100" width="200" style="width: 100%;
                                                                    height: 250px;" />
                                                                    @elseif($extension=="mp4" || $extension == "mpeg" || $extension == "ogg" || $extension == "webm" || $extension == "3gp" || $extension == "mov" || $extension == "flv" || $extension == "avi" || $extension == "avi"|| $extension == "wmv" || $extension == "ts" || $extension == "MP4" || $extension == "MPEG" || $extension == "OGG" || $extension == "WEBM"|| $extension == "3GP" || $extension == "MOV"|| $extension == "FLV" || $extension == "AVI" || $extension == "WMV" || $extension == "TS")
                                                                    <video width="200" style="width: 100%; height: 250px;" controls>
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
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h2>{{ \Illuminate\Support\Str::limit($news_->title, 50, $end='...') }}</h2>                 
                                                    </div>
                                                    @endif
                                                </a>
                                            </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>                        
                        <div class="col-sm-12">
                            <div class="row">                           
                                @foreach($news as $news_)
                                    @php
                                        $prueba4 = strlen($news_->file);                                    
                                    @endphp
                                    @if(!$loop->first)                               
                                        <div class="col-sm-3">
                                            <div class="col-sm-12  border rounded-top shadow p-2 mb-2 bg-white rounded">
                                                <div class="rounded-top bg-white">
                                                    <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/show') }}" class="text-secondary" style="text-decoration:none">                                                        
                                                    <div class="rounded-top bg-white">
                                                        @if($prueba4 == 11)
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" width="226" height="158" src="https://www.youtube.com/embed/{{ $news_->file }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                            </div>      
                                                            @elseif($prueba4 > 11)
                                                                @php
                                                                    $extension = pathinfo($news_->file)['extension'];
                                                                @endphp
                                                                @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")
                                                                    <img class="card-img-top" src="images/{{ $news_->file }}" height="" width="400" style="width: 100%;
                                                                        height: auto;" />
                                                                    @elseif($extension=="mp4" || $extension == "mpeg" || $extension == "ogg" || $extension == "webm" || $extension == "3gp" || $extension == "mov" || $extension == "flv" || $extension == "avi" || $extension == "avi"|| $extension == "wmv" || $extension == "ts" || $extension == "MP4" || $extension == "MPEG" || $extension == "OGG" || $extension == "WEBM"|| $extension == "3GP" || $extension == "MOV"|| $extension == "FLV" || $extension == "AVI" || $extension == "WMV" || $extension == "TS")
                                                                    <!-- <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/show') }}" class="text-secondary" style="text-decoration:none"> -->
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
                                                    <div class="text-secondary"><h6>{{ \Illuminate\Support\Str::limit($news_->title, 80, $end='...') }}</h6></div>    
                                                    <div><span class="text-secondary">{{ $news_->type_id }}</span></div>
                                                    <div><span class="text-secondary">{{ \Carbon\Carbon::parse($news_->created_at)->diffForHumans() }}</span></div>
                                                    </a>                                                   
                                                </div>                                                
                                                @guest                            
                                                    @if (Route::has('register'))                                
                                                    @endif
                                                    @else
                                                    {!! Form::open(['route' => ['news.destroy', $news_->id], 'method' => 'DELETE']) !!}
                                                        <div class="">
                                                        <button type="submit" >
                                                            <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/destroy') }}">
                                                                <span class="glyphicon glyphicon-remove" aria-hidden="true">Remove</span>
                                                            </a>
                                                        </button> || <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/edit') }}">
                                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                                            </a>                                                
                                                        </div>                                        
                                                    {!! Form::close() !!}
                                                @endguest
                                            </div>                        
                                        </div>
                                    @endif                                                                                                 
                                @endforeach
                            </div>                 
                        </div>
                        <div class="col-sm-12">
                            <div class="row">                           
                                @foreach($news as $news_)
                                    @php
                                        $prueba5 = strlen($news_->file);                                    
                                    @endphp
                                    @if(!$loop->first)
                                        @if($news_->type_id=='Education')                               
                                            <div class="col-sm-3">
                                                <div class="col-sm-12  border rounded-top shadow p-2 mb-2 bg-white rounded">
                                                    <div class="rounded-top bg-white">
                                                        <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/show') }}" class="text-secondary" style="text-decoration:none">
                                                        <div class="rounded-top bg-white">
                                                            @if($prueba5 == 11)
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" width="226" height="158" src="https://www.youtube.com/embed/{{ $news_->file }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                            </div>      
                                                            @elseif($prueba5 > 11)
                                                                @php
                                                                    $extension = pathinfo($news_->file)['extension'];
                                                                @endphp
                                                                @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")
                                                                        <img class="card-img-top" src="images/{{ $news_->file }}" height="" width="400" style="width: 100%;
                                                                            height: auto;" />
                                                                    @elseif($extension=="mp4" || $extension == "mpeg" || $extension == "ogg" || $extension == "webm" || $extension == "3gp" || $extension == "mov" || $extension == "flv" || $extension == "avi" || $extension == "avi"|| $extension == "wmv" || $extension == "ts" || $extension == "MP4" || $extension == "MPEG" || $extension == "OGG" || $extension == "WEBM"|| $extension == "3GP" || $extension == "MOV"|| $extension == "FLV" || $extension == "AVI" || $extension == "WMV" || $extension == "TS")
                                                                        <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/show') }}" class="" style="text-decoration:none">
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
                                                                        </a>                                                                         
                                                                    @endif

                                                            @endif                                                            
                                                        </div>
                                                        <div><h6>{{ \Illuminate\Support\Str::limit($news_->title, 80, $end='...') }}</h6></div>
                                                        <div><span class="text-secondary">{{ $news_->type_id }}</span></div>
                                                        <div><span class="text-secondary">{{ \Carbon\Carbon::parse($news_->created_at)->diffForHumans() }}</span></div>
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
                                                            </button> || <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/edit') }}">
                                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                                                </a>                                                
                                                            </div>                                        
                                                        {!! Form::close() !!}
                                                    @endguest
                                                </div>                        
                                            </div>
                                        @endif
                                    @endif                                                             
                                @endforeach
                            </div>                 
                        </div>
                        <div class="col-sm-12">
                            @foreach( $news as $news_ )
                                @if(!$loop->first)
                                    @if($news_->type_id=='Education')
                                        <div class="row">                                                       
                                        <div class="col-sm-12">
                                            <div class="col-sm-3  border rounded-top shadow p-2 mb-2 bg-white rounded">
                                                <div class="rounded-top bg-white">
                                                    <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/show') }}" class="text-secondary" style="text-decoration:none">
                                                    <div class="rounded-top bg-white">
                                                        @if(filter_var($news_->file, FILTER_VALIDATE_URL))
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" width="226" height="158" src="{{ $news_->file }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                            </div>      
                                                        @else                                                           
                                                            @php
                                                                $extension = pathinfo($news_->file)['extension'];
                                                            @endphp
                                                                @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")
                                                                    <img class="card-img-top" src="images/{{ $news_->file }}" height="" width="400" style="width: 100%;
                                                                        height: auto;" />
                                                                @else
                                                                    <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/show') }}" class="" style="text-decoration:none">
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
                                                    <div><span class="text-secondary">{{ $news_->type_id }}</span></div>
                                                    <div><span class="text-secondary">{{ \Carbon\Carbon::parse($news_->created_at)->diffForHumans() }}</span></div>
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
                                                        </button> || <a href="{{ url('/news/'.Crypt::encryptString($news_->id).'/edit') }}">
                                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                                            </a>                                                
                                                        </div>                                        
                                                    {!! Form::close() !!}
                                                @endguest
                                            </div>                        
                                        </div>                        
                                        </div>
                                    @endif
                                @endif
                            @endforeach                            
                        </div>                                                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection