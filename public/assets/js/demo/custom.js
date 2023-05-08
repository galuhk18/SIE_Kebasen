function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            $('#img-preview').attr('src', e.target.result);
            $('#img-preview').attr('height','150px');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

 $("#form-file").change(function() {
     readURL(this);
     let nameFile = $(this).val();
     $(".custom-file-label").html(nameFile);
});

$('body').on('click', '.delete-confirm', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Hapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus aja!'
      }).then((result) => {
        if (result.value) {
            window.location.href = url;
        }
      })
});

$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 1000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
