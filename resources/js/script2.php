<script>
    
    
    

$(document).ready(function () {
    $('.js--veg-btn').click(function () {
        var nav = $('.js--meals-showcase');
        var nav2 = $('.js--non-veg-meals-showcase');
        if (nav.is(":hidden") && nav2.is(":hidden")) {
            $('.js--welcome-text').hide(500);
            nav.first().show("fast", function showNext() {
                $(this).next(nav).show("fast", showNext);
            });
        } else if (nav2.is(":visible")) {

            nav2.first().hide("fast", function showNext() {
                $(this).next(nav).hide("fast", showNext);
            });

            nav.first().show("fast", function showNext() {
                $(this).next(nav).show("fast", showNext);
            });

        } else {

            nav.first().hide("fast", function showNext() {
                $(this).next(nav).hide("fast", showNext);
            });
            $('.js--welcome-text').show(1000);
        }

    });

    $('.js--non-veg-btn').click(function () {
        var nav = $('.js--non-veg-meals-showcase');
        var nav2 = $('.js--meals-showcase');
        if (nav.is(":hidden") && nav2.is(":hidden")) {
            $('.js--welcome-text').hide(500);
            nav.first().show("fast", function showNext() {
                $(this).next(nav).show("fast", showNext);
            });
        } else if (nav2.is(":visible")) {

            nav2.first().hide("fast", function showNext() {
                $(this).next(nav).hide("fast", showNext);
            });

            nav.first().show("fast", function showNext() {
                $(this).next(nav).show("fast", showNext);
            });

        } else {
            nav.first().hide("fast", function showNext() {
                $(this).next(nav).hide("fast", showNext);
            });
            $('.js--welcome-text').show(500);
        }

    });


});

//variables

var vquantity, nvquantity, totalquantity;
var price;
var sum;
var vselect, nvselect;
var vorder, nvorder;

init();


/*-----------------------------FOR VEG----------------------------------------------*/


/*-------------------------------------------------------------------------------------------*/
//Code for selecting a division
//Add these codes for each div added in html
//This is for VEG

document.querySelector('.veg-1').addEventListener('click', function () {

    if (vselect) {
        price = 60;
        vselected(1);
        document.querySelector('.icon-v-1').style.display = 'block';
        spopup();
        vorder = 1;
        
    }

});



//veg - 2

document.querySelector('.veg-2').addEventListener('click', function () {
    if (vselect) {
        price = 110;
        vselected(2);
        document.querySelector('.icon-v-2').style.display = 'block';
        vorder = 2;
    }
});

//veg - 3

document.querySelector('.veg-3').addEventListener('click', function () {
    if (vselect) {
        price = 110;
        vselected(3);
        document.querySelector('.icon-v-3').style.display = 'block';
        vorder = 3;
    }
});

//veg - 4

document.querySelector('.veg-4').addEventListener('click', function () {
    if (vselect) {
        price = 110;
        vselected(4);
        document.querySelector('.icon-v-4').style.display = 'block';
        vorder = 4;
    }
});

//veg - 5

document.querySelector('.veg-5').addEventListener('click', function () {
    if (vselect) {
        price = 110;
        vselected(5);
        document.querySelector('.icon-v-5').style.display = 'block';
        vorder = 5;
    }
});

//veg - 6

document.querySelector('.veg-6').addEventListener('click', function () {
    if (vselect) {
        price = 110;
        vselected(6);
        document.querySelector('.icon-v-6').style.display = 'block';
        vorder = 6;
    }
});

//veg - 7

document.querySelector('.veg-7').addEventListener('click', function () {
    if (vselect) {
        price = 110;
        vselected(7);
        document.querySelector('.icon-v-7').style.display = 'block';
        vorder = 7;
    }
});

//veg - 8

document.querySelector('.veg-8').addEventListener('click', function () {
    if (vselect) {
        price = 110;
        vselected(8);
        document.querySelector('.icon-v-8').style.display = 'block';
        vorder = 8;
    }
});

/*--------------------------------------------------------------------------------------------*/


//Code for unselecting veg
//Add these codes for each div added in html
/*---------------------------------------------------------------------------------------------*/

document.querySelector('.icon-v-1').addEventListener('click', function () {

    viconRemove(1);
    vselect = true;
    init();
    document.querySelector('.icon-v-1').style.display = 'none';
});

//icon veg - 2

document.querySelector('.icon-v-2').addEventListener('click', function () {
    viconRemove(2);
    vselect = true;
    init();
    document.querySelector('.icon-v-2').style.display = 'none';
});

//icon veg - 3

document.querySelector('.icon-v-3').addEventListener('click', function () {
    viconRemove(3);
    vselect = true;
    init();
    document.querySelector('.icon-v-3').style.display = 'none';
});

//icon veg - 4

document.querySelector('.icon-v-4').addEventListener('click', function () {
    viconRemove(4);
    vselect = true;
    init();
    document.querySelector('.icon-v-4').style.display = 'none';
});

//icon veg - 5

document.querySelector('.icon-v-5').addEventListener('click', function () {
    viconRemove(5);
    vselect = true;
    init();
    document.querySelector('.icon-v-5').style.display = 'none';
});

//icon veg - 6

document.querySelector('.icon-v-6').addEventListener('click', function () {
    viconRemove(6);
    vselect = true;
    init();
    document.querySelector('.icon-v-6').style.display = 'none';
});

//icon veg - 7

document.querySelector('.icon-v-7').addEventListener('click', function () {
    viconRemove(7);
    vselect = true;
    init();
    document.querySelector('.icon-v-7').style.display = 'none';
});

//icon veg - 8

document.querySelector('.icon-v-8').addEventListener('click', function () {
    viconRemove(8);
    vselect = true;
    init();
    document.querySelector('.icon-v-8').style.display = 'none';
});
/*----------------------------------------------------------------*/
//Funtions for veg

function viconRemove(number) {
    var div = document.querySelector('.v-' + number);
    div.classList.remove('overlay-select');
    div.classList.add('overlay');
    uspopup();
}
//select an item

function vselected(order) {
    var div = document.querySelector('.v-' + order);
    if (div.classList.contains('overlay')) {
        div.classList.remove('overlay');
        div.classList.add('overlay-select');
        spopup();
        vselect = false;
        document.getElementById('vquantity').disabled = false;
    } else {
        div.classList.remove('overlay-select');
        div.classList.add('overlay');
        uspopup();
        init();
    }


}

/*------------------------------------------------------------------------------------------------*/


/*-----------------------------FOR NON-VEG----------------------------------------------*/


/*-------------------------------------------------------------------------------------------*/
//Code for selecting a division
//Add these codes for each div added in html
//This is for NON-VEG

document.querySelector('.non-veg-1').addEventListener('click', function () {

    if (nvselect) {
        nvorder = 1;
        price = 60;
        nvselected(1);
        document.querySelector('.icon-nv-1').style.display = 'block';
    }
});

//non-veg - 2

document.querySelector('.non-veg-2').addEventListener('click', function () {
    if (nvselect) {
        price = 110;
        nvselected(2);
        document.querySelector('.icon-nv-2').style.display = 'block';
        nvorder = 2;
    }
});

//non-veg - 3

document.querySelector('.non-veg-3').addEventListener('click', function () {
    if (nvselect) {
        price = 110;
        nvselected(3);
        document.querySelector('.icon-nv-3').style.display = 'block';
        nvorder = 3;
    }
});

//non-veg - 4

document.querySelector('.non-veg-4').addEventListener('click', function () {
    if (nvselect) {
        price = 110;
        nvselected(4);
        document.querySelector('.icon-nv-4').style.display = 'block';
        nvorder = 4;
    }
});

//non-veg - 5

document.querySelector('.non-veg-5').addEventListener('click', function () {
    if (nvselect) {
        price = 110;
        nvselected(5);
        document.querySelector('.icon-nv-5').style.display = 'block';
        nvorder = 5;
    }
});

//non-veg - 6

document.querySelector('.non-veg-6').addEventListener('click', function () {
    if (nvselect) {
        price = 110;
        nvselected(6);
        document.querySelector('.icon-nv-6').style.display = 'block';
        nvorder = 6;
    }
});

//non-veg - 7

document.querySelector('.non-veg-7').addEventListener('click', function () {
    if (nvselect) {
        price = 110;
        nvselected(7);
        document.querySelector('.icon-nv-7').style.display = 'block';
        nvorder = 7;
    }
});

//non-veg - 8

document.querySelector('.non-veg-8').addEventListener('click', function () {
    if (nvselect) {
        price = 110;
        nvselected(8);
        document.querySelector('.icon-nv-8').style.display = 'block';
        nvorder = 8;
    }
});




/*--------------------------------------------------------------------------------------------*/


//Code for unselecting non-veg
//Add these codes for each div added in html
/*---------------------------------------------------------------------------------------------*/

document.querySelector('.icon-nv-1').addEventListener('click', function () {

    nviconRemove(1);
    nvselect = true;
    init();
    document.querySelector('.icon-nv-1').style.display = 'none';
});

//icon - 2

document.querySelector('.icon-nv-2').addEventListener('click', function () {
    nviconRemove(2);
    nvselect = true;
    init();
    document.querySelector('.icon-nv-2').style.display = 'none';
});

//icon - 3

document.querySelector('.icon-nv-3').addEventListener('click', function () {
    nviconRemove(3);
    nvselect = true;
    init();
    document.querySelector('.icon-nv-3').style.display = 'none';
});

//icon - 4

document.querySelector('.icon-nv-4').addEventListener('click', function () {
    nviconRemove(4);
    nvselect = true;
    init();
    document.querySelector('.icon-nv-4').style.display = 'none';
});

//icon - 5

document.querySelector('.icon-nv-5').addEventListener('click', function () {
    nviconRemove(5);
    nvselect = true;
    init();
    document.querySelector('.icon-nv-5').style.display = 'none';
});

//icon - 6

document.querySelector('.icon-nv-6').addEventListener('click', function () {
    nviconRemove(6);
    nvselect = true;
    init();
    document.querySelector('.icon-nv-6').style.display = 'none';
});

//icon - 7

document.querySelector('.icon-nv-7').addEventListener('click', function () {
    nviconRemove(7);
    nvselect = true;
    init();
    document.querySelector('.icon-nv-7').style.display = 'none';
});

//icon - 8

document.querySelector('.icon-nv-8').addEventListener('click', function () {
    nviconRemove(8);
    nvselect = true;
    init();
    document.querySelector('.icon-nv-8').style.display = 'none';
});

/*------------------------------------------------------------------------------------------------*/


//functions
/*-------------------------------------------------------------------------------------------------*/

//only for icon

function nviconRemove(number) {
    var div = document.querySelector('.nv-' + number);
    div.classList.remove('overlay-select');
    div.classList.add('overlay');
    uspopup();
}
//select an item

function nvselected(order) {
    var div = document.querySelector('.nv-' + order);
    if (div.classList.contains('overlay')) {
        div.classList.remove('overlay');
        div.classList.add('overlay-select');
        spopup();
        nvselect = false;
        document.getElementById('nvquantity').disabled = false;
    } else {
        div.classList.remove('overlay-select');
        div.classList.add('overlay');
        uspopup();
        init();
    }


}

//to calculate sum

function displaySum() {

    vquantity = document.getElementById('vquantity').value;
    nvquantity = document.getElementById('nvquantity').value;
    totalquantity = parseInt(nvquantity) + parseInt(vquantity);
    document.querySelector('.tq').textContent = totalquantity;
    if (totalquantity >= 15) {
        document.querySelector('.submit').style.display = 'inline-block';
    } else {
        document.querySelector('.submit').style.display = 'none';
    }
    sum = (vquantity * price) + (nvquantity * price);
    document.getElementById('total').value = 'Rs.' + sum;
    
}

//to initialise

document.getElementById('reset').addEventListener('click', function () {
    init();
    document.getElementById('#vorder').textContent = vorder;
    document.getElementById('#nvorder').textContent = nvorder;
    document.querySelector('.v-' + vorder).classList.remove('overlay-select');
    document.querySelector('.v-' + vorder).classList.add('overlay');
    document.querySelector('.nv-' + nvorder).classList.remove('overlay-select');
    document.querySelector('.nv-' + nvorder).classList.add('overlay');
});

function init() {
    nvselect = true;
    vselect = true;
    vquantity = 0;
    nvquantity = 0;
    vorder = nvorder = 0;
    price = 0;
    sum = 0;
    totalquantity = 0;
    document.getElementById('total').textContent = sum;
    document.getElementById('vquantity').value = "0";
    document.getElementById('nvquantity').value = "0";
    document.getElementById('vquantity').disabled = true;
    document.getElementById('nvquantity').disabled = true;
    document.querySelector('.submit').style.display = 'none';
    document.querySelector('.tq').textContent = '*Total quantiy >= 15';
    //document.getElementById('.total').disabled = true;
}

function spopup() {
    let timerInterval
    Swal.fire({
        title: 'Selected',
        timer: 500,
        onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
                Swal.getContent().querySelector('strong')
                    .textContent = Swal.getTimerLeft()
            }, 100)
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {
        if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.timer
        ) {
            console.log('I was closed by the timer')
        }
    })
}

function uspopup() {
    let timerInterval
    Swal.fire({
        title: 'Removed',
        timer: 500,
        onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
                Swal.getContent().querySelector('strong')
                    .textContent = Swal.getTimerLeft()
            }, 100)
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {
        if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.timer
        ) {
            console.log('I was closed by the timer')
        }
    })
}
/*------------------------------------------------------------------------------------*/
</script>