//Import of functions from other file
import * as build from "./build.js"
//When the page loads
$(document).ready(function(){
    //One
    ['Home','Account','main-bar'].map( d => {
        let g = document.createElement("div");
        g.setAttribute("id", d);
        let c = 'holder';
        if(d == 'main-bar')
            c = 'slide';
        g.setAttribute("class", c);
        document.getElementById('build').appendChild(g);
    })

    build.hospitalContent([1,2,3,4])

    $(document).on('click','#AccessForm', (e) => {
        e.preventDefault();
        build.ulog(e);
    })
    $(document).on('click','.input',function(e){
        e.preventDefault();
        $(this).css('border-bottom','1px solid #ccc')
    })
    $(document).on('keyup','.input',function(e){
        e.preventDefault();
        const index = e.currentTarget.attributes[1].value
        if(e.currentTarget.value)
            $(index).slideDown('slow')
        else
            $(index).slideUp('slow')
    })
    $(document).on('click','#bb',function(e){
        e.preventDefault();
        const p = $('#getIfno');
        const c = $('#bb');
        if(p.attr('type') == 'text'){
            p.get(0).setAttribute('type','password');
            c.html("<i class='fas fa-eye'></i>");
        }else{
            p.get(0).setAttribute('type','text');
            c.html("<i class='fas fa-eye-slash'></i>");
        }

    });
    $(document).on('click','#document', (e) => {
        e.preventDefault(e);
        $('#pro-file').click();
    });
    $(document).on('change','#pro-file', () => {
        $('#document').html('Uploaded!');
    })
    $(document).on('click','#make-switch', function(e){
        e.preventDefault();
        const user = e.currentTarget.attributes[1].value
        build.ServerData.user_type = user;
        document.querySelectorAll('#make-switch').forEach( (p) => {
            p.style.background = "#fff";
            p.style.color = "#000";
        })

        this.style.background = "#000";
        this.style.color = "#fff";

        if( user == 'doctor'){
            $('.hospital_register').css('display','block');
            $('.hospital_doctor').css('display','block');
            $('.hospital_doctor').slideDown('slow');
            $('.hospital_register').slideDown('slow');
        }else{
            $('.hospital_register').slideUp('slow');
            $('.hospital_doctor').slideUp('slow');
            $('.hospital_register').css('display','none');
            $('.hospital_doctor').css('display','none');
        }
    })
    $(document).on('click','#NextForm', (e) => {
        e.preventDefault(e);
        build.createAccount();
    });
    $(document).on('click','#mainDir', function(){
        document.querySelectorAll('#mainDir').forEach( n => {
            n.style.color = "#000";
        })
         $(this).css('color','#FFC300');
    });
    $(document).on('click','#push', (e) =>{
        const side = Number(e.currentTarget.attributes[2].value);
        let next = (build.ServerData.home) ? Number(build.ServerData.home) : 1 ;

        if(side == 2){
            if(next < 3){
                $('#wall' + next).fadeOut('fast');
                next = (next + 1)
                $('#wall' + next).fadeIn('fast');
                build.ServerData.home = next;
            }
        }else{
            if(next > 1){
                $('#wall' + next).fadeOut('fast');
                next = (next - 1)
                $('#wall' + next).fadeIn('fast');
                build.ServerData.home = next;
            }
        }
    })
});