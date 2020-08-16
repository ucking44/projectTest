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
    <h3 class="display-3" style="margin-left: 400px;">PTA</h3>
    <div>
    <a style="margin: 19px; margin-left: 1000px;" href="{{ route('pta.create')}}" class="btn btn-primary">Create PTA</a>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Country</td>
          <td>PTA Name</td>
          <td>Value</td>
          <td>Status</td>
          <td colspan = 2><h5 style="margin-left: 70px;"><b>Actions</b></h5></td>
        </tr>
    </thead>
    <tbody>
        @foreach($ptas as $pta)
        <tr>
            <td>{{$pta->country}}</td>
            <td>{{$pta->pta_name}}</td>
            <td>{{number_format($pta->value, 2)}}</td>
            <td>
                @if($pta->status == 'enable')
                    <span class="badge bg-blue">Enable</span>
                @else
                    <span class="badge bg-pink">Disable</span>
                @endif
            </td>
            <!-- <td>
                @if($pta->status == true)
                    <span class="badge bg-blue">Enable</span>
                @else
                    <span class="badge bg-pink">Disable</span>
                @endif
            </td> -->
            <!-- <td>
              <input data-id="{{$pta->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Enable" data-off="Disable" {{ $pta->status ? 'checked' : '' }}>
            </td> -->

            <td>
                <a href="{{ route('pta.edit', $pta->pta_rate_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('pta.destroy', $pta->pta_rate_id)}}" method="post">
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

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == 'enable' ? enable : disable;
        //var slider = $(this).prop('checked') == true ? enable : disable;
        //var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/pta',
            data: {'status': status},
            success: function(data){
              console.log(data.success)
            }
        });
    });
  });

  function currencyFormatDE(num) {
      return (
        num
          .toFixed(2) // always two decimal digits
          .replace('.', ',') // replace decimal point character with ,
          .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' €'
      ) // use . as a separator
  }

    console.info(currencyFormatDE(1234567.89)); // output 1.234.567,89 €


</script>
@endsection

