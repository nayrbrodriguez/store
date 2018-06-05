<script type="text/javascript">
  $('#search').on('keyup',function() {
    $value=$(this).val(); 
    $.ajax({
      type: 'get',
      url :'{{URL::to('search_customer'.$data->currentPage())}}',
      data :{'search':$value},
      success:function(data){
        $('tbody').html(data);
      }
    });
  })
</script>