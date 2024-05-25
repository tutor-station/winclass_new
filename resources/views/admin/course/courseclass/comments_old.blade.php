
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
			<h3 style="text-align: center;">Batra Sir Live Chat</h3>
			<?php if(isset($comments) && !empty($comments)){ ?>
			<div id="Div_Container" class="container mt-5" data-mdb-perfect-scrollbar='true' style="overflow: auto; height: 500px;"> 
				 <div id="Id_Div_Comments">
				<?php 
					
				$iLastCommentId = 0;
				if(count($comments))
				{

					foreach($comments as $iKey =>$arrDetail)
					{
						$iCommentId = $arrDetail['id'];
						$user_id = $arrDetail['user_id'];
						if(!empty($arrDetail['user_img'])){
							$sImageName = "https://batrasir.tutorstation.in/images/user_img/".$arrDetail['user_img'];
						}
						?>

						    <div class="d-flex justify-content-center row">
						        <div class="col-md-12">
						            <div class="d-flex flex-column comment-section" id="myGroup-<?= $iCommentId;?>">

						                <div class="bg-white p-2">

						                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="<?= $sImageName;?>" width="40">

						                        <div class="d-flex flex-column justify-content-start ml-2"><span style="font-size: 24px;" class="d-block font-weight-bold name"><?=$arrDetail['user_name'] ?></span><span class="date text-black-50"><?=date('d-M-Y h:i A',strtotime($arrDetail['created_at'] ));?></span></div>
						                    </div>
						                   
						                    <div class="mt-2">
						                        <p class="comment-text"><?= $arrDetail['comments'] ?>.</p>
						                    </div>
						                     
						                </div>


						                <div id="collapse-<?= $iCommentId;?>" class="bg-light p-2 collapse" data-parent="#myGroup-<?= $iCommentId;?>">
						                    <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="http://coachingwale.in/coachingwale/assets/pages/img/logo-big.jpeg" width="60">
						                    	<textarea class="form-control ml-1 shadow-none textarea" id="id_reply_<?= $iCommentId ?>" name="reply" ></textarea>
						                    </div>

						                    <div class="mt-2 text-right">
						                    	<button class="btn btn-primary btn-sm shadow-none"  onclick="SaveComments('Div_Reply_<?= $iCommentId ?>',<?= $iCommentId?>,<?= $user_id ?>);"  type="button">Post Reply</button>
						                    </div>

						                </div> 
						            </div> 
						        </div>
						    </div>
						<?php
					}
				}

				$iLastCommentId = $iCommentId;

				?>
				</div>
				
			</div>
		<?php }else{ ?>
			<div class="text-center bg-white mt-5 pt-5 pb-5"><h5>Comments Not available<h5></div>
		<?php } ?>
		</div>
	</div>
</div>





<script type="text/javascript">

const messages = document.getElementById('Div_Container');
	setInterval(function(){ 
		course_class_id = <?=$id?>;
		LastCommentId = <?=$iCommentId?>;
		// $("#Id_Last_Comment_Id").val('<?=$iLastCommentId?>');
		console.log($("#Id_Last_Comment_Id").val());

		$.ajax({
		    type: 'GET', 
		   	url: "https://batrasir.tutorstation.in/get-all-comment-return",
    		data: {  
    			course_class_id: course_class_id,
			    LastCommentId: LastCommentId
			  },

		    success: function(html){ 
		        $("#Id_Div_Comments").append(html)
		    }
		});
		
		scrollToBottom(messages);

	}, 3000);

function scrollToBottom(messagesDiv) {
  messagesDiv.scrollTop = messagesDiv.scrollHeight;
}

scrollToBottom(messages);


</script>













 