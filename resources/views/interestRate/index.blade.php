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
    <h3 class="display-4" style="margin-left: 350px;">Interest Rate</h3>
    <div>
    <a style="margin: 19px; margin-left: 1000px;" href="{{ route('interestRate.create')}}" class="btn btn-primary">Create Interest Rate</a>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Country</td>
          <td>Interest Category</td>
          <td>Above 5m</td>
          <td>Below 5m</td>
          <td>Status</td>
          <td colspan = 2><h5 style="margin-left: 60px;"><b>Actions</b></h5></td>
        </tr>
    </thead>
    <tbody>
        @foreach($interestRates as $interestRate)
        <tr>
            <td>{{$interestRate->country}}</td>
            <td>{{$interestRate->interest_category}}</td>
            <td>{{$interestRate->above_5m}}</td>
            <td>{{$interestRate->below_5m}}</td>
            <td>
                @if($interestRate->status == 'enable')
                    <span class="badge bg-blue">Enable</span>
                @else
                    <span class="badge bg-pink">Disable</span>
                @endif
            </td>
            <!-- <td>
              <input data-id="{{$interestRate->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Enable" data-off="Disable" {{ $interestRate->status ? 'checked' : '' }}>
            </td> -->

            <td>
                <a href="{{ route('interestRate.edit', $interestRate->interest_rate_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('interestRate.destroy', $interestRate->interest_rate_id)}}" method="post">
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
            url: '/interestRate',
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

