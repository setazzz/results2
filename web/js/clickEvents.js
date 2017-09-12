/**
 * Created by Matas on 2017.08.08.
 */

// result button click event
// marks the selected result with a className 'y'
$('ol').click(function (e) {
    if (e.target.tagName === 'BUTTON') {
        var resultString;
        const button = e.target;
        const li = button.parentNode.parentNode;
        const action = button.textContent;
        const points = getDifficulty(button) * 10;
        const selected = button.classList.contains('y');
        const nameActions = {
            Flash: function () {
                if (!selected) {
                    if (button.nextElementSibling.classList.contains('y')) {
                        button.nextElementSibling.classList.remove('y');
                        score -= points;
                    }
                    button.classList.add('y');
                    score += points * 1.2;
                    resultString = resultReplace('F', getRouteNumber(li.id), result.value);
                } else {
                    button.classList.remove('y');
                    score -= points * 1.2;
                    resultString = resultReplace('0', getRouteNumber(li.id), result.value);
                }
            },
            Top: function () {
                if (!selected) {
                    if (button.previousElementSibling.classList.contains('y')) {
                        button.previousElementSibling.classList.remove('y');
                        score -= points * 1.2;
                    }
                    button.classList.add('y');
                    score += points;
                    resultString = resultReplace('T', getRouteNumber(li.id), result.value);
                } else {
                    button.classList.remove('y');
                    score -= points;
                    resultString = resultReplace('0', getRouteNumber(li.id), result.value);
                }
            },
            "Special Challenge": function () {
                if (!selected) {
                    button.classList.add('y');
                    score += points;

                } else {
                    button.classList.remove('y');
                    score -= points;
                }
            }
        }

        nameActions[action]();
        $('.score').html(scoreDisplay(score));
        result.value = resultString;
        total.value = score;
    }
}); //end button click

// clear button click event
// clears everything
$('.clear').click(function() {
    for (var i = 1; i <= numberOfRoutes; i++) {
        var idName = (i < 10) ? 'no0' + i : 'no' + i;
        var listButtons = document.getElementById(idName).firstElementChild.children;
        if (listButtons[0].classList.contains('y')) {
            listButtons[0].classList.remove('y');
        } else if (listButtons[1].classList.contains('y')) {
            listButtons[1].classList.remove('y');
        }
    }
    result.value = standartResultString;
    total.value = 0;
    $('.score').html(scoreDisplay(score = 0));
}); //end clear click

// Hide button click event
// Hides column-route culumns
$('.hideBtn').click(function (e) {
    var button = e.target;
    if (!button.classList.contains('hidden')) {
        for (var i = 0; i < $('.column-route').length; i++) {
            $('.column-route')[i].classList.add('hide');
        }
        for (var i = 0; i < $('.column-chal').length; i++) {
            $('.column-chal')[i].classList.add('hide');
        }
        button.classList.add('hidden')
    } else {
        for (var i = 0; i < $('.column-route').length; i++) {
            $('.column-route')[i].classList.remove('hide');
        }
        for (var i = 0; i < $('.column-chal').length; i++) {
            $('.column-chal')[i].classList.remove('hide');
        }
        button.classList.remove('hidden')
    }
});  //End hide click

// Export button click event
// Download results file in .xls
$("#btnExport").click(function(e) {
    e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = json.name + '_' + json.date + '.xls';
    a.click();
}); //end Export click
