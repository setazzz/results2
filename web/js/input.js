/**
 * Created by Matas on 2017.08.01.
 */

// if (isset(json)) {
    var numberOfRoutes = 35;
    var buttons = '';
    var score = 0;
    // $('.routes').html(makeButtons(numberOfRoutes));

    $('.score').html(scoreDisplay(score));
    // $('.title').html(json.name);
    // $('.date').html(json.date);
    $(document).ready(function(){
        $("#score-top").sticky({topSpacing:0});
    });

    var standartResultString = '00000000000000000000000000000000000';
    var result = document.getElementById('user_result');
    result.value = standartResultString;

    var total = document.getElementById('user_total');
    total.value = 0;
    // console.log(result);
// }

