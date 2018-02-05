function deletePropertyImage(pId,imageId){
    
    alert("Delete photo?")

    console.log('Property id: '+pId);
    console.log('Image id: '+imageId);
    
    var span = document.getElementById("img-"+imageId);
    
    
    console.log(span);
    
    $("#img-"+imageId).append('<div class="z-index: 9"><div class="loader">Loading...</div></div>');
    
    $.ajax({
        type: 'GET',
        headers: {"cache-control": "no-cache"},
        url: "/delete-property-image",
        async: true,
        cache: false,
        dataType: "json",
        data: 'property_id=' + pId +'&image_id='+imageId,
        processData: false,
        contentType: false,
        success: function (jsonData, textStatus, jqXHR) {

            console.log("Error: "+jsonData["error"]+",Status: "+
            jsonData["status"]+"Message: "+jsonData["message"]);
            console.log(jsonData["files_status"]);

            if(jsonData["error"] == 0 && jsonData["status"] == 1){
                $("#col-"+imageId).fadeOut();
                console.log('Deleted');
            }

            if(jsonData["error"] == 0 && jsonData["status"] == 2){
                console.log('Not deleted');
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

}
