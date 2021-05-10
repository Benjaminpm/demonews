<html>
<head>
    <title>Formulario con Combobox</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet" >
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.js"></script>
</head>
<body>

<div class="container col-md-4 col-md-offset-4">

    <form>
        <div class="btn-group" role="group" aria-label="...">
            <h2>Comboboxes</h2>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Seleccione una opción
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    @foreach($categories as $category)
                    <li><a href="{{$category->id}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="form-group">
            <h2>Checkboxes</h2>
            @foreach($categories as $category)
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="{{$category->id}}">
                    {{$category->name}}
                </label>
            </div>
            @endforeach
        </div>
        <div class="form-group">
            <h2>Radios</h2>
            @foreach($categories as $category)
            <label class="radio-inline">
                <input type="radio" name="{{$category->name}}" id="{{$category->id}}" value="{{$category->id}}"> {{$category->name}}
            </label>
            @endforeach
        </div>

        <div class="form-group">
            <h2>Select</h2>
            <select class="form-control">
                @foreach($categories as $category)
                <option>{{$category->name}}</option>
                @endforeach
            </select>
        </div>

    </form>
</div>
</body>
</html>