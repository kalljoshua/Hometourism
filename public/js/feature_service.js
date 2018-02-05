function featured(pid){
    $.ajax({
        type: 'GET',
        headers: {"cache-control": "no-cache"},
        url: "/admin/feature-service",
        async: true,
        cache: false,
        dataType: "json",
        data: 'service_id=' + pid,
        processData: false,
        contentType: false,
        success: function (jsonData, textStatus, jqXHR) {

            console.log("Error: "+jsonData["error"]+",Status: "+jsonData["status"]+"Message: "+jsonData["message"]);

            var span = document.getElementById("rbtn"+pid);

            if(jsonData["error"] == 0 && jsonData["status"] == 1){
                span.className = "btn btn-success";
                span.innerHTML = "Featured";
            }

            if(jsonData["error"] == 0 && jsonData["status"] == 2){
                span.className = "btn btn-default";
                span.innerHTML = "Feature";
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log("The error is: "+errorThrown);
        }
    });
}

(function($){

    $.ajax({
        type: 'GET',
        headers: {"cache-control": "no-cache"},
        url: "/admin/get-featured-services",
        async: true,
        cache: false,
        dataType: "json",
        data: 'service_id=',
        processData: false,
        contentType: false,
        success: function (jsonData, textStatus, jqXHR) {

            console.log('getting featured');

            var f = jsonData["featured"];

            for(var i = 0;i < f.length;i++){

                console.log("rbtn"+f[i]);

                var span = document.getElementById("rbtn"+f[i]);
                span.className = "btn btn-success";
                span.innerHTML = "Featured";
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log("The error is: "+errorThrown);
        }
    });
})(window.jQuery);
