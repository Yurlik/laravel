jQuery(document).ready(function($){

    $('.del_btn').on('submit',function(e){
        if(!confirm('Do you want to delete this item?')){
            e.preventDefault();
        }
    });

    var _token = $('input[name="_token"]').val();

    let task = $('.task').length;

    function load_data(id="", _token){
        $.ajax({
            url: "/todo/load_data/"+id,
            method: 'POST',
            data: {id: id, _token: _token},
            success: function (data) {

                $('#add_data').append(data);
            }

        });
    }

    $('#load_more_button').on('click', function () {
        var btn = $('#load_more_button');
        var quant = btn.data('quant');
        var new_q = btn.data('quant', quant+5)
        load_data(quant, _token);
        task = $('.task').length;
        if(task < quant){
            $('#load_more_button').text('No more');
            $('#load_more_button').prop('disabled', true);
        }
    })

});