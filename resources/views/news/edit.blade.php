@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Edit: ') }}<b></b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::model($news, ['route' => ['news.update', $news], 'method' => 'PUT', 'files' =>true]) !!} 
                                      
                    
                        @csrf              

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">                                
                                {!! Form::text('title',null,['id'=>'title','class' => 'form-control','placeholder'=>'Titulo']) !!}

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subtitle" class="col-md-4 col-form-label text-md-right">{{ __('Subtitle') }}</label>

                            <div class="col-md-6">
                            	{!! Form::text('subtitle',null,['id'=>'subtitle','class' => 'form-control','placeholder'=>'Subtitle']) !!}

                                @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-6">                                                
    							{!! Form::textarea('body',null,['id'=>'body','class' => 'form-control','placeholder'=>'Body']) !!}

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                         
                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>
                            <div class="col-md-6">
                                <div>
                                    @if($news->file)
                                        @php
                                            $prueba1 = strlen($news->file);                                    
                                        @endphp
                                            @if($prueba1 == 11)                                                                                        
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" width="226" height="158" src="https://www.youtube.com/embed/{{ $news->file }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                                @elseif($prueba1 > 11)
                                                    @php
                                                        $extension = pathinfo($news->file)['extension'];
                                                    @endphp
                                                    @if($extension=="jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPEG" || $extension == "JPG" || $extension == "PNG" || $extension == "GIF")
                                                    <img class="card-img-top" src="../../images/{{ $news->file }}" height="" width="" style="width: 100%;
                                                    height: auto;" />
                                                        @elseif($extension=="mp4" || $extension == "mpeg" || $extension == "ogg" || $extension == "webm" || $extension == "3gp" || $extension == "mov" || $extension == "flv" || $extension == "avi" || $extension == "avi"|| $extension == "wmv" || $extension == "ts" || $extension == "MP4" || $extension == "MPEG" || $extension == "OGG" || $extension == "WEBM"|| $extension == "3GP" || $extension == "MOV"|| $extension == "FLV" || $extension == "AVI" || $extension == "WMV" || $extension == "TS")
                                                        <video width="400" style="width: 100%;
                                                            height: auto;" controls>
                                                            <source src="../../images/{{ $news->file }}" type="video/mp4">
                                                            <source src="../../images/{{ $news->file }}" type="video/mpeg">
                                                            <source src="../../images/{{ $news->file }}" type="video/ogg">
                                                            <source src="../../images/{{ $news->file }}" type="video/webm">
                                                            <source src="../../images/{{ $news->file }}" type="video/3gp">
                                                            <source src="../../images/{{ $news->file }}" type="video/mov">
                                                            <source src="../../images/{{ $news->file }}" type="video/flv">
                                                            <source src="../../images/{{ $news->file }}" type="video/avi">
                                                            <source src="../../images/{{ $news->file }}" type="video/wmv">
                                                            <source src="../../images/{{ $news->file }}" type="video/ts">
                                                            <source src="../../images/{{ $news->file }}" type="video/MP4">
                                                            <source src="../../images/{{ $news->file }}" type="video/MPEG">
                                                            <source src="../../images/{{ $news->file }}" type="video/OGG">
                                                            <source src="../../images/{{ $news->file }}" type="video/WEBM">
                                                            <source src="../../images/{{ $news->file }}" type="video/3GP">
                                                            <source src="../../images/{{ $news->file }}" type="video/MOV">
                                                            <source src="../../images/{{ $news->file }}" type="video/FLV">
                                                            <source src="../../images/{{ $news->file }}" type="video/AVI">
                                                            <source src="../../images/{{ $news->file }}" type="video/WMV">
                                                            <source src="../../images/{{ $news->file }}" type="video/TS">               
                                                            Your browser does not support HTML5 video.
                                                        </video>
                                                @endif                                               
                                            @endif
                                        @endif
                                                                          
                                </div><br />
                            	{!! Form::file('file',null,['id'=>'file','class' => 'form-control','placeholder'=>'File']) !!}

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                                     
                            </div>
                        </div>                                              

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar cambios') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection