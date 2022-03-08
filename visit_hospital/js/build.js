
export const ServerData = new(function(){
    this.getKey = function(object,value){ //Get Array keys
        return Object.keys(object).find(key => object[key] == value);
    };
    this.bindAuth = async function(extra){
        let { method, body, header, link, data, way } = extra
        let pop = { method }
        if(!way)
            pop.body = JSON.stringify(body)
        else
            pop.body = body
        if(header)
            pop.headers = { 'Content-type': 'application/json; charset=UTF-8' }
        console.log(pop)
        try {
            const response = await fetch( link, pop );
            if(data == 'json')
                return await response.json();
            if(data == 'text')
                return await response.text();

        } catch (error) {
            console.error(error);
        }
    };

    this.pausePage = function(c){
        let { msg, timer, icon } = c
        let a = msg.split('.').map( p =>  `<h3>${ p }</h3>` )
        const img = ['./Images/undraunu7k.svg','./Images/undraw_transfer_money_rywa.svg','./undraw/undraw_Playful_cat_re_bxiu.svg']
        let r = img[icon]
        $('#pauseWindow').css('display','block')
        const p = `<div id = 'pauseWindowInfo'>
                        <img src = '${ r }' class = 'load-pause' >
                        ${ a.join('.') }
                        <button id = 'nowGo'>
                            OK
                        </button>
                    </div>`
        document.getElementById('pauseWindow').innerHTML = p
        if(timer){
            setTimeout(
                function(){
                    $('#pauseWindow').css('display','none')
                },
                 4000
            );
        }
    };
})() // New class


const createGraph = (graph_data) => {

    let dateValue = graph_data.map( b => b.date );
    let countValue = graph_data.map( b => Number(b.count) );
    var barColors = [ "red", "green", "blue", "orange", "brown" ];
    new Chart('graph', {
        type : "bar",
        data : {
            labels : dateValue,
            datasets : [{
              backgroundColor : barColors,
              data : countValue
            }]
        },
        options : {
            responsive : true,
            title : {
                display : true,
                text : "Number Of Records To Dates",
                fontSize :20
            },

            tooltips : {
                    mode : 'index',
                    intersect: true
            },
            animation : {
                animateScale : true,
                animateRotate : true
            }
        }
    });
}

export const createAccount = async(e) => {
    const f_name = $('#Get_fname').val();
    const l_name = $('#Get_lname').val();
    const password = $('#Get_password').val();
    const r_password = $('#Get_r_password').val();
    const telephone = $('#Get_telephone').val();
    const email = $('#Get_email').val();
    const age = $('#Get_age').val();
    const img = document.getElementById('pro-file').files[0]

    if(!img ||!age ||!f_name || !l_name || !telephone || !email || !password || !r_password){
        if(!telephone) $('#Get_telephone').css('borderBottom','2px solid red');
        if(!email) $('#Get_email').css('borderBottom','2px solid red');
        if(!age) $('#Get_email').css('borderBottom','2px solid red');
        if(!password) $('#Get_password').css('borderBottom','2px solid red');
        if(!f_name) $('#Get_fname').css('borderBottom','2px solid red');
        if(!l_name) $('#Get_lname').css('borderBottom','2px solid red');
        if(!password) $('#Get_password').css('borderBottom','2px solid red');
        if(!r_password) $('#Get_r_password').css('borderBottom','2px solid red');
        if(!img) alert('Upload photo')
    }else{
        const frmD = new FormData();
        frmD.append('create',true)
        frmD.append('name',`${ f_name }, ${l_name}`)
        frmD.append('img',img)
        frmD.append('password',password)
        frmD.append('telephone',telephone)
        frmD.append('email',email)
        frmD.append('age',age)

        let create = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : false, 'body' : frmD, 'data' : 'json', 'way' : true })
        console.log(create)
        $('#feedback').append(create.feedback)
        if(create.success)
            setTimeout(
                function(){
                    window.location.assign('#log-in')
                },2000
            )
    }


}
export const ulog = async(e) => {
    const telephone = $('#GetTel').val();
    const password = $('#getIfno').val();
    if(!password || !telephone){
        if(!telephone) $('#GetTel').css('borderBottom','2px solid red');
        if(!password) $('#getIfno').css('borderBottom','2px solid red');
    }else{
        let logIn = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : true, 'body' : { 'login' : true, 'email' : telephone, 'password' : password }, 'data' : 'json' })
        $('#feedback').append(logIn.feedback)
        if(logIn.identity)
            setTimeout(
                function(){
                    hospitalContent([2])
                },2000
            )

    }
}

export const hospitalContent = async(no_panel) => {
    let login = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : true, 'body' : { 'user' : true }, 'data' : 'json' })

    let account = (!login.user) ? 'Sign In' : 'Account';

    //Build : main bar
    if(no_panel.includes(3)){
        let bodyContent = `
            <a href = '#Home' id = 'mainDir' >
                <span id = 'cons'><i class='fas fa-home'></i></span>
                <p>Home</p>
            </a>
            <a href = '#Account' id = 'mainDir'>
                <span id = 'cons'><i class='fas fa-user'></i></span>
                <p>${ account }</p>
            </a>
            <a href = '#Logistics' id = 'mainDir'>
                <span id = 'cons'><i class='fas fa-chart-area'></i></span>
                <p>Stats</p>
            </a>`
        $('#main-bar').html(bodyContent)
    }

    let portal = (!login.user) ? false : true;
    //Build : Home Page
    if(no_panel.includes(1)){

        let bodyContent = `
            <div class="Navigation">
                <a href = "#about" class = 'bin'>
                    #About Us
                </a>
                <a href = "#contact" class = 'bin'>
                    #Contact
                </a>
                <a href = "#register" class = 'bin'>
                    #Create Account
                </a>
            </div>
            <div class = 'welcome-header'>
                <img id = 'movie' src="https://static.turbosquid.com/Preview/2016/11/18__13_46_19/1.jpgBEB4B89A-9FF3-47DC-A1CC-F608321FFE13DefaultHQ.jpg">
                <h1>Welcome To Aisha Visit Hospital</h1>
            </div>
            <div id = 'register'>
                <div class = 'main-header'>
                    <img src = './Images/undraw_lost_re_xqjt.svg' class = 'avatar-undraw-c'>
                    <h2>We secure your medical records</h2>
                    <h4>Sign up with us here</h4>
                    <a href = '#create-account'><p class = 'inside'>Register Account</p></a>
                </div>
            </div>
            <div id = 'contact'>
                <div class="section-heading">
                    <h3>Get <span>in touch</span><br>with us</h3>
                    <p>We are here to help. Either email us, call us, or come speak to us.</p>
                </div>
                <p>Please feel free to contact us. We will get back to you within 24 hours.</p>
                <section>
                    <div class="contact-social-info d-flex mt-50 mb-50">
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                    <div class="single-contact-info d-flex">
                        <div class="contact-icon mr-15">
                            <i class="fa fa-map"></i>
                        </div>
                        <p>Baraka Plaza, Second Floor Room 1, Nakuru, Kenya</p>
                    </div>
                    <div class="single-contact-info d-flex">
                        <div class="contact-icon mr-15">
                            <i class="fa fa-phone"></i>
                        </div>
                        <p>Main: 0722839808 or 0722165012 <br> Out of Hours: 0722165012</p>
                    </div>
                </section>
            </div>
        `
        $('#Home').html(bodyContent)
    }
    if(no_panel.includes(2)){
        let tab_string = ''
        if(!portal){
            tab_string += `<div id = 'log-in'>
                                <img class = 'avatar-undraw' src = 'https://ukoapp.co.ke/public/undraw/undraw_access_account_99n5.svg'>
                                <div id = 'feedback'></div>
                                <form accept-charset=utf-8>
                                    <span class='title'>LogIn Here</span><br>
                                    <div id = 'input-div'>
                                        <div class='i'>
                                            <i class='fas fa-user'></i>
                                        </div>
                                        <input reset = '#GetTel' type='telephone' placeholder = 'Enter Telephone or Email' id = 'GetTel' class = 'input' required />
                                    </div>
                                    <div id = 'input-div'>
                                       <div class = 'i'>
                                            <i class = 'fas fa-lock'></i>
                                       </div>
                                       <input type = 'password' placeholder = 'Enter Password' class = 'input' id = 'getIfno' required />
                                       <button type = 'button' id = 'bb' class = 'b-form' name = 'bb' ><i class = 'fas fa-eye'></i></button>
                                    </div>
                                    <button type = 'submit' name = 'AccessForm'  id = 'AccessForm' class = 'sendIfno'>Login</button>
                                </form>
                                <a href = '#create-account' class = 'route-sign-register'>
                                    <i class="fas fa-angle-down"></i>
                                    Go To Register
                                </a>
                                </div>
                            <div id = 'create-account'>
                            <a href = '#log-in' class = 'route-sign-register'>
                                <i class="fas fa-angle-up"></i>
                                Go To Log In
                            </a>
                            <img class = 'avatar-undraw' src = 'https://ukoapp.co.ke/public/undraw/undraw_upload_image_iwej.svg'>
                            <form accept-charset = utf-8 id = 'personal'>
                            <p class = 'title'>Create Account</p><br>
                            <div id='input-div'>
                                <input type='text' placeholder = 'First Name' id='Get_fname' class = 'input' required />
                                <input type='text' placeholder = 'Last Name' id='Get_lname' class = 'input' required />
                            </div>
                            <div id='input-div'>
                                <input type='telephone' placeholder = 'Telephone' id='Get_telephone' class = 'input' required />
                                <input type='email' placeholder = 'Email' id='Get_email' class = 'input' required />
                            </div>
                            <div id='input-div'>
                                <input type='password' placeholder = 'Password' id='Get_password' class = 'input' required />
                                <input type='password' placeholder = 'Repeat Password' id='Get_r_password' class = 'input' required />
                            </div>
                            <div id='input-div'>
                                <input type='text' placeholder = 'Age' id = 'Get_age' class = 'input' required />
                            </div>
                            <div id='input-div'>
                                <p>upload profile image</p>
                            </div>
                            <div id='input-div'>
                                <button id='document' class = 'pdf'>
                                    <i class = 'fas fa-copy'></i>
                                    Upload
                                </button>
                                <input type = 'file' id='pro-file'>
                            </div>
                            <div id='input-div'>
                                <button type='submit' name='NextForm'  id='NextForm' class='sendIfno'>Create Account</button>
                            </div>
                            </form>
                            </div>`;
        }else{
            tab_string += `Bayaa will finish your app shortly`
        }

        $('#Account').html(tab_string)
    }
    if(no_panel.includes(4)){
        let graph_data = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : true, 'body' : { 'graph' : true }, 'data' : 'json' })

        let pin = `<canvas id = "graph" style = "width:50%;max-width:500px" >
            </canvas>`
        $('#Logistics').html(pin)
        createGraph(graph_data)
    }

    const movie = ['https://static.turbosquid.com/Preview/2016/11/18__13_46_19/5.jpgA420230C-5140-4BF4-BDAA-75574A166884Zoom.jpg','https://static.turbosquid.com/Preview/2016/11/18__13_46_19/4.jpg836CE1D8-7974-4F79-B2D1-48089A377E56Zoom.jpg','https://static.turbosquid.com/Preview/2016/11/18__13_46_19/3.jpg228C05F6-C26E-4656-A518-05684EC2615DZoom.jpg','https://static.turbosquid.com/Preview/2016/11/18__13_46_19/2.jpgF83F9106-5211-470E-B89C-DFFC0998CE1DZoom.jpg']
    let k = 0;
    setInterval(
        function(){
            document.querySelector('#movie').src = movie[k]
            k++
            if(k == 4)
                k = 0
        },500
    )
}