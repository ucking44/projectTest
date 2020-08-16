@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a PTA</h1>
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
      <form method="post" action="{{ route('pta.store') }}">
          @csrf
          <div class="form-group">    
              <label for="country">Country:</label>
              <input type="text" class="form-control" name="country"/>
          </div>
          <div class="form-group">
              <label for="pta_name">PTA Name:</label>
              <input type="text" class="form-control" name="pta_name"/>
          </div>
          <div class="form-group">
              <label for="value">Value:</label>
              <input type="text" class="form-control" name="value"/>
          </div>
          <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="enable" value="enable">
                </div>
          </div>
                            
          <button type="submit" class="btn btn-primary-outline">Add PTA</button>
      </form>
  </div>
</div>
</div>
@endsection
