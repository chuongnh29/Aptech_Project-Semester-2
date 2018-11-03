$(document).ready(function(){
    ClassicEditor
    .create( document.querySelector( '#productReview' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        },
        fontFamily: {
            options: [
                'default',
                'Ubuntu, Arial, sans-serif',
                'Ubuntu Mono, Courier New, Courier, monospace'
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
    // Activate tooltip
    // $('[data-toggle="tooltip"]').tooltip();
    
    // Select/Deselect checkboxes
    
    $('body').on('click','#selectAll',function(){
        var checkbox = $('table tbody input[type="checkbox"]');
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;                        
            });
        } else{
            checkbox.each(function(){
                this.checked = false;                        
            });
        } 
    });
    $('body').on('click','table tbody input[type="checkbox"]',function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });

    $('.delete').click(function(e){
        var name = $(this).parent().find('input[name="name"]').val();
        var isDelete = confirm('Bạn chắc chắn xóa sản phẩm '+ name);
        console.log('alo');
        if(!isDelete){
            e.preventDefault();
        };
    });

    // function changeCategory (url, category) {
    //     var 
    //     window.location.assign(url);
    // }
});