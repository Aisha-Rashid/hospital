//Import of functions from other file
import * as build from "./build.js"
//When the page loads
$(document).ready(function(){
    //One
    ['Home','Account','main-bar','Logistics'].map( d => {
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
    $(document).on('click','#NextForm', (e) => {
        e.preventDefault(e);
        build.createAccount();
    });
    $(document).on('click','#mainDir', function(){
        document.querySelectorAll('#mainDir').forEach( n => {
            n.style.color = "#fff";
        })
         $(this).css('color','#FFC300');
    });
});