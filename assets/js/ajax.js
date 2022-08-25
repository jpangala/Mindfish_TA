
$(function(){

  $(".id").change(function(){
    var id = $(this).val();
    var base_url='http://localhost/Mindfish1/admin/';
    $.ajax({
      url: base_url + "Data_penjualan/ikan/",
      data: {
          id: id
        },
      method: "POST",
      dataType : 'json',
      success: function (data){
        console.log(data);
      }
    });
  });

});
