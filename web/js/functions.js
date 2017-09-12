/**
 * Created by Matas on 2017.08.08.
 */

function scoreDisplay (flash) {
    return 'Your score: ' + flash;
}

function getRouteNumber(id) {
    if (id.charAt(2) == 0) {
        return parseInt(id.substr(3, 1));
    } else {
        return parseInt(id.substr(2, 2));
    }
}

function resultReplace(char, index, result) {
    return result.substr(0, index - 1) + char + result.substr(index)
}

function makeButtons(ammount) {
    var buttons = '<ol class="buttons">';

    for(var i = 0; i < ammount; i++) {
        var j = i + 1;
        buttons += '<li id="no' + ('0' + j).slice(-2);
        buttons += '" class="';
        buttons += 'lvl' + Math.ceil(j / 8);
        buttons += '"><div class="input-btn">';
        buttons += '<button class="flash">Flash</button>';
        buttons += '<button class="top">Top</button>';
        buttons += '</div></li>';
    }
    if (json.specChal == 1) {
        buttons += '<button class="specChal">Special Challenge</button>';
    }
    buttons += '</ol>';

    return buttons;
}

function getDifficulty(button) {
    var value;
    if (button.classList.contains('specChal')) {
        value = json.specChalPoints / 10;
    } else {
        value = button.parentNode.parentNode.className.charAt(3);
    }
    return value;
}

function moveScroller() {
    var $anchor = $("#scroller-anchor");
    var $scroller = $('#scroller');

    var move = function() {
        var st = $(window).scrollTop();
        var ot = $anchor.offset().top;
        if(st > ot) {
            $scroller.css({
                position: "fixed",
                top: "0px"
            });
        } else {
            $scroller.css({
                position: "relative",
                top: ""
            });
        }
    };
    $(window).scroll(move);
    move();
}

function sortTable(sex) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById(sex);
    switching = true;
    /*Make a loop that will continue until
     no switching has been done:*/
    rows = table.getElementsByClassName("row");
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.getElementsByClassName("row");
        /*Loop through all table rows (except the
         first, which contains table headers):*/
        for (i = 0; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
             one from current row and one from the next:*/
            x = rows[i].getElementsByClassName("column-score")[0];
            y = rows[i + 1].getElementsByClassName("column-score")[0];
            //check if the two rows should switch place:
            if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
                //if so, mark as a switch and break the loop:
                shouldSwitch= true;
                break;
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
             and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}