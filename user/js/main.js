(function iife() {
    /* eslint-disable no-plusplus */
    /* eslint-disable no-var */
    /* eslint-disable prefer-arrow-callback */
    /* eslint-define $ */
    function renderStreamList(data, uuid) {
        var dataToMount = '';
        var i;
        for (i = 0; i < data.length; i++) {
        
         if (data[i].uuid == uuid) {
            if (data[i].name == "restreamio") {
            
              var logo = '<img src="data:image/png;base64,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" width="50" height="50">';
            
            } else {
            
              var logo = '<img src="https://icon2.cleanpng.com/20181210/pvv/kisspng-computer-icons-scalable-vector-graphics-portable-n-browse-internet-network-svg-png-icon-free-download-5c0ee91783bc22.1105414315444810475396.jpg" width="50" height="50">';
            
            }
            
            dataToMount += '<li id="' + data[i].id + '"> ' + logo + '<br>id = ' +
                data[i].id + '<br><button class="btn-kill" id="' + data[i].id + '"> Stop </button></li>';
        }
        document.getElementById('stream-list-ul').innerHTML = dataToMount;
      }
    }
    // render stream list on page load
    $.get('https://apps.chisdealhd.co.uk/apps/restream/api/liststreams', function liststreams(data) {
        var uuid = document.getElementById('uuid-reg').value;
        renderStreamList(data, uuid);
    });
    console.log('JS WORK!!!');
    $('#btn-info').on('click', function infoClickHandler(evt) {
        var inputUrl = document.getElementById('in-str-url').value;
        $.post('https://apps.chisdealhd.co.uk/apps/restream/api/info', { "inputUrl": inputUrl }, function infoPostHandler(data) {
            console.log('url to send', inputUrl);
            console.log('data recieved!! ', data.info);
            if (data.message === 0) {
                document.getElementById('stream-info').innerHTML = '<p> Source = ' + data.info.filename + '</p><p> Format = ' + data.info.format_long_name + '</p>' +
                    '<p> FPS = ' + data.info.tags.fps + '</p>' +
                    '<p> Size = ' + data.info.tags.displayWidth + 'x' + data.info.tags.displayHeight + '</p>';
            } else {
                document.getElementById('stream-info').innerHTML = '<p> Source = ' + data.message + '</p>';
            }

        })
    });
    $('#btn-start-stop').on('click', function btnStartStopClick(evt) {
        var inputUrl = document.getElementById('in-str-url').value;
        var outputUrl = document.getElementById('out-str-url').value;
        var btnStartStop = document.getElementById('btn-start-stop');
        if (btnStartStop.innerText === 'Start') {
            $.post('https://apps.chisdealhd.co.uk/apps/restream/api/restream', { "inputUrl": inputUrl, "outputUrl": outputUrl, "action": "run" }, function(data) {
                console.log('status - ', data.status);
                document.getElementById('btn-start-stop').innerText = "Stop";
            })
        } else if (btnStartStop.innerText === "Stop") {
            $.post('https://apps.chisdealhd.co.uk/apps/restream/api/restream', { "inputUrl": inputUrl, "outputUrl": outputUrl, "action": "kill" }, function(data) {
                console.log('status - ', data.status);
                document.getElementById('btn-start-stop').innerText = "Start";
            })
        }
    });
    $('#btn-add-new').on('click', function btnAddClick(evt) {
        var input = document.getElementById('in-str-url-reg').value;
        var output = document.getElementById('out-str-url-reg').value;
        var name = document.getElementById('name-reg').value;
        var uuid = document.getElementById('uuid-reg').value;
        // var streamList = document.getElementById('stream-list-ul').innerHTML;
        // var btnStartStop = document.getElementById('btn-start-stop');
        $.post('https://apps.chisdealhd.co.uk/apps/restream/api/addstream', { "inputUrl": input, "outputUrl": output, "name": name, "uuid": uuid }, function appStrHeandler(data) {
            console.log('after_add_response = ', data);
            console.log('data length = ', data.length);
            renderStreamList(data, uuid);
        });
    });
    $('#btn-refrash-list').on('click', function btnRefreshClick(evt) {
        var uuid = document.getElementById('uuid-reg').value;
        $.get('https://apps.chisdealhd.co.uk/apps/restream/api/liststreams', function getListstreams(data) {
            renderStreamList(data, uuid);
        });
    });
    $('#stream-list-ul').on('click', function(evt) {
        console.log('evt target = ', evt.target);
        var uuid = document.getElementById('uuid-reg').value;
        if ($(evt.target).hasClass('btn-kill')) {
            $.ajax({
                url: 'https://apps.chisdealhd.co.uk/apps/restream/api/streams',
                type: 'delete',
                data: { "id": $(evt.target).attr('id'), "uuid": uuid },
                success: function(newdata) { renderStreamList(newdata) }
            })
        }
    });
})();