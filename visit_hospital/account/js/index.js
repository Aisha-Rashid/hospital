//Import of functions from other file
import * as build from "./../../js/build.js";

$(document).ready(function(){

    build.hospitalContent([5]);

    $(document).on('click','#account-switch', (e) => {
        e.preventDefault();
        let address = e.currentTarget.attributes[1].value;
        let rotate = e.currentTarget.attributes[2].value;
        let panels = document.querySelectorAll('.account-window')
        let walls = document.querySelectorAll('#account-switch')
        let pins = document.querySelectorAll('#pin')

        panels.forEach( w => { //All windows
            if(w.attributes[2]){
                $('#' + w.id).slideUp('slow')
                w.style.background = '#3F3F44'
                e.currentTarget.attributes[2].value = 0
            }
        });

        walls.forEach( (w,k) => { //All walls button
            if(w.attributes[2]){
                pins[k].innerHTML = "<i class='fas fa-folder'></i>";
                w.style.background = 'transparent'
                w.style.textDecoration = "none"
            }
        });

        if(Number(rotate) == 0){
            panels[address].style.background = '#fff'
            $('#' + panels[address].id).slideDown('slow')
            e.currentTarget.attributes[2].value = 1
            e.currentTarget.style.background = '#fff'
            e.currentTarget.style.textDecoration = "underline"
            pins[address].innerHTML = "<i class='fas fa-folder-open'></i>";
        }else{
            $('#' + panels[address].id).slideUp('slow')
            panels[address].style.background = 'transparent'
            pins[address].innerHTML = "<i class='fas fa-folder'></i>";
             e.currentTarget.attributes[2].value = 0
             e.currentTarget.style.background = 'transparent'
             e.currentTarget.style.textDecoration = "none"
        }
    });
    $(document).on('click','#hospital',(e) => {
        e.preventDefault();
        build.retrieveContent(e.currentTarget.attributes[1].value);
    })
    $(document).on('click','#delete',(e) => {
        e.preventDefault();
        build.delete_user(e);
    })
    $(document).on('click','#search_hospital',(e) => {
        e.preventDefault();
        build.search_hospital(e);
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
    $(document).on('click','#hospital_document', (e) => {
        e.preventDefault(e);
        $('#hospital-file').click();
    });
    $(document).on('change','#hospital-file', () => {
        $('#hospital_document').html('Uploaded!');
    })
    $(document).on('click','#doctor_document', (e) => {
        e.preventDefault(e);
        $('#doctor-file').click();
    });
    $(document).on('change','#doctor-file', () => {
        $('#doctor_document').html('Uploaded!');
    })
    $(document).on('click','#record_document', (e) => {
        e.preventDefault(e);
        $('#record-file').click();
    });
    $(document).on('change','#record-file', () => {
        $('#record_document').html('Uploaded!');
    })
    $(document).on('click','#sign-out', (e) => {
        e.preventDefault();
        build.go_away();
    })
    $(document).on('click','#hospitalAdded', (e) => {
        e.preventDefault();
        build.hospital_add();
    })
    $(document).on('click','#doctorAdded', (e) => {
        e.preventDefault();
        build.doctor_add();
    })
    $(document).on('click','#recordAdded', (e) => {
        e.preventDefault();
        build.record_add();
    })
    $(document).on('click','#nowGo', (e) => {
        $('#pauseWindow').remove();
    })
});