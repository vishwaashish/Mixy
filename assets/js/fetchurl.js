// for insert the fetch url
$(document).ready(function(){

	$(document).on('click', '.delete', function(){  
		var employee_id = $(this).attr("id");  
		
		if(employee_id != '')  
		{  
			if(confirm('Are you sure to remove this record ?')){
			
			 $.ajax({  
				  url:"inserturl.php",  
				  method:"POST",  
				  data:{
					  employee_id:employee_id
					},  
					error: function() {
						alert('Something is wrong');
					 },
				  
				  success:function(data)
				  {
					  alert("Record removed successfully");
					  location.reload();
				  }
				  
			 });  
			}
		}            
   	}); 

    $('#insert').click(function(){
		var v = document.getElementById("error");
        var url = $('#url').val();
        var catagories = $("#catagories").select2("val").join(",");
        var title = localStorage.getItem('title');
        var description = localStorage.getItem('description');
		var image = localStorage.getItem('result1');
		var account= $("#accoun").val();
	
        if(catagories == '' )
		{
			$("#error").show();
			$('#error').html('Please select one catagories');
            v.className += " alert-danger";
			return false;
		}
        
		else
		{
            $('#upload').attr("disabled", "disabled");
            
			$.ajax({
				url:"inserturl.php",
				method:"POST",
				
				data:{
                    url:url,
                    title:title,
                    description:description,
                    image:image,
					catagories:catagories,
					account:account
                    },
                
				dataType:"JSON",
				cache:false,
				
				beforeSend:function(){
					$('#insert').val("Processing...");  
					$('#upload').attr("disabled", "disabled");
					$('#insert').css("display", "none");
					$('#catag').css("display","none");
				},
				complete:function(){
					$('#insert').attr("disabled", "disabled");
					$('#insert').css("background-color","green");
					$('#catag').css("display","none");
					$('#insert').css("display", "none");
					
                },
				success:function(data)
				{
                    $('#url').val();
                    $('#insert').val(data.message);
					$('#upload').attr("disabled", false);
                    $('#upload').load();
				}
			});
		}
    });

    
// fetching url
	$('#upload').click(function(){
		var v = document.getElementById("error");
		var url = $('#url').val();
		
		if(url == '')
		{
			$("#error").show();
			$('#error').html('Please Enter url');
            v.className += " alert-danger";
			return false;
		}
        else if(!url.match(/(http(s)?:\/\/)/)) {
			$("#error").show();
			$('#error').html('Please put valid url');
            v.className += " alert-danger";
            return false;
        }
		else
		{
			
			$("#error").hide();
			$('#upload').attr("disabled", "disabled");
			$("#loading").hide();
			$("#figure").hide();
			$("#catag").hide();
			$("#card1").hide();
			$.ajax({
				url:"upload.php",
				method:"POST",
				data:{url:url},
				dataType:"JSON",
				cache:false,
				beforeSend:function(){
					$('#upload').val("Processing...");
                    $("#spinner").show();
					$('#spinner').addClass('spinner');
					$('#loading').css("display","block");
					$('#insert').val('Insert');
					// $('#insert').css("background-color","#17a2b8");
                    
				},
				complete:function(){
					$('#figure').css("display","block");
					$('#catag').css("display","block");
					$('#insert').css("display","block");
                    $("#spinner").hide();
					$("#card1").css("display","block");
					
                },
				success:function(data)
				{
					$('#loading').css("display","none");
					$('#url').val();
					$('#upload').val('Fetch');
					$('#upload').attr("disabled", false);
					$('#result1').attr("src",data.image).height('350px');
					$('#title').html(data.title);
					$('#description').html(data.description);
                    $('#message').html(data.message);

                    localStorage.setItem('title',data.title);
                    localStorage.setItem('description',data.description);
					localStorage.setItem('result1',data.image);
					

				}
			});
		}

        
	});

});
