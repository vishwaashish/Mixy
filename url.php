<!-- Modal -->
<link rel="stylesheet" href="css/style.css">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content m-0 p-0">
        <div class=" m-0 p-0">

            <div class="">
                <div class="column" style="background-color:white;">
                    <div class="p-4" style="margin-top: 15%;">
                        
                        <h1 class="text-center">Add a post here</h1><br>
                        <h5 class="text-justify text-muted">Post any website link, Image, Instagram posts, Youtube video by pasting the link above.</h5><br>
                        <div class="alert " id="error" style="display:none;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
                        </div>
                        <div>
                        <!-- url input -->
                        <input type="url" name="url"  id="url"  placeholder="paste your link here" class="form-control" required autofocus>
                        
                        </div>
                        <!-- url fetch -->
                        <div class="py-2"><input type="submit" name="upload" class="btn btn-info" id="upload" value="Fetch"></div>
                        <!-- tags -->
                        <div class="my-3 catag" id="catag" style="display:none;" >    
                            <!-- <label> Catagories:</label>
                            <input list="post" name="catagories" id="catagories" class="form-control" placeholder="Select Tags" >
                            <datalist id="post">
                                <option value="blogs">
                                <option value="news">
                                <option value="sports">
                                <option value="technology">
                                <option value="travel">
                                <option value="business">
                                <option value="fashion">
                                <option value="fitness">
                                <option value="food">
                            </datalist> -->
                            <label> Catagories:</label>
                            <select class="form-control select2" name="catagories" id="catagories" list="post">
                                <option value="blogs">blogs</option> 
                                <option value="news">news</option> 
                                <option value="sports">sports</option> 
                                <option value="technology">technology</option> 
                                <option value="travel">travel</option> 
                                <option value="business">business</option> 
                                <option value="fashion">fashion</option> 
                                <option value="fitness">fitness</option> 
                                <option value="food">food</option> 
                                
                            </select>
                        </div> 
                        <!-- tags end -->
                        <!-- insert -->
                        <div class="py-2"><input type="submit" name="insert" class="btn btn-info" id="insert" value="insert" style="display:none;"></div>
                     
                    </div>
                            
                </div>
                <div class="column url-image" style="background-color:white
                ;">
                
                    <div class="spinner-border p-4 font-weight-bolder text-secondary "  role="status"  id="loading"  style="margin-top: 255px; margin-left: 150px; display:none;">
                        <span class="sr-only">Loading...</span>
                    </div>
              
                <figure class="rounded bg-white figure2col pt-3" id="figure" style="display:none;">
                    <img  id="result1" name="image" src="#" alt="" class=" w-100 img-fluid card-img-top" >

                    <figcaption class="p-2 card-img-bottom">
                        <h2 class="h5 font-weight-bold mb-2 font-italic" id="title" name="title"></h2>
                        <p class="mb-0 text-small text-muted font-italic"  id="description" name="description"></p>
                    </figcaption>
                </figure>
                

                </div>
            </div>
        </div>
        </div>
    </div>
</div>


<!-- add url script -->
<script src="js/fetchurl.js"></script>