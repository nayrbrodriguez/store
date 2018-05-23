<script type="text/javascript">
  $('#search').on('keyup',function() {
    $value=$(this).val(); 
    $.ajax({
      type: 'get',
      url :'{{URL::to('admin/banner_search')}}',
      data :{'search':$value},
      success:function(data){
        $('tbody').html(data);
      }
    });
  })
</script>