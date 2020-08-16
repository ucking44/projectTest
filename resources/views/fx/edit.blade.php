@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a FX</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('fx.update', $contact->fx_id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" value={{ $contact->country }} />
            </div>
            <div class="form-group">
                <label for="currency">Currency:</label>
                <input type="text" class="form-control" name="currency" value={{ $contact->currency }} />
            </div>
            <div class="form-group">
                <label for="fx_buy">FX Buy:</label>
                <input type="text" class="form-control" name="fx_buy" value={{ $contact->fx_buy }} />
            </div>
            <div class="form-group">
                <label for="fx_sell">Fx Sell:</label>
                <input type="text" class="form-control" name="fx_sell" value={{ $contact->fx_sell }} />
            </div>
            
            <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" {{ $contact->status == "enable" ? 'checked' : '' }} >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection

