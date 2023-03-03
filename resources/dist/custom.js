


$(document).ready(function () {
  $("form").submit(function (e) {
     e.preventDefault();

    var formData = {
      reciever_id: $("#reciever_id").val(),
      message: $("#message").val(),
    };

     var url = route('filament.createchat')
    $.ajax({
      type: "POST",
      url: url,
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);
    });

  });
});