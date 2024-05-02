/** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.nav-sidebar a').filter(function () {
    return this.href == url;
}).addClass('active');

// for treeview
$('ul.nav-treeview a').filter(function () {
    return this.href == url;
}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

//for image
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.selected-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


$('#category').change(function () {
    var selectedValue = $(this).val();
    var selectedText = $(this).find('option:selected').text();

    if ($('#selected-categories li input[value="' + selectedValue + '"]').length === 0) {
        var newItem = $('<ul style="display: flex;"><li class="selected-option" style="display: none;">' + selectedText + '<input type="hidden" name="selectedOptions[]" value="' + selectedValue + '"></li></ul>');
        $('#selected-categories').append(newItem);
        newItem.find('li').fadeIn();
        $('.is-available').hide();
    } else {
        $('.is-available').show();
    }
});

$('#selected-categories').on('click', 'ul', function () {
    var selectedValue = $(this).find('input[name="selectedOptions[]"]').val();
    $(this).fadeOut('fast', function () {
        $(this).remove();
        $('#category option[value="' + selectedValue + '"]').prop('selected', false);
        $('.is-available').hide();
    });
});

//components assign to pages
function setSelectedComponent(){

    let componentParams = document.getElementById('component-select').value;

    let segments = componentParams.split('-');

    let componentsDiv = document.getElementById('selected-components');

    if(componentsDiv !== null){

        let html = '<button class=" mx-1 btn btn-secondary btn-sm" id="selected-comp'+segments[0]+'" type="button" onClick="removeComponent('+segments[0]+')"><input type="text" name="selectedComponents[]" value="'+segments[0]+'" hidden>'+segments[1]+'</button>';

        let component = document.getElementById('selected-comp'+segments[0]);

        if(component === null){

            componentsDiv.innerHTML = componentsDiv.innerHTML + html;
        }
    }

}



//draggable table - view component by page
// $(function () {
//     $("tbody").sortable({
//         cursor: 'row-resize',
//         placeholder: 'ui-state-highlight',
//         opacity: '0.55',
//         items: '.ui-sortable-handle'
//     }).disableSelection();
// });

