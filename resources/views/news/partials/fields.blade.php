<div class="form-group">
    {!! Form::label('countrie', 'Country', ['for' => 'countrie'] ) !!}
    {!! Form::text('countrie', null, ['class' => 'form-control', 'id' => 'countrie', 'placeholder' => 'Write the name of the news...' ]  ) !!}
</div>

<div class="form-group">
    {!! Form::label('type', 'Type', ['for' => 'type'] ) !!}
    {!! Form::text('type', null, ['class' => 'form-control', 'id' => 'type', 'placeholder' => 'Write the type of the news...' ]  ) !!}
    <select name="type" class="form-control">
        <option value="" disabled selected>Choose a type...</option>
        <option value="politic">Politic</option>
        <option value="economic">Economic</option>
        <option value="sport">Sport</option>
    </select>
</div>