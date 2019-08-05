jQuery(document).ready(function($){

    $('.del_btn').on('submit',function(e){
        if(!confirm('Do you want to delete this item?')){
            e.preventDefault();
        }
    });

    var _token = $('input[name="_token"]').val();

    let task = $('.task').length;

    function load_data(id="", _token){
        console.log('ld');
        $.ajax({
            url: "/todo/load_data/"+id,
            method: 'POST',
            data: {id: id, _token: _token},
            success: function (data) {

                $('#add_data').append(data);
            }

        });
    }

    function load_data_f(id="", _token, cat_id){
        console.log('ldf');
        $.ajax({
            url: "/todo/load_data/"+id+"/"+cat_id,
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
        var new_q = btn.data('quant', quant+5);

        var currentLocation = window.location.pathname;
        currentLocation = currentLocation.split('/');
        if(currentLocation[2] == 'cat'){
            cat_id = currentLocation[3];
            load_data_f(quant, _token, cat_id);
        }else{
            load_data(quant, _token);
        }
        // console.log(currentLocation);


        task = $('.task').length;
        if(task < quant){
            $('#load_more_button').text('No more');
            $('#load_more_button').prop('disabled', true);
        }
    })

});