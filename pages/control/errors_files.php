<?php
   if(isset($errors) && count($errors) !=0)
                             {
                                echo '<div id="msg" class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
                                      
                                foreach ($errors as $ele)
                                {
                                    echo $ele.'<br>';
                                }
                                echo '</div>';
                            }
