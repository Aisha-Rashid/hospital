
export const ServerData = new(function(){
    this.getKey = function(object,value){ //Get Array keys
        return Object.keys(object).find(key => object[key] == value);
    };
    this.getAge = function(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }
    this.bindAuth = async function(extra){
        let { method, body, header, link, data, way, load } = extra
        let pop = { method }
        if(!load)
            this.pausePage({ 'msg' : 'loading...', 'run' : true, 'timer' : false, 'confirm' : false })
        if(method == "POST")
            if(!way)
                pop.body = JSON.stringify(body)
            else
                pop.body = body
        if(header)
            pop.headers = { 'Content-type': 'application/json; charset=UTF-8' }

        try {
            const response = await fetch( link, pop );
            if(!load)
                    this.pausePage({ 'run' : false,  'msg' : 'loading...', 'timer' : false, 'confirm' : false })
            if(data == 'json')
                return await response.json();
            if(data == 'text')
                return await response.text();

        } catch (error) {
            console.error(error);
            console.log([link, body]);
        }
    };
    this.spin = async(data) => {
        const { link, id, speed } = data
        const three_dimension = await this.bindAuth( { 'method' : 'GET', 'link' : `${ link }`, 'header' : false, 'data' : 'json', 'load' : true })
        if(three_dimension){
            let k = 0;
            setInterval(
                function(){
                    document.querySelector(id).src = three_dimension.header + '' + three_dimension.spinner[k]
                    k++
                    if(k == 4)
                        k = 0
                },speed
            )
        }else
            this.pausePage({ 'msg' : 'Request Timeout', 'timer' : 'fast', 'run' : true, 'confirm' : false })
    };
    this.pausePage = function(c){
        let { msg, timer, run, confirm } = c
        let a = msg.split('.').map( p =>  `<h3>${ p }</h3>` )
        if(run){
            let p = `<img id = 'pause-dimension' src = 'http://localhost/visit_hospital/Images/load.gif' class = 'load-pause' >
                            <div id = 'input-div-internal'>
                                ${ a.join('.') }`
                                if(confirm){
                                    p += `<button id = 'nowGo'>
                                        OK
                                    </button>`
                                }
                            p += `</div>`
            $('#pauseWindow').remove()
            const wall = document.createElement('div')
            wall.setAttribute("id", 'pauseWindow');
            wall.innerHTML = p
            document.getElementById('build').appendChild(wall)
            if(confirm){
                $('#pauseWindow').css('display','flex')
                $('#pauseWindow').css('flexDirection','row')
            }
            $('#pauseWindow').fadeIn('slow')
            if(timer){
                if(timer == 'fast')
                    timer = 500
                if(timer == 'slow')
                    timer = 4000
                setTimeout(
                    function(){
                        $('#pauseWindow').fadeOut()
                    },
                     timer
                );
            }
        }else{
            $('#pauseWindow').fadeOut()
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

function formatState (state) {
/*  if (!state.id) {
    return state.text;
  }

  var baseUrl = "/user/pages/images/flags";
  var $state = $(
    '<span><img class="img-flag" /> <span></span></span>'
  );

  // Use .text() instead of HTML string concatenation to avoid script injection issues
  $state.find("span").text(state.text);
  $state.find("img").attr("src", baseUrl + "/" + state.element.value.toLowerCase() + ".png");

  return $state;
  */

};

const buildSelect = (e) => {
    let { id, placeholder, group, data } = e

    $(id).select2({
        placeholder : placeholder,
        tags : true,
        //templateSelection : formatState,
        data : data.select
    }).on('select2:close', function(){
        var element = $(this);
        var new_category = $.trim(element.val());

        if(new_category != '') //If not in DB
            element.append('<option value="'+new_category+'">'+new_category+' Not in Database</option>').val(new_category);

    });
}

const plotView = async(e) => {
    let { channel, select_id, view_id, panel, placeholder } = e

    let all_data = {};
    if(channel == 1)
        all_data = await ServerData.bindAuth({ 'method' : 'POST', 'link' : 'http://localhost/visit_hospital/php/index.php', 'header' : true, 'body' : { 'hospital_name' : true }, 'data' : 'json' })

    if(channel == 2)
        all_data = await ServerData.bindAuth({ 'method' : 'POST', 'link' : 'http://localhost/visit_hospital/php/index.php', 'header' : true, 'body' : { 'doctor_name' : true }, 'data' : 'json' })

    if(channel == 3)
        all_data = await ServerData.bindAuth({ 'method' : 'POST', 'link' : 'http://localhost/visit_hospital/php/index.php', 'header' : true, 'body' : { 'record_name' : true }, 'data' : 'json' })
    console.log(all_data)
    buildSelect({ 'group' : channel, 'id' : '#' + select_id, 'placeholder' : placeholder, 'data' : all_data })

    let main_build = () => {
        if(channel == 1)
            return 'hospital_id'
        if(channel == 2)
            return 'doctor_id'
    }

    function if_length(){
        if(all_data.all.length > 0){
            if(channel == 1 || channel == 2){
                return `${
                    all_data.all.map( h =>
                        `<section id = '${ main_build }'>
                            <img src = '${ h.Image }'>
                            <div id = 'input-div-internal'>
                                <i class='fas fa-home'></i>
                                <p>${ h.Name }</p>
                            </div>
                            <div id = 'input-div'>
                                <div id = 'input-div-internal'>
                                   <i class='fas fa-home'></i>
                                   <p>${ h.Telephone }</p>
                                </div>
                                <div id = 'input-div-internal'>
                                   <i class='fas fa-home'></i>
                                   <p>${ h.Email }</p>
                                </div>
                            </div>
                            <div id = 'input-div-internal'>
                                <i class='fas fa-home'></i>
                                <p>${ h.Address || h.Age }</p>
                            </div>
                        </section>
                            `
                    )
                }`
            }
            let packages = () => {
                if(all_data.packages)
                    return all_data.packages
                else
                    return 'Bronze'
            }
            if(channel == 3){
                return `
                    <div id = 'wall-package'>
                        <i class='fas fa-home' style = 'color:${ packages }'></i>
                        <span>${ packages }</span>
                        <a href = 'http://localhost/packages/index.html'>Choose Package</a>
                    </div>
                    ${
                    all_data.all.map( h =>
                        `<section id = 'record_id'>
                            <div id = 'input-div-internal'>
                                <i class='fas fa-home'></i>
                                <p>${ h.Sickness }</p>
                            </div>
                            <div id = 'input-div-internal'>
                                <i class='fas fa-home'></i>
                                <p>${ h.Symptoms }</p>
                            </div>
                            <div id = 'input-div-internal'>
                                <i class='fas fa-home'></i>
                                <p>${ h.Treatment }</p>
                            </div>
                            <div id = 'input-div-internal'>
                                <i class='fas fa-home'></i>
                                <p>${ h.Medicine }</p>
                            </div>
                            <div id = 'input-div'>
                                <div id = 'input-div-internal'>
                                   <i class='fas fa-home'></i>
                                   <p>${ h.DoctorName }</p>
                                </div>
                                <div id = 'input-div-internal'>
                                   <i class='fas fa-home'></i>
                                   <p>${ h.HospitalName }</p>
                                </div>
                            </div>
                        </section>
                            `
                    )
                }`
            }
        }else{
             return `<img src = 'http://localhost/visit_hospital/Images/undraw_lost_re_xqjt.svg' class = 'avatar-undraw'>
             <h3>No ${ panel } enlisted in the Database</h3>`
        }
    }
    const bit = if_length();
    $(view_id).html(bit)
}

//Get data from backend to profile wall with virtual storage
export const retrieveContent = async(e) => {
    let string = ServerData.bind_string
    let content = (e) ? Number(e) : 0 ;

    document.querySelectorAll('#hospital').forEach( (h,k) => {
        if(k == content){
            h.style.textDecoration = "underline"
            h.style.background = "#fff"
        }else{
            h.style.textDecoration = "none"
            h.style.background = "#F7F8FB"
        }
    })
    $('#main-focus').html(string.account.draft[content])

    if(content == 0){
        let obtain_plot = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : false, 'body' : { 'profile' : true }, 'data' : 'json'})

        let c = obtain_plot.users[0];
        document.getElementById('profile-img').src = c.Image
        $('#profile-name').val(c.Name)
        $('#profile-email').val(c.Email)
        $('#profile-telephone').val(c.Telephone)
        $('#profile-age').val(ServerData.getAge(c.Age))
        $('#profile-password').val(c.Password)
        $('#profile-gender').val(c.Gender)
    }
    if(content == 2)
        plotView({ 'channel' : 1, 'select_id' : 'view_hospital', 'view_id' : '#view_hospitals', 'panel' : 'Hospitals', 'placeholder' : 'Search Hospital Here...'})

    if(content == 4)
        plotView({ 'channel' : 2, 'select_id' : 'view_doctor', 'view_id' : '#view_doctors', 'panel' : 'Doctors', 'placeholder' : 'Search Doctor Here...'})

    if(content == 5){
        let all_hospital = await ServerData.bindAuth({ 'method' : 'POST', 'link' : 'http://localhost/visit_hospital/php/index.php', 'header' : true, 'body' : { 'hospital_name' : true }, 'data' : 'json' })
        $('#Get_doctor_age').datepicker({
            dateFormat : 'yy-mm-dd',
            showAnim: 'slideDown',
           changeMonth: true,
           changeYear: true
        });
        buildSelect({ 'group' : 4, 'id' : '#Get_doctor_h_name', 'placeholder' : 'Hospital Doctor Works...', 'data' : all_hospital })

    }
    if(content == 6)
        plotView({ 'channel' : 3, 'select_id' : 'view_record', 'view_id' : '#view_records', 'panel' : 'Records', 'placeholder' : 'Search Record Here...'})

    if(content == 7){
        let all_hospital = await ServerData.bindAuth({ 'method' : 'POST', 'link' : 'http://localhost/visit_hospital/php/index.php', 'header' : true, 'body' : { 'hospital_name' : true }, 'data' : 'json' })

        buildSelect({ 'group' : 5, 'id' : '#hospital-record', 'placeholder' : 'Hospital...', 'data' : all_hospital })

        let all_doctor = await ServerData.bindAuth({ 'method' : 'POST', 'link' : 'http://localhost/visit_hospital/php/index.php', 'header' : true, 'body' : { 'doctor_name' : true }, 'data' : 'json' })

        buildSelect({ 'group' : 6, 'id' : '#doctor-record', 'placeholder' : 'Doctor...', 'data' : all_doctor })
    }
}

export const search_hospital = async(e) => {
    const hospital = $('#view_hospital').val();
    let hospital_id = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : false, 'body' : { 'hospital_search' : true, 'data' : hospital }, 'data' : 'json'})
    if(hospital_id){
        if(hospital_id.hospital){
            $('#view_hospitals').html(`
            ${
                hospital_id.hospital.map( h => {
                    `<section id = 'hospital_id'>
                        <img src = '${ h.Image }'>
                        <div id = 'input-div-internal'>
                            <i class='fas fa-home'></i>
                            <p>${ h.Name }</p>
                        </div>
                        <div id = 'input-div'>
                            <div id = 'input-div-internal'>
                               <i class='fas fa-home'></i>
                               <p>${ h.Telephone }</p>
                            </div>
                            <div id = 'input-div-internal'>
                               <i class='fas fa-home'></i>
                               <p>${ h.Email }</p>
                            </div>
                        </div>
                        <div id = 'input-div-internal'>
                            <i class='fas fa-home'></i>
                            <p>${ h.Address }</p>
                        </div>
                    </section>
                        `
                })
            }
           `)
        }
    }else
        ServerData.pausePage({ 'msg' : 'Request Timeout. Try again', 'run' : true, 'timer' : 'fast', 'confirm' : false })
}
export const hospital_add = async(e) => {
    const telephone = $('#Get_h_telephone').val();
    const email = $('#Get_h_email').val();
    const name = $('#Get_name').val();
    const address = $('#Get_h_address').val();
    const img = document.getElementById('hospital-file').files[0]

    if(!telephone || !email || !name || !address || !img){
        let m = ``
        if(!telephone)
            m += `Please Input a valid telephone<br>`
        if(!email)
            m += `Please Input a valid email<br>`
        if(!name)
            m += `Please Input a valid name<br>`
        if(!address)
            m += `Please Input a valid address<br>`
        if(!img)
            m += `Please Input a valid image<br>`
        ServerData.pausePage({ 'msg' : m, 'timer' : false, 'run' : true, 'confirm' : true })
    }else{
        const frmD = new FormData();
        frmD.append('create-hospital',true)
        frmD.append('name',name)
        frmD.append('img',img)
        frmD.append('telephone',telephone)
        frmD.append('email',email)
        frmD.append('address',address)
        let hospital = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : false, 'body' : frmD, 'data' : 'json', 'way' : true })
        if(hospital)
            retrieveContent(3)
    }
}
export const doctor_add = async(e) => {
    const telephone = $('#Get_doctor_telephone').val();
    const email = $('#Get_doctor_email').val();
    const name = $('#Get_doctor_name').val();
    const hospital_count = $('#Get_doctor_h_name').val().split(',')[0];
    const hospital_name = $('#Get_doctor_h_name').val().split(',')[1];
    const gender = $('#Get_doctor_gender').val();
    const age = $('#Get_doctor_age').val();
    const img = document.getElementById('doctor-file').files[0]

    if(!gender || !hospital_name || !telephone || !email || !name || !age || !img){
        let m = ``
        if(!gender)
            m += `Please Input a valid gender<br>`
        if(!hospital_name)
            m += `Please Input a valid hospital name<br>`
        if(!telephone)
            m += `Please Input a valid telephone<br>`
        if(!email)
            m += `Please Input a valid email<br>`
        if(!name)
            m += `Please Input a valid name<br>`
        if(!age)
            m += `Please Input a valid age<br>`
        if(!img)
            m += `Please Input a valid image<br>`
        ServerData.pausePage({ 'msg' : m, 'timer' : false, 'run' : true, 'confirm' : true })
    }else{

        const frmD = new FormData();
        frmD.append('create-doctor',true)
        frmD.append('name',name)
        frmD.append('img',img)
        frmD.append('telephone',telephone)
        frmD.append('email',email)
        frmD.append('hospital',hospital_name)
        frmD.append('gender',gender)
        frmD.append('age',age)
        frmD.append('count',hospital_count)
        let hospital = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : false, 'body' : frmD, 'data' : 'json', 'way' : true })
        if(hospital)
            retrieveContent(5)
    }
}
export const record_add = async(e) => {
    const sickness = $('#sickness').val();
    const symptoms = $('#symptoms').val();
    const medicine = $('#medicine').val();
    const treatment = $('#treatment').val();
    const doctor_record = $('#doctor-record').val().split(',')[1];
    const sickness_record = $('#hospital-record').val().split(',')[1];
    const hospital_count = $('#hospital-record').val().split(',')[0];


    if(!sickness || !symptoms || !medicine || !treatment || !doctor_record || !sickness_record){
        let m = ``
        if(!sickness)
            m += `Please Input sickness<br>`
        if(!symptoms)
            m += `Please Input symptoms<br>`
        if(!medicine)
            m += `Please Input medicine<br>`
        if(!treatment)
            m += `Please Input treatment<br>`
        if(!doctor_record)
            m += `Please select a doctor<br>`
        if(!sickness_record)
            m += `Please select hospital<br>`
        ServerData.pausePage({ 'msg' : m, 'timer' : false, 'run' : true, 'confirm' : true })
    }else{
        const img = document.getElementById('record-file').files[0]
        console.log(ServerData.hospital_two)
        const frmD = new FormData();
        frmD.append('create-record',true)
        frmD.append('sickness',sickness)
        frmD.append('symptoms',symptoms)
        frmD.append('medicine',medicine)
        frmD.append('treatment',treatment)
        frmD.append('doctor_record',doctor_record)
        frmD.append('sickness_record',sickness_record)
        frmD.append('count',hospital_count)
        let hospital = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : false, 'body' : frmD, 'data' : 'json', 'way' : true })
        if(hospital)
            retrieveContent(7)
    }
}
export const go_away = async(e) => {
    let out = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : false, 'body' : { 'out' : true }, 'data' : 'json'})
    if(out.command){
        ServerData.pausePage({ 'msg' : 'Signed Out', 'run' : true, 'timer' : 'slow', 'confirm' : false })
        window.location.assign('http://localhost/visit_hospital/index.html')
    }
}
export const delete_user = async(e) => {
    let destroy = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : false, 'body' : { 'destroy' : true }, 'data' : 'json'})
    if(destroy.command){
        ServerData.pausePage({ 'msg' : 'Account Destroyed!', 'run' : true, 'timer' : 'slow', 'confirm' : false })
        window.location.assign('http://localhost/visit_hospital/index.html')
    }
}

export const createAccount = async(e) => {
    const f_name = $('#Get_fname').val();
    const l_name = $('#Get_lname').val();
    const password = $('#Get_password').val();
    const r_password = $('#Get_r_password').val();
    const telephone = $('#Get_telephone').val();
    const email = $('#Get_email').val();
    const age = $('#Get_age').val();
    const gender = $('#Get_gender').val();
    const img = document.getElementById('pro-file').files[0]

    if(!gender ||!img ||!age ||!f_name || !l_name || !telephone || !email || !password || !r_password){
        if(!telephone) $('#Get_telephone').css('borderBottom','2px solid red');
        if(!email) $('#Get_email').css('borderBottom','2px solid red');
        if(!age) $('#Get_age').css('borderBottom','2px solid red');
        if(!password) $('#Get_password').css('borderBottom','2px solid red');
        if(!f_name) $('#Get_fname').css('borderBottom','2px solid red');
        if(!l_name) $('#Get_lname').css('borderBottom','2px solid red');
        if(!gender) $('#Get_gender').css('borderBottom','2px solid red');
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
        frmD.append('gender',gender)
        let create = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : false, 'body' : frmD, 'data' : 'json', 'way' : true })
        if(create){
            $('#feedback').append(create.feedback)
            if(create.success)
                setTimeout(
                    function(){
                        window.location.assign('#log-in')
                    },2000
                )
        }else
            ServerData.pausePage({ 'msg' : 'Request Timeout. Try again', 'run' : true, 'timer' : 'fast', 'confirm' : false })
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
        if(logIn){
            $('#feedback').html(logIn.feedback)
            ServerData.admin = logIn.admin
            if(logIn.identity){
                setTimeout(
                    function(){
                        window.location.assign('http://localhost/visit_hospital/account/index.html')
                    },2000
                )
            }
        }
    }
}

export const hospitalContent = async(no_panel) => {
    let login = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : true, 'body' : { 'user' : true }, 'data' : 'json' })
    if(login){
        let string = await ServerData.bindAuth({ 'method' : 'GET', 'link' : `http://localhost/visit_hospital/json/string.json`, 'header' : true, 'data' : 'json', 'load' : true })
        if(string){
            ServerData.bind_string = string
            //Build : main bar
            if(no_panel.includes(3))
                $('#main-bar').html(string.content.main_bar)

            //Build : Home Page
            if(no_panel.includes(1)){
                $('#Home').html(string.content.home)
                ServerData.home = (ServerData.home) ? Number(ServerData.home) : 0 ;
                setInterval(
                    function(){
                        $('#wall' + ServerData.home).fadeOut('slow');
                        if(ServerData.home == 3)
                            ServerData.home = 1;
                        else
                            ServerData.home++
                        $('#wall' + ServerData.home).fadeIn('slow');
                    },2000
                )
                //ServerData.spin({ 'link' : `http://localhost/3D_images/nurse.json`, 'id' : '#movie', 'speed' : 400 })
            }
            if(no_panel.includes(2)){
                $('#Account').html(string.content.login)
                $('#Get_age').datepicker({
                    dateFormat : 'yy-mm-dd',
                    showAnim: 'slideDown',
                   changeMonth: true,
                   changeYear: true
                });

            }

            if(no_panel.includes(4)){
                let graph_data = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : true, 'body' : { 'graph' : true }, 'data' : 'json' })
                $('#Logistics').html(string.content.graph)
                if(graph_data)
                    createGraph(graph_data)
                else
                    ServerData.pausePage({ 'msg' : 'Request Timeout. Try Again', 'run' : true, 'timer' : 'fast', 'confirm' : false })
            }
            if(no_panel.includes(5)){
                if(login.user){
                    if(ServerData.admin)
                        $('#build').html(string.account.admin)
                    else{
                        $('#build').html(string.account.user)
                        retrieveContent()
                    }
                }else
                    window.location.assign('http://localhost/visit_hospital/index.html')
            }
        }else
            ServerData.pausePage({ 'msg' : 'Request Timeout. Try Again', 'run' : true, 'timer' : 'fast', 'confirm' : false })
    }else
        ServerData.pausePage({ 'msg' : 'Request Timeout. Try Again', 'run' : true, 'timer' : 'fast', 'confirm' : false })
}

