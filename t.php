<div class="container ">
                        
                        <div class="modal fade" id="modalCenter2" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLongTitle">Edit Comment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit_comment" name="edit_comment" action="controllerForum.php" method="post">

                                        <div class="form-group">
                                                <?php
                                                    echo "<input type=\"hidden\" name=\"id_comment\" value=\"";
                                                    echo $resuut_select_comment['id_comment'];
                                                    echo "\">";
                                                ?>
                                                </div>
                                            <div class="form-group">
                                                <label for="l_name">Content</label>                            
                                                <div>
                                                <textarea name="msg_comment" id="Edit forum content" cols="60" rows="10" placeholder="Write your content ..." required></textarea>
                                                </div>                                                
                                            </div>                                                                                       
                                            <div style="margin-top: 1rem;">
                                            <button type="submit" name="edit_comment" id="submitbn" data-dismiss="modal" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        <div class="modal fade " id="modaldel2" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modaldel2" aria-hidden="true">
                            <div class=" modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLongTitle">Delete Comment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">   
                                    <form id="del_comment" name="del_comment" action="controllerForum.php" method="post">
                                            <div class="form-group">                                                
                                                <?php
                                                    echo "<input type=\"hidden\" name=\"id_comment\" value=\"";
                                                    echo $resuut_select_comment['id_comment'];
                                                    echo "\">";
                                                ?>
                                            </div>                                           
                                                                           
                                        <div class="row">    
                                            <div class=" col-lg-1 col-sm-1"></div>
                                            <div class=" col-lg-1 col-sm-1" style="margin-top: 1rem;">
                                                <button type="submit" name="del_comment" id="submitbn" data-dismiss="modal" class="btn btn-success">Yes</button>
                          
                                            </div>          
                                            <div class=" col-lg-7 col-sm-7"></div>                              
                                            <div class=" col-lg-1 col-sm-1" style="margin-top: 1rem;">                                                
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>                                                
                                            </div>                                            
                                        </div>
                                    </form> 
                                    </div>
                                </div>
                            </div>
                            
                        </div> 