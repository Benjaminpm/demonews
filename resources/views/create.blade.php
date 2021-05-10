@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('News') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('news.partials.errors')                           
                    <form enctype="multipart/form-data" method="POST" action="{{ route('news.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                            <div class="col-md-6">
                                {!! Form::select('type',$types,null,['id'=>'type','placeholder'=>'Selecciona el tipo de noticia','class' => 'form-control','required' => 'required']) !!}

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                                     
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                            <div class="col-md-6">
                                {!! Form::select('country',$countries,null,['id'=>'countrie','placeholder'=>'Selecciona tu país','class' => 'form-control','required' => 'required']) !!}

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                                     
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State/Depart..') }}</label>

                            <div class="col-md-6">                                
                                {!! Form::select('state',['placeholder'=>'Selecciona tu state/región'],null,['id'=>'region','class' => 'form-control']) !!} 


                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">                                
                                {!! Form::select('city',['placeholder'=>'Selecciona tu ciudad'],null,['id'=>'citie','class' => 'form-control']) !!} 


                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                      

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

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
                                <input id="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle') }}" required autocomplete="subtitle">

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
                                {!! Form::textarea('body',null,['class'=>'form-control', 'placeholder'=>'Economic, Politic, Etc..', 'required' => 'required']) !!}

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row" id="divfile">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>
                            <div class="col-md-6" id="contenido2">
                                
                                {!! Form::file('file',null,['id'=>'file','class' => 'form-control','placeholder'=>'File']) !!}                          

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                                     
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="urlf" class="col-md-4 col-form-label text-md-right"><a style='cursor: pointer;' onClick="muestra_oculta('contenido')" title="" class="col-md-6" id="boton_mostrar">Url/Video</a></label>                                                       

                                    <div class="col-md-6" id="contenido">
                                        <input id="urlf" type="text" class="form-control @error('urlf') is-invalid @enderror" name="urlf" value="{{ old('urlf') }}" autocomplete="urlf">

                                        @error('urlf')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                
                            
                            <style type="text/css">
                                #titulo_boton__ {
                                float:left; 
                                padding:5px;  
                                background-color:#e6e6e6;
                                width:400px;
                                font-family:helvetica;
                                font-size:16px;
                                font-weight:bold;
                                }
                                #boton_mostrar__ {
                                  float:right;
                                  font-size:12px;
                                  line-height:20px;
                                  color:#DE7217;
                                }
                                #contenido__{
                                  float:left;
                                  clear:both;
                                  border:2px solid #e6e6e6;
                                  margin-top:2px;
                                  padding:5px;
                                  width:396px;
                                  overflow:auto;
                                  font-family:helvetica;
                                  font-size:14px;
                                  text-align: justify;
                                }
                            </style>
                            <script type="text/javascript">
                                
                                function muestra_oculta(id){
                                if (document.getElementById){ //se obtiene el id
                                var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
                                el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
                                }
                                }
                                window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
                                muestra_oculta('contenido');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
                                }
                            </script>
                        </div>
                                                                                           

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection