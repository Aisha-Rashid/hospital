//Import of functions from other file
import * as build from "./../../js/build.js";

$(document).ready(function(){

    ['User'].map( d => {
        let g = document.createElement("div");
        g.setAttribute("id", d);
        g.setAttribute("class", 'holder');
        document.getElementById('build').appendChild(g);
    })

    build.hospitalContent([5]);
});