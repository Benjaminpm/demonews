
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xx-12">
            <div class="card">
                <div class="card-body">                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif          
                    
                    @foreach($newsone as $newsone_)
                    @endforeach
                        @php
                            $prueba1 = strlen($newsone_->file);                                    
                        @endphp
                    
                    <div class="row">
                        <div class="col-sm-9  border rounded-top shadow p-2 mb-2 bg-white">
                            <div><h1>{{ $newsone_->title  }}</h1></div>
                            <div><span class="text-secondary"><b>Por {{ $newsone_->autor }}
                                </b></span>
                            </div>
                                <div class="text-secondary"><!-- <i class="fas fa-school"> </i>-->{{ $newsone_->type_id }}
                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> | <span>{{ \Carbon\Carbon::parse($newsone_->created_at)->diffForHumans() }}</span>
                                </div>
                                <br />
                            <div>
                                <div class="rounded-top bg-white">
                                    <div class="rounded-top bg-white">
                                        @if($prueba1 == 11)                                                                                        
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" width="226" height="158" src="https://www.youtube.com/embed/{{ $newsone_->file }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>                                                                                     
                                            @elseif($prueba1 > 11)
                                                @php
                                                    $extension = pathinfo($newsone_->file)['extension'];
                                                @endphp
                                                @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")
                                                    <img class="card-img-top" src="../../images/{{ $newsone_->file }}" height="" width="400" style="width: 100%;
                                                        height: auto;" />
                                                @elseif($extension=="mp4" || $extension == "mpeg" || $extension == "ogg" || $extension == "webm" || $extension == "3gp" || $extension == "mov" || $extension == "flv" || $extension == "avi" || $extension == "avi"|| $extension == "wmv" || $extension == "ts" || $extension == "MP4" || $extension == "MPEG" || $extension == "OGG" || $extension == "WEBM"|| $extension == "3GP" || $extension == "MOV"|| $extension == "FLV" || $extension == "AVI" || $extension == "WMV" || $extension == "TS")
                                                    <a href="{{ url('/news/'.Crypt::encryptString($newsone_->id).'/show') }}" class="" style="text-decoration:none">
                                                    <video width="400" style="width: 100%;
                                                        height: auto;" controls>
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/mp4">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/mpeg">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/ogg">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/webm">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/3gp">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/mov">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/flv">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/avi">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/wmv">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/ts">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/MP4">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/MPEG">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/OGG">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/WEBM">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/3GP">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/MOV">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/FLV">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/AVI">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/WMV">
                                                        <source src="../../images/{{ $newsone_->file }}" type="video/TS">               
                                                        Your browser does not support HTML5 video.
                                                    </video>
                                                    </a>                                                                       
                                                @endif
                                        @endif                            
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div><p>{{ $newsone_->body }}</p></div>
                            @guest                            
                                @if (Route::has('register'))                                
                                @endif
                                @else
                                    {!! Form::open(['route' => ['news.destroy', $newsone_->id], 'method' => 'DELETE']) !!}
                                        <div class="">
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <a href="{{ url('/news/'.Crypt::encryptString($newsone_->id).'/destroy') }}">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true">Remove</span>
                                                </a>
                                            </button><!-- Crypt::encrypt($newsone_->id) -->
                                            <a href="{{ url('/news/'.Crypt::encryptString($newsone_->id).'/edit') }}" class="btn btn-info btn-xs">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                            </a>
                                        </div><br />
                                    {!! Form::close() !!}                        
                            @endguest
                        </div>
                        <div class="col-sm-3">
                            @foreach($newsall as $newsall_)
                                @php
                                    $prueba1 = strlen($newsall_->file);                                    
                                @endphp                                                        
                                <a href="{{ url('/news/'.Crypt::encryptString($newsall_->id).'/show') }}" class="text-secondary" style="text-decoration:none">                                        
                                    @if($prueba1 == 11 && !$loop->first)
                                        <div class="col-sm-12  border rounded-top shadow p-2 mb-2 bg-white rounded">
                                            <div class="col-sm-12 p-0">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" width="226" height="158" src="https://www.youtube.com/embed/{{ $newsall_->file }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                                <div class="d-none d-md-block">
                                                    <h6>{{ \Illuminate\Support\Str::limit($newsall_->title, 80, $end='...') }}</h6>          
                                                </div>
                                                <div><span>{{ $newsall_->type_id }}</span> | <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> | <span>{{ \Carbon\Carbon::parse($newsall_->created_at)->diffForHumans() }}</span></div>
                                            </div><br />
                                            @guest                            
                                                @if (Route::has('register'))                                
                                                @endif
                                                @else
                                                    {!! Form::open(['route' => ['news.destroy', $newsall_->id], 'method' => 'DELETE']) !!}
                                                        <div class="">
                                                            <button type="submit" class="btn btn-danger btn-xs">
                                                                <a href="{{ url('/news/'.Crypt::encryptString($newsall_->id).'/destroy') }}">
                                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true">Remove</span>
                                                                </a>
                                                            </button><!-- Crypt::encrypt($newsall_->id) -->
                                                            <a href="{{ url('/news/'.Crypt::encryptString($newsall_->id).'/edit') }}" class="btn btn-info btn-xs">
                                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                                            </a>
                                                        </div>
                                                    {!! Form::close() !!}                        
                                            @endguest
                                        </div>                                        
                                    @elseif($prueba1 > 11 && !$loop->first)                                                                                     
                                        @php
                                            $extension = pathinfo($newsall_->file)['extension'];
                                        @endphp
                                        @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")
                                        <div class="col-sm-12  border rounded-top shadow p-2 mb-2 bg-white rounded">
                                            <div class="col-sm-12 p-0">
                                            <img class="card-img-top" src="../../images/{{ $newsall_->file }}" height="" width="400" style="width: 100%;
                                                height: auto;" />
                                            <div class="d-none d-md-block">
                                                <h6>{{ \Illuminate\Support\Str::limit($newsall_->title, 80, $end='...') }}</h6>          
                                            </div>
                                            <div><span>{{ $newsall_->type_id }}</span> | <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> | <span>{{ \Carbon\Carbon::parse($newsall_->created_at)->diffForHumans() }}</span></div>
                                            </div><br />
                                            @guest                            
                                                @if (Route::has('register'))                                
                                                @endif
                                                @else
                                                    {!! Form::open(['route' => ['news.destroy', $newsall_->id], 'method' => 'DELETE']) !!}
                                                        <div class="">
                                                            <button type="submit" class="btn btn-danger btn-xs">
                                                                <a href="{{ url('/news/'.Crypt::encryptString($newsall_->id).'/destroy') }}">
                                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true">Remove</span>
                                                                </a>
                                                            </button><!-- Crypt::encrypt($newsall_->id) -->
                                                            <a href="{{ url('/news/'.Crypt::encryptString($newsall_->id).'/edit') }}" class="btn btn-info btn-xs">
                                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                                            </a>
                                                        </div>
                                                    {!! Form::close() !!}                        
                                            @endguest
                                        </div>
                                        @elseif($extension=="mp4" || $extension == "mpeg" || $extension == "ogg" || $extension == "webm" || $extension == "3gp" || $extension == "mov" || $extension == "flv" || $extension == "avi" || $extension == "avi"|| $extension == "wmv" || $extension == "ts" || $extension == "MP4" || $extension == "MPEG" || $extension == "OGG" || $extension == "WEBM"|| $extension == "3GP" || $extension == "MOV"|| $extension == "FLV" || $extension == "AVI" || $extension == "WMV" || $extension == "TS")
                                        <div class="col-sm-12  border rounded-top shadow p-2 mb-2 bg-white rounded">
                                            <div class="col-sm-12 p-0">
                                            <a href="{{ url('/news/'.Crypt::encryptString($newsall_->id).'/show') }}" class="" style="text-decoration:none">
                                            <video width="400" style="width: 100%;
                                                height: auto;" controls>
                                                <source src="../../images/{{ $newsall_->file }}" type="video/mp4">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/mpeg">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/ogg">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/webm">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/3gp">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/mov">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/flv">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/avi">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/wmv">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/ts">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/MP4">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/MPEG">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/OGG">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/WEBM">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/3GP">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/MOV">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/FLV">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/AVI">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/WMV">
                                                <source src="../../images/{{ $newsall_->file }}" type="video/TS">               
                                                Your browser does not support HTML5 video.
                                            </video>
                                            <div class="d-none d-md-block">
                                                <h6>{{ \Illuminate\Support\Str::limit($newsall_->title, 80, $end='...') }}</h6>          
                                            </div>
                                            <div><span>{{ $newsall_->type_id }}</span> | <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> | <span>{{ \Carbon\Carbon::parse($newsall_->created_at)->diffForHumans() }}</span></div>
                                            </a>
                                            </div>
                                        </div>
                                            <div class="carousel-caption d-none d-md-block">
                                                <h3>{{ \Illuminate\Support\Str::limit($newsall_->title, 80, $end='...') }}</h3>          
                                            </div>
                                            <div><span>{{ $newsall_->type_id }}</span> | <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> | <span>{{ \Carbon\Carbon::parse($newsall_->created_at)->diffForHumans() }}</span>
                                            </div><br />
                                            @guest                            
                                                @if (Route::has('register'))                                
                                                @endif
                                                @else
                                                    {!! Form::open(['route' => ['news.destroy', $newsall_->id], 'method' => 'DELETE']) !!}
                                                        <div class="">
                                                            <button type="submit" class="btn btn-danger btn-xs">
                                                                <a href="{{ url('/news/'.Crypt::encryptString($newsall_->id).'/destroy') }}">
                                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true">Remove</span>
                                                                </a>
                                                            </button><!-- Crypt::encrypt($newsall_->id) -->
                                                            <a href="{{ url('/news/'.Crypt::encryptString($newsall_->id).'/edit') }}" class="btn btn-info btn-xs">
                                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                                            </a>
                                                        </div>
                                                    {!! Form::close() !!}                        
                                            @endguest                                                                       
                                        @endif
                                    @endif                                                                          
                                </a>                                                               
                            @endforeach              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection