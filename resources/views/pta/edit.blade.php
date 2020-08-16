@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a PTA</h1>
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
        <form method="post" action="{{ route('pta.update', $pta->pta_rate_id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" value={{ $pta->country }} />
            </div>
            <div class="form-group">
                <label for="pta_name">PTA Name:</label>
                <input type="text" class="form-control" name="pta_name" value={{ $pta->pta_name }} />
            </div>
            <div class="form-group">
                <label for="value">Value:</label>
                <input type="text" class="form-control" name="value" value={{ $pta->value }} />
            </div>
            
            <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" {{ $pta->status == "enable" ? 'checked' : '' }} >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection

