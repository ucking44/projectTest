@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add an Interest Rate</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('interestRate.store') }}">
          @csrf
          <div class="form-group">    
              <label for="country">Country:</label>
              <input type="text" class="form-control" name="country"/>
          </div>
          <div class="form-group">
              <label for="interest_category">Interest Category:</label>
              <input type="text" class="form-control" name="interest_category"/>
          </div>
          <div class="form-group">
              <label for="above_5m">Above 5m:</label>
              <input type="text" class="form-control" name="above_5m"/>
          </div>
          <!-- <div class="form-group">
            <label for="above_5m">Above 5m:</label>
            <label for="above_5m" class="col-sm-4 col-form-label">Above 5m:</label>
              <div class="col-sm-8">
                <select class="form-control" id="above_5m" name="above_5m">
                  <option value="">Select</option>
                  <option value="1">4.5</option>
                  <option value="0">Negotiable</option>
                </select>
            </div>
          </div> -->
          <!-- <div class="col-md-4">
            <label for="below_5m" class="col-sm-4 col-form-label">Below 5m:</label>
              <div class="col-sm-8">
                <select class="form-control" id="below_5m" name="below_5m">
                     <option value="1">4.5</option>
                     <option value="0">Negotiable</option>
              </select>
            </div>
          </div> -->
          <!-- <div class="form-group">
              <label for="above_5m">Above 5m:</label>
              <select class="form-control" id="above_5m" name="above_5m">
                  <option value="">Select</option>
                  <option value="1">4.5</option>
                  <option value="0">Negotiable</option>
                </select> -->
              <!-- <input type="text" class="form-control" name="above_5m"/> -->
          <!-- </div> -->
          <div class="form-group">
              <label for="below_5m">Below 5m:</label>
              <input type="text" class="form-control" name="below_5m"/>
          </div>
          <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="enable" value="enable">
                </div>
          </div>
                            
          <button type="submit" class="btn btn-primary-outline">Add Interest Rate</button>
      </form>
  </div>
</div>
</div>
@endsection
