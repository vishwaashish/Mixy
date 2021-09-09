<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
    <title>Document</title>
</head>

<style>
.spinner {
		-webkit-animation: rotation 2s infinite linear;
        max-width: 100%;
        height: auto;
        
}



@-webkit-keyframes rotation {
		from {
				-webkit-transform: rotate(0deg);
		}
		to {
				-webkit-transform: rotate(359deg);
		}
}

@media (min-width: 768px){
    .spinner {
       
        margin: 1rem!important;
    }

    .spinnerup{    
    margin-left: 31%;
    margin-top: 11%;
}
}

@media (min-width: 992px){
.m-lg-3 {
    margin: 1rem!important;
}
}

</style>

<body>



    <div class="container p-5">
        <div class="row p-5 ">
            <div class="col">
                <div class="row shadow  border " >
                    <div class="col-lg-5 p-5  d-flex bg-light" style=" height: 500px; margin:auto;"  >
                        <div style="margin-top: 15%;">
                            <h2 class="text-center">Add a post here</h2><br>
                            <h5 class="text-justify text-muted">Post any website link, Image, Instagram posts, Youtube video by pasting the link above.</h5><br>
                            <div>
                                <input type="url" name="url"  id="url" placeholder="paste your link here" class="form-control" required autofocus>
                            </div>
                            <div class="py-3"><input type="submit" name="upload" class="btn btn-info" id="upload" value="upload"></div>
                        </div>
                    </div>
                    <div class="col-lg "  style="height: 500px; margin:auto;padding:0;" >
                         <!-- card  -->
                        <div class="card " id="card"style="height=25px; padding: 0;border:0; diplay:none;" >
                        <!-- image url -->

                            <img src="#" id="result" class="img-fluid" alt="..." style="position: absolute;">

                    <!-- post url image -->
                            <img src="#" id="result1" class="card-img-top img-fluid" alt="..." style="">
                            <div class="card-body">
                                <h5 class="card-title text-justify" id="title"></h5>
                                <p class="card-text text-justify" id="description"></p>
                            </div>
                        </div> 
                        <!-- spinner -->
                        <div class="justify-content-center spinnerup" style="">
                        <img src="assets/image/a.png" class="img-fluid " id="spinner" alt="" style="width: 200px; ">
                        </div>
                    </div>
                    
                   
                </div>
            
            </div>
        </div>
    </div>
   
                       
</body>

</html>


<script>
$(document).ready(function(){
	$('#upload').click(function(){
		var url = $('#url').val();
		if(url == '')
		{
			alert("Please enter image url");
			return false;
		}
		else
		{
            $('#upload').attr("disabled", "disabled");
            $("#card").hide();
            
			$.ajax({
				url:"upload.php",
				method:"POST",
				data:{url:url},
				dataType:"JSON",
				cache: false,
				
				beforeSend:function(){
					$('#upload').val("Processing...");
                    $("#spinner").show();
                    $('#spinner').addClass('spinner');
                    
				},
				complete:function(){
					
                    $("#spinner").hide();
                    $("#card").css("display","block");
                    				},
				success:function(data)
				{
					$('#url').val('');
					$('#upload').val('Upload');
					$('#upload').attr("disabled", false);
                    $('#result').attr("src",data.image_url).width('596px').height('500px');
					$('#result1').attr("src",data.image).width('569px').height('312px');
					$('#title').html(data.title);
					$('#description').html(data.description);
				}
			})
		}
	});
});
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>