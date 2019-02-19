$('button').click(function(){
  
    swal({
    title: 'Are you sure?',
    text: "This Leave request will be denied !",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, denied it!'
  }).then(function() {
    swal(
      'Denied!',
      'The request has been denied.',
      'success'
    );
  })
    
  })