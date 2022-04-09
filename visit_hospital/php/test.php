<?php

echo "<div id = 'log-in'>
              <img class = 'avatar-undraw' src = 'https://ukoapp.co.ke/public/undraw/undraw_access_account_99n5.svg'>
                  <div id = 'feedback'></div>
                  <form accept-charset=utf-8>
                      <span class='title'>LogIn Here</span><br>
                      <div id = 'add-on-user' class = 'add-on' carry-index = '#GetTel'>Telephone or Email</div>
                      <div id = 'input-div'>
                          <div class='i'>
                             <i class='fas fa-user'></i>
                          </div>
                          <input reset = '#GetTel' carry-index = '#add-on-user' type='telephone' placeholder = 'Enter Telephone or Email' id = 'GetTel' class = 'input' required />
                      </div>
                      <div id = 'add-on-password' class = 'add-on' carry-index = '#getIfno'>Password</div>
                      <div id = 'input-div'>
                         <div class = 'i'>
                                 <i class = 'fas fa-lock'></i>
                         </div>
                      <input type = 'password' carry-index = '#add-on-password' placeholder = 'Enter Password' class = 'input' id = 'getIfno' required />
                      <button type = 'button' id = 'bb' class = 'b-form' name = 'bb' >
                          <i class = 'fas fa-eye'></i>
                      </button>
                      </div>
                      <button type = 'submit' name = 'AccessForm'  id = 'AccessForm' class = 'sendIfno'>Login</button>
                      </form>
                      <a href = '#create-account' class = 'route-sign-register'>
                      <i class='fas fa-angle-down'></i>Go To Register
                      </a>
                      </div>
                      <div id = 'create-account'>
                       <a href = '#log-in' class = 'route-sign-register'>
                       <i class='fas fa-angle-up'></i>Go To Log In </a>
                        <img class = 'avatar-undraw' src = 'https://ukoapp.co.ke/public/undraw/undraw_upload_image_iwej.svg'>
                         <form accept-charset = utf-8 id = 'personal'>
                          <p class = 'title'>Create Account</p><br>
                           <div id='input-div'>
                           <div id='input-div-internal'>
                           <div id = 'add-on-f_name' class = 'add-on-register'>First Name</div>
                           <input type='text' carry-index = '#add-on-f_name' placeholder = 'First Name' id='Get_fname' class = 'input' required />
                           </div>
                           <div id='input-div-internal'>
                           <div id = 'add-on-l_name' class = 'add-on-register'>Second Name</div>
                           <input type='text' carry-index = '#add-on-l_name' placeholder = 'Last Name' id='Get_lname' class = 'input' required />
                           </div>
                            </div>
                             <div id='input-div'>
                             <div id='input-div-internal'>
                             <div id = 'add-on-telephone' class = 'add-on-register'>Telephone</div>
                             <input type='telephone' carry-index = '#add-on-telephone' placeholder = 'Telephone' id='Get_telephone' class = 'input' required />
                             </div>
                             <div id='input-div-internal'><div id = 'add-on-email' class = 'add-on-register'>Email</div><input type='email' carry-index = '#add-on-email' placeholder = 'Email' id='Get_email' class = 'input' required />
                             </div> </div> <div id='input-div'><div id='input-div-internal'><div id = 'add-on-register-password' class = 'add-on-register'>Password</div><input type='password' carry-index = '#add-on-register-password' placeholder = 'Password' id='Get_password' class = 'input' required /></div><div id='input-div-internal'><div id = 'add-on-r_password' class = 'add-on-register'>Password</div><input type='password' carry-index = '#add-on-r_password' placeholder = 'Repeat Password' id='Get_r_password' class = 'input' required /></div> </div> <div id='input-div'><div id='input-div-internal'><div id = 'add-on-age' class = 'add-on-register'>Age</div><input type='text' carry-index = '#add-on-age' placeholder = 'D.O.Birth' id = 'Get_age' class = 'input' required /></div>
                             <div id='input-div-internal'>
                                  <div id = 'add-on-gender' class = 'add-on-register'>Gender</div>
                                  <select carry-index = '#add-on-gender' placeholder = 'Gender' id = 'Get_gender' class = 'input'>
                                      <option>Male</option>
                                      <option>Female</option>
                                  </select>
                                  </div>
                             </div>
                              <div id='input-div'>
                              <p>upload profile image</p>
                               </div>
                               <div id='input-div'>
                               <button id='document' class = 'pdf'>
                               <i class = 'fas fa-copy'></i>Upload
                               </button>
                               <input type = 'file' id='pro-file'>
                                </div>
                                 <div id='input-div'><button type='submit' name='NextForm'  id='NextForm' class='sendIfno'>Create Account</button> </div> </form> </div>
";

echo "<div id = 'main-focus'>
    <h1>Account Deletion</h1>
    <img id = 'delete-icon' src = 'http://localhost/visit_hospital/Images/undraw_lost_online_re_upmy.svg'>
    <h3>Confirm Account Deletion</h3>
    <button id = 'delete'>DELETE</button>
    </div>
     <div id = 'main-footer'>
         <h1>Main profile</h1>
         <h2>Code with Bayaa</h2>
         <p>© 2022</p>
     </div>
"

draft 0 Profile
        1 Delete profile
        2 View Hospital

echo "<form id = 'hold_search' accept-charset = utf-8>
        <select id = 'view_hospital'></select>
        <button type = 'submit' id = 'search_hospital'><i class='fas fa-search'></i></button>
      </form>
          <div id = 'view_hospitals' class = 'viewData'></div>
      </div>
      "

echo "<div id = 'outer-profile'>
        <div id = 'inner-profile'>
            <div id = 'profile-tower'>
                <i class='fas fa-user-check'></i>
                <p> Name </p>
                <input type = 'text' id = 'profile-name'>
            </div>
            <div id = 'profile-tower'>
                <i class='fas fa-at'></i>
                <p> Email </p>
                <input type = 'text' id = 'profile-email'>
            </div>
            <div id = 'profile-tower'>
                <i class='fas fa-phone'></i>
                <p> Telephone </p>
                <input type = 'text' id = 'profile-telephone'>
            </div>
        </div>
        <div id = 'inner-profile'>
            <div id = 'profile-tower'>
                <i class='fas fa-user-clock'></i>
                <p> Age </p>
                <input type = 'text' id = 'profile-age'>
            </div>
            <div id = 'profile-tower'>
                <i class='fas fa-person-half-dress'></i>
                <p> Gender </p>
                <input type = 'text' id = 'profile-gender'>
            </div>
            <div id = 'profile-tower'>
                <i class='fas fa-lock'></i>
                <p> Password </p>
                <input type = 'password' id = 'profile-password'>
            </div>
        </div>
        <div id = 'inner-profile'>
            <div id = 'package_poll'></div>
        </div>
    </div>
</div>";
echo "
                  <img class = 'avatar-undraw' src = 'http://localhost/visit_hospital/Images/undraw_medicine_b-1-ol.svg'>

                   <form accept-charset = utf-8 id = 'personal-hospital'>
                     <div id='input-div'>
                     <div id='input-div-internal'>
                     <div id = 'add-on-name' class = 'add-on-register'>Hospital Name</div>
                     <input type='text' carry-index = '#add-on-name' placeholder = 'Hospital Name' id='Get_name' class = 'input' required />
                     </div>
                     <div id='input-div-internal'>
                     <div id = 'add-on-h_telephone' class = 'add-on-register'>Telephone</div>
                     <input type='telephone' carry-index = '#add-on-h_telephone' placeholder = 'Telephone' id='Get_h_telephone' class = 'input' required />
                     </div>
                      </div>
                       <div id='input-div'>
                       <div id='input-div-internal'>
                       <div id = 'add-on-h-email' class = 'add-on-register'>Telephone</div>
                       <input type='email' carry-index = '#add-on-h-email' placeholder = 'Email' id='Get_h_email' class = 'input' required />
                       </div>
                       <div id='input-div-internal'>
                       <div id = 'add-on-address' class = 'add-on-register'>Address</div>
                       <input type='text' carry-index = '#add-on-address' placeholder = 'Address' id='Get_h_address' class = 'input' required />
                       </div>
                       </div>
                        <div id='input-div'>
                        <p>upload hospital image</p>
                         </div>
                         <div id='input-div'>
                         <button id='hospital_document' class = 'pdf'>
                         <i class = 'fas fa-copy'></i>Upload
                         </button>
                         <input type = 'file' id='hospital-file'>
                          </div>
                           <div id='input-div'>
                           <button type='submit' name='hospitalAdded'  id='hospitalAdded' class='sendIfno'>Add Hospital</button>
                            </div>
                             </form>
"

echo "<div id = 'account-holder'>
                          <div id = 'account-nav'>
                              <img id = 'profile-img'>
                              <button id = 'account-switch' pointer = '0' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Profile</button>
                              <div id = 'show-profile' spot = '0' rotate = '0' class = 'account-window'>
                                  <button id = 'hospital' fetch = '0'>View Profile</button>
                                  <button id = 'hospital' fetch = '1'>Delete Account</button>
                              </div>
                              <button id = 'account-switch' pointer = '1' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Hospitals</button>
                              <div id = 'show-hospital' spot = '1' rotate = '1' class = 'account-window'>
                                  <button id = 'hospital' fetch = '2'>View Hospitals</button>
                                  <button id = 'hospital' fetch = '3'>Add Hospital</button>
                              </div>
                              <button id = 'account-switch' pointer = '2' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Doctors</button>
                              <div id = 'show-doctors' spot = '2' rotate = '2' class = 'account-window'>
                                  <button id = 'hospital' fetch = '4'>View Doctors</button>
                                  <button id = 'hospital' fetch = '5'>Add Doctors</button>
                              </div>
                              <button id = 'account-switch' pointer = '3' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Records</button>
                              <div id = 'show-records' spot = '3' rotate = '3' class = 'account-window'>
                                  <button id = 'hospital fetch = '6'>View Records</button>
                                  <button id = 'hospital' fetch = '7'>Add Records</button>
                              </div>
                          </div><div id = 'account-content'><div id = 'main-focus'></div><div id = 'main-footer'>
               <h2>Contact</h2>
               <h2>Code with Bayaa</h2>
               <h3>+254712345678</h3><p>© 2022</p>
           </div></div></div>"


echo "<div id = 'account-holder'>
                                <div id = 'account-nav'>
                                    <img id = 'profile-img'>
                                    <button id = 'account-switch' pointer = '0' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Profile</button>
                                    <div id = 'show-profile' spot = '0' rotate = '0' class = 'account-window'>
                                        <button id = 'hospital' fetch = '0' user = '1' retrieve = '0'>View Profile</button>
                                        <button id = 'hospital' fetch = '1' user = '1' retrieve = '1'>Delete Account</button>
                                    </div>
                                    <button id = 'account-switch' pointer = '1' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Hospitals</button>
                                    <div id = 'show-hospital' spot = '1' rotate = '1' class = 'account-window'>
                                        <button id = 'hospital' fetch = '2' user = '1' retrieve = '2'>View Hospitals</button>
                                        <button id = 'hospital' fetch = '3' user = '1' retrieve = '3'>Add Hospital</button>
                                    </div>
                                    <button id = 'account-switch' pointer = '2' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Doctors</button>
                                    <div id = 'show-doctors' spot = '2' rotate = '2' class = 'account-window'>
                                        <button id = 'hospital' fetch = '4' user = '1' retrieve = '4'>View Doctors</button>
                                        <button id = 'hospital' fetch = '5' user = '1' retrieve = '5'>Add Doctors</button>
                                    </div>
                                    <button id = 'account-switch' pointer = '3' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Records</button>
                                    <div id = 'show-records' spot = '3' rotate = '3' class = 'account-window'>
                                        <button id = 'hospital' fetch = '6' user = '1' retrieve = '6'>View Records</button>
                                        <button id = 'hospital' fetch = '7' user = '1' retrieve = '7'>Add Records</button>
                                    </div>
                                    <button id = 'account-switch' pointer = '4' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Packages</button>
                                    <div id = 'show-packages' spot = '4' rotate = '4' class = 'account-window'>
                                        <button id = 'hospital' fetch = '8' user = '1' retrieve = '11'>Update Package</button>
                                    </div>
                                    <i class='fas fa-right-from-bracket'></i>
                                    <p id = 'sign-out'>Sign Out</p>
                                </div><div id = 'account-content'><div id = 'main-focus'></div><div id = 'main-footer'>
                     <h2>Contact</h2>
                     <h2>Code with Bayaa</h2>
                     <h3>+254712345678</h3><p>© 2022</p>
                 </div></div></div>"

echo "<div class = 'welcome-header'>
              <div class = 'welcome-header-box'>
              <button id = 'push' class = 'push-left' side = '1' index = '1' ><i class='fas fa-angle-left'></i></button>
              <button id = 'push' class = 'push-right' side = '2' index = '1'><i class='fas fa-angle-right'></i></button>
              <div class = 'welcome-header-box-in'>
                  <div class = 'lbox-details' id = 'wall1' style = 'position:relative;z-index:3;background-image:linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.9),rgba(255,255,255,0.5)),url(http://localhost/visit_hospital/Images/main_home/slider-01.jpg);'>
                      <div id = 'content-box'>
                          <h1>Welcome to SmartMedi</h1>
                          <p>The number 1 platform in medical record-keeping.</p>
                          <a href='#about' class='btn'>Read More</a>
                      </div>
                  </div>
              </div>
              <div class = 'welcome-header-box-in'>
                  <div class = 'lbox-details' id = 'wall2' style = 'position:relative;z-index:2;background-image:linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.9),rgba(255,255,255,0.5)),url(http://localhost/visit_hospital/Images/main_home/slider-02.jpg);'>
                      <div id = 'content-box'>
                          <h1>We are the experts in the field of medicine.</h1>
                          <p>Our platform is able to hold thousands of records.</p>
                          <a href='#services' class='btn'>View Packages</a>
                      </div>
                  </div>
              </div>
              <div class = 'welcome-header-box-in'>
                  <div class = 'lbox-details' id = 'wall3'  style = 'position:relative;z-index:1;background-image:linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.9),rgba(255,255,255,0.5)),url(http://localhost/visit_hospital/Images/main_home/slider-03.jpg);'>
                      <div id = 'content-box'>
                          <h1>We are universal</h1>
                          <p>Our platform tranverses both private and public industry.</p>
                          <a href='#create-account' class='btn'>Open an account with us today!</a>
                      </div>
                  </div>
              </div>
           </div>
           </div>
           <div class='Navigation'>
              <a href = '#about' class = 'bin'>#About Us</a>
              <a href = '#contact' class = 'bin'>#Contact</a>
              <a href = '#register' class = 'bin'>#Create Account</a>
              <a href = '#services' class = 'bin'>#Services</a>
           </div>
           <div id = 'register'>
              <img id = 'movie' src = 'http://localhost/visit_hospital/Images/undraw_doctors_hwty.svg'>
              <div class = 'main-header'>
                  <h2>We secure your medical records</h2>
                  <h4>Sign up with us here</h4>
                  <a href = '#create-account'><p class = 'inside'>Register Account</p></a>
              </div>
           </div>
      	<div id='about' class='about-box'>
      		<div class='about-a1'>
      			<div class='container'>
      				<div class='row'>
                          <div class='title-box'>
                              <h2>About Us</h2>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                          </div>
      				</div>
      				<div class='row'>
      					<div class='col-lg-12 col-md-12 col-sm-12'>
      						<div class='row align-items-center about-main-info'>
      							<div class='col-lg-6 col-md-6 col-sm-12'>
      								<h2> Welcome to Health Lab </h2>
      								<p>Fusce convallis ante id purus sagittis malesuada. Sed erat ipsum, suscipit sit amet auctor quis, vehicula ut leo. Maecenas felis nulla, tincidunt ac blandit a, consectetur quis elit. Nulla ut magna eu purus cursus sagittis. Praesent fermentum tincidunt varius. Proin sit amet tempus magna. Fusce pellentesque vulputate urna. </p>
      								<p>Fusce convallis ante id purus sagittis malesuada. Sed erat ipsum, suscipit sit amet auctor quis, vehicula ut leo. Maecenas felis nulla, tincidunt ac blandit a, consectetur quis elit. Nulla ut magna eu purus cursus sagittis. Praesent fermentum tincidunt varius. Proin sit amet tempus magna. Fusce pellentesque vulputate urna. </p>
      								<a href='#' class='new-btn-d br-2'>Read More</a>
      							</div>
      							<div class='col-lg-6 col-md-6 col-sm-12'>
      								<div class='about-m'>
      									<ul id='banner'>
      										<li>
      											<img src='./Images/about_image/about-img-01.jpg' alt=''>
      										</li>
      										<li>
      											<img src='./Images/about_image/about-img-02.jpg' alt=''>
      										</li>
      										<li>
      											<img src='./Images/about_image/about-img-03.jpg' alt=''>
      										</li>
      									</ul>
      								</div>
      							</div>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      	<!-- Start Services -->
      	<div id='services' class='services-box'>
              <h2>Services</h2>
              <p>We generally offer two packages.</p>
              <div class='row'>
                  <div class='serviceBox'>
                      <div class='service-icon'><i class='fa fa-h-square' aria-hidden='true'></i></div>
                      <h3 class='title'>Lorem ipsum dolor</h3>
                      <p class='description'>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                      </p>
                  </div>
                  <div class='serviceBox'>
                      <div class='service-icon'><i class='fa fa-hospital-o' aria-hidden='true'></i></div>
                      <h3 class='title'>Lorem ipsum dolor</h3>
                      <p class='description'>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                      </p>
                      <a href='#' class='new-btn-d br-2'>Read More</a>
                  </div>
              </div>
      	</div>
      	<!-- Start Contact -->
      	<div id='contact' class = 'contact-box'>
              <h2>Contact us</h2>
              <div class='row'>
                  <div class='media-left icon-b'>
                      <i class='fa fa-location-arrow' aria-hidden='true'></i>
                      <h4>Address</h4>
                      <a href='#'>Ground floor, room 105<br>Allimex Plaza, Mombasa Road, Nairobi</a>
                  </div>
                  <div class='media-left icon-b'>
                      <i class='fa fa-envelope' aria-hidden='true'></i>
                      <h4>Email</h4>
                      <a href='#'>admin@smartmedike.com</a><br>
                      <a href='#'>reception@smartmedike.com</a>
                  </div>
                  <div class='media-left icon-b'>
                      <i class='fa fa-volume-control-phone' aria-hidden='true'></i>
                      <h4>Phone Number</h4>
                      <a href='#'>+254 743 234567</a><br>
                      <a href='#'>+254 790 453627</a>
                  </div>
              </div>
      	</div>
      	<!-- End Contact -->

      	<!-- Start Footer -->
      	<footer class='footer-box'>
      		<div class='container'>
      			<div class='row'>
      				<div class='col-lg-12'>
      					<p class='footer-company-name'>All Rights Reserved. &copy; 2022 <a href='#'>SmartMedi</a> Design By : <a href='https://html.design/'>Aisha Rashid</a></p>
      				</div>
      			</div>
      		</div>
      	</footer>
      	<!-- End Footer -->

      	<a href='#' id='scroll-to-top' class='new-btn-d br-2'><i class='fa fa-angle-up'></i></a>
"

echo "<form id = 'hold_search_doctor' accept-charset = utf-8>
      <select id = 'view_doctor'></select>
      <button type = 'submit' id = 'search_doctor'><i class='fas fa-search'></i></button>

      </form>
          <div id = 'view_doctors' class = 'viewData'></div>
      </div>"

echo "<img class = 'avatar-undraw' src = 'http://localhost/visit_hospital/Images/undraw_medical_care_movn.svg'>

                         <form accept-charset = utf-8 id = 'personal-doctor'>
                           <div id='input-div'>
                           <div id='input-div-internal'>
                           <div id = 'add-on-doctor-name' class = 'add-on-register'>Doctor Name</div>
                           <input type='text' carry-index = '#add-on-doctor-name' placeholder = 'Doctor Name' id='Get_doctor_name' class = 'input' required />
                           </div>
                           <div id='input-div-internal'>
                           <div id = 'add-on-doctor_telephone' class = 'add-on-register'>Telephone</div>
                           <input type='telephone' carry-index = '#add-on-doctor_telephone' placeholder = 'Telephone' id='Get_doctor_telephone' class = 'input' required />
                           </div>
                            </div>
                             <div id='input-div'>
                             <div id='input-div-internal'>
                             <div id = 'add-on-doctor-email' class = 'add-on-register'>Telephone</div>
                             <input type='email' carry-index = '#add-on-doctor-email' placeholder = 'Email' id='Get_doctor_email' class = 'input' required />
                             </div>
                             <div id='input-div-internal'>
                             <div id = 'add-doctor-age' class = 'add-on-register'>Date Of Birth</div>
                             <input type='text' carry-index = '#add-doctor-age' placeholder = 'Age' id='Get_doctor_age' class = 'input' required />
                             </div>
                             </div>
                             <div id='input-div'>
                             <div id='input-div-internal'>
                             <div id = 'add-on-doctor-gender' class = 'add-on-register'>Gender</div>
                             <select carry-index = '#add-on-doctor-gender' id='Get_doctor_gender' class = 'input'>
                                <option>Male</option>
                                <option>Female</option>
                             </select>
                             </div>
                             <div id='input-div-internal'>
                             <div id = 'add-doctor-hospital' class = 'add-on-register'>Hospital</div>
                             <select carry-index = '#add-on-doctor-hospital' id = 'Get_doctor_h_name' class = 'input'>
                             </select>
                             </div>
                             </div>
                              <div id='input-div'>
                              <p>upload doctor image</p>
                               </div>
                               <div id='input-div'>
                               <button id='doctor_document' class = 'pdf'>
                               <i class = 'fas fa-copy'></i>Upload
                               </button>
                               <input type = 'file' id='doctor-file'>
                                </div>
                                 <div id='input-div'>
                                 <button type='submit' name='doctorAdded'  id='doctorAdded' class='sendIfno'>Add Doctor</button>
                                  </div>
                                   </form> "

echo "<form id = 'hold_search_records' accept-charset = utf-8>
        <select id = 'view_record'></select>
        <button type = 'submit' id = 'search_records'><i class='fas fa-search'></i></button>
        </form>
                <div id = 'view_records' class = 'viewData'></div>
            </div>"

echo "
    <form id = 'personal-record' accept-charset = utf-8>
        <div id='input-div-internal'>
            <div id = 'add-on-sickness' class = 'add-on-register'>Sickness</div>
            <input id = 'sickness' carry-index = '#add-on-sickness' placeholder = 'Sickness' class = 'record-input' required/>
        </div>
        <div id='input-div-internal'>
            <div id = 'add-on-symptoms' class = 'add-on-register'>Symptoms</div>
            <input id = 'symptoms' carry-index = '#add-on-symptoms' placeholder = 'Symptoms' class = 'record-input' required/>
        </div>
        <div id='input-div-internal'>
            <div id = 'add-on-medicine' class = 'add-on-register'>Medicine</div>
            <input id = 'medicine' carry-index = '#add-on-medicine' placeholder = 'Medicine' class = 'record-input' required/>
        </div>
        <div id='input-div-internal'>
            <div id = 'add-on-treatment' class = 'add-on-register'>Treatment</div>
            <input id = 'treatment' carry-index = '#add-on-treatment' placeholder = 'Treatment' class = 'record-input' required/>
        </div>
        <div id='input-div'>
            <p>upload x-ray image</p>
        </div>
        <div id='input-div'>
            <button id='record_document' class = 'pdf'>
                <i class = 'fas fa-copy'></i>Upload
            </button>
            <input type = 'file' id='record-file'>
        </div>
        <div id='input-div'>
            <div id='input-div-internal'>
                <div id = 'add-on-doctor' class = 'add-on-register'>Doctor</div>
                <select id = 'doctor-record' carry-index = '#add-on-doctor' placeholder = 'Doctor' class = 'record-input'></select>
            </div>
            <div id='input-div-internal'>
                <div id = 'add-on-hospital' class = 'add-on-register'>Hospital</div>
                <select id = 'hospital-record' carry-index = '#add-on-hospital' placeholder = 'Hospital' class = 'record-input'></select>
            </div>
        </div>
        <div id='input-div'>
            <button type='submit' name='recordAdded'  id='recordAdded' class='sendIfno'>Add Record</button>
        </div>
    </form>
"

echo "<div id = 'account-holder'>
                                      <div id = 'account-nav'>
                                          <img id = 'profile-img'>
                                          <h3>Administrator</h3>
                                          <button id = 'account-switch' pointer = '0' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Profile</button>
                                          <div id = 'show-profile' spot = '0' rotate = '0' class = 'account-window'>
                                              <button id = 'hospital' fetch = '0' user = '1' retrieve = '0'>View Profile</button>
                                              <button id = 'hospital' fetch = '1' user = '2' retrieve = '8'>View Graph</button>
                                          </div>
                                          <button id = 'account-switch' pointer = '1' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Hospitals</button>
                                          <div id = 'show-hospital' spot = '1' rotate = '1' class = 'account-window'>
                                              <button id = 'hospital' fetch = '2' user = '2' retrieve = '2'>View Hospitals</button>
                                              <button id = 'hospital' fetch = '3' user = '2' retrieve = '9'>Delete Hospital</button>
                                          </div>
                                          <button id = 'account-switch' pointer = '2' address = '0'><span id = 'pin'><i class='fas fa-folder'></i></span> Doctors</button>
                                          <div id = 'show-doctors' spot = '2' rotate = '2' class = 'account-window'>
                                              <button id = 'hospital' fetch = '4' user = '2' retrieve = '4'>View Doctors</button>
                                              <button id = 'hospital' fetch = '5' user = '2' retrieve = '10'>Delete Doctors</button>
                                          </div>
                                          <i class='fas fa-right-from-bracket'></i>
                                          <p id = 'sign-out'>Sign Out</p>
                                      </div><div id = 'account-content'><div id = 'main-focus'></div><div id = 'main-footer'>
                           <h2>Contact</h2>
                           <h2>Code with Bayaa</h2>
                           <h3>+254712345678</h3><p>© 2022</p>
                       </div></div></div>"

echo "
    <div id = 'graph-case' style = 'width : 100%; height : auto;'>
        <canvas id = 'patient-graph' style = 'width : 98%;'></canvas>
        <canvas id = 'doctor-graph' style = 'width : 98%;'></canvas>
        <canvas id = 'records-graph' style = 'width : 98%;'></canvas>
        <canvas id = 'hospital-graph' style = 'width : 98%;'></canvas>
    </div>
        "

echo "<h1>Hospital Deletion</h1>
          <img id = 'delete-icon' src = 'http://localhost/visit_hospital/Images/undraw_lost_online_re_upmy.svg'>
          <h3>Select Hospital</h3>
          <select id = 'delete-hospital-view'></select>
          <h3>Confirm Hospital Deletion</h3>
          <button id = 'delete-hospital'>DELETE</button>
          </div>"

echo "<h1>Doctor Deletion</h1>
          <img id = 'delete-icon' src = 'http://localhost/visit_hospital/Images/undraw_lost_online_re_upmy.svg'>
          <h3>Select Doctor</h3>
          <select id = 'delete-doctor-view'></select>
          <h3>Confirm Doctor Deletion</h3>
          <button id = 'delete-doctor'>DELETE</button>
          </div>"

echo "
    <div id = 'main-package'>
        <h3>Update your package option</h3>
        <div id = 'all_package'>
            <section>
                <img src = 'http://localhost/visit_hospital/Images/packages/bronze.jpg'>
                <p>
                    <i class='fas fa-coin'></i>
                    <span style = 'font-size:150%;'>FREE</span>
                </p>
                <p>Sickness*</p>
                <button id = 'apply' ap = '0' style = 'width : 150px;'>APPLY</button>
            </section>
            <section>
                <img src = 'http://localhost/visit_hospital/Images/packages/silver.jpg'>
                <p>
                    <i class='fas fa-coin'></i>
                    $<span style = 'font-size:150%;'>100</span>
                </p>
                <p>Sickness*</p>
                <p>Medicine*</p>
                <button id = 'apply' ap = '1' style = 'width : 150px;'>APPLY</button>
            </section>
            <section>
                <img src = 'http://localhost/visit_hospital/Images/packages/index.jpg'>
                <p>
                    <i class='fas fa-coin'></i>
                    $<span style = 'font-size:150%;'>200</span>
                </p>
                <p>Sickness*</p>
                <p>Medicine*</p>
                <p>Treatment*</p>
                <p>Symptoms*</p>
                <p>x-ray scan*</p>
                <button id = 'apply' ap = '2' style = 'width : 150px;'>APPLY</button>
            </section>
    </div>"

echo "<div class = 'welcome-header'>
                    <div class = 'welcome-header-box'>
                    <button id = 'push' class = 'push-left' side = '1' index = '1' ><i class='fas fa-angle-left'></i></button>
                    <button id = 'push' class = 'push-right' side = '2' index = '1'><i class='fas fa-angle-right'></i></button>
                    <div class = 'welcome-header-box-in'>
                        <div class = 'lbox-details' id = 'wall1' style = 'position:relative;z-index:3;background-image:linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.9),rgba(255,255,255,0.5)),url(http://localhost/visit_hospital/Images/main_home/slider-01.jpg);'>
                            <div id = 'content-box'>
                                <h1>Welcome to SmartMedi</h1>
                                <p>The number 1 platform in medical record-keeping.</p>
                                <a href='#about' class='btn'>Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class = 'welcome-header-box-in'>
                        <div class = 'lbox-details' id = 'wall2' style = 'position:relative;z-index:2;background-image:linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.9),rgba(255,255,255,0.5)),url(http://localhost/visit_hospital/Images/main_home/slider-02.jpg);'>
                            <div id = 'content-box'>
                                <h1>We are the experts in the field of medicine.</h1>
                                <p>Our platform is able to hold thousands of records.</p>
                                <a href='#services' class='btn'>View Packages</a>
                            </div>
                        </div>
                    </div>
                    <div class = 'welcome-header-box-in'>
                        <div class = 'lbox-details' id = 'wall3'  style = 'position:relative;z-index:1;background-image:linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.9),rgba(255,255,255,0.5)),url(http://localhost/visit_hospital/Images/main_home/slider-03.jpg);'>
                            <div id = 'content-box'>
                                <h1>We are universal</h1>
                                <p>Our platform tranverses both private and public industry.</p>
                                <a href='#create-account' class='btn'>Open an account with us today!</a>
                            </div>
                        </div>
                    </div>
                 </div>
                 </div>
                 <div class='Navigation'>
                    <a href = '#about' class = 'bin'>#About Us</a>
                    <a href = '#contact' class = 'bin'>#Contact</a>
                    <a href = '#register' class = 'bin'>#Create Account</a>
                    <a href = '#services' class = 'bin'>#Services</a>
                 </div>
                 <div id = 'register'>
                    <img id = 'movie' src = 'http://localhost/visit_hospital/Images/undraw_doctors_hwty.svg'>
                    <div class = 'main-header'>
                        <h2>We secure your medical records</h2>
                        <h4>Sign up with us here</h4>
                        <a href = '#create-account'><p class = 'inside'>Register Account</p></a>
                    </div>
                 </div>
            	<div id='about' class='about-box'>
            		<div class='about-a1'>
            			<div class='container'>
            				<div class='row'>
                                <div class='title-box'>
                                    <h2>About Us</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                </div>
            				</div>
            				<div class='row'>
            					<div class='col-lg-12 col-md-12 col-sm-12'>
            						<div class='row align-items-center about-main-info'>
            							<div class='col-lg-6 col-md-6 col-sm-12'>
            								<h2> Welcome to Health Lab </h2>
            								<p>Fusce convallis ante id purus sagittis malesuada. Sed erat ipsum, suscipit sit amet auctor quis, vehicula ut leo. Maecenas felis nulla, tincidunt ac blandit a, consectetur quis elit. Nulla ut magna eu purus cursus sagittis. Praesent fermentum tincidunt varius. Proin sit amet tempus magna. Fusce pellentesque vulputate urna. </p>
            								<p>Fusce convallis ante id purus sagittis malesuada. Sed erat ipsum, suscipit sit amet auctor quis, vehicula ut leo. Maecenas felis nulla, tincidunt ac blandit a, consectetur quis elit. Nulla ut magna eu purus cursus sagittis. Praesent fermentum tincidunt varius. Proin sit amet tempus magna. Fusce pellentesque vulputate urna. </p>
            								<a href='#' class='new-btn-d br-2'>Read More</a>
            							</div>
            							<div class='col-lg-6 col-md-6 col-sm-12'>
            								<div class='about-m'>
            									<ul id='banner'>
            										<li>
            											<img src='./Images/about_image/about-img-01.jpg' alt=''>
            										</li>
            										<li>
            											<img src='./Images/about_image/about-img-02.jpg' alt=''>
            										</li>
            										<li>
            											<img src='./Images/about_image/about-img-03.jpg' alt=''>
            										</li>
            									</ul>
            								</div>
            							</div>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
            	<!-- Start Services -->
            	<div id='services' class='services-box'>
                    <h2>Services</h2>
                    <p>We generally offer two packages.</p>
                    <div class='row'>
                        <div class='serviceBox'>
                            <div class='service-icon'><i class='fa fa-h-square' aria-hidden='true'></i></div>
                            <h3 class='title'>Lorem ipsum dolor</h3>
                            <p class='description'>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                            </p>
                        </div>
                        <div class='serviceBox'>
                            <div class='service-icon'><i class='fa fa-hospital-o' aria-hidden='true'></i></div>
                            <h3 class='title'>Lorem ipsum dolor</h3>
                            <p class='description'>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                            </p>
                            <a href='#' class='new-btn-d br-2'>Read More</a>
                        </div>
                    </div>
            	</div>
            	<!-- Start Contact -->
            	<div id='contact' class = 'contact-box'>
                    <h2>Contact us</h2>
                    <div class='row'>
                        <div class='media-left icon-b'>
                            <i class='fa fa-location-arrow' aria-hidden='true'></i>
                            <h4>Address</h4>
                            <a href='#'>Ground floor, room 105<br>Allimex Plaza, Mombasa Road, Nairobi</a>
                        </div>
                        <div class='media-left icon-b'>
                            <i class='fa fa-envelope' aria-hidden='true'></i>
                            <h4>Email</h4>
                            <a href='#'>admin@smartmedike.com</a><br>
                            <a href='#'>reception@smartmedike.com</a>
                        </div>
                        <div class='media-left icon-b'>
                            <i class='fa fa-volume-control-phone' aria-hidden='true'></i>
                            <h4>Phone Number</h4>
                            <a href='#'>+254 743 234567</a><br>
                            <a href='#'>+254 790 453627</a>
                        </div>
                    </div>
            	</div>
            	<!-- End Contact -->

            	<!-- Start Footer -->
            	<footer class='footer-box'>
            		<div class='container'>
            			<div class='row'>
            				<div class='col-lg-12'>
            					<p class='footer-company-name'>All Rights Reserved. &copy; 2022 <a href='#'>SmartMedi</a> Design By : <a href='https://html.design/'>Aisha Rashid</a></p>
            				</div>
            			</div>
            		</div>
            	</footer>
            	<!-- End Footer -->

            	<a href='#' id='scroll-to-top' class='new-btn-d br-2'><i class='fa fa-angle-up'></i></a>
"
echo "<a href = '#Home' id = 'mainDir' >
        <span id = 'cons'><i class='fas fa-home'></i></span>
            <p>Home</p>
    </a>
    <a href = '#Account' id = 'mainDir'>
        <span id = 'cons'><i class='fas fa-user'></i></span>
        <p>Sign In</p>
    </a>"
?>