<?php include 'components/header.php'; ?>
    <section class="drawer">
            <div class="col-md-12 size-img back-img">
             <div class="effect-cover">
                    <h3 class="txt-advert animated">A Custom header text</h3>
                    <p class="txt-advert-sub animated">Lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit</p>
                 </div>
             </div>
      
    <section id="login" class="container secondary-page">  
      <div class="general general-results players">
          
           
           <!-- REGISTER BOX -->
           <div class="top-score-title right-score col-md-12">
            <h3>Register <span>Now</span><span class="point-int"> !</span></h3>
                <div class="col-md-12 login-page">
                    <form method="post" class="register-form">         
                       <div class="signup_role">
                            <label for="confirm_password">Signup as:</label><div class="clear"></div>
                            <select name="" class="myoplan_select" >
                              <option value="">Parent</option>
                              <option value="">Student</option>
                              <option value="">Coach</option>
                            </select>
                        </div>

                         <div class="signup_role">
                            <label for="confirm_password">Enroll for:</label><div class="clear"></div>
                            <select name="" class="myoplan_select" >
                              <option value="">Soccer</option>
                              <option value="">Tennis</option>
                              <option value="">Football</option>
                              <option value="">Sprint</option>
                            </select>
                        </div>

                        <div class="email">
                            <label for="email">* Email:</label><div class="clear"></div>
                            <input id="email" name="email" type="text" placeholder="example@domain.com" required=""/>
                        </div>
                       
                        <div class="name">
                            <label for="name">* First Name:</label><div class="clear"></div>
                            <input id="name" name="name" type="text" placeholder="e.g. Mr. John" required=""/>
                        </div>
                        <div class="name">
                            <label for="lastname">* Last Name:</label><div class="clear"></div>
                            <input id="lastname" name="name" type="text" placeholder="e.g. Mr. Doe" required=""/>
                        </div>
                        <div class="name">
                            <label for="password">* Password:</label><div class="clear"></div>
                            <input id="password" name="password" type="password" placeholder="********" required=""/>
                        </div>
                        <div class="confirm_password">
                            <label for="confirm_password">* Password:</label><div class="clear"></div>
                            <input id="confirm_password" name="confirm_password" type="password" placeholder="********" required=""/>
                        </div>
                        
                        <div id="register-submit">
                            <input type="submit" value="Submit"/>
                        </div>
                      </form>
                        <div class="ctn-img">
                            <img src="images/federer.png" />
                       </div><!--Close Images-->
                       <div class="clear"></div>
                </div>
                
           </div><!--Close REgistration-->
          </div> 
        </section>
       <?php include 'components/footer.php'; ?>