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
        <form method="post" action="{{ route('interestRate.update', $interestRate->interest_rate_id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" value={{ $interestRate->country }} />
            </div>
            <div class="form-group">
                <label for="interest_category">Interest Category:</label>
                <input type="text" class="form-control" name="interest_category" value={{ $interestRate->interest_category }} />
            </div>
            <div class="form-group">
                <label for="above_5m">Above 5m:</label>
                <input type="text" class="form-control" name="above_5m" value={{ $interestRate->above_5m }} />
            </div>
            <div class="form-group">
                <label for="below_5m">Below 5m:</label>
                <input type="text" class="form-control" name="below_5m" value={{ $interestRate->below_5m }} />
            </div>
            
            <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" {{ $interestRate->status == "enable" ? 'checked' : '' }} >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection

