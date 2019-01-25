require('../../../node_modules/dynamic-forms/dist/dynamic_forms');

$(document).ready(function () {
    var dynamicForms = new DynamicForms();
    dynamicForms.automaticallySetupForm();
});

window.toggleJobTitle = function(job_title){
    if( job_title.checked && job_title.value == 3 ){
        document.getElementById("team_leader_select").setAttribute('style', 'display:none;');
    }
    if( !job_title.checked && job_title.value == 3 ){
        document.getElementById("team_leader_select").setAttribute('style', '');
    }
}