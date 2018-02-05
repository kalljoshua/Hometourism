$('#category').on('change',function(e){

         $('#subcategory').find('option').remove().end();

           var cat_id = $('#category option:selected').attr('value');

             var info=$.get("{{url('ajax-category-subcategory')}}",{cat_id:cat_id});

               info.done(function(data){

                  $.each(data,function(index,subcatObj){

                     $('#subcategory').append('<option value="'+subcatObj.id+'">'+

                                subcatObj.name+'</option>');

                    });

        });

        info.fail(function(){

          alert('ok');

        });

       });
