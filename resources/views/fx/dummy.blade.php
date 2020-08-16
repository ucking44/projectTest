<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == 'enable' ? enable : disable;
        //var slider = $(this).prop('checked') == true ? enable : disable;
        //var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/fx',
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