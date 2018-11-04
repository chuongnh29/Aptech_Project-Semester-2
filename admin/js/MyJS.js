$(document).ready(function(){
    CKEDITOR.replace( 'productPost', {
        height: 500
    });
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