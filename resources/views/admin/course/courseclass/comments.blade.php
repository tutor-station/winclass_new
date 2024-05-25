
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>  
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style type="text/css">
body {
    background: #eee
}

.date {
    font-size: 11px
}

.comment-text {
    font-size: 25px
}

.fs-12 {
    font-size: 12px
}

.shadow-none {
    box-shadow: none
}

.name {
    color: #007bff
}

.cursor:hover {
    color: blue
}

.cursor {
    cursor: pointer
}

.textarea {
    resize: none
}

.fa-facebook {
    color: #3b5999
}

.fa-twitter {
    color: #55acee
}

.fa-linkedin {
    color: #0077B5
}

.fa-instagram {
    color: #e4405f
}

.fa-dribbble {
    color: #ea4c89
}

.fa-pinterest {
    color: #bd081c
}

.fa {
    cursor: pointer
}
</style>



<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<!-- <input type="hidden" name="lastId" id="lastIdUpdate" value=""> -->
			<h3 style="text-align: center;">Ummeed Classes Live Chat</h3>
			<!-- <div class="col-md-12">
			<iframe  class="col-md-12" height="400" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</div> -->
			<div id="Div_Container" class="container mt-5" data-mdb-perfect-scrollbar='true' style="overflow: auto; height: 600px;"> 
				<input type="hidden" name="lastId" id="lastIdUpdate" value="">
			 	<div id="Id_Div_Comments"></div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
var default_url = '<?= $gsettings->default_link_url; ?>';

const messages = document.getElementById('Div_Container');
console.log(messages);
$( document ).ready(function() {
    var id = '<?= $id ?>';
    var lastId = 0;
    getComments(id, lastId);

});


function getComments(id, lastId){
  	$.ajax({
		    type: 'GET', 
		   	url: default_url+"get-all-comment-return",
    		data: {  
    			course_class_id: id,
			    LastId: lastId
			  },

		    success: function(data){ 
		    	$("#lastIdUpdate").val(data.lastId);
		        $("#Id_Div_Comments").append(data.html);
		    }
		});
	}


	setInterval(function(){

		var id = '<?= $id ?>';
		var lastId = $("#lastIdUpdate").val();

		getComments(id, lastId);

		scrollToBottom(messages);

	}, 3000);

	function scrollToBottom(messagesDiv) {
	  messagesDiv.scrollTop = messagesDiv.scrollHeight;
	}



</script>












 