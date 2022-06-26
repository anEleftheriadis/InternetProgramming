// Mouse button clicks
    var button = document.querySelector('button');

    button.addEventListener('mouseup', function (evt) {
        var that = this;
        switch (evt.button) {
        case 0:
            this.innerHTML = 'left click';
            break;
        case 1:
            this.innerHTML = 'middle click';
            break;
        case 2:
            this.innerHTML = 'right click';
            break;
        }
        setTimeout(function () {
            that.innerHTML = 'Press me...';
        }, 1500);
    }, false);

    button.addEventListener('contextmenu', function (evt) {
        evt.preventDefault();
    }, false);

// Event phases
    var msg = '',
        phasesP = document.getElementById('phases'),
        printEvent = function (evt) {
            var phase = ['none', 'capture', 'target', 'bubble'];

            if (evt.target === phasesP) {
                if ((evt.currentTarget === document) && (phase[evt.eventPhase] === 'capture')) {
                    msg = '';
                }
                msg += evt.currentTarget.nodeName + ' ' + phase[evt.eventPhase] + '<br>';
                phasesP.innerHTML = msg;
            }
        };

    [document, document.body, phasesP].forEach(function (item) {
        [true, false].forEach(function (bool) {
            item.addEventListener('click', printEvent, bool);
        });
    });
    
    // The simplest of events
    document.getElementById('resetPhases').addEventListener('click', function () {
        phasesP.innerHTML = 'Click on me to study phases';
    }, false);

// Event delegation
    document.querySelector('table').addEventListener('click', function (evt) {
        var tdStyle = evt.target.style,
            bgColor = tdStyle.backgroundColor;
        tdStyle.backgroundColor = (bgColor === 'black') ? 'white' : 'black';
    }, false);
    
// Keyboard events + animation
    var move = false, direction, speed = 3,
        circle = document.getElementsByClassName('circle')[0],
        myleft = Number.parseInt(getComputedStyle(circle).left),
        mytop  = Number.parseInt(getComputedStyle(circle).top),
        moveCircle = function () {
            if (move) {
                switch (direction) {
                    case 'left':
                        myleft = myleft - speed;
                        circle.style.left = myleft + 'px';
                        break;
                    case 'right':
                        myleft = myleft + speed;
                        circle.style.left = myleft + 'px';
                        break;
                    case 'up':
                        mytop = mytop - speed;
                        circle.style.top = mytop + 'px';
                        break;
                    case 'down':
                        mytop = mytop + speed;
                        circle.style.top = mytop + 'px';
                        break;
                }
                requestAnimationFrame(moveCircle);
            }
        };

    document.addEventListener('keydown', function (evt) {
        if (!move) {
            move = true;
            switch (evt.code) {
                case 'ArrowLeft':
                    direction = 'left';
                    break;
                case 'ArrowUp':
                    direction = 'up';
                    break;
                case 'ArrowRight':
                    direction = 'right';
                    break;
                case 'ArrowDown':
                    direction = 'down';
                    break;
                default:
                    move = false;
            }
            requestAnimationFrame(moveCircle);
        }
    }, false);
    document.addEventListener('keyup', function (evt) {
        if (move) {
            move = false;
        }
        requestAnimationFrame(moveCircle);
    }, false);
