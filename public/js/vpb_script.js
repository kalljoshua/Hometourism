/**************************************************************
* This script is brought to you by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
****************************************************************/



//Form submission
function submit_without_page_refresh(id_forum)
{
	var post_message = $("#post_message"+id_forum).val();
	var idforum = $("#idforum").val();

	if(post_message == "")
	{
		$("#submit_without_page_refresh_status").html('<div class="info" align="left">Please enter your fullname to get started.</div>');
		$("#post_message"+id_forum).focus();
	}
	else if(idforum == "")
	{
		$("#submit_without_page_refresh_status").html('<div class="info" align="left">Please enter your email address to proceed.</div>');
		$("#idforum").focus();
	}
	else
	{
		var dataString = 'post_message='+ post_message + '&idforum='+ id_forum + '&page=forum_comment';
		$.ajax({
			type: "POST",
			url: "comment_post.php",
			data: dataString,
			cache: false,
			beforeSend: function()
			{
				$("#submit_without_page_refresh_status"+id_forum).html('<div style="padding-left:120px;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please wait</font> <img src="images/loadings.gif" alt="Loading...." align="absmiddle" title="Loading...."/></div><br clear="all">');
			},
			success: function(response)
			{
				$("#submit_without_page_refresh_status"+id_forum).hide().fadeIn('slow').html(response);
				$("#submit_without_page_refresh_status"+id_forum).focus();
				$("#post_message"+id_forum).val('');
				get_comment(id_forum);
			}
		});
	}
}

function get_comment(id_forum) {
	var dataString = 'idforum='+ id_forum + '&page=get_comment';
	$.ajax({
		type: "POST",
		url: "comment_post.php",
		data: dataString,
		cache: false,
		beforeSend: function()
		{
			$("#postList").html('<img src="loader.gif" align="absmiddle" alt="Loading...">');
		},
		success: function(response)
		{
			$("#postList").hide().fadeIn('slow').html(response);
		}
	});
}



function toCelsius(id_forum) {
	var dataString = 'idforum='+ id_forum + '&page=modal_comment_like';
	$.ajax({
		type: "POST",
		url: "comment_post.php",
		data: dataString,
		cache: false,
		beforeSend: function()
		{
			$("#load_likes"+id_forum).html('<img src="loader.gif" align="absmiddle" alt="Loading...">');
		},
		success: function(response)
		{
			$("#load_likes"+id_forum).hide().fadeIn('slow').html(response);
		}
	});
}


function submit_without_page(id_forum)
{
	var post_message = $("#post_messager"+id_forum).val();
	var idforum = $("#idforum").val();

	if(post_message == "")
	{
		$("#submit_without_page_refresh_status").html('<div class="info" align="left">Please enter your fullname to get started.</div>');
		$("#post_messager"+id_forum).focus();
	}
	else if(idforum == "")
	{
		$("#submit_without_page_refresh_status").html('<div class="info" align="left">Please enter your email address to proceed.</div>');
		$("#idforum").focus();
	}
	else
	{
		var dataString = 'post_message='+ post_message + '&idforum='+ id_forum + '&page=modal_comment';
		$.ajax({
			type: "POST",
			url: "comment_post.php",
			data: dataString,
			cache: false,
			beforeSend: function()
			{
				$("#submit_without_page_refresh"+id_forum).html('<div style="padding-left:120px;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please wait</font> <img src="images/loadings.gif" alt="Loading...." align="absmiddle" title="Loading...."/></div><br clear="all">');
			},
			success: function(response)
			{
				$("#submit_without_page_refresh"+id_forum).hide().fadeIn('slow').html(response);
				$("#post_messager"+id_forum).val('');
				toCelsius(id_forum);
			}
		});
	}
}


//Like and Unlike Comments Function
function Like_or_Unlike_Comments(comment_id, action)
{
	var dataString = "comment_id=" + comment_id + "&action=like_or_unlike_comments";
	$.ajax({
		type: "POST",
		url: "comment_post.php",
		data: dataString,
		beforeSend: function()
		{
			if ( action == "vpb_like" )
			{
				$("#vpb_like"+comment_id).hide();
				$("#loading_like_or_unlike"+comment_id).html('<img src="loader.gif" align="absmiddle" alt="Loading...">');
			}
			else if ( action == "vpb_unlike" )
			{
				$("#vpb_unlike"+comment_id).hide();
				$("#loading_like_or_unlike"+comment_id).html('<img src="loader.gif" align="absmiddle" alt="Loading...">');
			}
			else {}

		},
		success: function(response)
		{
			if ( action == "vpb_like" )
			{
				$("#like_num"+comment_id).hide().fadeIn('slow').html(response);
				$("#loading_like_or_unlike"+comment_id).html('');
				$("#vpb_unlike"+comment_id).show();
			}
			else if ( action == "vpb_unlike" )
			{
				$("#like_num"+comment_id).hide().fadeIn('slow').html(response);
				$("#loading_like_or_unlike"+comment_id).html('');
				$("#vpb_like"+comment_id).show();
			}
			else {}
		}
	});
}

//Delete Comments Function
function Delete_this_comment(comment_id)
{
	if(confirm("Are you sure you want to delete this Post? Press OK if yes and Cancel if no."))
	{
		var dataString = "comment_id=" + comment_id + "&action=delete_this_comment";
		$.ajax({
			type: "POST",
			url: "comment_post.php",
			data: dataString,
			beforeSend: function()
			{
				$("#deleting_this_comment"+comment_id).html('<img src="loading.gif" align="absmiddle" alt="Loading..."> deleting...');
			},
			success: function(response)
			{
				$("#commentHolder"+comment_id).fadeOut();
			}
		});
	}
	return false;
}

//Edit comments function
function edit_forum_content(edit_forum)
{
	//document.getElementById('display').innerHTML = document.getElementById("password").value;
	var title = $("#title"+edit_forum).val();
	var details = $("#details"+edit_forum).val();
	if(title == "")
	{
		$("#edit_status").html('<div class="info">Please enter title in the required field to proceed.</div>');
		$("#title").focus();
		setTimeout(function(){window.location.href='index.php?_page=forum'},6000);
	}
	else if(details == "")
	{
		$("#edit_status").html('<div class="info">Please enter details to proceed.</div>');
		$("#details").focus();
		setTimeout(function(){window.location.href='index.php?_page=forum'},6000);
	}
	else
	{
		var dataString = 'title='+ title + '&details=' + details + '&idforum='+ edit_forum + '&page=edit_comment';
		$.ajax({
			type: "POST",
			url: "comment_post.php",
			data: dataString,
			cache: false,
			beforeSend: function()
			{
				$("#edit_status").html('<br clear="all"><div style="padding-left:20%;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please wait</font> <img src="images/loadings.gif" alt="Loading...." align="absmiddle" title="Loading...."/></div><br clear="all">');
			},
			success: function(response)
			{
				$("#edit_status"+edit_forum).hide().fadeIn('slow').html(response);
				$("#exampleInputEmail1"+edit_forum).val('');
				$("#details"+edit_forum).val('');
				setTimeout(function(){window.location.href='index.php?_page=forum'},2000);
			}
		});
	}
}


//This function hides the default information when clicked on it shows the editable information
function vasplus_live_edit_area(details_id)
{
	$(".vasplus_live_edit_area").css("background-color","#FFF");
	$("#detail_a"+details_id).hide();
	$("#detail_b"+details_id).hide();
	$("#detail_c"+details_id).hide();
	$("#detail_aa"+details_id).show();
	$("#detail_bb"+details_id).show();
	$("#detail_cc"+details_id).show();
	$("#id"+details_id).css("background-color","#F6F6F6");

}

//This function hides the editable information when press the Enter Key on your computer keyboard and shows the editted and saved info
$(document).bind('keydown', function(vpb_event)
{
	//Press the enter key to hide the edit boxes
	if(vpb_event.keyCode == 13 && vpb_event.shiftKey == 0)
	  {
		$(".vasplus_hidden_boxes").hide();
		$(".vasplus_live_content").show();
		$(".vasplus_live_edit_area").css("background-color","#FFF");
	  }
});

//This function is responsible for saving all changes made to information or contents
$(document).ready(function()
{
	$(".vasplus_live_edit_area").bind('change', function()
	{
		var details_id =  $(this).attr('id').replace('id','');
		var detail_aa = $("#detail_aa"+details_id).val();
		var detail_bb = $("#detail_bb"+details_id).val();
		var detail_cc = $("#detail_cc"+details_id).val();

		var dataString = 'iduser=' + details_id + '&education=' + detail_aa + '&locatione='+detail_bb + '&details='+detail_cc;

		if(detail_aa != "" && detail_bb != "" && detail_cc != "")
		{
			$.ajax({
				type: "POST",
				url: "save_changes.php",
				data: dataString,
				cache: false,
				beforeSend: function()
				{
					$("#detail_a"+details_id).html('<img src="loading.gif" alt="Loading...." />');
				},
				success: function()
				{
					$("#detail_a"+details_id).html(detail_aa);
					$("#detail_b"+details_id).html(detail_bb);
					$("#detail_c"+details_id).html(detail_cc);
				}
			});
		}
		else
		{
			alert('That field can not be completely empty. Please enter some content. Thanks...');
			return false;
		}
	});
});
