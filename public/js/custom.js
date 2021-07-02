$('#AddCusButton').show();
$('#addCusTitle').show();
$('#updateCusButton').hide();
$('#EditCusTitle').hide();
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


function showData()
{
    $.ajax({
        type: "GET",
        dataType: 'JSON',
        url: "show/data",
        success:function(response){
            var data = "";
            $.each(response,function(key,value){

                data = data + "<tr>"
                data = data + "<td>"+value.id+"</td>"
                data = data + "<td>"+value.name+"</td>"
                data = data + "<td>"+value.address+"</td>"
                data = data + "<td>"+value.phone+"</td>"
                data = data + "<td>"
                data = data + "<button class='btn btn-info' onclick='edit_customer("+value.id+")'>Edit</button>"
                data = data + "<button class='btn btn-danger' onclick='delete_customer("+value.id+")'>Delete</button>"
                data = data + "</td>"
                data = data + "</tr>"

                // console.log(value)
            })
            $('tbody').html(data)
        }
    })
}
showData();
function clearData(){
        $('#name').val('');
        $('#address').val('');
        $('#phone').val('');
        $('#ErrorName').text('');
        $('#ErrorAddress').text('');
        $('#ErrorPhone').text('');
}
function addCustomer(){
    var name = $('#name').val();
    var address = $('#address').val();
    var phone = $('#phone').val();

    $.ajax({
        type:'post',
        dataType:'JSON',
        data:{name:name,address:address,phone:phone},
        url:'/store/customer',
        success:function(data){
            showData();
            clearData()
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              
              Toast.fire({
                icon: 'success',
                title: 'Successfully Customer Added'
              })
        },
        error: function(error){
            $('#ErrorName').text(error.responseJSON.errors.name);
            $('#ErrorAddress').text(error.responseJSON.errors.address);
            $('#ErrorPhone').text(error.responseJSON.errors.phone);
            
        }
    })
}


// Edit Customer Data
function edit_customer(id){
    $.ajax({
        type:"GET",
        dataType:"JSON",
        url:"/edit/Customer/"+id,
        success: function(data){
            $('#AddCusButton').hide();
            $('#addCusTitle').hide();
            $('#updateCusButton').show();
            $('#EditCusTitle').show();

            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#address').val(data.address);
            $('#phone').val(data.phone);
                console.log(data);
        }
    })
}
// Update Customer Data
function updateData(){
    var id = $('#id').val();
    var name = $('#name').val();
    var address = $('#address').val();
    var phone = $('#phone').val();

    $.ajax({
        type:'post',
        dataType:'JSON',
        data:{name:name,address:address,phone:phone},
        url:'/update/Customer/'+id,
        success:function(data){
            $('#AddCusButton').show();
            $('#addCusTitle').show();
            $('#updateCusButton').hide();
            $('#EditCusTitle').hide();
            showData();
            clearData();
            
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              
              Toast.fire({
                icon: 'success',
                title: 'Successfully Customer Updated'
              })
        },
        error: function(error){
            $('#ErrorName').text(error.responseJSON.errors.name);
            $('#ErrorAddress').text(error.responseJSON.errors.address);
            $('#ErrorPhone').text(error.responseJSON.errors.phone);
            
        }
    })
}

function delete_customer(id){
    $.ajax({
        type:'GET',
        dataType:'JSON',
        url:"delete/Customer/"+id,
        success:function(data){
            $('#AddCusButton').show();
            $('#addCusTitle').show();
            $('#updateCusButton').hide();
            $('#EditCusTitle').hide();
            showData();
            clearData();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              
              Toast.fire({
                icon: 'success',
                title: 'Successfully Customer has Deleted'
              })
            console.log(' successfully'); 
        }
    })
}