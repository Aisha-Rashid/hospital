
export const ServerData = new(function(){
    this.getKey = function(object,value){ //Get Array keys
        return Object.keys(object).find(key => object[key] == value);
    };
    this.bindAuth = async function(extra){
        let { method, body, header, link, data, way, load } = extra
        let pop = { method }
        if(!load)
            this.pausePage({ 'msg' : 'loading...', 'run' : true, 'timer' : false, 'confirm' : false, 'load' : 1 })
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
                    this.pausePage({ 'run' : false,  'msg' : 'loading...', 'timer' : false, 'confirm' : false, 'load' : 1 })
            if(data == 'json')
                return await response.json();
            if(data == 'text')
                return await response.text();

        } catch (error) {
            console.error(error);
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
            this.pausePage({ 'msg' : 'Request Timeout', 'timer' : 'fast', 'run' : true, 'confirm' : false, 'load' : 2 })
    };
    this.pausePage = function(c){
        let { msg, timer, run, confirm, load } = c
        let a = msg.split('.').map( p =>  `<h3>${ p }</h3>` )
        let icon = ['undraw_lost_online_re-upmy.svg','undraw_lost_re_xqjt.svg','undraw_meditating_re_aiqa.svg'];
        if(run){
            let p = `<div id = 'pauseWindowInfo'>
                            <img id = 'pause-dimension' src = 'http://localhost/visit_hospital/Images/${ icon[load] }' class = 'load-pause' >
                            ${ a.join('.') }`
                            if(confirm){
                                p += `<button id = 'nowGo'>
                                    OK
                                </button>`
                            }
            p += `</div>`
            const wall = document.createElement('div')
            wall.setAttribute("id", 'pauseWindow');
            wall.innerHTML = p
            document.getElementById('build').appendChild(wall)

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
        if(!age) $('#Get_email').css('borderBottom','2px solid red');
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
            ServerData.pausePage({ 'msg' : 'Request Timeout. Try again', 'run' : true, 'timer' : 'fast', 'confirm' : false, 'load' : 2 })
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
            //Build : main bar
            if(no_panel.includes(3))
                $('#main-bar').html(string.content.main_bar)

            //Build : Home Page
            if(no_panel.includes(1)){
                $('#Home').html(string.content.home)
                ServerData.spin({ 'link' : `http://localhost/3D_images/nurse.json`, 'id' : '#movie', 'speed' : 400 })
            }
            if(no_panel.includes(2))
                $('#Account').html(string.content.login)

            if(no_panel.includes(4)){
                let graph_data = await ServerData.bindAuth({ 'method' : 'POST', 'link' : `http://localhost/visit_hospital/php/index.php`, 'header' : true, 'body' : { 'graph' : true }, 'data' : 'json' })
                $('#Logistics').html(string.content.graph)
                createGraph(graph_data)
            }
            if(no_panel.includes(5)){
                console.log(ServerData.admin)
                if(login.user){
                    let tab_string = ''
                    if(ServerData.admin)
                        tab_string += string.account.admin
                    else
                        tab_string += string.account.user

                    $('#User').html(tab_string)
                }else
                    window.location.assign('http://localhost/visit_hospital/index.html')
            }
        }else
            ServerData.pausePage({ 'msg' : 'Request Timeout. Try Again', 'run' : true, 'timer' : 'fast', 'confirm' : false, 'load' : 2 })
    }else
        ServerData.pausePage({ 'msg' : 'Request Timeout. Try Again', 'run' : true, 'timer' : 'fast', 'confirm' : false, 'load' : 2 })
}

