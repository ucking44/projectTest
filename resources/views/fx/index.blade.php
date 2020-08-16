@extends('base')
@section('main')
<div class="row">
  <div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>
<div class="col-sm-12">
    <h1 class="display-3" style="margin-left: 450px;">FX</h1>
    <div>
    <a style="margin: 19px; margin-left: 1000px;" href="{{ route('fx.create')}}" class="btn btn-primary">Create FX</a>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Country</td>
          <td>Currency</td>
          <td>Fx Buy</td>
          <td>Fx Sell</td>
          <td>Status</td>
          <td colspan = 2><h5 style="margin-left: 70px;"><b>Actions</b></h5></td>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->country}}</td>
            <td>{{$contact->currency}}</td>
            <td>{{number_format($contact->fx_buy, 2)}}</td>
            <td>{{number_format($contact->fx_sell, 2)}}</td>
            <td>
                @if($contact->status == 'enable')
                    <span class="badge bg-blue">Enable</span>
                @else
                    <span class="badge bg-pink">Disable</span>
                @endif
            </td>
            <!-- <td>
              <input data-id="{{$contact->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Enable" data-off="Disable" {{ $contact->status ? 'checked' : '' }}>
            </td> -->

            <td>
                <a href="{{ route('fx.edit', $contact->fx_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('fx.destroy', $contact->fx_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>


@endsection

