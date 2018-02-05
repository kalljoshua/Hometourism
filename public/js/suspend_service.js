function suspendService(pid){

        var chk = document.getElementById("sus-check-service"+pid);
        var status;
        if(chk.checked == true) {
            state = 1;
        }else {
            state = 0;
        }

        console.log("Howdy: "+pid);
        console.log("Howdy2: "+state);

        $.ajax({
            type: 'GET',
            headers: {"cache-control": "no-cache"},
            url: "/admin/suspend-service",
            async: true,
            cache: false,
            dataType: "json",
            data: 'service_id=' + pid+ '&state=' +state,
            processData: false,
            contentType: false,
            success: function (jsonData, textStatus, jqXHR) {

                console.log("Error: "+jsonData["error"]+", Status: "+jsonData["status"]+", Message: "+jsonData["message"]);


                if(jsonData["error"] == 0 && jsonData["status"] == 1){
                    document.getElementById("sus-check-service"+pid).checked = true;
                }

                if(jsonData["error"] == 0 && jsonData["status"] == 2){
                    document.getElementById("sus-check-service"+pid).checked = false;
                }

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log("the error is: "+errorThrown);
            }
        });
}

(function($){

    $.ajax({
        type: 'GET',
        headers: {"cache-control": "no-cache"},
        url: "/admin/get-suspended-services",
        async: true,
        cache: false,
        dataType: "json",
        data: 'service_id=',
        processData: false,
        contentType: false,
        success: function (jsonData, textStatus, jqXHR) {

            console.log('getting suspended Services');

            var f = jsonData["suspended"];

            for(var i = 0;i < f.length;i++){

                console.log("sus-check-service"+f[i]);

                //var span = document.getElementById("sus-check-property"+f[i]);
                document.getElementById("sus-check-service"+f[i]).checked = true;
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log("The errooor is:" +errorThrown);
        }
    });
})(window.jQuery);
